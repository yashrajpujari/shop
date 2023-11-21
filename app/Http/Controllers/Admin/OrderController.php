<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Order_address;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
 public function index( Request $request){
    if ($request->ajax()) {
        $data = Order::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('user', function ($row) {
                return $row->user->name??null;
            })
            ->addColumn('action', function($row){
                $actionBtn = '<a href="'.route('orderview',$row->id).'" class="edit btn btn-success btn-sm">view</a> ';
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

    return view('admin/orders.index');
 }

 public function orderview($id){
    $order = Order::where('id', $id)->first();
    $order_id=$order->id;
    $order_item=Order_item::where('order_id',$order_id)->get();
    $order_addr=Order_address::where('order_id',$order_id)->get();
    return view('admin/orders.view',compact('order','order_item','order_addr'));
 }


  
}
