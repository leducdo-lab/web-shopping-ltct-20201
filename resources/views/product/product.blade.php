@extends('welcome')
@section('content')
    <div class="banner-top">
        <div class="container">
            <h1>Products</h1>
            <em></em>
            <h2><a href="{{route('home')}}">Home</a><label>/</label>Products</h2>
        </div>
    </div>
    <!--content-->
    <div class="product">
        <div class="container">
            <div class="col-md-9">
                <div class="mid-popular">
                    @if (!empty($products))
                    @foreach ($products as $product)
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/{{$product->url}}" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="{{route('single','product_id='.$product->id)}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single', 'product_id='.$product->id)}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <h6><a href="{{route('single', 'product_id='.$product->id)}}">{{$product->name}}</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">{{$product->unit_price}}</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    
                    
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-3 product-bottom">
                <!--categories-->

                <!--initiate accordion-->
                <script type="text/javascript">
                    $(function() {
                        var menu_ul = $('.menu-drop > li > ul'),
                            menu_a  = $('.menu-drop > li > a');
                        menu_ul.hide();
                        menu_a.click(function(e) {
                            e.preventDefault();
                            if(!$(this).hasClass('active')) {
                                menu_a.removeClass('active');
                                menu_ul.filter(':visible').slideUp('normal');
                                $(this).addClass('active').next().stop(true,true).slideDown('normal');
                            } else {
                                $(this).removeClass('active');
                                $(this).next().stop(true,true).slideUp('normal');
                            }
                        });

                    });
                </script>
                <!--//menu-->
                <section  class="sky-form">
                    <h4 class="cate">Discounts</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i> <a href="{{route('cost','cost=1')}}"> < 100.000 </a></label>
                        </div>
                        <div class="col col-4">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i><a href="{{route('cost','cost=2')}}"> 100.000 - 300.000 </a></label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i><a href="{{route('cost','cost=3')}}"> 300.000 - 500.000 </a></label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i><a href="{{route('cost','cost=4')}}"> 500.000 - 1.000.000 </a></label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i><a href="{{route('cost','cost=5')}}"> > 1.000.000 </a></label>
                        </div>
                    </div>
                </section>


                <!---->
                <section  class="sky-form">
                    <h4 class="cate">Type</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                            @if(!empty($types))
                            @foreach($types as $type)
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i><a href="{{route('type','type='.$type->id)}}">{{$type->name}} </a>({{$type->count}})</label>
                            @endforeach
                            @endif
                            </div>
                    </div>
                </section>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--products-->

        <!--//products-->
        <!--brand-->
        <div class="container">
            <div class="brand">
                <div class="col-md-3 brand-grid">
                    <img src="images/ic.png" class="img-responsive" alt="">
                </div>
                <div class="col-md-3 brand-grid">
                    <img src="images/ic1.png" class="img-responsive" alt="">
                </div>
                <div class="col-md-3 brand-grid">
                    <img src="images/ic2.png" class="img-responsive" alt="">
                </div>
                <div class="col-md-3 brand-grid">
                    <img src="images/ic3.png" class="img-responsive" alt="">
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--//brand-->


    </div>
@endsection
