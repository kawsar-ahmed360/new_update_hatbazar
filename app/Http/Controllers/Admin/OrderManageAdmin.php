<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CustomerOrderApprove;
use App\Mail\CustomerOrderCancle;
use App\Mail\CustomerOrderCancleShiped;
use App\Mail\CustomerShippingApprove;
use App\Mail\VandorOrderStatus\OrderApproveMail;
use App\Mail\VandorOrderStatus\OrderCompleteStatusApporve;
use App\Mail\VandorOrderStatus\OrderCompleteStatusPanding;
use App\Mail\VandorOrderStatus\OrderPandingMail;
use App\Mail\VandorOrderStatus\OrderShippingApprove;
use App\Mail\VandorOrderStatus\OrderShippingPanding;
use App\Models\Admin;
use App\Models\Admin\Setting;
use App\Models\Client\BillingShipping;
use App\Models\Client\CustomerRegistration;
use App\Models\Client\Order;
use App\Models\Client\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Mail;
use Mail;

class OrderManageAdmin extends Controller
{

    public function AllCustomerApproveAjax(){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $shop_id = 'WE-11';
        $data['shop_id']= 'WE-11';
        $data['order']=Order::OrderBy('id','desc')->where('shop_id', 'LIKE', "%$shop_id%")->get();

        return view('AdminDashboard.OrderManage.OrderListAjax.order',$data);

    }


    public function AllCustomerOrder(){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $shop_id = 'WE-11';
        $data['shop_id']= 'WE-11';
        $data['order']=Order::OrderBy('id','desc')->where('shop_id', 'LIKE', "%$shop_id%")->get();

        return view('AdminDashboard.OrderManage.AllList',$data);
    }

