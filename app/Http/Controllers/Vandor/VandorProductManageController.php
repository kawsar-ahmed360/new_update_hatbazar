<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Admin\ColorManage;
use App\Models\Admin\Plating;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductManage;
use App\Models\Admin\SectionManage;
use App\Models\Admin\TagManage;
use App\View\Components\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\CategoryManage;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use Image;

class VandorProductManageController extends Controller
{
    public function VandorProductManage(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        $data['product'] = ProductManage::with('Category')->where('shop_id',$data['info']->shop_id)->get();

       return view('VandorDashboard.Product.all-product',$data);
    }

    public function VandorProductEdit($id,$shop_id){

        $vandor_id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$vandor_id)->first();

        $data['edite'] = ProductManage::where('id',$id)->where('shop_id',$shop_id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

//        $data['section'] = SectionManage::get();
//        $data['color'] = ColorManage::get();
//        $data['tag'] = TagManage::get();
//        $data['plation'] = Plating::get();

        //----------------Section Decode-------------
        $section_decode = ProductManage::where('id',$id)->where('shop_id',$shop_id)->first()->section_id;
        $section_decode_arr = json_decode($section_decode);
        $data['section_edite'] = SectionManage::whereIn('id',$section_decode_arr)->get();


        //----------------Color Decode-------------
//        $color_decode = ProductManage::where('id',$id)->where('shop_id',$shop_id)->first()->color_id;
//        $color_decode_arr = json_decode($color_decode);
//        $data['color_edite'] = ColorManage::whereIn('id',$color_decode_arr)->get();
        //----------------Tag Decode-------------
//        $tag_decode = ProductManage::where('id',$id)->where('shop_id',$shop_id)->first()->tag_id;
//        $tag_decode_arr = json_decode($tag_decode);
//        $data['tag_edite'] = TagManage::whereIn('id',$tag_decode_arr)->get();
        //----------------Plating Decode-------------
//        $plating_decode = ProductManage::where('id',$id)->where('shop_id',$shop_id)->first()->plation_id;
//        $plating_decode_arr = json_decode($plating_decode);
//        $data['plating_edite'] = Plating::whereIn('id',$plating_decode_arr)->get();
        //------------------Gallery Section---------------
        $data['gallery'] = ProductGallery::where('product_id',$id)->get();

        return view('VandorDashboard.Product.product_edit',$data);
    }

    public function VandorProductUpdate(Request $request){

        $request->validate([
            'product_name'=>'required',
            'summary'=>'required',
        ]);

        $update = ProductManage::where('id',$request->EditeId)->where('shop_id',$request->shop_id)->first();
        $update->product_name = $request->product_name;
        $update->summary = $request->summary;
        $update->slug = str_slug($request->product_name);
        $update->meta_title = $request->meta_title;
        $update->meta_des = $request->meta_des;
        $update->save();

        $unique = uniqid();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fullname = time().'.'.$image->getClientOriginalExtension();
            @unlink('upload/Client/Product/'.$update->image);
            Image::make($image)->resize(440,440)->save('upload/Client/Product/'.$fullname);
            $update->image = $fullname;
            $update->save();
        }

        if($request->hasFile('product_gallery')){
            $old_gallery =ProductGallery::where('product_id',$request->EditeId)->get();
            foreach(@$old_gallery as $key=>$gallery){
                @unlink('upload/Client/ProductGallery/'.$gallery->product_gallery);
                $gallery->delete();
            }
            $random = rand(00000,99999);
            $size = 'basic';
            $gallery = $request->file('product_gallery');
            foreach(@$gallery as $key=>$gall){
                $fullGallery = time().'.'.$key.'.'.$unique.'.'.$random.'.'.$size.'.'.$gall->getClientOriginalExtension();
                Image::make($gall)->resize(515,515)->save('upload/Client/ProductGallery/'.$fullGallery);
                $galleryStore = new ProductGallery();
                $galleryStore->product_id = $update->id;
                $galleryStore->product_gallery = $fullGallery;
                $galleryStore->save();
            }

        }



        return redirect()->back();
    }

    public function VandorApproveProductList(){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        $data['product'] = ProductManage::with('Category')->where('shop_id',$data['info']->shop_id)->where('status','1')->get();


        return view('VandorDashboard.Product.all-approve-product',$data);

    }
    
    public function VandorPandingProductList(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $data['vandor_category']= VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        $data['product'] = ProductManage::with('Category')->where('shop_id',$data['info']->shop_id)->where('status','2')->get();

        return view('VandorDashboard.Product.all-panding-product',$data);
    }
}
