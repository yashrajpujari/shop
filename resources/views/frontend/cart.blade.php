@extends('layouts.frontend')
@section('content')

<!-- CSS link for Bootstrap 5 -->


<div class="breadcrumb-section" style="background:#bad2ba;">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Cart</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('home')}}">Shop</a></li>
                                <li class="active" aria-current="page">Cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(is_object($quote) && count($quote->Quoteitem) > 0)
<div class="cart-section">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            @if(session('message'))
                            <div class="alert alert-success">{{session('message')}}</div>

                            @endif
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                    <input type="hidden" name="quote_id" value=""></input>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    <!-- Start Cart Single Item-->
                                    @foreach($quote->Quoteitem??[] as $quote_items)
                                    <tr>
                                        <input name="id[]" type="hidden" value="{{$quote_items->id}}">
                                        <td>
                                            <form action="{{route('cart.destroy', $quote_items->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        <td class="product_thumb"><a href="#"><img src="{{getproductimg($quote_items->product_id)}}" alt=""></a></td>
                                        <td class="product_name"><a href="#">{{$quote_items->name}}</a><br>
                                            @php
                                            $attribute=json_decode($quote_items->custom_option);
                                            @endphp
                                            @if ($attribute !== null)
                                            @foreach ($attribute as $key => $item)
                                            <span><strong>{{ $key }}</strong>: {{ $item }}</span>
                                            @endforeach
                                            @else
                                            <span></span>
                                            @endif

                                        </td>
                                        <td class="product-price">{{$quote_items->price}}</td>
                                        <td class="product_quantity">

                                            <form class="update-form" action="{{route('cart.update',$quote_items->id)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="number" name="quantity" class="quantity-field" data-product-id="{{ $quote_items->id }}" size="1" value="{{ $quote_items->qty }}" min="1" step="1" style="width:40px;">
                                                <button type="submit" class="update-button" data-product-id="{{ $quote_items->id }}" style="width:100px; display:none;">Update</button>
                                            </form>
                                        </td>
                                        <td class="product_total">₹{{$quote_items->row_total}}</td>
                                    </tr> <!-- End Cart Single Item-->
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="cart_submit">
                            <button class="btn btn-md btn-golden" type="submit">update cart</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Cart Table -->

    <!-- Start Coupon Start -->
    <div class="coupon_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            @if($quote->coupan ==null)


                            <form action="{{route('applycoupon')}}" method="post">
                                @csrf
                                <input class="mb-2" name="coupon_code" placeholder="Coupon code" type="text">
                                <input class="mb-2" name="quote_id" placeholder="Coupon code" type="hidden" value="{{$quote->id}}">
                                <button type="submit" class="btn btn-md btn-golden">Apply coupon</button>
                            </form>
                            @if(session('error'))
                            <div class="alert alert-danger" style="color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;">{{session('error')}}</div>
                            @endif
                            @else
                            <form action="{{route('cancelcoupon')}}" method="post">
                                @csrf
                                <input class="mb-2" name="coupon_code" placeholder="Coupon code" type="text">
                                <input class="mb-2" name="quote_id" placeholder="Coupon code" type="hidden" value="{{$quote->id}}">
                                <button type="submit" class="btn btn-md btn-golden">Cancel coupon</button>
                            </form>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">₹{{number_format($quote->subtotal, 2)}}</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Discount</p>
                                <p class="cart_amount"><span></span>
                                    @if($quote->coupan_discount >0)
                                    ₹{{number_format($quote->coupan_discount, 2)}}
                                    @else
                                    ₹0.00

                                    @endif
                                </p>
                            </div>
                            <!-- <a href="#">Calculate shipping</a>-->

                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">
                                    @if($quote->total !=null)
                                    ₹{{number_format($quote->total, 2)}}
                                    @else
                                    ₹{{number_format($quote->subtotal, 2)}}

                                    @endif
                                </p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{route('checkout.index')}}" class="btn btn-md btn-golden">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- End Coupon Start -->
</div>

@else
<div class="empty-cart-section section-fluid">
    <div class="emptycart-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                    <div class="emptycart-content text-center">
                        <div class="image">
                            <img class="img-fluid" src="{{asset('frontend/assets/images/emprt-cart/empty-cart.png')}}" alt="">
                        </div>
                        <h4 class="title">Your Cart is Empty</h4>
                        <h6 class="sub-title">Sorry Mate... No item Found inside your cart!</h6>
                        <a href="{{route('home')}}" class="btn btn-lg " style="background:#047B42;color:white;">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.quantity-field').on('change', function() {
            const productId = $(this).data('product-id');
            $(`.update-button[data-product-id="${productId}"]`).show();
        });


    });
</script>
@endsection