@extends('VandorDashboard.master')
@section('title') Category Wise Stock Report @endsection
@section('vandor-content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 style="" class="card-title">Category Wise Stock Reports </h3>



                    <h5>{{ @$category->category_name}}</h5>


                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                        <tr align="center">
                            <th>SL</th>
                            <th>Product Sku</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Available Qty</th>
                            <th>Amount</th>




                        </tr>
                        </thead>
                        <tbody>


                        @foreach($product as $key=>$pro)


                            <tr align="center">
                                <td>{{ @$key+1 }}</td>
                                <td>{{@$pro->product_sku}}</td>
                                <td>{{@$pro->product_name}}</td>
                                <td>
                                    @if(@$pro->discount)
                                    {{@$pro->new_price}}
                                        @else
                                        {{@$pro->product_price}}
                                    @endif
                                </td>
                                @if(@$pro->product_qty<10)
                                <td style="background: #ec093436;color: black;">{{@$pro->product_qty??'null'}}</td>

                                @else
                                    <td>{{@$pro->product_qty}}</td>
                                    @endif
                                <td>

                                    @if(@$pro->discount)
                                        {{@$pro->new_price*@$pro->product_qty}}
                                    @else
                                        {{@$pro->product_price*@$pro->product_qty}}
                                    @endif

                                </td>



                            </tr>

                        @endforeach



                        </tbody>

                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    @endsection