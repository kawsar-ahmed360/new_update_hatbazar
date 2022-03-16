@extends('VandorDashboard.master')

@section('title') We HatBazar Vandor Dashboard @endsection

@section('vandor-content')

    <style>
        .info-stats4{
            padding: 3rem !important;
        }
        .info-stats4 .info-icon {
            height: 94px !important;
            width: 100px !important;
        }

        .info-stats4 .info-icon i{font-size: 50px}

        .h3Color {
            font-weight: 400 !important;

        }
    </style>



    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

            {{--<div class="">--}}

                {{--<h4 style="text-align: center;text-align: center;font-family: 'Open Sans';font-weight: 200; position: absolute;margin-left: 78px;margin-top: 6px;font-size: 24px;"> <i class="fa fa-arrow-circle-down" style="color: red;font-weight: 600;"></i> Total Order <i style="color: red;font-weight: 600;" class="fa fa-arrow-circle-down"></i></h4>--}}
            {{--</div>--}}

            <div class="info-stats4">

                <div class="info-icon">
                    <i class="icon-shopping-cart1"></i>
                </div>

                <div class="sale-num">
                    <h3 class="h3Color">{{@$total_order}}</h3>
                    <p>Total Orders</p>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            {{--<div class="">--}}

                {{--<h4 style="text-align: center;text-align: center;font-family: 'Open Sans';font-weight: 200; position: absolute;margin-left: 78px;margin-top: 6px;font-size: 24px;"> <i class="fa fa-arrow-circle-down" style="color: red;font-weight: 600;"></i> Total Income <i style="color: red;font-weight: 600;" class="fa fa-arrow-circle-down"></i></h4>--}}
            {{--</div>--}}
            <div class="info-stats4">
                <div class="info-icon">
                    <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                </div>
                <div class="sale-num">
                    <h3 class="h3Color">৳{{@$total_income??'0'}}</h3>
                    <p>Total Income</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            {{--<div class="">--}}

                {{--<h4 style="text-align: center;text-align: center;font-family: 'Open Sans';font-weight: 200; position: absolute;margin-left: 45px;margin-top: 6px;font-size: 24px;"> <i class="fa fa-arrow-circle-down" style="color: red;font-weight: 600;"></i> Commission Amount <i style="color: red;font-weight: 600;" class="fa fa-arrow-circle-down"></i></h4>--}}
            {{--</div>--}}
            <div class="info-stats4">
                <div class="info-icon">
                    <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                </div>
                <div class="sale-num">
                    <h3 class="h3Color">৳{{@$comission_price??'0'}}</h3>
                    <p>Commission Amount </p>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            {{--<div class="">--}}

                {{--<h4 style="text-align: center;text-align: center;font-family: 'Open Sans';font-weight: 200; position: absolute;margin-left: 76px;margin-top: 6px;font-size: 24px;"> <i class="fa fa-arrow-circle-down" style="color: red;font-weight: 600;"></i> Vandor Amount <i style="color: red;font-weight: 600;" class="fa fa-arrow-circle-down"></i></h4>--}}
            {{--</div>--}}
            <div class="info-stats4">
                <div class="info-icon">
                    <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                </div>
                <div class="sale-num">
                    <h3 class="h3Color">৳{{@$with_out_comission??'0'}}</h3>
                    <p>Vandor Amount</p>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            {{--<div class="">--}}

                {{--<h4 style="text-align: center;text-align: center;font-family: 'Open Sans';font-weight: 200; position: absolute;margin-left: 44px;margin-top: 6px;font-size: 24px;"> <i class="fa fa-arrow-circle-down" style="color: red;font-weight: 600;"></i> Withdrawan Amount <i style="color: red;font-weight: 600;" class="fa fa-arrow-circle-down"></i></h4>--}}
            {{--</div>--}}
            <div class="info-stats4">
                <div class="info-icon">
                    <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                </div>
                <div class="sale-num">
                    <h3 class="h3Color">৳{{@$with_drown??'0'}}</h3>
                    <p>Withdrawan Amount</p>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
            {{--<div class="">--}}

                {{--<h4 style="text-align: center;text-align: center;font-family: 'Open Sans';font-weight: 200; position: absolute;margin-left: 78px;margin-top: 6px;font-size: 24px;"> <i class="fa fa-arrow-circle-down" style="color: red;font-weight: 600;"></i> Current Amount <i style="color: red;font-weight: 600;" class="fa fa-arrow-circle-down"></i></h4>--}}
            {{--</div>--}}
            <div class="info-stats4">
                <div class="info-icon">
                    <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                </div>
                <div class="sale-num">
                    <h3 class="h3Color">৳{{(@$with_out_comission??'0')-(@$with_drown??'0')}}</h3>
                    <p>Current Amount</p>
                </div>
            </div>
        </div>

    </div>
    <!-- Row end -->

    <!---------Monthly And Yearly Income--------->
    <div class="row gutters">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Daily Income(Without Commission)</div>
                </div>
                <div class="card-body pt-0">
                    <canvas id="daily_income"></canvas>
                </div>
            </div>
        </div>



        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Monthly Income</div>
                </div>
                <div class="card-body pt-0">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Monthly Income (Without Commission)</div>
                </div>
                <div class="card-body pt-0">
                    <canvas id="monthly_only_vandor_icome"></canvas>
                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Weekly Income (Without Commission)</div>
                </div>
                <div class="card-body pt-0">
                    <canvas id="weeklyIncome"></canvas>
                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Monthly Withdrown Amount</div>
                </div>
                <div class="card-body pt-0">
                    <canvas id="MontlyWithdrownReport"></canvas>
                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Monthly Puches Report</div>
                </div>
                <div class="card-body pt-0">
                    <canvas id="MontlyPurchesReport"></canvas>
                </div>
            </div>
        </div>


    </div>

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="font-family: cursive;">Product Quantity Short List</div>
                </div>
                <div class="card-body pt-0">
                    <table class="table table-striped" id="copy-print-csv">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Available Qty</th>
                            <th>Amount</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach(@$product_qty as $key=>$pro)
                            @if($pro->product_qty<10)
                        <tr>
                            <td>{{@$key+1}}</td>
                            <td>{{$pro->product_name}}</td>
                            <td>
                                @if(@$pro->discount)
                                    {{@$pro->new_price}}
                                @else
                                    {{@$pro->product_price}}
                                @endif
                            </td>
                            <td style="background: #ec093436;color: black;">{{@$pro->product_qty??'0'}}</td>
                            <td>
                                @if(@$pro->discount)
                                    {{@$pro->new_price*@$pro->product_qty}}
                                @else
                                    {{@$pro->product_price*@$pro->product_qty}}
                                @endif
                            </td>

                        </tr>
                        @else


                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>













    <!-- Row start -->
    <div class="row gutters">
        {{--<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<div class="card-title">Quick Stats</div>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="customScroll5">--}}
                        {{--<div class="quick-analytics">--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-shopping-cart1"></i> 500,000 New Orders--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-shopping-bag1"></i> 950,000 Products--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-package"></i> 325,010 Retail Stores--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-play-circle"></i> 780,500 Movies Downloaded--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-share1"></i> 250,000 Images Uploaded--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-eye1"></i> 870,000 Monthly Visits--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-bell"></i> 350,500 Tickets Booked--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-shopping-cart1"></i> 500,000 New Orders--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-shopping-bag1"></i> 950,000 Products--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-package"></i> 325,010 Retail Stores--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-play-circle"></i> 780,500 Movies Downloaded--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-share1"></i> 250,000 Images Uploaded--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-eye1"></i> 870,000 Monthly Visits--}}
                            {{--</a>--}}
                            {{--<a href="#">--}}
                                {{--<i class="icon-bell"></i> 350,500 Tickets Booked--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Recent Purches List</div>
                </div>
                <div class="card-body">
                    <div class="customScroll5">
                        <ul class="project-activity">
                            @foreach(@$purches_list as $key=>$list)
                            <li class="activity-list">
                                <div class="detail-info">
                                    <p class="date">{{date('d-M-y',strtotime($list->created_at))}}</p>
                                    <p class="info">{{@$list->bying_qty}} X ৳{{@$list->bying_price}} = <span style="color:green">৳{{$list->bying_qty*$list->bying_price}}</span></p>
                                </div>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{----}}
        {{--<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<div class="card-title">Order History</div>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="customScroll5">--}}
                        {{--<ul class="user-messages">--}}
                            {{--<li class="clearfix">--}}
                                {{--<div class="customer">AM</div>--}}
                                {{--<div class="delivery-details">--}}
                                    {{--<span class="badge badge-primary">Ordered</span>--}}
                                    {{--<h5>Aaleyah Malik</h5>--}}
                                    {{--<p>We are pleased to inform that the following ticket no. <b>Le Rouge510</b> have been booked.</p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="clearfix">--}}
                                {{--<div class="customer">AS</div>--}}
                                {{--<div class="delivery-details">--}}
                                    {{--<span class="badge badge-primary">Delivered</span>--}}
                                    {{--<h5>Ali Sayed</h5>--}}
                                    {{--<p>The carrier successfully delivered the message to the end user.</p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="clearfix">--}}
                                {{--<div class="customer">ZR</div>--}}
                                {{--<div class="delivery-details">--}}
                                    {{--<span class="badge badge-primary">Cancelled</span>--}}
                                    {{--<h5>Zaira Raheem</h5>--}}
                                    {{--<p>The following describe the status codes and messages states for delivery receipts.</p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="clearfix">--}}
                                {{--<div class="customer">LJ</div>--}}
                                {{--<div class="delivery-details">--}}
                                    {{--<span class="badge badge-primary">Returned</span>--}}
                                    {{--<h5>Lily Jordan</h5>--}}
                                    {{--<p>Status codes and descriptions are returned in the following OpenMarket-specific TLVs When a delivery receipt is received.</p>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <!-- Row end -->

@section('footer')

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['This Month', '1 Month ago', '2 Month Ago', '3 Month Ago', '4 Month Ago', '5 Month Ago','6 Month Ago','7 Month Ago','8 Month Ago','9 Month Ago','10 Month Ago','11 Month Ago'],
                datasets: [{
                    label: '# Month Income',
                    data: [{{$this_month}}, {{$one_month_ago}},{{$two_month_ago}},{{@$three_month_ago}},{{$four_month_ago}},{{$five_month_ago}},{{@$six_month_ago}},{{@$seven_month_ago}},{{@$eight_month_ago}},{{@$nine_month_ago}},'{{@$ten_month_ago}}',{{@$eleven_month_ago}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const ctx_only_vandor_income = document.getElementById('monthly_only_vandor_icome').getContext('2d');
        const monthly_only_vandor_icome = new Chart(ctx_only_vandor_income, {
            type: 'bar',
            data: {
                labels: ['This Month', '1 Month ago', '2 Month Ago', '3 Month Ago', '4 Month Ago', '5 Month Ago','6 Month Ago','7 Month Ago','8 Month Ago','9 Month Ago','10 Month Ago','11 Month Ago'],
                datasets: [{
                    label: '# Month Income',
                    data: [{{@$this_month_only_vandor_amount}},{{@$one_month_only_vandor_amount}},{{@$two_month_only_vandor_amount}},{{@$three_month_only_vandor_amount}},{{$four_month_only_vandor_amount}},{{$five_month_only_vandor_amount}},{{@$six_month_only_vandor_amount}},{{@$seven_month_only_vandor_amount}},{{@$eight_month_only_vandor_amount}},{{@$nine_month_only_vandor_amount}},{{@$ten_month_only_vandor_amount}},{{@$eleven_month_only_vandor_amount}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const ctx_only_vandor_weekly_income = document.getElementById('weeklyIncome').getContext('2d');
        const weeklyIncome = new Chart(ctx_only_vandor_weekly_income, {
            type: 'bar',
            data: {
                labels: ['last 7 days Income','last 15 days Income'],
                datasets: [{
                    label: '# Weekly Income',
                    data: [{{$last_seve_day_incode}},{{$week_fifteen_days}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const ctx_daily_income = document.getElementById('daily_income').getContext('2d');
        const daily_income = new Chart(ctx_daily_income, {
            type: 'bar',
            data: {
                labels: ['today','1 day ago','2 day ago','3 day ago','4 day ago','5 day ago','6 day ago','7 day ago','8 day ago','9 day ago'],
                datasets: [{
                    label: '# Weekly Income',
                    data: [{{$today}},{{$one_day_ago}},{{$two_day_ago}},{{$three_day_ago}},{{$four_day_ago}},{{$five_day_ago}},{{$six_day_ago}},{{$seven_day_ago}},{{$eight_day_ago}},{{$nine_day_ago}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



    <script>
        const MontlyPurchesRep = document.getElementById('MontlyWithdrownReport').getContext('2d');
        const MontlyWithdrownReport = new Chart(MontlyPurchesRep, {
            type:'polarArea',

            data: {
                labels: ['This Month','1 Month Ago','2 Month Ago','3 Month Ago','4 Month Ago','5 Month Ago'],
                datasets: [{
                    label: '#Purches Expense',
                    data: [{{$this_montn_withdrown_income}},{{$one_montn_withdrown_income}},{{$two_montn_withdrown_income}},{{$three_montn_withdrown_income}},{{$four_montn_withdrown_income}},{{$five_montn_withdrown_income}}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)',
                        'rgb(75, 192, 192)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)',
                        'rgb(75, 192, 192)',

                    ],
                    borderWidth: 1
                }]
            },

        });
    </script>


    <script>
        const MonthlyWithdrownes = document.getElementById('MontlyPurchesReport').getContext('2d');
        const MontlyPurchesReport = new Chart(MonthlyWithdrownes, {
            type:'polarArea',

            data: {
                labels: ['This Month','1 Month Ago','2 Month Ago','3 Month Ago','4 Month Ago','5 Month Ago'],
                datasets: [{
                    label: '#Purches Expense',
                    data: [{{@$this_montn_purches_income}},{{@$one_montn_purches_income}},{{@$two_montn_purches_income}},{{@$three_montn_purches_income}},{{@$four_montn_purches_income}},{{@$five_montn_purches_income}}],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)',
                        'rgb(75, 192, 192)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 205, 86)',
                        'rgb(201, 203, 207)',
                        'rgb(54, 162, 235)',
                        'rgb(75, 192, 192)',

                    ],
                    borderWidth: 1
                }]
            },

        });
    </script>

    @endsection



@endsection

