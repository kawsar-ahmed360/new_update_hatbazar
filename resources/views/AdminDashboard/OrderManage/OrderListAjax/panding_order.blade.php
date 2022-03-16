
@php
    $sl=1
@endphp
@foreach(@$order as $key=>$or)
    @php
        $order_details =\App\Models\Client\OrderDetail::where('shop_id',$shop_id)->where('order_id',$or->id)->where('order_status','1')->where('shipping_status','1')->where('order_complete','1')->get()->sum('subtotal');
       $order_details_status =\App\Models\Client\OrderDetail::where('order_id',$or->id)->where('shop_id',$shop_id)->get();

    @endphp

    <tr>
        <td><input type="checkbox" name="prints[]" value="{{@$or->id}}" multiple></td>
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
        <td>৳{{@$order_details}}</td>


        {{--@if(@$or->status==2)--}}
            {{--<td><span class="badge badge-success"  onclick="PandingNotApprove('{{@$or->id}}')" ><i class="fa fa-check"></i></span></td>--}}
        {{--@elseif(@$or->status==1)--}}
            {{--<td><span class="badge badge-danger" onclick="PandingApprove('{{@$or->id}}')"><i class="fa fa-close"></i></span></td>--}}
        {{--@endif--}}


        {{--@if(@$or->shipping_status==2)--}}
            {{--<td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px"  onclick="PandingShipNotApprove('{{@$or->id}}')" ><i style="font-size: 14px;" class="fa fa-car"></i></span></td>--}}
        {{--@elseif(@$or->shipping_status==1)--}}
            {{--<td><span class="badge badge-danger" style="border-radius: 7px 4px 8px 0px" onclick="PandingShipApprove('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-car"></i></span></td>--}}
        {{--@endif--}}


        {{--@if(@$or->order_complete==2)--}}
            {{--<td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px" >Complete</span></td>--}}
        {{--@elseif(@$or->order_complete==1)--}}
            {{--<td><span class="badge badge-danger" style="border-radius: 7px 4px 8px 0px" onclick="PandingCompleteOrder('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-check-circle"></i></span></td>--}}
        {{--@endif--}}

        <td>
            <a href="{{route('CustomerOrderPandingDetails',[@$or->id,$shop_id])}}" style="background: red;padding: 7px;border-radius: 4px" class=""><i style="color:white" class="fa fa-hourglass-half"></i></a>
        </td>


    </tr>




@endforeach