<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\facades\Auth;
use App\Models\Order;
use App\Models\Quote;
use App\Models\Quote_item;
use App\Models\Order_item;
use App\Models\Order_address;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;
 
use Yajra\DataTables\Facades\DataTables;


class CustomerController extends Controller
{
    //


public function customerresister(){
    return view('frontend/customersingupform');
}

public function store( Request $request){


    $request->validate([
        'username'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|same:con_password',
        'con_password' => 'required',
    ]);
    //$data=$request->all();
    $password=Hash::make($request['password']);
    $user = User::create([
        'name'=>$request['username'],
        'email'=>$request['email'],
        'password'=>$password, 
        'is_admin'=>0,
    ]);


    Mail::to($request['email'])->send(new RegistrationMail($user));

    return redirect()->back()->with('message','user created successfully');
    
    }
   

public function signin(){
    return view('frontend.signin');
}

public function login_check(Request $request){
    
    $request->validate([
        'email'=>'required',
        'password'=>'required',
       
    ]);
    $data=$request->only('email','password');
    $data['is_admin']= 0;
    if(Auth::attempt($data)){

       $quote= Quote::where('user_id',auth()->user()->id)->first();
       //dd($quote->id);
       if($quote){ 
          $a=$quote->subtotal??0;
       $item=Quote_item::where('quote_id',$quote->id)->get();
       //dd($item);
       if(session('cart_id')){ 
        $s_quote= Quote::where('cart_id',session('cart_id'))->first();
        $b=$s_quote->subtotal;
       // dd($s_quote->id);
        //dd($s_quote);
        Quote_item::where('quote_id',$quote->id)->update(
            ['quote_id'=>$s_quote->id,
           
        ]
        );
        Quote::where('cart_id',session('cart_id'))->update(['user_id'=>auth()->user()->id ,'subtotal'=>$a+$b,'total'=>$a+$b]);
        $quote->delete();

       }else{
        session(['cart_id'=>$quote->cart_id]); 
       }

      }else{
        $userId = auth()->user()->id;
      Quote::where('cart_id', session('cart_id'))->update(['user_id' => $userId]); 

      }

        return redirect()->route('myaccount');
    }else{
        return redirect()->back()->with('error','please Check your credentials');
    }
 

}
public function myaccount(){
    $userid=auth()->user()->id;
    $orders=order::where('user_id',$userid)->get();
    $user=User::where('id',$userid)->first();
    return view('frontend/myaccount.index');       
}

public function user_orders(){
    $userid=auth()->user()->id;
    $orders=order::where('user_id',$userid)->get();
    return view('frontend/myaccount.userorders',compact('orders'));
}
 
public function userdetail($id){
    $userid=auth()->user()->id;
    $user=User::where('id',$userid)->first();
    return view('frontend/myaccount.accountdetail',compact('user'));
}


public function saved_address(){
    $id=auth()->user()->id;
    $billing_address=Order_address::where('user_id',$id)->where('address_type','billingaddress')->get();
    $shipping_address=Order_address::where('user_id',$id)->where('address_type','shippingaddress')->get();

    return view('frontend/myaccount.savedaddresses',compact('billing_address','shipping_address'));
}

public function userlog_out(request $request){
    Auth::logout();
    $request->session()->forget('cart_id');
    return redirect()->route('customer/singin');
}

public function userupdate(Request $request ,$id){
    $request->validate([
        'name'=>'required',
        'email'=>'required',
    ]);
     if($request['newpassword']&&$request['c_password']){
        $request->validate([
            'newpassword'=>'required',
            'c_password'=>'required|same:newpassword',
        ]);
        user::where('id',$id)->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['newpassword']),
        ]);
     }else{
        user::where('id',$id)->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            
        ]);
        
     }
     return redirect()->back()->with('message','user edited successfully');
     

}

public function order_detail($id){
    $order = Order::where('id', $id)->first();
    $order_id=$order->id;
    $order_item=Order_item::where('order_id',$order_id)->get();
    $order_addr=Order_address::where('order_id',$order_id)->get();
    return view('frontend/myaccount.orderdetail',compact('order','order_item','order_addr'));
}
public function view($id){
    $order = Order::where('id', $id)->first();
    $order_id=$order->id;
    $order_item=Order_item::where('order_id',$order_id)->get();
    $order_addr=Order_address::where('order_id',$order_id)->get();
    return view('frontend/myaccount.orderview',compact('order','order_item','order_addr')); 
}

public function customers( request $request){

    if ($request->ajax()) {
        $data = user::where('is_admin',0)->get();
        return DataTables::of($data)
            ->addIndexColumn()
           
            ->addColumn('action', function($row){
                $actionBtn = '';
                $actionBtn=$actionBtn.
                '<form action="'.route('user.destroy',$row->id).'"method="post" style="display:inline-block; ">
               <input type="hidden" name="_token" value="'.csrf_token().'">
               <input type="hidden" name="_method" value="delete">
               <button type="submit"  class="edit btn btn-danger btn-sm">Delete</button>
                </form>
                ';
                return $actionBtn;
            })
            ->rawColumns(['action','user'])
            ->make(true);
    }
    return view('admin/customers.index');
}


}
 