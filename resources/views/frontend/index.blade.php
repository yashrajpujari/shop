@extends('layouts.frontend')
@section('content')



<!-- Start Hero Slider Section-->

<!-- Start Hero Slider Section-->
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif
<div class="hero-slider-section">
    <!-- Slider main container -->
    <div class="hero-slider-active swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Start Hero Single Slider Item -->
            @foreach (getslider() as $_slider)
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="{{ $_slider->getfirstMediaUrl('image') }}" alt="">
                </div>
                <!-- Hero Slider Content -->
                <div class="hero-slider-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <div class="hero-slider-content">
                                    <h2 class="title">{!!$_slider->title!!} <br> eve</h2>
                                    <p>{!!$_slider->discription!!}</p>
                                    <a href="{{route('home')}}" class="btn btn-lg btn-outline-aqua">shop
                                        now </a>

                                    <!--{!!$_slider->discription!!}-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Hero Single Slider Item -->
            @endforeach
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination active-color-aqua"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev d-none d-lg-block"></div>
        <div class="swiper-button-next d-none d-lg-block"></div>
    </div>
</div>
<!-- End Hero Slider Section-->


<!-- Start Company Logo Section -->
<div class="company-logo-section section-top-gap-100 section-fluid">
    <div class="company-logo-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="company-logo-slider default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container company-logo-slider">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-1.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-2.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-3.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-4.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-5.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-6.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-7.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                                <!-- Start Company Logo Single Item -->
                                <div class="company-logo-single-item swiper-slide">
                                    <div class="image"><img class="img-fluid" src="{{asset('frontend/assets/images/company-logo/company-logo-8.png')}}" alt=""></div>
                                </div>
                                <!-- End Company Logo Single Item -->
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev d-none d-md-block"></div>
                        <div class="swiper-button-next d-none d-md-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Company Logo Section -->

<!-- Start Banner Section -->
<!-- <div class="banner-section section-top-gap-100 section-fluid">
        <div class="banner-wrapper">
            <div class="container">
                <div class="row mb-n6">
                    <div class="col-md-4 col-12 mb-6">
                         Start Banner Single Item 
                        <div class="banner-single-item banner-style-5 img-responsive" data-aos="fade-up"
                            data-aos-delay="0">
                            <a href="product-details-default.html" class="image banner-animation">
                                <img src="{{asset('frontend/assets/images/banner/banner-style-5-img-1.jpg')}}" alt="">
                            </a>
                        </div>
                        <!-- End Banner Single Item 
                    </div>
                    <div class="col-md-4 col-12 mb-6">
                         Start Banner Single Item 
                        <div class="banner-single-item banner-style-5 img-responsive" data-aos="fade-up"
                            data-aos-delay="200">
                            <a href="product-details-default.html" class="image banner-animation">
                                <img src="{{asset('frontend/assets/images/banner/banner-style-5-img-2.jpg')}}" alt="">
                            </a>
                        </div>
                         End Banner Single Item 
                    </div>
                    <div class="col-md-4 col-12 mb-6">
                        Start Banner Single Item 
                        <div class="banner-single-item banner-style-5 img-responsive" data-aos="fade-up"
                            data-aos-delay="400">
                            <a href="product-details-default.html" class="image banner-animation">
                                <img src="{{asset('frontend/assets/images/banner/banner-style-5-img-3.jpg')}}" alt="">
                            </a>
                        </div>
                         End Banner Single Item 
                    </div>
                </div>
            </div>
        </div>
    </div>-->
