@extends('welcome')
@section('content')
<!--banner-->
<div class="banner">
    <div class="container">
        <section class="rw-wrapper">
            <h1 class="rw-sentence">
                <span>Fashion &amp; Beauty</span>
                <div class="rw-words rw-words-1">
                    <span>Beautiful Designs</span>
                    <span>Sed ut perspiciatis</span>
                    <span> Totam rem aperiam</span>
                    <span>Nemo enim ipsam</span>
                    <span>Temporibus autem</span>
                    <span>intelligent systems</span>
                </div>
                <div class="rw-words rw-words-2">
                    <span>We denounce with right</span>
                    <span>But in certain circum</span>
                    <span>Sed ut perspiciatis unde</span>
                    <span>There are many variation</span>
                    <span>The generated Lorem Ipsum</span>
                    <span>Excepteur sint occaecat</span>
                </div>
            </h1>
        </section>
    </div>
</div>
<!--content-->
<div class="content">
    <div class="container">

        <!--products-->
        <div class="content-mid">
        <h3>Trending Items</h3>
        <label class="line"></label>
        <div class="mid-popular">

            @foreach($trendings as $trend)
            <div class="col-md-3 item-grid simpleCart_shelfItem">
            <div class=" mid-pop">
            <div class="pro-img">
                <img src="images/{{($trend[0]->url)}}" class="img-responsive" alt="">
                <div class="zoom-icon ">
                <a class="picture" href="images/{{($trend[0]->url)}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                <a href="{{route('single','product_id='.$trend[0]->id)}}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                </div>
                </div>
                <div class="mid-1">
                <div class="women">
                <div class="women-top">

                    <h6><a href="{{route('single','product_id='.$trend[0]->id)}}">{{$trend[0]->name}}</a></h6>
                    </div>
                    <div class="img item_add">
                        <a href="{{route('single','product_id='.$trend[0]->id)}}"><img src="images/ca.png" alt=""></a>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    <div class="mid-2">
                        <p ><em class="item_price">{{$trend[0]->unit_price}}</em></p>
                            <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
            </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
    <!--//products-->
    <!--brand-->
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
    <!--//brand-->
    </div>

</div>
<!--//content-->
@endsection
