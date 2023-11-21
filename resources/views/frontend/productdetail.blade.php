@extends('layouts.frontend')
@section('content')
<div class="product-details-section my-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Large Image -->
                    <div class="product-large-image product-large-image-horaizontal swiper-container swiper-container-initialized swiper-container-horizontal">
                        <div class="swiper-wrapper" id="swiper-wrapper-8cdad14d2640e383" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                        @foreach($product->getmedia('Banner_Image') as $image)
                        <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive swiper-slide-active"  style="width: 470px; position: relative; overflow: hidden;">
                                <img src="{{$image->geturl()}}" alt="">
                                <!--<img role="presentation" alt="" src="file:///C:/Users/user/Downloads/Website%20Template/" class="zoomImg" style="position: absolute; top: -13.0277px; left: -20.5787px; opacity: 1; width: 600px; height: 690px; border: none; max-width: none; max-height: none;">-->
                            </div>   
                            @endforeach    
                            
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <!-- End Large Image -->
                    <!-- Start Thumbnail Image -->
                    <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5 swiper-container-initialized swiper-container-horizontal swiper-container-free-mode swiper-container-thumbs">
                        <div class="swiper-wrapper" id="swiper-wrapper-9f37a96ba961ba94" aria-live="polite" style="transform: translate3d(-445px, 0px, 0px); transition: all 0ms ease 0s;">
                        @foreach($product->getmedia('Banner_Image') as $image)
                        <div class="product-image-thumb-single swiper-slide" style="width: 86.25px; margin-right: 25px;">
                                <img class="img-fluid" src="{{$image->getUrl()}}" alt="">
                            </div>
                            @endforeach
                            </div>
                        <!-- Add Arrows -->
                        <div class="gallery-thumb-arrow swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-9f37a96ba961ba94"></div>
                        <div class="gallery-thumb-arrow swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-9f37a96ba961ba94"></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <!-- End Thumbnail Image -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="product-details-content-area product-details--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">

                    @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <form action="{{route('cart.store')}}" method="post">
                            @csrf
                        <h4 class="title">{{$product->Name}}</h4>
                        <h6 class="product-ref ">Reference By: <span>Jhon Doe</span></h6>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="empty"><i class="ion-android-star"></i></li>
                            </ul>
                            <a href="#" class="customer-review ml-2">(customer review )</a>
                        </div>
                        <input name="product_id" type="hidden" value="{{$product->id}}">
                        <div class="price"><span class="mx-2">₹ {{$product->Price}}.00</span></div>
                       {!!$product->Short_Description!!}
                    </div> <!-- End  Product Details Text Area-->
                    <!-- Start Product Variable Area -->
                    <div class="product-details-variable">
                        <h4 class="title">Available Options</h4>
                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <div class="product-stock"> <span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> {{$product->Qty}} IN STOCK</div>
                        </div>
                        <!-- Product Variable Single Item -->
                       

                        <!-- Product Variable Single Item -->
                       
                        @foreach($product_attribte as $keys=>$values)
                        <div class="variable-single-item">
                            <span>{{$keys}}</span>
                            <select class="product-variable-size my-2" name="attribute[{{$keys}}]" style="display: none;">
                                <option selected="" value="1">--options--</option>
                                @foreach($values as $attrvalues)
                                <option value="{{$attrvalues->name}}">{{$attrvalues->name}}</option>
                                @endforeach
                              
                            </select>
                            
                        @endforeach
                        <!-- Product Variable Single Item -->
                        <div class="d-flex align-items-center ">
                            <div class="variable-single-item ">
                                <span>Quantity</span>
                                <div class="product-variable-quantity">
                                    <input min="1" max="100" value="1" name="qty" type="number">
                                </div>
                            </div>

                            <div class="product-add-to-cart-btn">
                            
                              <button type="submit"> + Add To Cart</button>
                            </div>
                        </div>
</form>
                        <!-- Start  Product Details Meta Area-->
                        <div class="product-details-meta mb-20">
                            <a href="wishlist.html" class="icon-space-right"><i class="icon-heart"></i>Add to
                                wishlist</a>
                            <a href="compare.html" class="icon-space-right"><i class="icon-refresh"></i>Compare</a>
                        </div> <!-- End  Product Details Meta Area-->
                    </div> <!-- End Product Variable Area -->

                    <!-- Start  Product Details Catagories Area-->
                    <div class="product-details-catagory mb-2">
                        <span class="title">CATEGORIES:</span>
                        <ul>
                            <li><a href="#">BAR STOOL</a></li>
                            <li><a href="#">KITCHEN UTENSILS</a></li>
                            <li><a href="#">TENNIS</a></li>
                        </ul>
                    </div> <!-- End  Product Details Catagories Area-->


                    <!-- Start  Product Details Social Area-->
                    <div class="product-details-social">
                        <span class="title">SHARE THIS PRODUCT:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- End  Product Details Social Area-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Description
                            </a></li>
                        
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                               {!! $product->Description!!}
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                           
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">RELATED PRODUCTS</h3>
                            <p>Browse the collection of our related products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row swiper-container-initialized swiper-container-horizontal">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper" id="swiper-wrapper-fc025f186f4c12c7" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                @foreach(getrelated_product($product->id) as $item)
                                <div class="product-default-single-item product-color--golden swiper-slide swiper-slide-active" role="group" aria-label="1 / 8" style="width: 270px; margin-right: 30px;">   
                                    <div class="image-box">
                                        <a href="{{route('products',$item->url_key)}}" class="image-link">
                                            <img src="{{$item->getfirstmediaurl('Thumbnail')}}" alt="">
                                           
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="{{route('products',$item->url_key)}}">{{$item->Name}}</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">₹{{$item->Price}}.00</span>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                               
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                               
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                               
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                             
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                             
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                               <!-- End Product Default Single Item -->
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-fc025f186f4c12c7" aria-disabled="true"></div>
                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-fc025f186f4c12c7" aria-disabled="false"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection