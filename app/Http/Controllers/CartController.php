<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Product;
use App\Models\Quote_item;
use App\Models\Coupan;
use Illuminate\Support\Str;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $cartId = session('cart_id');

        $quotee = Quote::where('cart_id', $cartId)->with('Quoteitem')->first();
        if ($quotee) {
            $quote = $quotee;
        } else {
            $quote = [];
        }

        return view('frontend.cart',compact('quote'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create( Request $request){

        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            //dd($request->all());
             $cart_id=session('cart_id');
    
             if(!$cart_id){
                 $cart_id=Str::random(20 );  
                 session(['cart_id' => $cart_id]);
     
             }
             //dd($request->all());
             if(!$request['qty']){
                $quantity=1;
            
             }else{
                $quantity=$request['qty'];
             }

             if($request['attribute']){
                $attributes = $request['attribute'];
                $attvalue = json_encode($attributes);
             }
            $quote= Quote::where('cart_id',$cart_id)->firstOrCreate([
                'cart_id'=>$cart_id,
              
        ]);
             $quote_id=$quote->id;
             $productid=$request['product_id'];
             $product=Product::where('id',$productid)->first();
             //dd($product);
             $data=[
                 'quote_id'=>$quote_id,
                 'product_id'=>$productid,
                 'name'=>$product->Name,
                 'sku'=>$product->Sku,
                 'price'=>fetch_price($product),
                 'qty'=>$quantity,
                 'row_total'=>$quantity*fetch_price($product),
                 'custom_option'=>$attvalue??null,];
                 $quteitem  = Quote_item::where('product_id', $request['product_id'])->where('quote_id', $quote_id)->first();
                // dd($quteitem);
                 
                 if ($quteitem) {    
                    $id        = $quteitem->id; 
                    $qty       = $quteitem->qty;
                    $total     = $quantity + $qty;
                    $row_total = $total *fetch_price($product);
                    $update = [
                        "qty"       => $total,
                        "row_total" => $row_total
                    ];
                    Quote_item::where('id', $id)->update($update);
                } else {
                    $row_total = $quantity * fetch_price($product);
                    $insert['row_total'] = $row_total;
                    $show =  Quote_item::create($data);
                
                }
                $subtotal=sub_total($quote_id);
       
                $update = [
                    'subtotal' => (float)$subtotal,   
                ];

                if(auth()->user()){
                    $update['user_id'] = auth()->user()->id; 
                }
                Quote::where('id',$quote_id)->update($update);
            
             
             return redirect()->back()->with('message','Product added');

    }}
    
    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        //  dd($data);

         $quoteitem = Quote_item::select('price', 'quote_id')->where('id', $id)->first();
        $quote = Quote::where('id', $quoteitem->quote_id)->first();
        $price = $quoteitem->price;
        $qty = $data['quantity'];
        $total = $qty * $price;
        $update = [
            "qty" => $qty,
            "row_total" => $total
        ];
        Quote_item::where('id', $id)->update($update);
        $sub_total=sub_total($quote->id);
        $update=[
            'subtotal'=>$sub_total,
        ];
        Quote::where('id',$quote->id)->update($update);
        return redirect()->back( );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { //dd($id);
        $quote= Quote_item::find($id);
        $quote_id=$quote->quote_id ;
        $cart=Quote::where('id',$quote_id)->first();
        $cpon_discount=$cart->coupan_discount;
         $quote->delete();
        $subtotal=sub_total($quote_id);
         if($cpon_discount !=null){
            $total=$subtotal - $cpon_discount;
        }else{
            $total =$subtotal-0;
        }
         $update=[
            'subtotal'=>$subtotal, 
            'total'=>$total,  
         ];
         quote::where('id',$quote_id)->update($update);
        return redirect()->back()->with('message','Cartitem Deleted Successfully');

    }

    public function coupon(request $request){
       // dd($request->all());
       $coupon= Coupan::where('coupon_code',$request['coupon_code'])->first();
        if($coupon){
            $current=now();
            if($current->between($coupon->valid_from,$coupon->valid_to)){
                $quote= Quote::where('id',$request['quote_id'])->first();
             if($quote->subtotal > $coupon->discount_amount){
              $subtotal=  $quote->subtotal;
              $discount_ammount=$coupon->discount_amount;
              $total=$subtotal-$discount_ammount;
              //dd($total);
              $update=[
                'coupan'=>$coupon->coupon_code,
                'coupan_discount'=>$coupon->discount_amount,
                'total'=>$total,
              ];
              Quote::where('id',$request['quote_id'])->update($update);
              return redirect()->back();
            }else{
                return redirect()->back()->with('error','coupan not applicable'); 
            }






            }else{
                return redirect()->back()->with('error','coupan has expaired'); 
            }
        }else{
            return redirect()->back()->with('error','Invalid coupan');
        }
      
        
    }

    public function cancelcoupon(request $request){
       // dd($request->all());

        $update=[
            'coupan'=>null,
            'coupan_discount'=>null,
            'total'=>null,
        ];
        Quote::where('id',$request['quote_id'])->update($update);
        return redirect()->back();

    }
}
