@forelse(@$product as $pro)

    <div class="col-md-6 col-lg-3" style="padding-top: 22px;">
        <div class="vendor-name">

            <!--  -->
            <div class="xs-product-header media">
                <span class="value" style="background: #f00;color: #fff; padding: 5px;">  {{@$pro->shop_name??'unknown'}}  </span>
            </div>
            <!--  -->

        <div class="product-card">
            <div class="product-img">
                <img src="{{(@$pro->image)?url('upload/Client/Product/'.@$pro->image):''}}" alt="">
            </div>
            <div class="product-text">
                <span>{{@$pro->product_name}} </span><br>
                <div class="row " style="margin: 0 auto;display: block;">

                    @if(avarage_rating_star(@$pro->id)==0)
                        review not yet
                    @endif
                    @for($i=1; $i<=avarage_rating_star(@$pro->id); $i++)
                        <span style="color:#8e02ff" class="mdi mdi-star-outline"></span>
                    @endfor

                    <span class="vote">({{avarage_review(@$pro->id)}})</span>
                </div>

            @if(@$pro->discount)
                    <span class="text-danger"> ৳{{@$pro->new_price}} <del style="color:#ccc">৳{{@$pro->product_price}}</del> </span>
                @else
                    <span class="text-danger"> ৳{{@$pro->product_price}} <del style="color:#ccc">৳00.00</del> </span>
                @endif
            </div>

            <div class="product-cart">
                <a href="{{route('SinglePorduct',@$pro->slug)}}"><button type="button"> <i class="icon icon-online-shopping-cart text-white"></i> Add to cart</button></a>
            </div>

        </div>

    </div>
    </div>


@empty

    <div style="display: block;margin:0 auto"><img style="width: 356px;" src="{{asset('fontend/product_not.webp')}}" alt=""></div>

@endforelse