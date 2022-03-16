@extends('AdminDashboard.master')
@section('title') Vandor Panel All Approved Order @endsection
@section('admin-content')


    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="documents-section">

                <!-- Row start -->
                <div class="row no-gutters">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4">

                        <div class="docs-type-container">

                            <div class="">
                                <img style="padding-left: 10px;padding-top: 10px;" src="{{(@$vandor->shop_image)?url('upload/Vandor/shop_image/'.@$vandor->shop_image):''}}" alt="">
                            </div>

                            <div class="docTypeContainerScroll">

                                <div class="docs-block">
                                    <h5>Favourites</h5>
                                    <div class="doc-labels">
                                        <a href="#" class="@if(Request::routeIs('VandorPanelProductAdd')) @else'active'@endif">
                                            <i class="fa fa-user"></i> Panel View
                                        </a>


                                        <a href="{{route('VandorOrderListView',@$vandor->shop_id)}}" class="{{ Request::routeIs('VandorOrderListView') ? 'active' : '' }}">
                                            <i class="fa fa-shopping-cart"></i> Order List
                                        </a>


                                        <a href="{{route('VandorApprovedOrderListView',@$vandor->shop_id)}}" class="{{ Request::routeIs('VandorApprovedOrderListView') ? 'active' : '' }}">
                                            <i class="fa fa-shopping-cart"></i> Approved Order
                                        </a>



                                        <a href="{{route('VandorPandingOrderListView',@$vandor->shop_id)}}" class="{{ Request::routeIs('VandorPandingOrderListView') ? 'active' : '' }}">
                                            <i class="fa fa-shopping-cart"></i> Panding Order
                                        </a>




                                        <a href="{{route('VandorPanelProductPage',$vandor->shop_id)}}" class="">
                                            <i class="fa fa-backward"></i> Back
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">

                        <div class="documents-container">
                            <div class="modal fade" id="addNewDocument" tabindex="-1" role="dialog" aria-labelledby="addNewDocumentLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDocumentLabel">Add Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="docTitle">Document Title</label>
                                                        <input type="text" class="form-control" id="docTitle" placeholder="Task Title">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="dovType">Document Type</label>
                                                        <input type="text" class="form-control" id="dovType" placeholder="Task Title">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="addedDate">Created On</label>
                                                        <div class="custom-date-input">
                                                            <input type="text" name="" class="form-control datepicker" id="addedDate" placeholder="10/10/2019">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group mb-0">
                                                        <label for="docDetails">Document Details</label>
                                                        <textarea class="form-control" id="docDetails"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer custom">
                                            <div class="left-side">
                                                <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="right-side">
                                                <button type="button" class="btn btn-link success btn-block">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="documents-header">
                                <h3><font style="text-transform: capitalize;">{{@$vandor->shop_name??"demo"}}</font> <span>{{@$vandor->shop_id??"null"}}</span></h3>

                            </div>
                            <div class="documentsContainerScroll">
                                <div class="table-responsive">
                                    <div class="container">
                                        <table id="copy-print-csv" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Order Id</th>
                                                <th>Cust Status</th>
                                                <th>Name</th>
                                                {{--<th>Color</th>--}}
                                                <th>Mobile</th>
                                                <th>Payment</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $sl=1 @endphp
                                            @foreach(@$order as $key=>$or)

                                                @php
                                                    $order_details = \App\Models\Client\OrderDetail::where('shop_id',$shop_i->shop_id)->where('order_id',$or->id)->where('order_status','2')->where('shipping_status','2')->where('order_complete','2')->get()->sum('subtotal');
                                                   $order_details_status = \App\Models\Client\OrderDetail::where('order_id',$or->id)->where('shop_id',$shop_i->shop_id)->get();

                                                @endphp

                                                <tr>

                                                    {{--<td><input type="checkbox" name="prints[]" id="allchec" value="{{@$or->id}}" multiple><input type="hidden" value="{{$shop_i->shop_id}}" name="shop_id"></td>--}}
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
                                                    <td>৳{{ @$order_details}}</td>



                                                    {{--@if(@$or->status==2)--}}
                                                    {{--<td><span class="badge badge-success"  onclick="NotApprove('{{@$or->id}}')" ><i class="fa fa-check"></i></span></td>--}}
                                                    {{--@elseif(@$or->status==1)--}}
                                                    {{--<td><a href="{{route('VandorOrderFirstStatusApprove',[@$or->id,@$shop_i->shop_id])}}"><span class="badge badge-danger"><i class="fa fa-close"></i></span></a></td>--}}
                                                    {{--@endif--}}


                                                    {{--@if(@$or->shipping_status==2)--}}
                                                    {{--<td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px"  onclick="AdminShipNotApprove('{{@$or->id}}')" ><i style="font-size: 14px;" class="fa fa-car"></i></span></td>--}}
                                                    {{--@elseif(@$or->shipping_status==1)--}}
                                                    {{--<td> <span class="badge badge-danger" onclick="AdminShipApprove('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-car"></i></span> </td>--}}
                                                    {{--@endif--}}


                                                    {{--@if(@$or->order_complete==2)--}}
                                                    {{--<td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px" >Complete</span></td>--}}
                                                    {{--@elseif(@$or->order_complete==1)--}}
                                                    {{--<td><span class="badge badge-danger" style="border-radius: 7px 4px 8px 0px" onclick="CompleteOrder('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-check-circle"></i></span></td>--}}
                                                    {{--@endif--}}

                                                    <td>
                                                        <a href="{{route('VandorPanelApporveOrderDetails',[@$or->id,$shop_i->shop_id])}}" style="background: #d9b400;padding: 7px;border-radius: 4px" class=""><i style="color:white" class="fa fa-eye"></i></a>
                                                        <a href="#" disabled="" readonly="" style="background: red;padding: 7px;border-radius: 4px" class=""><i style="color:white;" class="fa fa-trash"></i></a>
                                                        {{--<a href="{{route('VandorPanelOrderShopStatus',[@$or->id,$shop_i->shop_id])}}" title="Status" style="background: tomato;padding: 7px;border-radius: 4px" class=""><i style="color:white" class="fa fa-asterisk"></i></a>--}}
                                                        {{--                                                        <a onmouseenter="satausview('{{$or->id}}','{{$shop_i->shop_id}}')" title="Status" style="background: tomato;padding: 7px;border-radius: 4px" class=""><i style="color:white" class="fa fa-hourglass-half"></i></a>--}}
                                                    </td>
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
                                <!-----End Add Product Section------->

                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Row end -->

    </div>

    <!-- Row end -->

@endsection