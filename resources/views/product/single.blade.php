@extends('welcome')
@section('content')
    <script src="js/jstarbox.js"></script>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
        <!---pop-up-box---->
        <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
        <!---//pop-up-box---->
        <div id="small-dialog" class="mfp-hide">
            <div class="search-top">
                <div class="login-search">
                    <input type="submit" value="">
                    <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
                </div>
                <p>Shopin</p>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });

            });
        </script>
        <!----->
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
    </div>
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h1>Single</h1>
            <em></em>
            <h2><a href="{{route('home')}}">Home</a><label>/</label>Single</h2>
        </div>
    </div>
    <div class="single">
        @if (Session::has('success'))
            <div class="alert alert-{{ Session::get('success') }}">
                {{( Session::get('message') )}}
            </div>
        @endif
        <div class="container">
            <div class="col-md-9">
                <div class="col-md-5 grid">
                    <div class="flexslider">
                        <ul class="slides">
                            @if(!empty($images))
                            @foreach ($images as $image)
                            <li data-thumb="images/{{$image->url}}">
                                <div class="thumb-image"> <img src="images/{{$image->url}}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 single-top-in">
                    <div class="span_2_of_a1 simpleCart_shelfItem">
                        <h3>{{$product->name}}</h3>
                        <br/>
                        <br/>
                        <div class="price_single">
                            <span class="reducedfrom item_price">{{$product->unit_price}}$</span>
                            <div class="clearfix"></div>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                        
                        <form action="{{route('add_cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="amount" value="1" id="amount"/>
                            <input type="hidden" name="product_id" value="{{($product->id)}}"/>
                            <button class="add-to item_add hvr-skew-backward" type="submit">Add to cart</button>
                        </form>
                        <!--quantity-->
                        <script>
                            $('.value-plus').on('click', function(){
                                
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                document.getElementById('amount').value = newVal;
                                divUpd.text(newVal);
                            });

                            $('.value-minus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                if(newVal>=1) {
                                    document.getElementById('amount').value = newVal;
                                    divUpd.text(newVal);
                                }
                            });
                        </script>
                        <!--quantity-->
                        <div class="clearfix"> </div>
                    </div>

                </div>
                <div class="clearfix"> </div>
                <!---->
                <div class="tab-head">
                    <nav class="nav-sidebar">
                        <ul class="nav tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
                        </ul>
                    </nav>
                    <div class="tab-content one">
                        <div class="tab-pane active text-style" id="tab1">
                            <div class="facts">
                                <p > {{$product->description}} </p>
                                <ul>
                                    @if(!empty($accessories))
                                    @foreach ($accessories as $accesso)
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>{{$accesso->name}}    {{$accesso->price}}</li>
                                     </ul>
                                     @endforeach
                                     @endif
                            </div>

                        </div>
                        

                    </div>
                    <div class="clearfix"></div>
                </div>
                <!---->
            </div>
            <!----->

            <div class="col-md-3 product-bottom product-at">
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
                
                <!---->
                
            </div>
            <div class="clearfix"> </div>
        </div>

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
    <script src="js/imagezoom.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script defer src="js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>

    <script src="js/simpleCart.min.js"> </script>
    <!-- slide -->
    <script src="js/bootstrap.min.js"></script>
@endsection
