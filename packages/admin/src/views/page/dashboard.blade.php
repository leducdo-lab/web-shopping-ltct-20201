@extends('admins::layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="graphs">
            <div class="col_3">
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="fa fa-mail-forward"></i>
                        <div class="stats">
                            <h5>{{($orders?$orders:0)}}</h5>
                            <div class="grow">
                                <p>Order</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="fa fa-users"></i>
                        <div class="stats">
                            <h5>{{($persons?$persons:0)}}</h5>
                            <div class="grow grow1">
                                <p>Users</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget widget1">
                    <div class="r3_counter_box">
                        <i class="fa fa-eye"></i>
                        <div class="stats">
                            <h5>{{($products?$products:0)}}</h5>
                            <div class="grow grow3">
                                <p>Products</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget">
                    <div class="r3_counter_box">
                        <i class="fa fa-usd"></i>
                        <div class="stats">
                            <h5>{{(Session::get('')?Session::get(''):0)}}</h5>
                            <div class="grow grow2">
                                <p>Profit</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

            <!-- switches -->

            <div class="clearfix"> </div>

        </div>
    </div>
    <!--body wrapper start-->
    </div>
@endsection
