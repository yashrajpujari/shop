<?php
 use App\Models\Slider;
 use App\Models\Page;
 use App\Models\Category;
 use App\Models\Product;
 use App\Models\Block;
use App\Models\Quote_item;
use App\Models\Quote;
use App\Models\Order;
use App\Models\Order_address;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Attribute;
use App\Models\Attributevalue;
use App\Models\Productattribute;

if(!function_exists('getslider')){
 function getslider(){
    $slider=Slider::where('status',1)->get();
    return $slider;
}
}

if(!function_exists('getpages')){
    function getpages(){
        $pages=Page::where('status',1)->where('parentpage_id',0)->get();
        return $pages;
    }
}
if(!function_exists('get_header_category')){
    function get_header_category(){
        $categories=Category::where('status',1)->where('parent_category',0)->where('show_in_menu',1)->get();
        return $categories;
    }
}
if(!function_exists('get_subcategories')){
    function get_subcategories($parentcategory){
        $sub_categories=Category::where('status',1)->where('parent_category',$parentcategory)->where('show_in_menu',1)->get();
        return $sub_categories;
    }
}
if(!function_exists('get_product')){
    function get_product(){
        $products=Product::where('status',1) ->orderBy('id', 'desc')->limit(20)->get();
        return $products; 
    }
}
if(!function_exists('get_block')){
    function get_block(){
        $blocks=Block::where('status',1)->get();
        return $blocks;
    }
    if(!function_exists('getrelated_product')){
        function getrelated_product($id){
            $product=Product::where('id',$id)->first();
            $related=explode(',',$product->Related_Products);
            $related_product=Product::whereIn('id',$related)->get();
            return $related_product;
        } 
    }


}
if(!function_exists('allproducts')){
    function allproducts(){
        $products=Product::all();
        return $products;
    }
}

if(!function_exists('fetch_price')){
    function fetch_price($product){
        $current_date=now();

        //dd($current_date);
        if($current_date->between($product->Special_price_from,$product->Special_price_to)){
            return ($product->Special_Price);
        }
    return $product->Price;
    }
}
if(!function_exists('getproductimg')){
    function getproductimg($id){
        $data=product::where('id',$id)->first();
        $returnimg=$data->getfirstmediaurl('Banner_Image');
        return $returnimg;
    }
}
if(!function_exists('sub_total')){
     function sub_total($cartid){
        $row=Quote_item::where('quote_id',$cartid)->get();
        $cart_amount=0;
        foreach($row as $row_item){
            $total= $row_item->row_total;
            $cart_amount+=$total;
            
        }
        return ( $cart_amount);
     }
}

if(!function_exists('cartcounter')){
    function cartcounter(){
        $cartId = session('cart_id');
      
 
        $quotee = Quote::where('cart_id', $cartId)->with('Quoteitem')->first();
       if($quotee){
        return count($quotee->Quoteitem);
       }

       return 0;
    }
}



if (!function_exists('cartitem')) {
    function cartitem()
    {
        
        if (session()->has('cart_id')) {
            $cartId = session('cart_id');
           
            $quote = Quote::where('cart_id', $cartId)->with('Quoteitem')->get();
            if ($quote) {
                return $quote;
            }
        }

        
        return [];
    }
}

if(!function_exists('billingaddress')){

    function billingaddress(){
        $user=auth()->user()->id;
        $order=Order_address::where('user_id',$user)->where('address_type','billingaddress')->get();
        return $order;

    }
}
if(!function_exists('shippingaddress')){

    function shippingaddress(){
        if(auth()->user()){
        $user=auth()->user()->id;
        $order=Order_address::where('user_id',$user)->where('address_type','shippingaddress')->get();
        return $order;}

    }
}

if (!function_exists('wishliscount')) {
    function wishliscount()
    {
        
        if (auth()->user()) {
        
           
            $quote = Wishlist::where('user_id',auth()->user()->id)->get();
            if ($quote) {
                return count($quote);
            }
        }

        
        return 0;
    }
}


if (!function_exists('wishlistitem')) {
    function wishlistitem()
    {
        
        if (auth()->user()) {
        
           
            $quote = Wishlist::where('user_id',auth()->user()->id)->with('product')->get();
            if ($quote) {
                return $quote;
            }
        }

        
        return $quote=[]; 
    }
}

/*if (!function_exists("attribute")) {
    function attribute($productId)
    {
        $productid = explode(',', $productId);
        $productatt = Productattribute::whereIn('product_id', $productid)->get();
        $att = [];
        foreach ($productatt as $key => $patt) {
            $att[$patt->attribute_id][] = $patt->attributevalue_id;
        }
        $att = array_map('array_unique', $att);
        return $att;
    }
}*/
if (!function_exists("attributename")) {
    function attributename($productId)
    {
        $productid = explode(',', $productId);
        $productAttributes = Productattribute::whereIn('product_id', $productid)->get();
       // $productAttributes = array_map('array_unique', $productAttributes);
        $attributes = [];
       // dd($productAttributes->attribute_value_id);

        foreach ($productAttributes as $productAttribute) {
            $attributeId = $productAttribute['attribute_id'];
            $attributeValueId = $productAttribute['attribute_value_id']; 

            $attribute = Attribute::find($attributeId);
            $attributeValue = AttributeValue::find($attributeValueId);

            if ($attribute && $attributeValue) {
                if (!isset($attributes[$attribute->name])) {
                    $attributes[$attribute->name] = [];
                }

                $attributes[$attribute->name][] = $attributeValue;
            }
        }
         $attributes = array_map('array_unique', $attributes);
        return $attributes;
    }
}






?>


