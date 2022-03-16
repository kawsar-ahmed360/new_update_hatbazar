
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://docraptor.com/docraptor-1.0.0.js"></script>
    <script>
        var downloadPDF = function() {
            DocRaptor.createAndDownloadDoc("YOUR_API_KEY_HERE", {
                test: true,
                type: "pdf",

                document_content: document.querySelector('#to').innerHTML,

            })
        }
    </script>

    <style>
        @media print {
            #pdf-button {
                display: none;
            }
        }
    </style>
    <title>Invoice</title>
    <style>
        @import  url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
        *{
            margin: 0;
            box-sizing: border-box;
            -webkit-print-color-adjust: exact;
        }
        body{
            background: #E0E0E0;
            font-family: 'Roboto', sans-serif;
        }
        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        .col-left {
            float: left;
        }
        .col-right {
            float: right;
        }
        h1{
            font-size: 1.5em;
            color: #444;
        }
        h2{font-size: .9em;}
        h3{
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }
        p{
            font-size: .75em;
            color: #666;
            line-height: 1.2em;
        }
        a {
            text-decoration: none;
            color: #00a63f;
        }

        #invoiceholder{
            width:100%;
            height: 100%;
            padding: 50px 0;
        }
        #invoice{
            position: relative;
            margin: 0 auto;
            width: 700px;
            background: #FFF;
        }

        [id*='invoice-']{ /* Targets all id with 'col-' */
            /*  border-bottom: 1px solid #EEE;*/
            padding: 20px;
        }

        #invoice-top{border-bottom: 2px solid #00a63f;}
        #invoice-mid{min-height: 110px;}
        #invoice-bot{ min-height: 240px;    margin-top: 17px;}

        .logo{
            display: inline-block;
            vertical-align: middle;
            width: 110px;
            overflow: hidden;
        }
        .info{
            display: inline-block;
            vertical-align: middle;
            margin-left: 20px;
        }
        .logo img,
        .clientlogo img {
            width: 100%;
        }
        .clientlogo{
            display: inline-block;
            vertical-align: middle;
            width: 50px;
        }
        .clientinfo {
            display: inline-block;
            vertical-align: middle;
            margin-left: 20px
        }
        .title{
            float: right;
        }
        .title p{text-align: right;}
        #message{margin-bottom: 30px; display: block;}
        h2 {
            margin-bottom: 5px;
            color: #444;
        }
        .col-right td {
            color: #666;
            padding: 5px 8px;
            border: 0;
            font-size: 0.75em;
            border-bottom: 1px solid #eeeeee;
        }
        .col-right td label {
            margin-left: 5px;
            font-weight: 600;
            color: #444;
        }
        .cta-group a {
            display: inline-block;
            padding: 7px;
            border-radius: 4px;
            background: rgb(196, 57, 10);
            margin-right: 10px;
            min-width: 100px;
            text-align: center;
            color: #fff;
            font-size: 0.75em;
        }
        .cta-group .btn-primary {
            background: #00a63f;
        }
        .cta-group.mobile-btn-group {
            display: none;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
        td{
            padding: 10px;
            border-bottom: 1px solid #cccaca;
            font-size: 0.70em;
            text-align: left;
        }

        .tabletitle th {
            border-bottom: 2px solid #ddd;
            text-align: right;
        }
        .tabletitle th:nth-child(2) {
            text-align: left;
        }
        th {
            font-size: 0.7em;
            text-align: left;
            padding: 5px 10px;
        }
        .item{width: 50%;}
        .list-item td {
            text-align: right;
        }
        .list-item td:nth-child(2) {
            text-align: left;
        }
        .total-row th,
        .total-row td {
            text-align: right;
            font-weight: 700;
            font-size: .75em;
            border: 0 none;
        }
        .table-main {

        }
        footer {
            border-top: 1px solid #eeeeee;;
            padding: 15px 20px;
        }
        .effect2
        {
            position: relative;
        }
        .effect2:before, .effect2:after
        {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 15px;
            left: 10px;
            width: 50%;
            top: 80%;
            max-width:300px;
            background: #777;
            -webkit-box-shadow: 0 15px 10px #777;
            -moz-box-shadow: 0 15px 10px #777;
            box-shadow: 0 15px 10px #777;
            -webkit-transform: rotate(-3deg);
            -moz-transform: rotate(-3deg);
            -o-transform: rotate(-3deg);
            -ms-transform: rotate(-3deg);
            transform: rotate(-3deg);
        }
        .effect2:after
        {
            -webkit-transform: rotate(3deg);
            -moz-transform: rotate(3deg);
            -o-transform: rotate(3deg);
            -ms-transform: rotate(3deg);
            transform: rotate(3deg);
            right: 10px;
            left: auto;
        }
        @media  screen and (max-width: 767px) {
            h1 {
                font-size: .9em;
            }
            #invoice {
                width: 100%;
            }
            #message {
                margin-bottom: 20px;
            }
            [id*='invoice-'] {
                padding: 20px 10px;
            }
            .logo {
                width: 140px;
            }
            .title {
                float: none;
                display: inline-block;
                vertical-align: middle;
                margin-left: 40px;
            }
            .title p {
                text-align: left;
            }
            .col-left,
            .col-right {
                width: 100%;
            }
            .table {
                margin-top: 20px;
            }
            #table {
                white-space: nowrap;
                overflow: auto;
            }
            td {
                white-space: normal;
            }
            .cta-group {
                text-align: center;
            }
            .cta-group.mobile-btn-group {
                display: block;
                margin-bottom: 20px;
            }
            /*==================== Table ====================*/
            .table-main {
                border: 0 none;
            }
            .table-main thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
            .table-main tr {
                border-bottom: 2px solid #eee;
                display: block;
                margin-bottom: 20px;
            }
            .table-main td {
                font-weight: 700;
                display: block;
                padding-left: 40%;
                max-width: none;
                position: relative;
                border: 1px solid #cccaca;
                text-align: left;
            }
            .table-main td:before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: normal;
                text-transform: uppercase;
            }
            .total-row th {
                display: none;
            }
            .total-row td {
                text-align: left;
            }
            footer {text-align: center;}
        }

        .print_button{
            background: red;
            border: 0px;
            padding: 6px;
            border-radius: 3px;
            color: white;
            margin-left: 10px;
        }

        .page {
            min-height:874px;

        }

    </style>
