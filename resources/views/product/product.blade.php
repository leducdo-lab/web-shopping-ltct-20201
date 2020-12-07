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
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="{{route('single')}}">Sed ut perspiciati</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc1.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc1.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="{{route('single')}}">At vero eos</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc2.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc2.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Men</span>
                                        <h6><a href="">Sed ut perspiciati</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc3.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc3.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="{{route('single')}}">On the other</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc4.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc4.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Men</span>
                                        <h6><a href="{{route('single')}}">On the other</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc5.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc5.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Men</span>
                                        <h6><a href="{{route('single')}}">Sed ut perspiciati</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc6.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc6.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="{{route('single')}}">At vero eos</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc7.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc7.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Men</span>
                                        <h6><a href="{{route('single')}}">Sed ut perspiciati</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                        <div class=" mid-pop">
                            <div class="pro-img">
                                <img src="images/pc.jpg" class="img-responsive" alt="">
                                <div class="zoom-icon ">
                                    <a class="picture" href="images/pc.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                    <a href="{{route('single')}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                </div>
                            </div>
                            <div class="mid-1">
                                <div class="women">
                                    <div class="women-top">
                                        <span>Women</span>
                                        <h6><a href="{{route('single')}}">At vero eos</a></h6>
                                    </div>
                                    <div class="img item_add">
                                        <a href="#"><img src="images/ca.png" alt=""></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="mid-2">
                                    <p ><em class="item_price">$70.00</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>
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
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i> < 100.000(20)</label>
                        </div>
                        <div class="col col-4">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>100.000 - 300.000(5)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>300.000 - 500.000 (7)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>500.000 - 1.000.000 (2)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>> 1.000.000 (50)</label>
                        </div>
                    </div>
                </section>


                <!---->
                <section  class="sky-form">
                    <h4 class="cate">Type</h4>
                    <div class="row row1 scroll-pane">
                        <div class="col col-4">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Áo (30)</label>
                        </div>
                        <div class="col col-4">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Áo khoác (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Áo nỉ  (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Áo phông  (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Quần jeans (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Chân váy  (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Quần Sooc  (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Quần Âu  (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Váy công sở  (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Váy ngủ  (30)</label>
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Váy hoa (30)</label>
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