<!-- End Banner Section -->

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">the New arrivals</h3>
                            <p>Preorder now to receive exclusive deals &amp; gifts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-2rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-2row swiper-container-initialized swiper-container-horizontal swiper-container-multirow">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper" id="swiper-wrapper-1219f10c69bc3fa1a" aria-live="polite" style="width: 1800px; transform: translate3d(0px, 0px, 0px);">
                                <!-- Start Product Default Single Item -->
                                @foreach(get_product() as $product)
                                <div class="product-default-single-item product-color--aqua swiper-slide swiper-slide-active" role="group" aria-label="1 / 12" style="width: 270px; margin-right: 30px;">
                                    <div class="image-box">
                                        <a href="{{route('products',$product->url_key)}}" class="image-link">
                                            <img src="{{$product->getfirstMediaUrl('Thumbnail')}}" alt="" style="height:340px !important;object-fit:cover;">
                                            <!-- <img src="assets/images/product/default/home-4/default-2.jpg" alt="">-->
                                        </a>

                                        @php
                                        $currentdate=now()
                                        @endphp
                                        @if($product->Special_Price && $currentdate->between($product->Special_price_from,$product->Special_price_to))
                                        <div class="tag">
                                            <span style="background-color:#047B42;">sale</span>
                                        </div>
                                        @endif
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <form action="{{route('cart.store')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                                    <button class="addtocartbtn" type="submit" style="color:white;border:none;">Add to Cart</button>
                                                </form>
                                            </div>
                                            <div class="action-link-right">
                                                <form action="{{route('mywishlist.store')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                                    <button class="addtocartbtn" type="submit" style="color:white;border:none;"><i class="icon-heart" style="color:white;"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="{{route('products',$product->url_key)}}">{{$product->Name}}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill" style="color: #047B42;"><i class="ion-android-star"></i></li>
                                                <li class="fill" style="color: #047B42;"><i class="ion-android-star"></i></li>
                                                <li class="fill" style="color: #047B42;"><i class="ion-android-star"></i></li>
                                                <li class="fill" style="color: #047B42;"><i class="ion-android-star"></i></li>
                                                <li class="empty" style="color: #047B42;"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            @if($product->Special_Price && $currentdate->between($product->Special_price_from,$product->Special_price_to))
                                            <span class="price" style="color:#dea948;">

                                                <del> ₹.{{ number_format($product->Price,2) }}
                                                </del> @if($product->Special_Price >0)₹{{number_format($product->Special_Price) }}@endif</span>
                                            @else
                                            <span class="price" style="color:#dea948;">

                                                ₹.{{number_format($product->Price)}}</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-1219f10c69bc3fa1a" aria-disabled="true"></div>
                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-1219f10c69bc3fa1a" aria-disabled="false"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Default Slider Section -->

<!-- Start Banner Section -->
<div class="banner-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <!-- Start Banner Single Item -->
                <div class="banner-single-item banner-style-6 banner-animation img-responsive" data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img src="{{asset('frontend/assets/images/banner/banner-style-6-img-1.jpg')}}" alt="">
                    </div>
                    <div class="content">
                        <h6 class="sub-title">JASMINE GREEN TEA</h6>
                        <h2 class="title">Herbivore Botanicals
                            Basic Collection</h2>
                        <p>On a mission to create all-natural skin care that delivers tangible results, Herbivore
                            ensures every ingredient within their formulas has a specific purpose, resulting in
                            highly active.</p>
                        <a href="{{route('home')}}" class="btn btn-lg btn-outline-green icon-space-left"><span class="d-flex align-items-center">Browse <i class="ion-ios-arrow-thin-right"></i></span></a>
                    </div>
                </div>
                <!-- End Banner Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Banner Section -->

<!-- Start Service Section -->
<div class="service-promo-section section-top-gap-100">
    <div class="service-wrapper">
        <div class="container">
            <div class="row">
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                        <div class="image">
                            <img src="{{asset('frontend/assets/images/icons/service-promo-5.png')}}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">FREE SHIPPING</h6>
                            <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="image">
                            <img src="{{asset('frontend/assets/images/icons/service-promo-6.png')}}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">30 DAYS MONEY BACK</h6>
                            <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="image">
                            <img src="{{asset('frontend/assets/images/icons/service-promo-7.png')}}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">SAFE PAYMENT</h6>
                            <p>Pay with the world’s most popular and secure payment methods.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
                <!-- Start Service Promo Single Item -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                        <div class="image">
                            <img src="{{asset('frontend/assets/images/icons/service-promo-8.png')}}" alt="">
                        </div>
                        <div class="content">
                            <h6 class="title">LOYALTY CUSTOMER</h6>
                            <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Promo Single Item -->
            </div>
        </div>
    </div>
</div>
<!-- End Service Section -->