</head>
<body>






<div id="invoiceholder" class="page">
    <div id="invoice" class="effect2">

        <div id="invoice-top">
            <div class="logo"><img style="height: 44px;" src="http://127.0.0.1:8000/upload/git.png" alt="Logo" />

            </div>


           <span style="text-align: center;font-family: auto;margin-left:56px"> Thank You! Your Order Successfully Completes</span>

            <div class="title">
                <h1>Invoice</h1>
                <p>Invoice Date: <span id="invoice_date">{{date('d M Y')}}</span><br>
                    GL Date: <span id="gl_date">{{date('d M Y')}}</span>
                </p>
            </div><!--End Title-->
        </div><!--End InvoiceTop-->


        <div id="invoice-mid">
            <strong>OrderId: <font style="color: red;"><span><i>#{{@$order->orderId}}</i></span></font></strong>
            <div id="message" style="margin-bottom: 20px;">
                <table class="table table-striped" style="width: 100%;">

                    <table class="table" style="width:40%;float: left;line-height: 1px;">
                        <tbody>
                        <tr>
                            <th colspan="2"><h3 style="font-weight:bold;text-align: center;text-decoration: underline">Coustomer Information</h3></th>
                        </tr>


                        <tr>
                            <th>Name:</th>
                            <td>{{ @$CustomerInfo->name }} {{@$CustomerInfo->lname}}</td>
                        </tr>

                        <tr>
                            <th>Email:</th>
                            <td>{{ @$CustomerInfo->email }}</td>
                        </tr>

                        <tr>
                            <th>Address:</th>
                            <td style="line-height: normal;">@if(@$CustomerInfo->address) {{ @$CustomerInfo->address }} @else Your Address Not Found!! Reason Your Are Guest  @endif</td>
                        </tr>

                        <tr>
                            <th>Mobile:</th>
                            <td>{{ @$CustomerInfo->mobile }}</td>
                        </tr>
                        </tbody>
                    </table>




                    <table class="table" style="width:40%;float: right;line-height: 1px;">
                        <tbody>
                        <tr>
                            <th colspan="2"><h3 style="font-weight:bold;text-align: center;text-decoration: underline">Shipping Information</h3></th>
                        </tr>
                        @if($shipping->other_shipment=='other_shipment')
                        <tr>
                            <th>Name:</th>
                            <td>{{ $shipping->shipping_fname }} {{ $shipping->shipping_lname }}</td>
                        </tr>

                        <tr>
                            <th>Mobile:</th>
                            <td>{{ $shipping->shipping_mobile }}</td>
                        </tr>

                        <tr>
                            <th>Address:</th>
                            <td style="line-height: normal;">{{ $shipping->shipping_address }}</td>
                        </tr>

                        <tr>
                            <th>Country:</th>
                            <td>{{ $shipping->shipping_country_name }}</td>
                        </tr>

                        <tr>
                            <th>City:</th>
                            <td>{{ $shipping->shipping_city_name }}</td>
                        </tr>

                        <tr>
                            <th>State:</th>
                            <td>{{ $shipping->shipping_state_name }}</td>
                        </tr>


                        <tr>
                            <th>Zip:</th>
                            <td>{{ $shipping->shipping_zip_code }}</td>
                        </tr>

                        @else

                            <tr>
                                <th>Name:</th>
                                <td>{{ $shipping->billing_fname }} {{ $shipping->billing_lname }}</td>
                            </tr>

                            <tr>
                                <th>Mobile:</th>
                                <td>{{$shipping->billing_mobile }}</td>
                            </tr>

                            <tr>
                                <th>Address:</th>
                                <td style="line-height: normal;">{{ $shipping->billing_address }}</td>
                            </tr>

                            <tr>
                                <th>Country:</th>
                                <td>{{ $shipping->billing_country_name }}</td>
                            </tr>

                            <tr>
                                <th>City:</th>
                                <td>{{ $shipping->billing_city_name }}</td>
                            </tr>

                            <tr>
                                <th>State:</th>
                                <td>{{ $shipping->billing_state_name }}</td>
                            </tr>


                            <tr>
                                <th>Zip:</th>
                                <td>{{ $shipping->billing_zip_code }}</td>
                            </tr>

                        @endif

                        </tbody>
                    </table>

                </table>
            </div>




        </div><!--End Invoice Mid-->
        <br>
        <br>
        <br>
        <hr style="margin-top: 100px;">


        <div id="invoice-bot">
            <h3 style="text-decoration: underline">Order List</h3>
            <div id="table">
                <table class="table-main table" border="1">
                    <thead>

                    <tr class="tabletitle">
                        <th>Sl</th>
                        <th>SQU</th>
                        <th>Product Name </th>
                        <th>Old Price</th>
                        <th>Discount</th>
                        <th>Product price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>



                    @php
                        $sl=1;
                        $total = 0;
                         $shipping = 0;
                            $shipping_ammount=0;
                    @endphp
                    @foreach($order_details as $or)
                    <tr class="list-item">
                        <td data-label="Type" class="tableitem">{{ $sl++ }}</td>
                        <td data-label="Type" class="tableitem">{{ @$or->products['product_sku'] }}</td>
                        <td data-label="Description" class="tableitem">{{ @$or->products['product_name'] }}</td>
                        <td data-label="Quantity" class="tableitem">৳{{ @$or->products['product_price'] }}</td>
                        @if(@$or->products['discount'])
                            <td data-label="Unit Price" class="tableitem">{{ @$or->products['discount'] }} %</td>
                        @else
                            <td data-label="Unit Price" class="tableitem">0 %</td>
                        @endif
                        <td data-label="Unit Price" class="tableitem">৳{{ @$or->product_price }}</td>
                        <td data-label="Taxable Amount" class="tableitem">{{ @$or->qty }} PCS</td>
                        <td data-label="Tax Code" class="tableitem">৳{{ @$or->product_price * $or->qty }}</td>


                    </tr>
                    @endforeach



                    <tr class="">
                        <th colspan="5" style="text-align: right;" class="tableitem">Payment Type</th>
                        <td data-label="Grand Total" class="tableitem">{{ @$order->payments['payment'] }}</td>
                    </tr>


                    {{--<tr class="list-item ">--}}
                        {{--<th colspan="5" style="text-align: right;" class="tableitem">Shipping Name  </th>--}}
                        {{--<td data-label="Grand Total" class="tableitem"> Null </td>--}}
                    {{--</tr>--}}

                    <tr class="list-item ">
                        <th colspan="5" style="text-align: right;" class="tableitem">Total Amount</th>
                        <td data-label="Grand Total" class="tableitem">৳{{ @$order->total_ammount }}</td>
                    </tr>
                </table>
            </div><!--End Table-->


        </div><!--End InvoiceBot-->


        <footer>
            <div id="legalcopy" class="clearfix">
                <button style="height: 29px;color: black;background: none;border: 1px solid black;box-shadow: 2px 3px 1px;" class="btn btn-success btn-sm print_button" onclick="print()">Print</button>
                <p class="col-right">Our mailing address is:
                    <span class="email"><a href="iamosahan@gmail.com"> iamosahan@gmail.com</a></span>
                </p>
            </div>
        </footer>
    </div><!--End Invoice-->
