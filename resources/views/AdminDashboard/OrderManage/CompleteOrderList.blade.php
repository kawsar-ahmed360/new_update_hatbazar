@extends('AdminDashboard.master')
@section('title') Order Complete List @endsection
@section('admin-content')

    <div class="row">
        <div class="col-md-12">
            <div class="table-container">
                <div class="t-header">Order Complete List </div>
                <div class="table-responsive">
                    <table id="copy-print-csv"  class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Order Id</th>
                            <th>Customer Status</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Payment</th>
                            <th>Total Amount</th>
                            {{--<th>Status</th>--}}
                            {{--<th>Shipping</th>--}}
                            {{--<th>Order Complete</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="">

                        @php
                            $sl=1
                        @endphp
                        @foreach(@$order as $key=>$or)

                            @php
                                $order_details =\App\Models\Client\OrderDetail::where('shop_id',$shop_id)->where('order_id',$or->id)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('subtotal');
                               $order_details_status =\App\Models\Client\OrderDetail::where('order_id',$or->id)->where('shop_id',$shop_id)->get();

                            @endphp
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>#{{$or->orderId}}</td>
                                @if(@$or->customer['password'])
                                    <td>Register Customer</td>
                                @else
                                    <td>Guest</td>
                                @endif
                                <td>{{ @$or->customer['name'] }}</td>
                                <td>{{ @$or->customer['mobile'] }}</td>
                                <td>{{ @$or->payments['payment'] }}</td>
                                <td>???{{ $order_details }}</td>

                                <td>
                                    <a href="{{route('CustomerOrderShippingCompleteDetails',[$or->id,$shop_id])}}" class="badge badge-info badge-sm"><i class="fa fa-eye"></i></a>
                                </td>

                                {{--@if(@$or->status==2)--}}
                                    {{--<td><span class="badge badge-success">Done</span></td>--}}

                                {{--@endif--}}


                                {{--@if(@$or->shipping_status==2)--}}
                                    {{--<td><span class="badge badge-success">Done</span></td>--}}
                                {{--@endif--}}


                                {{--@if(@$or->order_complete==2)--}}
                                    {{--<td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px" >Complete</span></td>--}}

                                {{--@endif--}}

                                {{--<td>--}}
                                {{--@if(@$or->status==1)--}}
                                {{--<input type="button"  onclick="Approve('{{@$or->id}}')"  > Active--}}
                                {{--@elseif(@$or->status==2)--}}
                                {{--<input type="button"  onclick="NotApprove('{{@$or->id}}')"> Deactive--}}
                                {{--@endif--}}
                                {{--</td>--}}
                                {{--<td>--}}

                                {{--<a href="{{ route('CustomerOrderPDF',$or->id) }}" class="btn btn-primary btn-sm" title="Order Print"><i class="fa fa-print"></i></a>--}}
                                {{--</td>--}}
                            </tr>




                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



@endsection