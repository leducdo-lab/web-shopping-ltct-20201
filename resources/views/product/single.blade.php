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
            <h2><a href="index.html">Home</a><label>/</label>Single</h2>
        </div>
    </div>
    <div class="single">

        <div class="container">
            <div class="col-md-9">
                <div class="col-md-5 grid">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="images/si.jpg">
                                <div class="thumb-image"> <img src="images/si.jpg" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="images/si1.jpg">
                                <div class="thumb-image"> <img src="images/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="images/si2.jpg">
                                <div class="thumb-image"> <img src="images/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 single-top-in">
                    <div class="span_2_of_a1 simpleCart_shelfItem">
                        <h3>Nam liber tempor cum</h3>
                        <p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
                        <div class="price_single">
                            <span class="reducedfrom item_price">$140.00</span>
                            <a href="#">click for offer</a>
                            <div class="clearfix"></div>
                        </div>
                        <h4 class="quick">Quick Overview:</h4>
                        <p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>

                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                        <!--quantity-->
                        <script>
                            $('.value-plus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                divUpd.text(newVal);
                            });

                            $('.value-minus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                if(newVal>=1) divUpd.text(newVal);
                            });
                        </script>
                        <!--quantity-->

                        <a href="#" class="add-to item_add hvr-skew-backward">Add to cart</a>
                        <div class="clearfix"> </div>
                    </div>

                </div>
                <div class="clearfix"> </div>
                <!---->
                <div class="tab-head">
                    <nav class="nav-sidebar">
                        <ul class="nav tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
                            <li class=""><a href="#tab2" data-toggle="tab">Additional Information</a></li>
                            <li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>
                        </ul>
                    </nav>
                    <div class="tab-content one">
                        <div class="tab-pane active text-style" id="tab1">
                            <div class="facts">
                                <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
                                <ul>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
                                </ul>
                            </div>

                        </div>
                        <div class="tab-pane text-style" id="tab2">

                            <div class="facts">
                                <p > Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
                                <ul >
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Multimedia Systems</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Digital media adapters</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Set top boxes for HDTV and IPTV Player  </li>
                                </ul>
                            </div>

                        </div>
                        <div class="tab-pane text-style" id="tab3">

                            <div class="facts">
                                <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
                                <ul>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
                                    <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
                                </ul>
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
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Áo len (30)</label>
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
