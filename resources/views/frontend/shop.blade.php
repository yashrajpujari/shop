@extends('layouts.frontend')
@section('content')
<div class="container-fluid my-5 py-5">
    <div class="row mb-3">
        <div class="shop-section">
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-3">
                        <!-- Start Sidebar Area -->
                        <div class="siderbar-section aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">

                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">{{ Str::after(request()->url(), 'http://127.0.0.1:8000/') }}
                                </h6>
                                <div class="sidebar-content">
                                    <ul class="sidebar-menu">

                                        <li>
                                            <ul class="sidebar-menu-collapse">
                                                <!-- Start Single Menu Collapse List -->
                                                <li class="sidebar-menu-collapse-list">
                                                    @foreach(get_header_category() as $p_category)
                                                    <div class="accordion" style="text-transform: capitalize;">
                                                        <a href="{{ route('categories', $p_category->url_key) }}" class="my-2">{{ $p_category->name }}</a><i class="ion-ios-arrow-right mx-2"></i>
                                                        <div id="{{ $category->url_key }}" class="collapse">
                                                            <ul class="accordion-category-list">
                                                                @foreach(get_subcategories($p_category->id) as $subcategory)
                                                                <li><a href="{{ route('categories', $subcategory->url_key) }}" class="subcategory-link" data-subcategory-id="{{ $subcategory->id }}">{{ $subcategory->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </li> <!-- End Single Menu Collapse List -->
                                            </ul>
                                        </li>



                                    </ul>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                            <!--
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">FILTER BY PRICE</h6>
                                <div class="sidebar-content">
                                    <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"  style="left: 15%; width: 45%;"></div>
                                        <span tabindex="0" style="display:none;" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 15%;" ></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"id="range" style="left: 60%;"></span>
                                    </div>
                                    <div class="filter-type-price">
                                        <p>Price range:<p>
                                       
                                        <input type="hidden" id="urlkey" value="{{$category->url_key}}">
                                        <strong><span id="min" class="mx-2"></span><span id="max"></span></strong>
                                    </div>
                                </div>
                            </div> 

                           
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">MANUFACTURER</h6>
                                <div class="sidebar-content">
                                    <div class="filter-type-select">
                                        <ul>
                                            <li>
                                                <label class="checkbox-default" for="brakeParts">
                                                    <input type="checkbox" id="brakeParts">
                                                    <span>Brake Parts(6)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="accessories">
                                                    <input type="checkbox" id="accessories">
                                                    <span>Accessories (10)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="EngineParts">
                                                    <input type="checkbox" id="EngineParts">
                                                    <span>Engine Parts (4)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="hermes">
                                                    <input type="checkbox" id="hermes">
                                                    <span>hermes (10)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="tommyHilfiger">
                                                    <input type="checkbox" id="tommyHilfiger">
                                                    <span>Tommy Hilfiger(7)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 

                            
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">SELECT BY COLOR</h6>
                                <div class="sidebar-content">
                                    <div class="filter-type-select">
                                        <ul>
                                            <li>
                                                <label class="checkbox-default" for="black">
                                                    <input type="checkbox" id="black">
                                                    <span>Black (6)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="blue">
                                                    <input type="checkbox" id="blue">
                                                    <span>Blue (8)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="brown">
                                                    <input type="checkbox" id="brown">
                                                    <span>Brown (10)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="Green">
                                                    <input type="checkbox" id="Green">
                                                    <span>Green (6)</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox-default" for="pink">
                                                    <input type="checkbox" id="pink">
                                                    <span>Pink (4)</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Start Single Sidebar Widget -->
                            <!--
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">Tag products</h6>
                                <div class="sidebar-content">
                                    <div class="tag-link">
                                        <a href="#">asian</a>
                                        <a href="#">brown</a>
                                        <a href="#">euro</a>
                                        <a href="#">fashion</a>
                                        <a href="#">hat</a>
                                        <a href="#">t-shirt</a>
                                        <a href="#">teen</a>
                                        <a href="#">travel</a>
                                        <a href="#">white</a>
                                    </div>
                                </div>
                            </div>--> <!-- End Single Sidebar Widget -->
                            <form action="" method="get">
                                <div class="form-group my-2">
                                    <label for="min_price" class="my-2" style="color:black;"><strong>Min Price:</strong></label>
                                    <input type="number" name="m in_price" placeholder="Min Price" class="form-control" value="{{ request('min_price', '') }}">
                                </div>
                                <div class="form-group my-2">
                                    <label for="max_price" class="my-2"style="color:black;"><strong>Max Price:</strong></label>
                                    <input type="number" name="max_price" placeholder="Max Price" class="form-control" value="{{ request('max_price', '') }}">
                                </div>
                                @php
                                $implode=implode(',',$productId);
                               //{{ dd($implode);}}
                                @endphp

                               <div class="form-group">
                                    @foreach(attributename($implode) as $key=> $data)
  
                                    <div class="filter-sub-area pt-sm-3 pt-xs-3">
                                        <h5 class="filter-sub-titel">
                                            {{ $key }}
                                        </h5>

                                        <div class="input-group input-group-merge" style="font-size:17px;">
                                            @foreach($data as $value)
                                            <span class="m-1 d-flex">
                                                <input type="checkbox" style="padding:10px;" class="mx-2 checkbox" name="attribute[{{ $value->attribute_id }}][]" value="{{ $value->id }}">
                                                <label class="form-check-label" for="defaultCheck3" style="color:black;"><strong> {{$value->name}}</strong> </label>
                                            </span>
                                            @endforeach
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                <a href=" <?= $_SERVER["PATH_INFO"] ?>"><button type="button" class="btn btn-danger" style="background:#dea948;color:white;border:none;">Clear all</button></a>

                                <button type="submit" class="btn btn-success ml-2" style="color:white;border:none;">Apply filter</button>
                            </form>


                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <div class="sidebar-content">
                                    <a href="{{route('home')}}" class="sidebar-banner img-hover-zoom">
                                        <img class="img-fluid" src="{{asset('frontend/assets/images/banner/side-banner.jpg')}}" alt="">
                                    </a>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                        </div> <!-- End Sidebar Area -->
                    </div>
                    <div class="col-lg-9">
                        <!-- Start Shop Product Sorting Section -->
                        <div class="shop-sort-section">
                            <div class="container">
                                <div class="row">
                                    <!-- Start Sort Wrapper Box -->
                                    <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                        <!-- Start Sort tab Button -->
                                        <div class="sort-tablist d-flex align-items-center">
                                            <ul class="tablist nav sort-tab-btn">
                                                <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-3-grid"><img src="{{asset('frontend/assets/images/icons/bkg_grid.png')}}" alt=""></a></li>
                                            </ul>

                                            <!-- Start Page Amount -->
                                            <div class="page-amount ml-2">
                                                <!--<span>Showing 1–9 of 21 results</span>-->
                                            </div> <!-- End Page Amount -->
                                        </div> <!-- End Sort tab Button -->

                                        <!-- Start Sort Select Option -->
                                        <div class="sort-select-list d-flex align-items-center">
                                            <label class="mr-2">Sort By:</label>
                                            <form action="#">
                                                <fieldset>
                                                    <select name="speed" id="speed" style="display: none;">
                                                        <option>Sort by average rating</option>
                                                        <option>Sort by popularity</option>
                                                        <option selected="selected">Sort by newness</option>
                                                        <option>Sort by price: low to high</option>
                                                        <option>Sort by price: high to low</option>
                                                        <option>Product Name: Z</option>
                                                    </select>
                                                    <div class="nice-select" tabindex="0"><span class="current">Sort by newness</span>
                                                        <ul class="list">
                                                            <li data-value="Sort by average rating" class="option">Sort by average rating</li>
                                                            <li data-value="Sort by popularity" class="option">Sort by popularity</li>
                                                            <li data-value="Sort by newness" class="option selected">Sort by newness</li>
                                                            <li data-value="Sort by price: low to high" class="option">Sort by price: low to high</li>
                                                            <li data-value="Sort by price: high to low" class="option">Sort by price: high to low</li>
                                                            <li data-value="Product Name: Z" class="option">Product Name: Z</li>
                                                        </ul>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div> <!-- End Sort Select Option -->
                                    </div> <!-- Start Sort Wrapper Box -->
                                </div>
                            </div>
                        </div> <!-- End Section Content -->

                        <!-- Start Tab Wrapper -->
                        <div class="sort-product-tab-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="tab-content tab-animate-zoom" id="change">
                                            <!-- Start Grid View Product -->
                                            <div class="tab-pane sort-layout-single active" id="layout-3-grid">
                                                <div class="row">
                                                    @foreach($products as $product)
                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden">
                                                            <div class="image-box">
                                                                <a href="{{route('products',$product->url_key)}}" class="image-link">
                                                                    <img src="{{$product->getfirstMediaurl('Thumbnail')}}" alt="">
                                                                    <img src="{{$product->getfirstMediaurl('Thumbnail')}}" alt="">
                                                                </a>
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
                                                                        <li class="fill"><i class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="fill"><i class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="fill"><i class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="fill"><i class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="empty"><i class="ion-android-star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="content-right">
                                                                    <span class="price">₹{{$product->Price}}.00</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- End Product Default Single Item -->
                                                    </div>
                                                    @endforeach











                                                </div>
                                            </div> <!-- End Grid View Product -->
                                            <!-- Start List View Product -->
                                            <div class="tab-pane show sort-layout-single" id="layout-list">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-list-single product-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                                            <a href="product-details-default.html" class="product-list-img-link">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-1.jpg')}}" alt="">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-2.jpg')}}" alt="">
                                                            </a>
                                                            <div class="product-list-content">
                                                                <h5 class="product-list-link"><a href="product-details-default.html">KAOREET LOBORTIS
                                                                        SAGIT</a></h5>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                                <span class="product-list-price"><del>$30.12</del>
                                                                    $25.12</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                                    eveniet inventore doloremque necessitatibus sed, ducimus
                                                                    quisquam, ad asperiores</p>
                                                                <div class="product-action-icon-link-list">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                        cart</a>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                                    <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                    <div class="col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-list-single product-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                                            <a href="product-details-default.html" class="product-list-img-link">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-3.jpg')}}" alt="">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-4.jpg')}}" alt="">
                                                            </a>
                                                            <div class="product-list-content">
                                                                <h5 class="product-list-link"><a href="product-details-default.html">CONDIMENTUM
                                                                        POSUERE</a></h5>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                                <span class="product-list-price">$95.00</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                                    eveniet inventore doloremque necessitatibus sed, ducimus
                                                                    quisquam, ad asperiores</p>
                                                                <div class="product-action-icon-link-list">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                        cart</a>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                                    <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                    <div class="col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-list-single product-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                                            <a href="product-details-default.html" class="product-list-img-link">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-5.jpg')}}" alt="">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-6.jpg')}}" alt="">
                                                            </a>
                                                            <div class="product-list-content">
                                                                <h5 class="product-list-link"><a href="product-details-default.html">ALIQUAM
                                                                        LOBORTIS</a></h5>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                                <span class="product-list-price"> $25.12</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                                    eveniet inventore doloremque necessitatibus sed, ducimus
                                                                    quisquam, ad asperiores</p>
                                                                <div class="product-action-icon-link-list">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                        cart</a>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                                    <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                    <div class="col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-list-single product-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
                                                            <a href="product-details-default.html" class="product-list-img-link">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-7.jpg')}}" alt="">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-8.jpg')}}" alt="">
                                                            </a>
                                                            <div class="product-list-content">
                                                                <h5 class="product-list-link"><a href="product-details-default.html">CONVALLIS QUAM
                                                                        SIT</a></h5>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                                <span class="product-list-price">$75.00 - $85.00</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                                    eveniet inventore doloremque necessitatibus sed, ducimus
                                                                    quisquam, ad asperiores</p>
                                                                <div class="product-action-icon-link-list">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                        cart</a>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                                    <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                    <div class="col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-list-single product-color--golden aos-init aos-animate" data-aos="fade-up" data-aos-delay="800">
                                                            <a href="product-details-default.html" class="product-list-img-link">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-9.jpg')}}" alt="">
                                                                <img class="img-fluid" src="{{asset('frontend/assets/images/product/default/home-1/default-10.jpg')}}" alt="">
                                                            </a>
                                                            <div class="product-list-content">
                                                                <h5 class="product-list-link"><a href="product-details-default.html">DONEC EU LIBERO
                                                                        AC</a></h5>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                                <span class="product-list-price"><del>$25.12</del>
                                                                    $20.00</span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    Nobis ad, iure incidunt. Ab consequatur temporibus non
                                                                    eveniet inventore doloremque necessitatibus sed, ducimus
                                                                    quisquam, ad asperiores</p>
                                                                <div class="product-action-icon-link-list">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart" class="btn btn-lg btn-black-default-hover">Add to
                                                                        cart</a>
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview" class="btn btn-lg btn-black-default-hover"><i class="icon-magnifier"></i></a>
                                                                    <a href="wishlist.html" class="btn btn-lg btn-black-default-hover"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html" class="btn btn-lg btn-black-default-hover"><i class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                </div>
                                            </div> <!-- End List View Product -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Tab Wrapper -->

                        <!-- Start Pagination -->
                        <div class="page-pagination text-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                            <ul>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                            </ul>
                        </div> <!-- End Pagination -->
                    </div> <!-- End Shop Product Sorting Section  -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.accordion  i').click(function() {
            var collapseElement = $(this).next('.collapse');
            collapseElement.toggle();
        });

        $('#range').click(function() {
            var min = $('#min').html();
            var max = $('#max').html();
            var urlkey = $('#urlkey').val();
            min = min.replace('₹', '');
            max = max.replace('₹', '');
            console.log(min + max + urlkey);
            $.ajax({
                url: "{{ route('categorryproduct') }}",
                method: 'GET',
                data: {
                    'urlkey': urlkey,
                    'min': min,
                    'max': max
                }, // Changed 'mix' to 'max'
                success: function(data) {
                    $('#change').html(data);
                },
                error: function(error) {
                    alert('Something went wrong');
                }
            });
        });
    });
</script>




</script>

<!--<script>
$(document).ready(function () {
    $('.subcategory-link').click(function (e) {
        e.preventDefault();
        var subcategoryId = $(this).data('subcategory-id');

        $.ajax({
            url: "{{ route('categorryproduct') }}",
            method: 'GET',
            data: { 'product': subcategoryId },
            success: function (data) {
                $('#change').html(data);
            },
            error: function (error) {
                alert('Something went wrong');
            }
        });
    });
});
</script>-->
@endsection