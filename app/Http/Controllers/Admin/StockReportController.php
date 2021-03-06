<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\ProductManage;
use App\Models\Admin\purshes;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;
class StockReportController extends Controller
{
    public function StockGenaratorPage(){

        $data['categorys'] = CategoryManage::get();
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();

        return view('AdminDashboard.stock_report.report_genarator_page',$data);

    }

    public function CategoryWiseStock(Request $Request){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
//        return $Request->all();

//       $data['cat_wise_stock'] = products::where('cat_id',$Request->cate_wise_report)->get();

//        dd($data['cat_wise_stock']);

        $data['push'] = purshes::Select('product_id',DB::raw('sum(subtotal) AS sumprice'),DB::raw('sum(bying_qty) AS totalQty'))
            ->GroupBy('product_id')->where('cat_id',$Request->cate_wise_report)
            ->get();

//       dd($data['push']);

        $data['category'] = CategoryManage::where('id',$Request->cate_wise_report)->first();

//
//        $total_price = $push->sum('subtotal');
//        dd($total_price);
//        $total_bye_product =$push->sum('bying_qty');

//        $total_avg_price = $total_price/$total_bye_product;
//        $data['round_price'] = floor($total_avg_price);


        $data['cat_id'] = $Request->cate_wise_report;

        return view('AdminDashboard.stock_report.stock_report',$data);
    }


    //....................Smae page category wise product...............

    public function CategoryWiseSameStockpdf(Request $Request){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();

//        $data['cat_wise_stock'] = products::where('cat_id',$Request->category_id)->get();

        $data['push'] = purshes::Select('product_id',DB::raw('sum(subtotal) AS sumprice'),DB::raw('sum(bying_qty) AS totalQty'))
            ->GroupBy('product_id')->where('cat_id',$Request->category_id)
            ->get();

//       dd($data['push']);

        $data['category'] = CategoryManage::where('id',$Request->cate_wise_report)->first();




        $pdf = PDF::loadView('AdminDashboard/stock_report/pdf/product_wise_stock_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }



    //...................same page Product wise stock report................


    /**
     * @param Request $Request
     * @return mixed
     */
    public function ProductWiseSameStockpdf(Request $Request){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();

        $data['cat_wise_stock'] = ProductManage::where('cat_id',$Request->category_id)->where('id',$Request->product_id)->get();


        $push = purshes::where('product_id',$Request->product_id)->get();
//        dd($push);
        $total_price = $push->sum('subtotal');
        $total_bye_product =$push->sum('bying_qty');

        $total_avg_price = $total_price/$total_bye_product;
        $data['round_price'] = floor($total_avg_price);


        $data['product_name'] = ProductManage::where('id',$Request->product_id)->first();



        $pdf = PDF::loadView('AdminDashboard/stock_report/pdf/category_wise_pdf_stock', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }




    //.........................End cateogry section.........................


    public function StockGenaratorProductAjax(Request $Request){


        $product = ProductManage::where('cat_id',$Request->cat_id)->get();

        return response()->json($product);
    }

    public function ProductWiseStockGenare(Request $Request){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();


        $data['cat_wise_stock'] = ProductManage::where('cat_id',$Request->cate_wise_report)->where('id',$Request->product_name)->get();

        $push = purshes::where('product_id',$Request->product_name)->get();
//        dd($push);
        $total_price = $push->sum('subtotal');
        $total_bye_product =$push->sum('bying_qty');

        $total_avg_price = $total_price/$total_bye_product;
        $data['round_price'] = floor($total_avg_price);

//        dd($round_price);
        //..........................Old Query.........

//    	$data['cat_wise_stock'] = products::where('cat_id',$Request->cate_wise_report)->where('id',$Request->product_name)->get();
//        $data['category_id'] = $Request->cate_wise_report;
//        $data['product_id'] = $Request->product_name;


//        $product=[];
//
//        for($i=0; $i<count($data['cat_wise_stock']); $i++){
//
//            array_push($product,$data['cat_wise_stock']->id);
//
//        }

//        $querys =  DB::table('product_manages')
//            ->join('prro_categorys','prro_categorys.pro_id','product_manages.id')
//            ->whereIn('prro_categorys.cat_id',$arr)
//            ->GroupBy('prro_categorys.pro_id')
//            ->select('prro_categorys.pro_id')
//            ->get();

//    	 dd($data['cat_wise_stock']);

        $data['category_id'] = $Request->cate_wise_report;
        $data['product_id'] = $Request->product_name;

        return view('AdminDashboard.stock_report.product_wise_stock',$data);
    }





    public function StockGenaratorPdfPage(){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();

        $data['categorys'] = CategoryManage::get();

        return view('AdminDashboard.stock_report.stock_report_pdf_page',$data);
    }

    public function CatStockGenaratorPdfPage(Request $Request){

        $data['cat_wise_stock'] = ProductManage::where('cat_id',$Request->cate_wise_report)->get();


        $pdf = PDF::loadView('AdminDashboard/stock_report/pdf/category_wise_pdf_stock', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }
    public function ProductStockGenaratorPdfPage(Request $Request){

        $data['cat_wise_stock'] = ProductManage::where('cat_id',$Request->cate_wise_report)->where('id',$Request->product_name)->get();

        $pdf = PDF::loadView('AdminDashboard/stock_report/pdf/product_wise_stock_pdf ', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}