</div><!-- End Invoice Holder-->


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

</body>
</html>


















{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<title>Document</title>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}

    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
    {{--<script src="https://docraptor.com/docraptor-1.0.0.js"></script>--}}
    {{--<script>--}}
        {{--var downloadPDF = function() {--}}
            {{--DocRaptor.createAndDownloadDoc("YOUR_API_KEY_HERE", {--}}
                {{--test: true,--}}
                {{--type: "pdf",--}}

                {{--document_content: document.querySelector('#to').innerHTML,--}}

            {{--})--}}
        {{--}--}}
    {{--</script>--}}

    {{--<style>--}}
        {{--@media print {--}}
            {{--#pdf-button {--}}
                {{--display: none;--}}
            {{--}--}}
        {{--}--}}
    {{--</style>--}}

{{--</head>--}}
{{--<body id="content">--}}


{{--<div class="jumbotron text-center">--}}
    {{--<h1 class="display-3">Thank You! Your Order Successfully Completes</h1>--}}
    {{--<p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>--}}
    {{--<hr>--}}

    {{--<div id="contents">--}}
        {{--<div class="invoice">--}}

        {{--</div>--}}

        {{--<input style="background:red;color:white;border:none;border-radius:4px;cursor:pointer" id="pdf-button" type="button" value="Download PDF" onclick="downloadPDF()" />--}}

        {{--<div class="container" id="to">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<table style="width:100%;" cellspacing="0" cellpadding="0" >--}}
                        {{--<thead>--}}
                        {{--@php--}}

                            {{--$pdfInfo = \App\Models\Admin\PdfInfo::where('id','1')->first();--}}
                        {{--@endphp--}}
                        {{--<tr>--}}
                            {{--<td style="text-align: center;width:30%"></td>--}}
                            {{--<td style="text-align: center">--}}
                                {{--<span><i>{{$pdfInfo->shop_title}}</i></span> <br>--}}
                                {{--<span style="font-size: 12px">{{$pdfInfo->address}}</span> <br>--}}
                                {{--<span style="font-size: 12px">Mo: {{$pdfInfo->mobile}}</span>--}}
                            {{--</td>--}}
                            {{--<td style="text-align: center;width: 30%"></td>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}

                    {{--</table>--}}







                    {{--<table width="100%" class="" cellspacing="0" cellpadding="0" style="margin-top: 40px" id="news">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<td width="35%">--}}
                                {{--<span style="text-decoration: underline;font-size: 19px">Customer Information:</span>--}}
                                {{--<br>--}}

                                {{--<span><strong>Name</strong> : <i>{{ @$CustomerInfo->name }} {{@$CustomerInfo->lname}}</i></span> <br>--}}
                                {{--<span><strong>Email</strong> : <i>{{ @$CustomerInfo->email }}</i></span> <br>--}}
                                {{--<span><strong>Address</strong> : <i>@if(@$CustomerInfo->address) {{ @$CustomerInfo->address }} @else Your Address Not Found!! Reason Your Are Guest  @endif</i></span> <br>--}}
                                {{--<span><strong>Mobile</strong> : <i>{{ @$CustomerInfo->mobile }}</i></span> <br>--}}

                            {{--</td>--}}
                            {{--<td width="15%">--}}

                            {{--</td>--}}

                            {{--<td width="40%">--}}


                                {{--<span style="text-decoration: underline;font-size: 19px">Shipping Information:</span>--}}
                                {{--<br>--}}


                                {{--<p style="padding:0px;margin:0px"> <span><strong>Order Id:</strong>#{{@$order->orderId}}</span></p>--}}



                                {{--@if($shipping->other_shipment=='other_shipment')--}}

                                    {{--<span>Name : <i>{{ $shipping->shipping_fname }} {{ $shipping->shipping_lname }}</i></span> <br>--}}
                                    {{--<span>Mobile : <i>{{ $shipping->shipping_mobile }}</i></span> <br>--}}
                                    {{--<span>Address : <i>{{ $shipping->shipping_address }}</i></span> <br>--}}
                                    {{--<span>Country : <i>{{ $shipping->shipping_country_name }}</i></span> <br>--}}
                                    {{--<span>City : <i>{{ $shipping->shipping_city_name }}</i></span> <br>--}}
                                    {{--<span>State : <i>{{ $shipping->shipping_state_name }}</i></span> <br>--}}
                                    {{--<span>Zip : <i>{{ $shipping->shipping_zip_code }}</i></span> <br>--}}

                                {{--@else--}}
                                    {{--<span>Name : <i>{{ $shipping->billing_fname }} {{ $shipping->billing_lname }}</i></span> <br>--}}
                                    {{--<span>Mobile : <i>{{ $shipping->billing_mobile }}</i></span> <br>--}}
                                    {{--<span>Address : <i>{{ $shipping->billing_address }}</i></span> <br>--}}
                                    {{--<span>Country : <i>{{ $shipping->billing_country_name }}</i></span> <br>--}}
                                    {{--<span>City : <i>{{ $shipping->billing_city_name }}</i></span> <br>--}}
                                    {{--<span>State : <i>{{ $shipping->billing_state_name }}</i></span> <br>--}}
                                    {{--<span>Zip : <i>{{ $shipping->billing_zip_code }}</i></span> <br>--}}

                                {{--@endif--}}



                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}

                    {{--</table>--}}


                    {{--<table width="100%" border="1" cellspacing="0" cellpadding="0" style="margin-top: 40px;">--}}
                        {{--<thead>--}}
                        {{--<tr align="center">--}}
                            {{--<th style="text-align: center;padding:10px">Sl</th>--}}
                            {{--<th style="text-align: center;padding:10px">Product Sku</th>--}}
                            {{--<th style="text-align: center;padding:10px">Product Name</th>--}}

                            {{--<th style="text-align: center;padding:10px">Old Price</th>--}}
                            {{--<th style="text-align: center;padding:10px">Discount</th>--}}
                            {{--<th style="text-align: center;padding:10px">Product price</th>--}}
                            {{--<th style="text-align: center;padding:10px">Qty</th>--}}

                            {{--<th style="text-align: center">Subtotal</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@php--}}
                            {{--$sl=1;--}}
                            {{--$total = 0;--}}
                             {{--$shipping = 0;--}}
                                {{--$shipping_ammount=0;--}}
                        {{--@endphp--}}

                        {{--@foreach($order_details as $or)--}}
                            {{--<tr align="center">--}}
                                {{--<td style="padding:7px;"> {{ $sl++ }}</td>--}}
                                {{--<td style="padding:7px;"> {{ @$or->products['product_sku'] }}</td>--}}
                                {{--<td style="padding:7px;"> {{ @$or->products['product_name'] }}</td>--}}

                                {{--<td style="padding:7px">৳{{ @$or->products['product_price'] }}</td>--}}
                                {{--@if(@$or->products['discount'])--}}
                                    {{--<td style="padding:7px">{{ @$or->products['discount'] }} %</td>--}}
                                {{--@else--}}
                                    {{--<td>0 %</td>--}}
                                {{--@endif--}}
                                {{--<td style="padding:7px;">৳{{ @$or->product_price }}</td>--}}
                                {{--<td style="padding:7px;"> {{ @$or->qty }} PCS</td>--}}
                                {{--<td style="padding:7px;">৳{{ @$or->product_price * $or->qty }}</td>--}}

                            {{--</tr>--}}

                        {{--@endforeach--}}

                        {{--<tr>--}}

                        {{--<tr>--}}
                            {{--<td colspan="3" align="right">Shipping Name</td>--}}
                            {{--<td  align="center">{{ @$order->shipment_name }}</td>--}}
                        {{--</tr>--}}

                        {{--<tr>--}}
                            {{--<td colspan="3" align="right">Shipping Amount</td>--}}
                            {{--<td  align="center">৳{{ @$order->shipment_amount }}</td>--}}
                        {{--</tr>--}}


                        {{--@if(@$order->coupon!=null)--}}
                            {{--<tr>--}}
                                {{--<td style="padding:9px" colspan="3" align="right">Coupon</td>--}}
                                {{--<td style="padding:9px"  align="center">{{@$order->coupon}}</td>--}}
                            {{--</tr>--}}
                        {{--@else--}}

                        {{--@endif--}}

                        {{--<td style="padding:9px" colspan="3" align="right">Total Amount</td>--}}
                        {{--<td style="padding:9px"  align="center">৳{{ @$order->total_ammount }}</td>--}}
                        {{--</tr>--}}



                        {{--<tr>--}}
                            {{--<td style="padding:9px" colspan="3" align="right">Payment</td>--}}
                            {{--<td style="padding:9px"  align="center" style="color:green">{{ @$order->payments['payment'] }}</td>--}}
                        {{--</tr>--}}


                        {{--</tbody>--}}
                    {{--</table>--}}


                    {{--<div class="col-md-12">--}}



                        {{--<table style="" width="100%" border="1" cellpadding="0" cellspacing="0">--}}


                        {{--</table>--}}

                        {{--<i style="font-size: 10px">Print Date : {{ date('d m Y') }}</i>--}}

                    {{--</div>--}}




                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}




    {{--<p class="lead">--}}
        {{--<a class="btn btn-primary btn-sm" href="{{route('MainIndex')}}" role="button">Continue to homepage</a>--}}
    {{--</p>--}}
{{--</div>--}}










{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}

{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>--}}

{{-- <script type="text/javascript" src="news.js"></script> --}}
{{-- <script type="text/javascript">--}}
  {{--var doc = new jsPDF();--}}
{{--var specialElementHandlers = {--}}
    {{--'#editor': function (element, renderer) {--}}
        {{--return true;--}}
    {{--}--}}
{{--};--}}

{{--$('#cmd').click(function () {--}}
    {{--doc.fromHTML($('#contents').html(), 15, 15, {--}}
        {{--'width': 170,--}}
            {{--'elementHandlers': specialElementHandlers--}}
    {{--});--}}
    {{--doc.save('sample-file.pdf');--}}
{{--});--}}

{{--</script> --}}


{{--</body>--}}
{{--</html>--}}
