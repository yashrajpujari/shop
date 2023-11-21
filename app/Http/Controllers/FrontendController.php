<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Block;
use App\Models\Product;
use App\Models\Productattribute;
use App\Models\Attribute;
use App\Models\Attributevalue;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    
    }
    public function page($url_key){
        $page=Page::where('url_key',$url_key)->first();
        return view('frontend.page',compact('page'));
    
    }
    public function blog ($identifier){
        $blogs=Block::where('identifier',$identifier)->first();
        return view('frontend.blog',compact('blogs'));
    
    }
    public function productdetail($url_key){ 
        $product=Product::where('url_key',$url_key)->first();
        $id=$product->id;
        $attributes=Productattribute::where('product_id',$id)->get();
        $product_attribte=[];
        foreach($attributes as $attr){
            $attribute_id=$attr->attribute_id;
            $attribute_value_Id=$attr->attribute_value_id;
            $attribute=Attribute::find($attribute_id);
            $attributevalue=Attributevalue::find($attribute_value_Id);
            if($attribute && $attributevalue){
                $product_attribte[$attribute->name][]=$attributevalue;
            }
           // dd($product_attribte);
        }
        return view('frontend.productdetail',compact('product','product_attribte'));
    
    }
    public function shop(){
        return view ('frontend.shop');
    }


    public function checkout(){
        return view('frontend.checkout');
    }
}
 