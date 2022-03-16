


<div class="xs-top-bar d-none d-md-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="xs-top-bar-info">
                            <li><a href="#"><i class="icon icon-van "></i>Free Delivery</a></li>
                            @foreach(@$CustomerSer as $main_menu)
                            <?php
                            $submenus = App\Models\Admin\Menu::where('root_id',$main_menu->id)
                            ->where('sroot_id',NULL);
                            if($submenus->count() > 0){
                            $class='dropdown-toggle';
                            }
                            else{
                            $class='';

                            }

                            ?>
                            <li><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif ">{{$main_menu->menu_name}}</a></li>

                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-6 follow">
                        <ul class="xs-social-list">
                            <li class="xs-list-text text-white">Follow Us</li>
                            <!-- <img src="assets/images/fb.png" alt=""> -->

                            <li><a href="#"><i class="icon icon-facebook"></i></a></li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <ul class="xs-top-bar-info right-content">


                    <li><a href="{{route('showVandorRegisterForm')}}">Vandor Registration </a></li>
                     @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                      <li><a href="{{route('CustomerDashboard')}}">Account </a></li>
                     @else
                    <li><a href="{{route('CustomerLoginPage')}}">Login </a></li>
                    @endif
                    <li><a href="#" data-toggle="modal" data-target=".xs-modal">English</a></li>
                    <li><a href="#" data-toggle="modal" data-target=".xs-modal">বাংলা</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<header class="xs-header version-fullwidth">
    <div class="xs-navBar v-yellow">
        <div class="container-fluid container-fullwidth">
            <div class="row">
                <div class="col-lg-3 col-sm-4 xs-order-1">
                    <div class="xs-logo-wraper">
                        <a href="{{route('MainIndex')}}">
                            <img src="{{(@$Logo->logo)?url('upload/Client/Logo/'.$Logo->logo):''}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-3 xs-order-3 xs-menus-group">
                    <nav class="xs-menus">
                        <div class="nav-header">
                            <div class="nav-toggle"></div>
                        </div>
                        <div class="nav-menus-wrapper">
                            <ul class="nav-menu">
                                <li class="active">
                                    <a href="{{route('MainIndex')}}">Home </a>

                                </li>

                                @foreach($main as $main_menu)
                                <?php
                                $submenus = App\Models\Admin\Menu::where('root_id',$main_menu->id)
                                ->where('sroot_id',NULL);
                                if($submenus->count() > 0){
                                $class='dropdown-toggle';
                                }
                                else{
                                $class='';

                                }

                                ?>


                                <li>
                                    <a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif">{{$main_menu->menu_name}}</a>
                                    @if($submenus->count() > 0)
                                    <ul class="nav-dropdown">
                                        @foreach($submenus->get() as $smenus)
                                        <?php $thirdmenus = App\Models\Admin\Menu::where('sroot_id',$smenus->id)
                                        ->where('troot_id',NULL);?>
                                        <li><a href="@if($smenus->page_type =='url') {{$smenus->external_link}} @else {{route('page.details',$smenus->slug)}} @endif">{{ $smenus->menu_name }}</a></li>
                                         @endforeach

                                    </ul>
                                    @endif

                                </li>


                            @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-2 col-sm-5 xs-order-2 xs-wishlist-group">
                    <div class="xs-wish-list-item">

                        <!-- <ul class="xs-header-info">
                           <li class="d-none d-md-none d-lg-block"><i class="icon icon-van"></i> Track Your Order</li>
                        </ul> -->

                        <span class="xs-wish-list">
                        <a data-toggle="modal" data-target="#modal1" class="xs-single-wishList">

                        <i class="mdi mdi-map-marker-circle"></i>
                        </a>
                        </span>

                        <!--<span class="xs-wish-list">-->
                        <!--<a href="#" class="xs-single-wishList">-->
                        <!--<span class="xs-item-count">0</span>-->
                        <!--<i class="icon icon-arrows"></i>-->
                        <!--</a>-->
                        <!--</span>-->


                        <style>
                            .tds{
                                font-size: .35em;
                                color: #565656;
                                font-weight: 500;
                                position: absolute;
                                top: -5px;
                                right: -5px;
                                display: inline-block;
                                width: 21px;
                                height: 21px;
                                line-height: 18px;
                                border: 2px solid #fff;
                                text-align: center;
                                background-color: #f0f0f0;
                                border-radius: 100%;
                            }
                            .sss{
                                font-size: 2.14286em;
                                color: #555;
                                position: relative;
                            }
                        </style>

                        <div class="dropdown dropright xs-miniCart-dropdown">
                            <a href="{{route('ShoppingCart')}}" class="sss">
                               <small style="background-color: #cd11eb;color: #fff;" class="cart-value tds" id="smallcart"></small>
                                <i class="icon icon-bag"></i>
                            </a>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***************************************************** New Category Section ******************************************* -->

    <div class="xs-navDown">
        <div class="container container-fullwidth">
            <div class="row">
                <div class="col-lg-3 col-xl-3 d-none d-md-none d-lg-block">
                    <div class="cd-dropdown-wrapper xs-vartical-menu v-menu-is-active v-gray then">

                        <a class="cd-dropdown-trigger dropdown-is-active" href="#0">
                            <i class="fa fa-list-ul"></i> All Categories
                        </a>

                        <nav class="cd-dropdown too too_two dropdown-is-active" style="z-index: -99;">
                            <h2>Marketpress</h2>

                            <ul class="cd-dropdown-content">

                                @foreach(\App\Models\Admin\CategoryManage::get() as $cat)
                                    <li><a href="{{route('CategorySingleShopSelectPage',@$cat->id)}}"> <img src="{{(@$cat->icon_image)?url('upload/Client/Icon_Category/'.@$cat->icon_image):''}}" style="height:20px; padding-right:10px" >{{@$cat->category_name}} </a></li>

                                @endforeach

                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-7">

                        <div class="input-group">
                            <input style="top: 2px;padding: 27px;" type="search" class="form-control" placeholder="Search for jewelery" onfocus="ShowSearchResult()" onblur="HideSearchResult()" id="searchs">

                            <div id="filterProductShow" style="background:white;z-index:9999;width:62%;top:100%;left:0;margin-top:2px;position: absolute;"></div>

                            <form action="{{route('CategoryShopSelectPage')}}" id="form_id" method="GET">
                            <div class="xs-category-select-wraper">
                                <input type="hidden" id="cat_id_form" name="cat_id_form">

                                    <select style="height: 56px !important;" class="xs-category-select" id="some_link">
                                        <option disabled selected>All Categories</option>
                                        @foreach(@$category as $cat)
                                       <option value="{{@$cat->id}}">{{@$cat->category_name}}</option>
                                        @endforeach

                                    </select>




                            </div>
                            </form>


                            <div class="input-group-btn">
                                <input type="hidden" id="search-param" name="post_type" value="product">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="padding-top:6px;font-size:18px"></i></button>
                            </div>

                        </div>

                </div>

                <div class="col-lg-3 col-xl-2 d-none d-md-none d-lg-block">

                    <a href="#" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-phone-volume" style="font-size: 15px;"></i>
                        <strong> {{@$ContactInfo->phone}} </strong>
                    </a>

                </div>

            </div>
        </div>
    </div>



    <!-- ********************************************************* New Category Section End ****************************************************** -->

