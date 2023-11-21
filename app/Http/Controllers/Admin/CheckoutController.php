<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_address;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Quote;
use App\Models\Quote_item;
use Illuminate\Support\Str;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $cartId = session('cart_id');
        $quotee=Quote::where('cart_id',$cartId)->with('Quoteitem')->first();
        //dd($quotee);
        return view('frontend.checkout',compact('quotee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
      
        if($request['firstname']!=null){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'address'=>'required',
            'pincode'=>'required',
            'country'=>'required',
            'city'=>'required',
            'state'=>'required',
            'phone'=>'required',
            'optional_address'=>'required',
            'payment_method'=>'required',
            'shipping_method'=>'required',
        ]);}
         $data=$request->all();
       
         $cartId = session('cart_id');

         $quotee = Quote::where('cart_id', $cartId)->with('Quoteitem')->first();
         $cart_id=$quotee->id;
        
         if($data['shipping_method']==100){
            $shipping='Priority or Express Shipping';
        }elseif($data['shipping_method'] == 40){
            $shipping = "Expedited Shipping";
        }elseif($data['shipping_method'] == 200){
            $shipping = "Same-Day or Next-Day Delivery";
        }
        else{
            $shipping = "Standard Shipping";
        }
        $total=$quotee->total+$data['shipping_method'];
        // dd(sub_total($cart_id));
        $name=$request['firstname'].$request['lastname'];
        
        $lastOrder = Order::orderBy('order_increment_id', 'desc')->first();
        // dd($lastOrder);
        if ($lastOrder) {
            $lastId = (int)Str::substr($lastOrder->order_increment_id, -7);
            $orderIncrementId = Str::padLeft($lastId + 1, 7, '0');
        } else {
            $orderIncrementId = '1000000';
        }
        if(($request['savedbilling'])&&($request['savedbilling']!=='newaddress')){
          // dd($orderIncrementId);
            $request->validate([
                'shipping_method'=>'required',
                'payment_method'=>'required',
            ]);
           
            $billing=Order_address::where('id',$request['savedbilling'])->first();
           // dd($orderIncrementId);
            //dd($billing);
            $billing_address=[
               
                'user_id'=>$billing->user_id,
                'name'=>$billing->name,
                'email'=>$billing->email,
                'phone'=>$billing->phone,
                'address'=>$billing->address,
                'address2'=>$billing->address_2, 
                'country'=>$billing->country,
                'state'=>$billing->state,
                'subtotal'=>sub_total($cart_id),
                'city'=>$billing->city,
                'pincode'=>$billing->pincode,
                'state'=>$billing->state, 
                'coupan'=>$quotee->coupon_code??null,
                'coupan_discount'=>$quotee->coupan_discount??0,
                'total'=>$total,
                'shipping_cost'=>$data['shipping_method'],
                'payment_method'=>$data['payment_method'],
                'shipping_method'=>$shipping,  
            ];
            $billing_address['order_increment_id']=$orderIncrementId;
           
           //dd($billing_address);
            
            $order=Order::create($billing_address);
            
        }
       else{
           $order= Order::create([
            'order_increment_id'=>$orderIncrementId,
                'user_id'=>auth()->user()->id??0,
                'name'=>$name,
                'email'=>$data['email'],
                'phone'=>$data['phone'],
                'address'=>$data['address'],
                'address2'=>$data['optional_address'],
                'country'=>$data['country'],
                'state'=>$data['state'],
                'subtotal'=>sub_total($cart_id),
                'city'=>$data['city'],
                'pincode'=>$data['pincode'],
                'state'=>$data['state'],
                'coupan'=>$quotee->coupon_code??null,
                'coupan_discount'=>$quotee->coupan_discount??0,
                'total'=>$total,
                'shipping_cost'=>$data['shipping_method'],
                'payment_method'=>$data['payment_method'],
                'shipping_method'=>$shipping,
            ]);}
            $order_id=$order->id;
            $quoteitem=Quote_item::where('quote_id',$cart_id)->get();
         // dd($quoteitem);
        foreach($quoteitem as $item){
            $product_id=$item->product_id;
            $create=[
                'order_id'=>$order_id,
                'product_id'=>$product_id,
                'name'=>$item->name,
                'sku'=>$item->sku, 
                'qty'=>$item->qty,
                'row_total'=>$item->row_total,
                'custom_option'=>$item->custom_option??'black',
                'price'=>$item->price,

            ];
            Order_item::create($create);
        }   
            if($request['firstname']){
               // dd($request['firstname']);
            $creat1=[
            'order_id'=>$order_id,
            'user_id'=>auth()->user()->id??0,
            'name'=>$name,
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'address'=>$request['address'],
            'address_2'=>$request['optional_address'],
            'city'=>$request['city'],
            'state'=>$request['state'],
            'country'=>$request['country'],
            'pincode'=>$request['pincode'],
            'address_type'=>'billingaddress',
            ];
            Order_address::create($creat1);
           

        if($request['shippingaddress']=='shippingaddress'){
            $name2=$request['s_name'].$request['sl_name'];
            $create=[
                'order_id'=>$order_id,
                'user_id'=>auth()->user()->id??0,
                'name'=>$name2,
                'email'=>$request['s_email'],
                'phone'=>$request['s_phone'],
                'address'=>$request['s_adddress'],
                'address_2'=>$request['s_adddress2'],
                'city'=>$request['s_city'],
                'state'=>$request['s_state'],
                'country'=>$request['s_country'],
                'pincode'=>$request['s_pincode'],
                'address_type'=>'shippingaddress',
            ];
            Order_address::create($create);
        }else{
            $creat1['address_type']='shippingaddress';
            Order_address::create($creat1);
          
        }}
        if(($request['savedbilling'])&&($request['savedbilling']!=='newaddress')){
           // dd($request['savedbilling']);
            $billing=Order_address::where('id',$request['savedbilling'])->first();
            $shipping_address=[
                'order_id'=>$order_id,
                'user_id'=>$billing->user_id,
                'name'=>$billing->name,
                'email'=>$billing->email,
                'phone'=>$billing->phone,
                'address'=>$billing->address,
                'address_2'=>$billing->address_2,
                'city'=>$billing->city,
                'state'=>$billing->state,
                'country'=>$billing->country,
                'pincode'=>$billing->pincode,
                'address_type'=>'billingaddress',
            ];
            $order=Order_address::create($shipping_address);
           

        } if($request['savedshipping']){
            $shipping=Order_address::where('id',$request['savedshipping'])->first();
            $shipping_address=[
                'order_id'=>$order_id,
                'user_id'=>$shipping->user_id,
                'name'=>$shipping->name,
                'email'=>$shipping->email,
                'phone'=>$shipping->phone,
                'address'=>$shipping->address,
                'address_2'=>$shipping->address_2,
                'city'=>$shipping->city,
                'state'=>$shipping->state,
                'country'=>$shipping->country,
                'pincode'=>$shipping->pincode,
                'address_type'=>'shippingaddress', 
            ];
            $order=Order_address::create($shipping_address);
            $add=Order_address::orderby('id','desc')->first();
           // dd($add);
        }

        
        Quote::where('cart_id',$cartId)->delete();
        Quote_item::where('quote_id',$cart_id)->delete();
       // Mail::to('yashpujari4444@gmail.com')->send(new OrderMail($order));
        $request->session()->forget('cart_id');
        return redirect()->route('success');
        
       
    }

    /**
     * Display the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function success(){
        $order = Order::orderBy('id', 'desc')->first();
        $order_id=$order->id;
        $order_item=Order_item::where('order_id',$order_id)->get();
        $order_addr=Order_address::where('order_id',$order_id)->get();
        
        return view('frontend.success',compact('order','order_item','order_addr'));
    }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


   
 
}
