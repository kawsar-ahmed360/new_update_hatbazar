<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductManage;
use App\Models\Admin\purshes;
use App\Models\Client\Order;
use App\Models\Client\OrderDetail;
use App\Models\Vandor;
use App\Models\VandorPaymentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class VandorDashboardController extends Controller
{
    public function VandorDashobard(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();


        //..................days incode...............

        $today = Carbon::now();
        $vandor_today_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$today)
            ->sum('subtotal');
        $vandor_today_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$today)
            ->sum('comm_price');

        $data['today'] = $vandor_today_day_ago_income-$vandor_today_day_ago_commision_income;


        $one_day_ago = Carbon::now()->subDay(1);
        $vandor_one_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$one_day_ago)
            ->sum('subtotal');
        $vandor_one_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$one_day_ago)
            ->sum('comm_price');

        $data['one_day_ago'] = $vandor_one_day_ago_income-$vandor_one_day_ago_commision_income;


        $two_day_ago = Carbon::now()->subDay(2);
        $vandor_two_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$two_day_ago)
            ->sum('subtotal');
        $vandor_two_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$two_day_ago)
            ->sum('comm_price');

        $data['two_day_ago'] = $vandor_two_day_ago_income-$vandor_two_day_ago_commision_income;


        $three_day_ago = Carbon::now()->subDay(3);
        $vandor_three_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$three_day_ago)
            ->sum('subtotal');
        $vandor_three_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$three_day_ago)
            ->sum('comm_price');

        $data['three_day_ago'] = $vandor_three_day_ago_income-$vandor_three_day_ago_commision_income;



        $four_day_ago = Carbon::now()->subDay(4);
        $vandor_four_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$four_day_ago)
            ->sum('subtotal');
        $vandor_four_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$four_day_ago)
            ->sum('comm_price');

        $data['four_day_ago'] = $vandor_four_day_ago_income-$vandor_four_day_ago_commision_income;



        $five_day_ago = Carbon::now()->subDay(5);
        $vandor_five_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$five_day_ago)
            ->sum('subtotal');
        $vandor_five_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$five_day_ago)
            ->sum('comm_price');

        $data['five_day_ago'] = $vandor_five_day_ago_income-$vandor_five_day_ago_commision_income;



        $six_day_ago = Carbon::now()->subDay(6);
        $vandor_six_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$six_day_ago)
            ->sum('subtotal');
        $vandor_six_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$six_day_ago)
            ->sum('comm_price');

        $data['six_day_ago'] = $vandor_six_day_ago_income-$vandor_six_day_ago_commision_income;


        $seven_day_ago = Carbon::now()->subDay(7);
        $vandor_seven_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$seven_day_ago)
            ->sum('subtotal');
        $vandor_seven_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$seven_day_ago)
            ->sum('comm_price');

        $data['seven_day_ago'] = $vandor_seven_day_ago_income-$vandor_seven_day_ago_commision_income;


        $eight_day_ago = Carbon::now()->subDay(8);
        $vandor_eight_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$eight_day_ago)
            ->sum('subtotal');
        $vandor_eight_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$eight_day_ago)
            ->sum('comm_price');

        $data['eight_day_ago'] = $vandor_eight_day_ago_income-$vandor_eight_day_ago_commision_income;


        $nine_day_ago = Carbon::now()->subDay(9);
        $vandor_nine_day_ago_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$nine_day_ago)
            ->sum('subtotal');
        $vandor_nine_day_ago_commision_income = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at',$nine_day_ago)
            ->sum('comm_price');

        $data['nine_day_ago'] = $vandor_nine_day_ago_income-$vandor_nine_day_ago_commision_income;




        //------------------Montlhy Income----------------

        $currentDateTime = Carbon::now();
        $data['this_month'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$currentDateTime)
            ->sum('subtotal');

        //........One Month Ago.....
        $one_month_ago = Carbon::now()->subMonths(1);
        $data['one_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$one_month_ago)
            ->sum('subtotal');

        $two_month_ago = Carbon::now()->subMonths(2);
        $data['two_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$two_month_ago)
            ->sum('subtotal');


        $three_month_ago = Carbon::now()->subMonths(3);
        $data['three_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$three_month_ago)
            ->sum('subtotal');

        $four_month_ago  = Carbon::now()->subMonths(4);
        $data['four_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$four_month_ago)
            ->sum('subtotal');


        $five_month_ago  = Carbon::now()->subMonths(5);
        $data['five_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$five_month_ago)
            ->sum('subtotal');


        $six_month_ago  = Carbon::now()->subMonths(6);
        $data['six_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$six_month_ago)
            ->sum('subtotal');


        $seven_month_ago  = Carbon::now()->subMonths(7);
        $data['seven_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$seven_month_ago)
            ->sum('subtotal');

        $eight_month_ago  = Carbon::now()->subMonths(8);
        $data['eight_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eight_month_ago)
            ->sum('subtotal');


        $nine_month_ago  = Carbon::now()->subMonths(9);
        $data['nine_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$nine_month_ago)
            ->sum('subtotal');

        $ten_month_ago  = Carbon::now()->subMonths(10);
        $data['ten_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$ten_month_ago)
            ->sum('subtotal');

        $eleven_month_ago  = Carbon::now()->subMonths(11);
        $data['eleven_month_ago'] = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eleven_month_ago)
            ->sum('subtotal');


        //------------------------Monthly Vandor Amount---------------------
        $currentDateTimeOnlyVandor = Carbon::now();
        $this_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$currentDateTimeOnlyVandor)
            ->sum('subtotal');

        $this_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$currentDateTimeOnlyVandor)
            ->sum('comm_price');

        $data['this_month_only_vandor_amount'] = $this_month_total_amount-$this_month_comissin_amount;

        //---------------------------One Month Ago--------------------

        $one_month_ago_OnlyVandor = Carbon::now()->subMonths(1);
        $one_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$one_month_ago_OnlyVandor)
            ->sum('subtotal');

        $one_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$one_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['one_month_only_vandor_amount'] = $one_month_total_amount-$one_month_comissin_amount;

        //---------------------------Two Month Ago--------------------

        $two_month_ago_OnlyVandor = Carbon::now()->subMonths(2);
        $two_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$two_month_ago_OnlyVandor)
            ->sum('subtotal');

        $two_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$two_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['two_month_only_vandor_amount'] = $two_month_total_amount-$two_month_comissin_amount;


        //---------------------------Three Month Ago--------------------

        $three_month_ago_OnlyVandor = Carbon::now()->subMonths(3);
        $three_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$three_month_ago_OnlyVandor)
            ->sum('subtotal');

        $three_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$three_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['three_month_only_vandor_amount'] = $three_month_total_amount-$three_month_comissin_amount;


        //---------------------------Four Month Ago--------------------

        $four_month_ago_OnlyVandor = Carbon::now()->subMonths(4);
        $four_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$four_month_ago_OnlyVandor)
            ->sum('subtotal');

        $four_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$four_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['four_month_only_vandor_amount'] = $four_month_total_amount-$four_month_comissin_amount;



        //---------------------------Five Month Ago--------------------

        $five_month_ago_OnlyVandor = Carbon::now()->subMonths(5);
        $five_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$five_month_ago_OnlyVandor)
            ->sum('subtotal');

        $five_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$five_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['five_month_only_vandor_amount'] = $five_month_total_amount-$five_month_comissin_amount;



        //---------------------------Six Month Ago--------------------

        $six_month_ago_OnlyVandor = Carbon::now()->subMonths(6);
        $six_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$six_month_ago_OnlyVandor)
            ->sum('subtotal');

        $six_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$six_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['six_month_only_vandor_amount'] = $six_month_total_amount-$six_month_comissin_amount;


        //---------------------------Seven Month Ago--------------------

        $seven_month_ago_OnlyVandor = Carbon::now()->subMonths(7);
        $seven_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$seven_month_ago_OnlyVandor)
            ->sum('subtotal');

        $seven_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$seven_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['seven_month_only_vandor_amount'] = $seven_month_total_amount-$seven_month_comissin_amount;


        //---------------------------Eight Month Ago--------------------

        $eight_month_ago_OnlyVandor = Carbon::now()->subMonths(8);
        $eight_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eight_month_ago_OnlyVandor)
            ->sum('subtotal');

        $eight_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eight_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['eight_month_only_vandor_amount'] = $eight_month_total_amount-$eight_month_comissin_amount;



        //---------------------------Nine Month Ago--------------------

        $nine_month_ago_OnlyVandor = Carbon::now()->subMonths(9);
        $nine_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$nine_month_ago_OnlyVandor)
            ->sum('subtotal');

        $nine_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$nine_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['nine_month_only_vandor_amount'] = $nine_month_total_amount-$nine_month_comissin_amount;


        //---------------------------Ten Month Ago--------------------

        $ten_month_ago_OnlyVandor = Carbon::now()->subMonths(10);
        $ten_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$ten_month_ago_OnlyVandor)
            ->sum('subtotal');

        $ten_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$ten_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['ten_month_only_vandor_amount'] = $ten_month_total_amount-$ten_month_comissin_amount;



        //---------------------------Eleven Month Ago--------------------

        $eleven_month_ago_OnlyVandor = Carbon::now()->subMonths(11);
        $eleven_month_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eleven_month_ago_OnlyVandor)
            ->sum('subtotal');

        $eleven_month_comissin_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereMonth('created_at',$eleven_month_ago_OnlyVandor)
            ->sum('comm_price');

        $data['eleven_month_only_vandor_amount'] = $eleven_month_total_amount-$eleven_month_comissin_amount;



        //------------------vandor Weekly Income-------------
        $dayOfTheWeek = Carbon::now()->subDays(7);

        $weekly_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at','>=',$dayOfTheWeek)
            ->sum('subtotal');
        $weekly_total_commission_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at','>=',$dayOfTheWeek)
            ->sum('comm_price');

        $data['last_seve_day_incode'] = $weekly_total_amount-$weekly_total_commission_amount;



        $week_fifteen_days = Carbon::now()->subDays(15);
        $two_week_total_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at','>=',$week_fifteen_days)
            ->sum('subtotal');
        $two_week_total_commission_amount = OrderDetail::where('order_status','2')->where('shipping_status','2')
            ->where('order_complete','2')->where('shop_id', $data['info']->shop_id)
            ->whereDate('created_at','>=',$week_fifteen_days)
            ->sum('comm_price');
        $data['week_fifteen_days']= $two_week_total_amount-$two_week_total_commission_amount;


        //------------------------ Vandor Amount ---------------------

        $data['with_drown'] = VandorPaymentRequest::where('shop_id',$data['info']->shop_id)->where('user_id',$id)->where('status','2')->get()->sum('approve_amount');
        $shopId = $data['info']->shop_id;
        $data['order'] = Order::where('shop_id', 'LIKE', "%$shopId%")->get();
        foreach ($data['order'] as $key => $or){

            $data['total_income'] = \App\Models\Client\OrderDetail::where('shop_id',$shopId)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('subtotal');
            $data['comission_price'] = \App\Models\Client\OrderDetail::where('shop_id',$shopId)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('comm_price');
            $data['with_out_comission'] = $data['total_income']-$data['comission_price'];
        }

        //----------------Total Order----------------
        $data['total_order'] = Order::where('shop_id', 'LIKE', "%$shopId%")->get()->count();
        $data['product_qty'] = ProductManage::where('shop_id',$data['info']->shop_id)->where('status','1')->get();


        //------------------Total WithDrown Income-------------

        $this_month_withdrown_payment = Carbon::now();
        $data['this_montn_withdrown_income'] = VandorPaymentRequest::where('shop_id',$data['info']->shop_id)->whereMonth('updated_at',$this_month_withdrown_payment)->where('status','2')->get()->sum('approve_amount');

        $one_month_withdrown_payment = Carbon::now()->subMonths(1);
        $data['one_montn_withdrown_income'] = VandorPaymentRequest::where('shop_id',$data['info']->shop_id)->whereMonth('updated_at',$one_month_withdrown_payment)->where('status','2')->get()->sum('approve_amount');


        $two_month_withdrown_payment = Carbon::now()->subMonths(2);
        $data['two_montn_withdrown_income'] = VandorPaymentRequest::where('shop_id',$data['info']->shop_id)->whereMonth('updated_at',$two_month_withdrown_payment)->where('status','2')->get()->sum('approve_amount');


        $three_month_withdrown_payment = Carbon::now()->subMonths(3);
        $data['three_montn_withdrown_income'] = VandorPaymentRequest::where('shop_id',$data['info']->shop_id)->whereMonth('updated_at',$three_month_withdrown_payment)->where('status','2')->get()->sum('approve_amount');

        $four_month_withdrown_payment = Carbon::now()->subMonths(4);
        $data['four_montn_withdrown_income'] = VandorPaymentRequest::where('shop_id',$data['info']->shop_id)->whereMonth('updated_at',$four_month_withdrown_payment)->where('status','2')->get()->sum('approve_amount');


        $five_month_withdrown_payment = Carbon::now()->subMonths(5);
        $data['five_montn_withdrown_income'] = VandorPaymentRequest::where('shop_id',$data['info']->shop_id)->whereMonth('updated_at',$five_month_withdrown_payment)->where('status','2')->get()->sum('approve_amount');


        $this_month_pusches_amount = Carbon::now();
        $data['this_montn_purches_income'] = purshes::where('shop_id',$data['info']->shop_id)->whereMonth('created_at',$this_month_pusches_amount)->where('status','1')->get()->sum('subtotal');

        $one_month_pusches_amount = Carbon::now()->subMonths(1);
        $data['one_montn_purches_income'] = purshes::where('shop_id',$data['info']->shop_id)->whereMonth('created_at',$one_month_pusches_amount)->where('status','1')->get()->sum('subtotal');

        $two_month_pusches_amount = Carbon::now()->subMonths(2);
        $data['two_montn_purches_income'] = purshes::where('shop_id',$data['info']->shop_id)->whereMonth('created_at',$two_month_pusches_amount)->where('status','1')->get()->sum('subtotal');

        $three_month_pusches_amount = Carbon::now()->subMonths(3);
        $data['three_montn_purches_income'] = purshes::where('shop_id',$data['info']->shop_id)->whereMonth('created_at',$three_month_pusches_amount)->where('status','1')->get()->sum('subtotal');

        $four_month_pusches_amount = Carbon::now()->subMonths(4);
        $data['four_montn_purches_income'] = purshes::where('shop_id',$data['info']->shop_id)->whereMonth('created_at',$four_month_pusches_amount)->where('status','1')->get()->sum('subtotal');


        $five_month_pusches_amount = Carbon::now()->subMonths(5);
        $data['five_montn_purches_income'] = purshes::where('shop_id',$data['info']->shop_id)->whereMonth('created_at',$five_month_pusches_amount)->where('status','1')->get()->sum('subtotal');


        $data['purches_list'] = purshes::where('shop_id',$data['info']->shop_id)->where('status','1')->get();

        return view('VandorDashboard.main',$data);
    }

    //------------------Profile Info Update----------------

    public function VandorProfile($id){

        $data['info'] = Vandor::where('id',$id)->first();
       return view('VandorDashboard.profile.profile',$data);
    }

    public function VandorProfileUpdate(Request $request){

        $update = Vandor::where('id',$request->EditeId)->first();
        $update->f_name = $request->f_name;
        $update->phone = $request->phone;
        $update->street_address = $request->street_address;
        $update->city = $request->city;
        $update->state = $request->state;
        $update->product_being_displayed = $request->product_being_displayed;
        $update->zip = $request->zip;
        $update->save();

        if($request->hasFile('profile')){
            $image_profile = $request->file('profile');
            $fullname_profile = time().'.'.$image_profile->getClientOriginalExtension();
            @unlink('upload/Vandor/profile/'.$update->profile);
            Image::make($image_profile)->resize(100,100)->save('upload/Vandor/profile/'.$fullname_profile);
            $update->profile = $fullname_profile;
            $update->save();
        }

        if($request->hasFile('shop_image')){
            $image_shop_image = $request->file('shop_image');
            $fullname_shop_image = time().'.'.$image_shop_image->getClientOriginalExtension();
            @unlink('upload/Vandor/shop_image/'.$update->shop_image);
            Image::make($image_shop_image)->resize(160,29)->save('upload/Vandor/shop_image/'.$fullname_shop_image);
            $update->shop_image = $fullname_shop_image;
            $update->save();
        }

        if($request->hasFile('shop_banner')){
            $image_shop_banner = $request->file('shop_banner');
            $fullname_shop_banner = time().'.'.$image_shop_banner->getClientOriginalExtension();
            @unlink('upload/Vandor/shop_banner/'.$update->shop_banner);
            Image::make($image_shop_banner)->resize(114,19)->save('upload/Vandor/shop_banner/'.$fullname_shop_banner);
            $update->shop_banner = $fullname_shop_banner;
            $update->save();
        }

        return redirect()->back();

    }
}