<!-- Start Banner Section -->
<div class="banner-section section-top-gap-100">
    <div class="banner-wrapper clearfix">
        <!-- Start Banner Single Item -->
        @foreach(get_header_category() as $categories)
        <div class="banner-single-item banner-style-4 banner-animation banner-color--green float-left" data-aos="fade-up" data-aos-delay="0">
            <div class="image">
                <img class="img-fluid" src="{{$categories->getfirstmediaurl('image')}}" alt="">
            </div>
            <a href="{{route('categories',$categories->url_key)}}" class="content">
                <div class="inner">
                    <h4 class="title">{{$categories->name}}</h4>
                    <h6 class="sub-title">20 products</h6>
                </div>
                <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
            </a>
        </div>
        @endforeach
        <!-- End Banner Single Item -->

    </div>
</div>
<!-- End Banner Section -->

<!-- Start Product List View Slider Section -->
<div class="product-list-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">Best Sellers</h3>
                            <p>Add our best sellers to your weekly lineup.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-list-slider-3rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-listview-slider-4grid-3rows">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Start Product ListView Single Item -->

                                @foreach(get_product() as $product)

                                <div class="product-listview-single-item product-color--green swiper-slide">

                                    <div class="image-box">
                                        <a href="{{route('products',$product->url_key)}}" class="image-link">
                                            <img src="{{$product->getfirstmediaurl('Thumbnail')}}" alt="" style="max-width:50px;">

                                        </a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="{{route('products',$product->url_key)}}">{{$product->Name}}</a></h6>
                                        <ul class="review-star">
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="fill"><i class="ion-android-star"></i></li>
                                            <li class="empty"><i class="ion-android-star"></i></li>
                                        </ul>
                                        @if($product->Special_Price && $currentdate->between($product->Special_price_from,$product->Special_price_to))

                                        <span class="price" style="color:#dea948;">
                                            <del> ₹.{{$product->Price}}</del> @if($product->Special_Price >0)&nbsp;&nbsp;₹{{$product->Special_Price}}@endif</span>

                                        </span>
                                        @else
                                        <span class="price" style="color:#dea948;">

                                            ₹&nbsp;{{$product->Price}}</span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach

                                <!-- End Product ListView Single Item -->


                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev d-none d-md-block"></div>
                        <div class="swiper-button-next d-none d-md-block"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product List View Slider Section -->

<!-- Start Banner Section -->
<div class="banner-section section-top-gap-100">
    <div class="banner-wrapper clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Banner Single Item -->
                    <div class="banner-single-item banner-style-13 banner-color--green" data-aos="fade-up" data-aos-delay="0">
                        <div class="image">
                            <img src="{{asset('frontend/assets/images/banner/banner-style-13-img-1.jpg')}}" alt="">
                            <div class="content">
                                <div class="text">
                                    <h5 class="sub-title">SALE 15% OFF YOUR 1ST PURCHASE</h5>
                                    <h2 class="title">HONO ORGANIC SKIN CARE</h2>

                                    <a href="{{route('home')}}" class="btn btn-lg btn-green icon-space-left"><span class="d-flex align-items-center">Shop Now <i class="ion-ios-arrow-thin-right"></i></span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Banner Single Item -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Section -->

<!-- Start Blog Slider Section -->
<div class="blog-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">THE LATEST BLOGS</h3>
                            <p>Present posts in a best way to highlight interesting moments of your blog.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-default-slider default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container blog-slider">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Start Product Default Single Item -->
                                @foreach(get_block() as $blog)
                                <div class="blog-default-single-item blog-color--green swiper-slide">
                                    <div class="image-box">
                                        <a href="{{route('blog',$blog->identifier)}}" class="image-link">
                                            <img class="img-fluid" src="{{$blog->getfirstmediaurl('image')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="{{route('blog',$blog->identifier)}}">{{$blog->name}}</a>
                                        </h6>
                                        <p>At therankme, we invite you to embark on a captivating journey of discovery, where each click opens a door to a world of inspiration, knowledge, and endless possibilities.</p>
                                        <div class="inner">
                                            <a href="{{route('blog',$blog->identifier)}}" class="read-more-btn icon-space-left">Read More <span><i class="ion-ios-arrow-thin-right"></i></span></a>
                                            <div class="post-meta">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Product Default Single Item -->

                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection