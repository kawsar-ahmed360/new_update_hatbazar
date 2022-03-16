@extends('VandorDashboard.master')
@section('title') Payment Setting @endsection
@section('vandor-content')

    <div class="container" style="padding: 10px">
        <div class="table-container" style="padding: 10px">
            <div class="t-header">Payment Setting </div>




            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row gutters">


                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">



                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="table-responsive">
                                    <table id="" class="table custom-table">
                                        <tbody>


                                        <tr>
                                            <th>Bkash Number.</th>
                                            <td>{{@$pay->bkash_number}}</td>
                                            <td><a style="color:white" data-toggle="modal" data-target="#bkash" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>

                                        </tr>

                                        <tr>
                                            <th>Rocket</th>
                                            <td>{{@$pay->rocket_number}}</td>
                                            <td><a style="color:white" data-toggle="modal" data-target="#Rocket" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>

                                        </tr>

                                        <tr>
                                            <th>Nagad</th>
                                            <td>{{@$pay->nagad_number}}</td>
                                            <td><a style="color:white" data-toggle="modal" data-target="#Nagad" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>

                                        </tr>


                                        <tr>
                                            <th>Bank Account Number</th>
                                            <td>{{@$pay->bank_account_no}}</td>
                                            <td rowspan="3"><a style="color:white" data-toggle="modal" data-target="#bank_acc_no" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>

                                        </tr>

                                        <tr>
                                            <th>Branch Name</th>
                                            <td>{{@$pay->branch_name}}</td>
                                            {{--<td><a style="color:white" data-toggle="modal" data-target="#basicModal" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>--}}

                                        </tr>

                                        <tr>
                                            <th>Account Holder</th>
                                            <td>{{@$pay->holder_name}}</td>
                                            {{--<td rowspan="2"><a style="color:white"  data-toggle="modal" data-target="#basicModal" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>--}}

                                        </tr>


                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>


                   </div>
                 </div>
            </div>



        </div>

    </div>

    <div class="modal fade" id="bkash" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">Bkash Number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('VandorPaymentSettingBkashNumber')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Number</label>
                                <input type="text" class="form-control" value="{{@$pay->bkash_number}}" name="bkash_number" placeholder="Enter number">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="Rocket" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">Rocket Number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('VandorPaymentSettingRocketNumber')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Number</label>
                                <input type="text" {{@$pay->rocket_number}} class="form-control" name="rocket_number" placeholder="Enter number">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="Nagad" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">Nagad Number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('VandorPaymentSettingNogadNumber')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Number</label>
                                <input type="text" value="{{@$pay->nagad_number}}" class="form-control" name="nagad_number" placeholder="Enter number">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="bank_acc_no" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">Bank Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <form action="{{route('VandorPaymentSettingBankInfo')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control" value="{{@$pay->bank_account_no}}" name="bank_account_no" placeholder="Enter number">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Branch Name</label>
                                    <input type="text" class="form-control" value="{{@$pay->branch_name}}" name="branch_name" placeholder="Enter Branch Name">
                                </div>

                                <div class="col-md-12">
                                    <label for="">Account Holder</label>
                                    <input type="text" class="form-control" value="{{@$pay->holder_name}}" name="holder_name" placeholder="Enter ACC HOLDER">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="bank_acc_no" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection