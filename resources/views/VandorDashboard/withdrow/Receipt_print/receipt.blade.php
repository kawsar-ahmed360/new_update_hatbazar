
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        /*    #invoice{
               position: relative;
               margin: 0 auto;
               width: 700px;
               background: #FFF;
           }
    */
        #invoice {
            position: relative;
            margin: 0 auto;
            width: 700px;
            background: #FFF;
            height: 285px;
        }

        [id*='invoice-']{ /* Targets all id with 'col-' */
            /*  border-bottom: 1px solid #EEE;*/
            padding: 10px;
        }

        #invoice-top{border-bottom: 2px solid #00a63f;}
        #invoice-mid{min-height: 110px;}
        #invoice-bot{ min-height: 240px;    margin-top: 17px;}



        .logo{
            display: inline-block;
            vertical-align: middle;
            width: 251px;
            overflow: hidden;
        }

        .vendor-logo{
            display: inline-block;
            vertical-align: middle;
            width:100px;
            overflow: hidden;
        }

        .middle-text{
            display: inline-block;
            vertical-align: middle;
            width: 267px;
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
            border-bottom: 1px dotted #cccaca;
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
                width: 251px;
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


{{--<button class="btn btn-success btn-sm print_button" onclick="print()">Print</button>--}}
<div id="invoiceholder" class="page">
    <div id="invoice" class="effect2">

        <div id="invoice-top">

            <div class="logo"><img src="https://wehatbazar.com/upload/Client/Logo/1640758175.png" alt="Logo" style="height: 47px;width: 147px;" />

            </div>

            <div class="middle-text">

                <h1 style="    padding-left: 33px;font-weight: 400;font-family: auto;">Repeipt</h1>
                <p style="font-size: 18px;"> Shop name: <span id="invoice_date" style="font-size: 17px;font-family: cursive;">{{@$info->shop_name}}</span></p>


                <p>Vendor Name: <span id="invoice_date">{{@$info->f_name}}</span><br> </p>
                <p>Vendor Mobile: <span id="invoice_date"> {{@$info->phone}}  </span><br> </p>

            </div>

            <div class="vendor-logo"><img src="{{(@$info->shop_image)?url('upload/Vandor/shop_image/'.@$info->shop_image):''}}" alt="Logo" style="height: 30px;width: 113px;" /> </div>

        </div>


        <div id="invoice-mid">

            <!-- <strong>OrderId: <font style="color: red;"><span><i>#9907</i></span></font></strong> -->

            <div id="message" style="margin-bottom: 20px;">
                <table class="table table-striped" style="width: 100%;">



                    <table class="table" style="width:100%;float: left ;margin:0 auto">
                        <tbody>
                        <tr>
                            <!-- <th colspan="2"><h3 style="font-weight:bold;text-align: center;text-decoration: underline;font-family:cursive"> Transection Information </h3></th> -->
                        </tr>


                        <tr>
                            <th style="font-size: 0.7em;text-align: left;width: 110px;">Request Amount:</th>
                            <td>৳{{@$panding_request->request_amoung}}</td>

                            <th style="font-size: 0.7em;text-align: left;width: 115px;">Approved Amount:</th>
                            <td>৳{{@$panding_request->approve_amount}}</td>
                        </tr>


                        <tr>
                            <th style="font-size: 0.7em;text-align: left;width: 135px;">Payment Method:</th>
                            <td >{{@$panding_request->payment}}</td>
                            <td ></td>
                            <td ></td>
                        </tr>

                        <br>



                        <tr >
                            <th colspan="4" > <p style="float: right;">Repeipt Date: <span id="invoice_date">{{date('d M Y')}}</span></p> </th>
                        </tr>

                        </tbody>
                    </table>

                </table>
            </div>

        </div>

        <br>


        <!-- <hr> -->

        <footer>
            <div id="legalcopy" class="clearfix">
                <p class="col-right"> Thank you :
                    <span class="email"> <a href="{{@$info->email}}"> {{@$info->f_name}}</a></span>
                </p>
            </div>
        </footer>


    </div>

</div>


<script>
    function myFunction() {
        print();
    }
    window.myFunction();
</script>


</body>
</html>