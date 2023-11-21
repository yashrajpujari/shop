<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <!-- Start Header Top -->
        <div class="header-top header-top-bg--black section-fluid">
            <div class="container">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="header-top-left col-10">
                        <div class="header-top-contact header-top-contact-color--white header-top-contact-hover-color--green">
                            <a href="tel:6350207983" class="icon-space-right"><i class="icon-call-in"></i>6350207983</a>
                            <a href="mailto:demo@example.com" class="icon-space-right"><i class="icon-envelope"></i>demo@example.com</a>
                        </div>
                    </div>
                    <div class="header-top-right">
                        <div class="header-top-user-link header-top-user-link-color--white header-top-user-link-hover-color--green d-flex justify-content-between">

                            <ul class="useraccount mr-2"><i class="fa fa-user-o mr-2" aria-hidden="true"></i>Accounts<i class="fa fa-angle-down mx-2"></i>
                                <ul id="hide">
                                    @if(auth()->user())
                                    <li><a href="{{route('myaccount')}}"><i class="fa fa-sign-in mr-1" aria-hidden="true"></i>
                                            My Account</a></li>
                                    @endif

                                    @if(!auth()->user())
                                    <li><a href="{{route('customer/singin')}}"><i class="fa fa-sign-in mr-1" aria-hidden="true"></i>
                                            sign in</a></li>

                                    <li><a href="{{route('customer/singup')}}"><i class="fa fa-sign-in mr-1" aria-hidden="true"></i>sign up</a></li>
                                    @endif
                                </ul>
                            </ul>
                            <a href="#">Wishlist</a>
                            <a href="{{route('cart.index')}}">Cart</a>
                            @if(cartcounter()>0)
                            <a href="{{route('checkout.index')}}">Checkout</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->
        <!-- Start Header Bottom -->
        <div class="header-bottom header-bottom-color--green section-fluid sticky-header sticky-color--white">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                               <!-- <a href="{{route('home')}}"><img src="{{asset('frontend/assets/images/logo/logo_black.png')}}" alt=""></a>-->
                               <a href="{{route('home')}}"> company-logo</a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--black menu-hover-color--green">
                            <nav>
                                <ul>
                                    <li>
                                        <a class="active main-menu-link" href="{{route('home')}}">Home </a>
                                        <!-- Sub Menu -->

                                    </li>
                                    @foreach(get_header_category() as $category)
                                    <li class="has-dropdown">
                                        <a href="{{route('categories',$category->url_key)}}">{{$category->name}} <i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            @foreach(get_subcategories($category->id) as $subcategory)
                                            <li><a href="{{route('categories',$subcategory->url_key)}}">{{$subcategory->name}}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    @endforeach
                                    <!-- <li class="has-dropdown">
                                        <a href="blog-single-sidebar-left.html">Blog <i class="fa fa-angle-down"></i></a>
                                         Sub Menu 
                                        <ul class="sub-menu">
                                            @foreach(get_block() as $block)
                                            <li><a href="{{route('blog',$block->identifier)}}">{{$block->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>-->

                                    <li>

                                    </li>
                                    <li>
                                        <a href="{{route('contactus')}}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--green">
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">{{wishliscount( )}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">{{cartcounter()}}</span>
                                </a>
                            </li>

                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </div>
</header>

<!-- Start Mobile Header -->
<div class="mobile-header mobile-header-bg-color--white section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="index.html">
                                <div class="logo">
                                    <img src="{{asset('frontend/assets/images/logo/logo_black.png')}}" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Left Side -->

                <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--green">
                        <li>
                            <a href="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Header -->

<!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="{{route('home')}}"><span>Home</span></a>

                    </li>
                    <li>
                        <a href="#"><span>Shop</span></a>
                        <ul class="mobile-sub-menu">
                            @foreach(get_header_category() as $category)
                            <li class="mega-menu-item">
                                <a href="#" class="mega-menu-item-title">{{$category->name}}</a>
                                <ul class="mega-menu-sub">
                                    <li><a href="shop-grid-sidebar-left.html">Grid Left
                                            Sidebar</a></li>
                                    <li><a href="shop-grid-sidebar-right.html">Grid Right
                                            Sidebar</a></li>
                                    <li><a href="shop-full-width.html">Full Width</a></li>
                                    <li><a href="shop-list-sidebar-left.html">List Left
                                            Sidebar</a></li>
                                    <li><a href="shop-list-sidebar-right.html">List Right
                                            Sidebar</a></li>
                                </ul>
                            </li>
                            @endforeach
                        </ul>


                    <li>
                        <a href="#"><span>Blogs</span></a>
                        <ul class="sub-menu">
                            @foreach(get_block() as $block)
                            <li><a href="{{route('blog',$block->identifier)}}">{{$block->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span>Pages</span></a>
                        <ul class="mobile-sub-menu">
                            <li><a href="faq.html">Frequently Questions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="404.html">404 Page</a></li>
                        </ul>
                    </li>

                    <li><a href="{{route('contact.create')}}">Contact Us</a></li>
                </ul>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index.html"><img src="{{asset('frontend/assets/images/logo/logo_white.png')}}" alt=""></a>
            </div>

            <address class="address">
                <span>Address: Your address goes here.</span>
                <span>Call Us: 0123456789, 0123456789</span>
                <span>Email: demo@example.com</span>
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="wishlist.html">Wishlist</a></li>
                <li><a href="{{route('cart.index')}}">Cart</a></li>
                @if(cartcounter()>0)
                <li><a href="{{route('checkout.index')}}">Checkout</a></li>
                @endif
            </ul>
        </div>
        <!-- End Mobile contact Info -->

    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <!-- Start Mobile contact Info -->
    <div class="mobile-contact-info">
        <div class="logo">
            <a href="index.html"><img src="{{asset('frontend/assets/images/logo/logo_white.png')}}" alt=""></a>
        </div>

        <address class="address">
            <span>Address: Your address goes here.</span>
            <span>Call Us: 0123456789, 0123456789</span>
            <span>Email: demo@example.com</span>
        </address>

        <ul class="social-link">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>

        <ul class="user-link">
            <li><a href="wishlist.html">Wishlist</a></li>
            <li><a href="{{route('cart.index')}}">Cart</a></li>
            <li><a href="{{route('checkout.index')}}">Checkout</a></li>
        </ul>
    </div>
    <!-- End Mobile contact Info -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Start Offcanvas Addcart Section -->
<div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Shopping Cart</h4>

        @if(session()->has('cart_id'))
        <ul class="offcanvas-cart">
            @foreach(cartitem() as $quote)
            @foreach($quote->Quoteitem as $items)
            <li class="offcanvas-cart-item-single">

                <div class="offcanvas-cart-item-block">
                    <a href="#" class="offcanvas-cart-item-image-link">
                        <img src="{{getproductimg($items->product_id)}}" alt="" class="offcanvas-cart-image">
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="#" class="offcanvas-cart-item-link">{{$items->name}}</a>

                        @php
                        $attribute=json_decode($items->custom_option);
                        @endphp
                        @if ($attribute !== null)
                        @foreach ($attribute as $key => $item)
                        <span><strong>{{ $key }}</strong>: {{ $item }}</span><br>
                        @endforeach
                        @else
                        <span></span>
                        @endif
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">{{$items->qty}}x</span>
                            <span class="offcanvas-cart-item-details-price">₹{{$items->price}}</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <form action="{{route('cart.destroy', $items->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa fa-trash-o"></i></button>
                    </form>

                </div>
            </li>
            @endforeach

            @endforeach

        </ul>

        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span class="offcanvas-cart-total-price-value">₹{{$quote->subtotal}}</span>
        </div>
        @else
        <ul>
            <li class="alert alert-danger" style="text-align:center"> Empty cart!!</li>
        </ul>
        @endif
        <ul class="offcanvas-cart-action-button">
            <li><a href="{{route('cart.index')}}" class="btn btn-block btn-green">View Cart</a></li>
            @if(cartcounter()>0)
            <li><a href="{{route('checkout.index')}}" class=" btn btn-block btn-green mt-5">Checkout</a></li>
            @endif
        </ul>
    </div> <!-- End  Offcanvas Addcart Wrapper -->

</div> <!-- End  Offcanvas Addcart Section -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- ENd Offcanvas Header -->

    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-wishlist-wrapper">
        @if(count(wishlistitem()) >0)
        <h4 class="offcanvas-title">Wishlist</h4>
        <ul class="offcanvas-wishlist">
            @foreach(wishlistitem() as $dd)
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="{{getproductimg($dd->product_id)}}" alt="" class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">{{$dd->product->Name}}</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                            <span class="offcanvas-wishlist-item-details-price">₹{{number_format($dd->product->Price,2)}}</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
           @endforeach
        </ul>
        <ul class="offcanvas-wishlist-action-button">
            <li><a href="{{route('mywishlist.index')}}" class="btn btn-block btn-green">View wishlist</a></li>
        </ul>
        @else
        <h3> No item in wishlist</h3>
        @endif
    </div> <!-- End Offcanvas Mobile Menu Wrapper -->

</div> <!-- End Offcanvas Mobile Menu Section -->

<!-- Start Offcanvas Search Bar Section -->
<div id="search" class="search-modal">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-lg btn-green">Search</button>
    </form>
</div>
<!-- End Offcanvas Search Bar Section -->

<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>