    public function AllCustomerApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->status=2;
        $approve->save();
        $customer = CustomerRegistration::where('id',$approve->user_id)->first();

        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerOrderApprove($data));

        return $this->AllCustomerApproveAjax();
    }

    public function AllCustomerNotApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->status=1;
        $approve->save();
        $customer = CustomerRegistration::where('id',$approve->user_id)->first();
        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerOrderCancle($data));

        return $this->AllCustomerApproveAjax();
    }

    //......................Shipment Section.......................
    public function AllCustomerShippingApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->shipping_status=2;
        $approve->save();
        $customer = CustomerRegistration::where('id',$approve->user_id)->first();
        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerShippingApprove($data));

        return $this->AllCustomerApproveAjax();
    }

    public function AllCustomerShippingNotApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->shipping_status=1;
        $approve->save();

        $customer = CustomerRegistration::where('id',$approve->user_id)->first();
        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerOrderCancleShiped($data));

        return $this->AllCustomerApproveAjax();
    }

    public function AllCustomerOrderComplete(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->order_complete=2;
        $approve->save();

        return $this->AllCustomerApproveAjax();
    }

    //...................All Panding Order..............

    public function AllCustomerPandingAjax(){
        $data['order']=Order::OrderBy('id','desc')->where('status','1')->Orwhere('shipping_status','1')->Orwhere('order_complete','1')->get();
        return view('AdminDashboard.OrderManage.OrderListAjax.panding_order',$data);
    }

    public function AllCustomerPandingOrder(){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $shop_id = 'WE-11';
        $data['shop_id']= 'WE-11';

        $oder_details =  OrderDetail::select('order_details.*')->GroupBy('order_details.order_id')->where('order_details.shop_id',$shop_id)->where('order_details.shipping_status','1')->where('order_details.order_status','1')->where('order_details.order_complete','1')->pluck('order_id');
        $collection = collect(json_decode($oder_details));
        $arr = $collection->unique();

        $data['order']=Order::OrderBy('id','desc')->whereIn('id',$arr)->get();

//        dd($data['order']);

        //$data['order']=Order::OrderBy('id','desc')->where('shop_id', 'LIKE', "%$shop_id%")->get();
//        $data['order']=Order::OrderBy('id','desc')->where('status','1')->Orwhere('shipping_status','1')->Orwhere('order_complete','1')->get();
        return view('AdminDashboard.OrderManage.PandingOrder',$data);
    }

    public function CustomerOrderPandingDetails($id,$shop_id){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();

        $data['order'] = Order::with('customer','payments')->where('id',$id)->where('shop_id', 'LIKE', "%$shop_id%")->first();
        $data['order_details'] = OrderDetail::where('order_id',$data['order']->id)->where('shop_id',$shop_id)->where('order_status','1')->where('shipping_status','1')->where('order_complete','1')->get();

        return view('AdminDashboard.OrderManage.Panding_Order_details',$data);
    }

    public function CustomerOrderShippingCompleteDetails($id,$shop_id){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();
        $data['order'] = Order::with('customer','payments')->where('id',$id)->where('shop_id', 'LIKE', "%$shop_id%")->first();
        $data['order_details'] = OrderDetail::where('order_id',$data['order']->id)->where('shop_id',$shop_id)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get();

        return view('AdminDashboard.OrderManage.Approved_Order_details',$data);
    }


    public function AllCustomerPandingApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->status=2;
        $approve->save();
        $customer = CustomerRegistration::where('id',$approve->user_id)->first();

        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerOrderApprove($data));

        return $this->AllCustomerPandingAjax();
    }

    public function AllCustomerPandingNotApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->status=1;
        $approve->save();
        $customer = CustomerRegistration::where('id',$approve->user_id)->first();
        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerOrderCancle($data));

        return $this->AllCustomerPandingAjax();
    }

    //......................Shipment Section.......................
    public function AllCustomerPandingShippingApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->shipping_status=2;
        $approve->save();
        $customer = CustomerRegistration::where('id',$approve->user_id)->first();
        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerShippingApprove($data));

        return $this->AllCustomerPandingAjax();
    }

    public function AllCustomerPandingShippingNotApprove(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->shipping_status=1;
        $approve->save();

        $customer = CustomerRegistration::where('id',$approve->user_id)->first();
        $data = array(
            'ema'      =>  $customer->email,
            'nam'   =>   $customer->name,
            'orderid'   =>   $approve->orderId,
        );
        Mail::to($data['ema'])->send(new CustomerOrderCancleShiped($data));

        return $this->AllCustomerPandingAjax();
    }

    public function AllCustomerPandingOrderComplete(Request $request){

        $approve = Order::where('id',$request->id)->first();
        $approve->order_complete=2;
        $approve->save();

        return $this->AllCustomerPandingAjax();
    }

    //.....................Order Complete List................

    public function AllCompleteOrderList(){

        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();

        $shop_id = 'WE-11';
        $data['shop_id']= 'WE-11';

        $oder_details =  OrderDetail::select('order_details.*')->GroupBy('order_details.order_id')->where('order_details.shop_id',$shop_id)->where('order_details.shipping_status','2')->where('order_details.order_status','2')->where('order_details.order_complete','2')->pluck('order_id');
        $collection = collect(json_decode($oder_details));
        $arr = $collection->unique();

        $data['order']=Order::OrderBy('id','desc')->whereIn('id',$arr)->get();



//        $data['order']=Order::OrderBy('id','desc')->where('status','2')->where('shipping_status','2')->where('order_complete','2')->get();
        return view('AdminDashboard.OrderManage.CompleteOrderList',$data);
    }

    public function AllCustomerOrderDetails($id,$shop_id){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();


//        $data['order'] = Order::with(['order_details','customer','payments'])->where('id',$id)->first();
        $data['order'] = Order::with('customer','payments')->where('id',$id)->where('shop_id', 'LIKE', "%$shop_id%")->first();
        $data['order_details'] = OrderDetail::where('order_id',$data['order']->id)->where('shop_id',$shop_id)->get();

//         dd($data['order_details']);
        return view('AdminDashboard.OrderManage.Order_Details',$data);
    }

    public function AllCustomerOrderAdminStatus($id,$shop_id){
        $data['logo'] = Setting::where('id','1')->first();
        $data['info'] = Admin::where('id',Auth::guard('admin')->user()->id)->first();

        $data['order'] = Order::with('customer','payments')->where('id',$id)->where('shop_id', 'LIKE', "%$shop_id%")->first();
        $data['order_details'] = OrderDetail::with('products')->where('order_id',$data['order']->id)->where('shop_id',$shop_id)->get();
        $data['shop_id']= 'WE-11';
        return view('AdminDashboard.OrderManage.Order_status',$data);
    }

    public function CustomerOrderApprove($id,$shop_id){

        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->order_status = 2;
        $approve->save();

        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();

        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $shop_id,
            'ShopName'   =>   'WE',
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderApproveMail($data));

        return redirect()->back();
    }

    public function CustomerOrderPanding($id,$shop_id){

        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->order_status = 1;
        $approve->save();

        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();

        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $shop_id,
            'ShopName'   =>   'WE',
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderPandingMail($data));

        return redirect()->back();
    }



          public function CustomerOrderShippingApprove($id,$shop_id){

              $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $approve->shipping_status = 2;
              $approve->save();

              $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();

              $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $order = Order::where('id',$approve_order->order_id)->first();

              $data = array(
                  'Email'      =>  $coustomer_info->email,
                  'Fname'   =>   $coustomer_info->fname,
                  'ShopId'   =>   $shop_id,
                  'ShopName'   =>   'WE',
                  'ProductName'   =>   $approve->products->product_name,
                  'OrderId'   =>   $order->orderId,
              );

              Mail::to($data['Email'])->send(new OrderShippingApprove($data));

              return redirect()->back();
          }


          public function CustomerOrderShippingPanding($id,$shop_id){

              $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $approve->shipping_status = 1;
              $approve->save();

              $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();

              $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $order = Order::where('id',$approve_order->order_id)->first();

              $data = array(
                  'Email'      =>  $coustomer_info->email,
                  'Fname'   =>   $coustomer_info->fname,
                  'ShopId'   =>   $shop_id,
                  'ShopName'   =>   'WE',
                  'ProductName'   =>   $approve->products->product_name,
                  'OrderId'   =>   $order->orderId,
              );

              Mail::to($data['Email'])->send(new OrderShippingPanding($data));

              return redirect()->back();
          }


          public function CustomerOrderShippingComplete($id,$shop_id){

              $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $approve->order_complete = 2;
              $approve->save();

              $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();

              $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
              $order = Order::where('id',$approve_order->order_id)->first();

              $data = array(
                  'Email'      =>  $coustomer_info->email,
                  'Fname'   =>   $coustomer_info->fname,
                  'ShopId'   =>   $shop_id,
                  'ShopName'   =>   'WE',
                  'ProductName'   =>   $approve->products->product_name,
                  'OrderId'   =>   $order->orderId,
              );

              Mail::to($data['Email'])->send(new OrderCompleteStatusApporve($data));

              return redirect()->back();
          }


    public function CustomerOrderShippingCompletePanding($id,$shop_id){

        $approve = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $approve->order_complete = 1;
        $approve->save();

        $mail_info = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $coustomer_info = CustomerRegistration::where('id',$mail_info->user_id)->first();

        $approve_order = OrderDetail::where('id',$id)->where('shop_id',$shop_id)->first();
        $order = Order::where('id',$approve_order->order_id)->first();

        $data = array(
            'Email'      =>  $coustomer_info->email,
            'Fname'   =>   $coustomer_info->fname,
            'ShopId'   =>   $shop_id,
            'ShopName'   =>   'WE',
            'ProductName'   =>   $approve->products->product_name,
            'OrderId'   =>   $order->orderId,
        );

        Mail::to($data['Email'])->send(new OrderCompleteStatusPanding($data));

        return redirect()->back();
    }

    public function AllCustomerOrderDelete($id){

        $order = Order::where('id',$id)->first();
        $order_details = OrderDetail::where('order_id',$id)->delete();
        $biiling = BillingShipping::where('id',$order->billing_id)->delete();
        Order::where('id',$id)->delete();

        return redirect()->back();
    }


}
