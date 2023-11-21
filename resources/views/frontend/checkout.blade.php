@extends('layouts.frontend')
@section('content')
@if(is_object($quotee) && count($quotee->Quoteitem) > 0)
<div class="breadcrumb-wrapper"style="background:#bad2ba;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Checkout</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('home')}}">Shop</a></li>
                                    <li class="active" aria-current="page">Checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout-section">
        <div class="container">
            <div class="row">
                <!-- User Quick Action Form -->
                <div class="col-12">
                    <div class="user-actions accordion aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_login" aria-expanded="true">Click here to login</a>
                        </h3>
                        <div id="checkout_login" class="collapse" data-parent="#checkout_login">
                            <div class="checkout_info">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                    you are a new customer please proceed to the Billing &amp; Shipping section.</p>
                                <form action="#">
                                    <div class="form_group default-form-box">
                                        <label>Username or email <span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="form_group default-form-box">
                                        <label>Password <span>*</span></label>
                                        <input type="password">
                                    </div>
                                    <div class="form_group group_3 default-form-box">
                                        <button class="btn btn-md btn-black-default-hover" type="submit">Login</button>
                                        <label class="checkbox-default">
                                            <input type="checkbox">
                                            <span>Remember me</span>
                                        </label>
                                    </div>
                                    <a href="#">Lost your password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="user-actions accordion aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a>

                        </h3>
                        <div id="checkout_coupon" class="collapse checkout_coupon" data-parent="#checkout_coupon">
                            <div class="checkout_info">
                                <form action="#">
                                    <input placeholder="Coupon code" type="text">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Apply
                                        coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Quick Action Form -->
            </div>
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="{{route('checkout.store')}}" method="POST">
                            @csrf
                            <h3>Billing Details</h3>
                            @if(auth()->user())
                            <div class="row">
                                <div class="default-form-box col-12 w-100">
                                     <label>Saved address</label>
                                     <select name="savedbilling" id="savedshipping" class="country_option nice-select wide">
                                         @foreach(billingaddress() as $address)
                                         <option value="{{$address->id}}">{{$address->name.','.$address->address.','.$address->pincode.','.$address->city}}</option>
                                         
                                         @endforeach
                                         <option value="newaddress">New Address</option>
                                        </select>
                                    </div>
                                </div>
                                @endif
                                
                                <div id="formcontainer">

                            <div class="row" id="addressform">
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" name="firstname" value="{{old('firstname')}}">
                                    </div>
                                    @error('firstname')
                                    <div class="text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" name="lastname"value="{{old('lastname')}}">
                                    @error('lastname')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Pin Code</label>
                                        <input type="text" name="pincode" value="{{old('pincode')}}">
                                     @error('pincode')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label for="country">country <span>*</span></label>
                                        <select class="country_option nice-select wide" name="country" id="country" style="display: none;">
                                            <option value="India"{{old('country')=="India"?"selected":""}}>India</option>
                                            <option value="Algeria"{{old('country')=="Algeria"?"selected":""}}>Algeria</option>
                                            <option value="Afghanistan"{{old('country')=="Afghanistan"?"selected":""}}>Afghanistan</option>
                                            <option value="Ghana"{{old('country')=="Ghana"?"selected":""}}>Ghana</option>
                                            <option value="Albania"{{old('country')=="Albania"?"selected":""}}>Albania</option>
                                            <option value="Bahrain"{{old('country')=="Bahrain"?"selected":""}}>Bahrain</option>
                                            <option value="Colombia"{{old('country')=="Colombia"?"selected":""}}>Colombia</option>
                                            <option value="Dominican"{{old('country')=="Dominican"?"selected":""}}>Dominican Republic</option>
                                        </select>
                                    </div>
                                    @error('country')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Street address <span>*</span></label>
                                        <input placeholder="House number and street name" type="text" name="address" value="{{old('address')}}">
                                    </div>
                                   
                                </div>
                                @error('address')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="optional_address"value="{{old('optional_address')}}">
                                    </div>
                                    @error('optional_address')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Town / City <span>*</span></label>
                                        <input type="text" name="city"value="{{old('city')}}">
                                    </div>
                                    
                                </div>
                                @error('city')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>State / County <span>*</span></label>
                                        <input type="text" name="state"value="{{old('state')}}">
                                    </div>
                                </div>
                                @error('state')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Phone<span>*</span></label>
                                        <input type="text" name="phone"value="{{old('phone')}}">
                                        @error('phone')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label> Email Address <span>*</span></label>
                                        <input type="email" name="email"value="{{old('email')}}">
                                        @error('email')
                                    <span class="text text-danger">{{$message}}</span> 
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="checkbox-default" for="newAccount" data-bs-toggle="collapse" data-bs-target="#newAccountPassword">
                                        <input type="checkbox" id="newAccount">
                                        <span>Create an account?</span>
                                    </label>
                                    <div id="newAccountPassword" class="collapse mt-3" data-parent="#newAccountPassword">
                                        <div class="card-body1 default-form-box">
                                            <label> Account password <span>*</span></label>
                                            <input placeholder="password" type="password">
                                        </div>
                                    </div>
                                    
                                </div>
                               
                                <div class="col-12">
                                    <label class="checkbox-default" for="newShipping" data-bs-toggle="collapse" data-bs-target="#anotherShipping">
                                        <input type="checkbox" id="newShipping" name="shippingaddress" value="shippingaddress">
                                        <span>Ship to a different address?</span>
                                    </label>

                                    <div id="anotherShipping" class="collapse mt-3" data-parent="#anotherShipping">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="default-form-box">
                                                    <label>First Name <span>*</span></label>
                                                    <input type="text" name="s_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="default-form-box">
                                                    <label>Last Name <span>*</span></label>
                                                    <input type="text" name="sl_name">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="default-form-box">
                                                    <label>pincode</label>
                                                    <input type="text" name="s_pincode">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="select_form_select default-form-box">
                                                    <label for="countru_name">country <span>*</span></label>
                                                    <select class="niceselect_option wide" name="s_country" id="countru_name" style="display: none;">
                                                        <option value="india">india</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="usa">usa</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="default-form-box">
                                                    <label>Street address <span>*</span></label>
                                                    <input placeholder="House number and street name" name="s_adddress" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="default-form-box">
                                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="s_adddress2">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="default-form-box">
                                                    <label>Town / City <span>*</span></label>
                                                    <input type="text" name="s_city" >
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="default-form-box">
                                                    <label>State / County <span>*</span></label>
                                                    <input type="text"name="s_state">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="default-form-box">
                                                    <label>Phone<span>*</span></label>
                                                    <input type="text" name="s_phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="default-form-box">
                                                    <label> Email Address <span>*</span></label>
                                                    <input type="email" name="s_email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>




                            @if(auth()->user())
                            <div id="shippingaddress">
                            <h3>Shipping adress</h3>

                            <div class="row">
                            <div class="default-form-box col-12 w-100">
                                     <label>Saved address</label>
                                        <select name="savedshipping" id="savedshipping" class="country_option nice-select wide">
                                            @foreach(shippingaddress() as $address)
                                            <option value="{{$address->id}}">{{$address->name.','.$address->address.','.$address->pincode.','.$address->city}}</option>
                                            
                                            @endforeach
                                            <option value="newaddress">New Address</option>
                                    </select>
                                    </div>
                            </div>
                        </div>
                        @endif

                                </div>

                        
                    
                    </div>
                    <div class="col-lg-6 col-md-6">
                        @if(session('message'))
                        <div class="btn btn-success">{{session('message')}}</div>
                         @endif   <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(session()->has('cart_id'))
                                      @foreach($quotee->Quoteitem as $item)
                                        <tr>
                                            <td> {{$item->name}} <strong> × {{$item->qty}}</strong><br>
                                            @php
                        $attribute=json_decode($item->custom_option);
                        @endphp
                        @if ($attribute !== null)
                        @foreach ($attribute as $key => $items)
                        <span><strong>{{ $key }}</strong>: {{ $items }}</span><br>
                        @endforeach
                        @else
                        <span></span>
                        @endif
                                        
                                        </td>
                                            <td>₹{{$item->row_total}}</td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>@if($quotee->total !=null)
                                            ₹{{number_format($quotee->total, 2)}}
                                              @else
                                            {{number_format($quotee->subtotal,2)}}
                                            @endif
                                        </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong id="shipping">₹0.00</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td id="ordertotal"><strong>₹0.00</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default py-2">
                               <stron> <label for="payment_method" style="width:100%;" class="mb-2">Payment Method <span>*</span></label></strong>

                                    <label class="checkbox-default mb-3" for="currencyCod" data-bs-toggle="collapse" data-bs-target="#methodCod">
                                        <input type="checkbox" id="cashondelivery"name="payment_method" value="currencyCod"{{old('payment_method')=='currencyCod'?"checked":""}}>
                                        <span>Cash on Delivery</span>
                                    </label>

                                    <div id="methodCod" class="collapse" data-parent="#methodCod">
                                        <div class="card-body1">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                                / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div>
                               
                             




                                <div class="panel-default ">
                                    
                                    <label class="checkbox-default" for="currencyPaypal" data-bs-toggle="collapse" data-bs-target="#methodPaypal">
                                        <input type="checkbox"  name="payment_method" value="currencyPaypal"id="currencyPaypal"{{old('payment_method')=='currencyPaypal'?"checked":""}}>
                                        <span>PayPal</span>
                                    </label>
                                    <div id="methodPaypal" class="collapse " data-parent="#methodPaypal">
                                        <div class="card-body1">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                    </div>
                                </div>
                                @error('payment_method')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                                <div class="panel-default my-5">
                               <div class="select_form_select default-form-box">
                                                    <label for="shipping_method" >Shipping Method <span>*</span></label>
                                                    <select class="niceselect_option wide" name="shipping_method" id="shipping_method"  style="display: none;">
                                                    <option value="">Select-option</option>
                                                    <option value="0">Standard Shipping</option>
                                                        <option value="40">Expedited Shipping</option>
                                                        <option value="100">Priority or Express Shipping</option>
                                                        <option value="200">Same-Day or Next-Day Delivery</option>
                                                     
                                                    </select>
                                                </div>
                                @error('shipping_method')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                                </div>
                                <div class="order_button  my-5">
                                    <button class="btn btn-md btn-black-default-hover my-5" type="submit">Proceed to
                                        Pay</button>
                                </div>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
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
                            <h6 class="sub-title">Please Add Items In cart first !</h6>
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
    $(document).ready(function(){

        $('#shipping_method').change(function(){
            var shipping_method=parseFloat($(this).val());
            $('#shipping').text('₹ ' + shipping_method+'.00');

            if("{{$quotee->total!=null}}"){
            var cart_subtotal = parseFloat("{{$quotee->total}}");}
            else{
                var cart_subtotal = parseFloat("{{$quotee->subtotal}}");
            }
            var newtotal= shipping_method+cart_subtotal;
           $('#ordertotal').text('₹'+ newtotal+'.00');
            
        });
       
        $('#savedshipping').change(function () {
    var value = $(this).val();
    console.log(value);

    $('#addressform').hide();

    if (value === 'newaddress') {
        $('#addressform').show();
        $('#shippingaddress').remove();
    } else {
        // Check if the shippingaddress already exists
        if ($('#shippingaddress').length === 0) {
            // If it doesn't exist, append it
            var html = `
                @if(auth()->user())
                <div id="shippingaddress">
                    <h3>Shipping address</h3>
                    <div class="row">
                        <div class="default-form-box col-12 w-100">
                            <label>Saved address</label>
                            <select name="savedshipping" id="savedshipping" class="country_option nice-select wide">
                                @foreach(shippingaddress() as $address)
                                <option value="{{$address->id}}">{{$address->name.','.$address->address.','.$address->pincode.','.$address->city}}</option>
                                @endforeach
                                <option value="newaddress">New Address</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endif`;
            $('#formcontainer').append(html);
        }
    }
});


        if('{{auth()->user()}}'){
                $('#addressform').hide();
            };


    });
    // </script>
@endsection
