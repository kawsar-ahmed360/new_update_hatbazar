<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\ProductManage;
use App\Models\Client\Order;
use App\Models\Vandor;
use App\Models\VandorCategoryPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class VadorReportGenarateController extends Controller
{
    public function VandorReport_Genarator(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        return view('VandorDashboard.Report.report_genarate',$data);
    }

    public function VandorFinal_Report_Genarator(Request $request){
        $data['s_date'] = $request->s_date;
        $data['e_date'] = $request->e_date;
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_id = Vandor::where('id',$id)->first()->shop_id;
        $data['shop_i'] = Vandor::where('id',$id)->first();
        $data['Report'] = Order::whereBetween('created_at',[$request->s_date,$request->e_date])->where('shop_id', 'LIKE', "%$shop_id%")->get();

        return view('VandorDashboard.Report.final_report',$data);

    }

    public function VandorPdfFinal_Report_Genarator(Request $request){

        $data['s_date'] = $request->s_date;
        $data['e_date'] = $request->e_date;
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_id = Vandor::where('id',$id)->first()->shop_id;
        $data['shop_i'] = Vandor::where('id',$id)->first();
        $data['Report'] = Order::whereBetween('created_at',[$request->s_date,$request->e_date])->where('shop_id', 'LIKE', "%$shop_id%")->get();
        $pdf = PDF::loadView('VandorDashboard/Report/pdf/report_genarte_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function SeparateVandorReport_GenaratorPage(Request $request){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

        $data['vandor_category'] = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first();
        if($data['vandor_category']!=null){
            $vandor_category = VandorCategoryPermission::where('shop_id',$data['info']->shop_id)->first()->cat_id;
            $json = json_decode($vandor_category);
            $data['category'] = CategoryManage::whereIn('id',$json)->get();
        }

        return view('VandorDashboard.Report.Separate_Report.separate_report_page',$data);
    }

    public function SeparateVandorReport_CategoryWiseReport(Request $request){

        $data['s_date'] = $request->s_date;
        $data['e_date'] = $request->e_date;
        $data['cat_id'] = $request->cat_id;

        $data['category'] = CategoryManage::where('id',$request->cat_id)->first();

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_id = Vandor::where('id',$id)->first()->shop_id;
        $data['shop_i'] = Vandor::where('id',$id)->first();
        $data['Report'] = Order::whereBetween('created_at',[$request->s_date,$request->e_date])->where('shop_id', 'LIKE', "%$shop_id%")->get();


        return view('VandorDashboard.Report.Separate_Report.separate_final_report',$data);
    }


    public function SeparateVandorReportCategoryWiseProductAjax(Request $request){
        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_id = Vandor::where('id',$id)->first()->shop_id;
        $product = ProductManage::where('cat_id',$request->cat_id)->where('shop_id',$shop_id)->where('status','1')->get();

          return response()->json($product);
    }

    public function SeparateVandorReport_ProductWiseReport(Request $request){

        $data['s_date'] = $request->s_date;
        $data['e_date'] = $request->e_date;
        $data['cat_id'] = $request->cat_id;
        $data['pro_id'] = $request->pro_id;

        $data['category'] = CategoryManage::where('id',$request->cat_id)->first();
        $data['product_name'] = ProductManage::where('id',$request->pro_id)->first();

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();
        $shop_id = Vandor::where('id',$id)->first()->shop_id;
        $data['shop_i'] = Vandor::where('id',$id)->first();
        $data['Report'] = Order::whereBetween('created_at',[$request->s_date,$request->e_date])->where('shop_id', 'LIKE', "%$shop_id%")->get();

        return view('VandorDashboard.Report.Separate_Report.separate_product_wise_final_report',$data);
    }
}
