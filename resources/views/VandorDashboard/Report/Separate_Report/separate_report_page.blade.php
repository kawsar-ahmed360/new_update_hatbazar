@extends('VandorDashboard.master')
@section('title') Report Genarate @endsection
@section('vandor-content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 style="text-align: center;font-size: 22px;font-family: system-ui;" class="card-title">Report Genarate Page :</h3>


                     <div class="row">
                         <div class="col-md-3" ></div>
                         <div class="col-md-4">
                             <label for="" style="font-size: 15px;"><img style="width: 29px;" src="{{asset('upload/Report.png')}}" alt=""> Category Wise Report</label>
                             <input type="radio" name="filtering" id="category" value="category_filter">
                         </div>

                         <div class="col-md-4">
                             <label for="" style="font-size: 15px;"><img style="width: 29px;" src="{{asset('upload/Report.png')}}" alt=""> Product Wise Report</label>
                             <input type="radio" name="filtering" id="product" value="product_filter">
                         </div>
                     </div>

                    <br>


                    <form action="{{route('SeparateVandorReport_CategoryWiseReport')}}" method="post">
                        @csrf

                    <div class="row" id="CategoryFilter" style="display: none;">
                        <div class="col-md-4">
                            <label for="">Category Name</label>
                            <select name="cat_id" class="form-control" id="cat_id">
                                <option selected disabled>Select Once</option>
                                @if($vandor_category!=null)
                                    @foreach($category as $key=>$cat)
                                     <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                    @else

                                @endif
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="">Start Date</label>
                            <input type="date" class="form-control" name="s_date">
                        </div>


                        <div class="col-md-3">
                            <label for="">End Date</label>
                            <input type="date" class="form-control" name="e_date">
                        </div>


                        <div class="col-md-2">

                            <button style="margin-top: 24px;padding: 5px;" type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-filter"></i> Filter</button>
                        </div>

                    </div>

                    </form>


                    <form action="{{route('SeparateVandorReport_ProductWiseReport')}}" method="post">
                        @csrf
                    <div class="row" id="PorductFilter" style="display: none;">
                        <div class="col-md-2">
                            <label for="">Category Name</label>
                            <select name="cat_id" id="pro_cat_id" class="form-control">
                                <option selected disabled>Select Once</option>
                                @if($vandor_category!=null)
                                    @foreach($category as $key=>$cat)
                                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                @else

                                @endif
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="">Product Name</label>
                            <select name="pro_id" class="form-control" id="pro_id">

                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="">Start Date</label>
                            <input type="date" class="form-control" name="s_date">
                        </div>


                        <div class="col-md-3">
                            <label for="">End Date</label>
                            <input type="date" class="form-control" name="e_date">
                        </div>


                        <div class="col-md-1">
                            <button style="margin-top: 24px;padding: 5px;" type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-filter"></i> Filter</button>
                        </div>

                    </div>

                    </form>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    @section('vandor_footer')
        <script>
            $('#category').on('click',function () {
                var va = $('#category').val();
                if(va=='category_filter'){
                   $('#CategoryFilter').show();
                    $('#PorductFilter').hide();
                }
            })


            $('#product').on('click',function () {
                var va = $('#product').val();
                if(va=='product_filter'){
                    $('#PorductFilter').show();
                    $('#CategoryFilter').hide();
                }
            })

            $('#pro_cat_id').on('change',function () {
                var cat_id = $('#pro_cat_id').val();
                $.ajax({
                    url:"{{route('SeparateVandorReportCategoryWiseProductAjax')}}",
                    type:"GET",
                    data:{cat_id:cat_id},

                    success:function (data) {

                        var html = '<option>Select Once</option>';
                        $.each(data,function (k,v) {
                            html+='<option value="'+v.id+'">'+v.product_name+'</option>';
                        })

                        $('#pro_id').html(html);
                    }
                })
            })
        </script>
        @endsection



@endsection