</header>

<input type="hidden" id="order_confirm" class="order_confirm" >
<input type="hidden" id="shipping_status" class="shipping_status" >
<input type="hidden" id="final_step" class="final_step" >

@section('client-footer')


    {{--<script>--}}
        {{--$('#orderTrack').submit(function(e){--}}
            {{--e.preventDefault();--}}

            {{--var url = $(this).attr('action');--}}
            {{--var method = $(this).attr('method');--}}
            {{--var data = $(this).serialize();--}}


            {{--var a = document.forms["orderTrack"]["OrderId"].value;--}}

            {{--if (a == null || a == "") {--}}
                {{--alert('null');--}}
            {{--}else{--}}


                {{--$.ajax({--}}
                    {{--url:url,--}}
                    {{--type:method,--}}
                    {{--data:data,--}}

                    {{--success:function(data){--}}

                        {{--$('#showallinfo').css({--}}
                            {{--"display":"block"--}}
                        {{--})--}}

                        {{--$('#OrderNumber').empty().html(data['order'].orderId);--}}
                        {{--$('#customerNameAjax').empty().html(data['customer_info'].name);--}}
                        {{--$('#customerEmailAjax').empty().html(data['customer_info'].email);--}}
                        {{--$('#customerMobileAjax').empty().html(data['customer_info'].mobile);--}}

                        {{--//----------------- Order Status -----------------}}
                        {{--$('#order_confirm').val(data['order'].status);--}}
                        {{--var confi = $('.order_confirm').val();--}}

                        {{--if(confi==2){--}}
                            {{--$('#orderst').addClass('active');--}}
                        {{--}else if(confi==1){--}}
                            {{--$('#orderst').removeClass('active');--}}
                        {{--}--}}

                        {{--//----------------- Shipping Status -----------------}}
                        {{--$('#shipping_status').val(data['order'].shipping_status);--}}
                        {{--var shi_confi = $('.shipping_status').val();--}}

                        {{--if(shi_confi==2){--}}
                            {{--$('#shipping_st').addClass('active');--}}
                        {{--}else if(shi_confi==1){--}}
                            {{--$('#shipping_st').removeClass('active');--}}
                        {{--}--}}


                        {{--//----------------- Final Status -----------------}}
                        {{--$('#final_step').val(data['order'].order_complete);--}}
                        {{--var final_step = $('.final_step').val();--}}

                        {{--if(final_step==2){--}}
                            {{--$('#final_oder').addClass('active');--}}
                        {{--}else if(final_step==1){--}}
                            {{--$('#final_oder').removeClass('active');--}}
                        {{--}--}}



                    {{--}--}}
                {{--});--}}

            {{--}--}}


        {{--});--}}
    {{--</script>--}}





@endsection