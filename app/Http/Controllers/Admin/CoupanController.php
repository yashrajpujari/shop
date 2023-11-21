<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Coupan;


class CoupanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $coupans=Coupan::all();
      
        return view('admin/coupan.index',compact('coupans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/coupan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'title'=>'required',
            'status'=>'required',
            'valid_from'=>'required',
            'valid_to'=>'required',
            'coupon_code'=>'required|unique:coupans',
            'discount_amount'=>'required',
        ]);
        $data=$request->all();
        $data['coupon_code']=strtolower($data['coupon_code']);
        $data['coupon_code']=str_replace(' ','',$data['coupon_code']);
        //dd($data);
        Coupan::create($data);
        return redirect()->route('coupan.index')->with('message','Coupan added Successfully');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $coupan=Coupan::where('id',$id)->first();
        return view('admin/coupan.edit',compact('coupan'));
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
        $request->validate([
            'title'=>'required',
            'status'=>'required',
            'valid_from'=>'required',
            'valid_to'=>'required',
            'discount_amount'=>'required',
        ]);
        $data=$request->except(['_token','_method']);
        $data['coupon_code']=strtolower($data['coupon_code']);
        $data['coupon_code']=str_replace(' ','',$data['coupon_code']);

        if(Coupan::where('coupon_code',$data['coupon_code'])->where('id','!=',$id)->exists()){
            $data['coupon_code']=$data['coupon_code']. rand(1,9); 
        }

        Coupan::where('id',$id)->update($data);
        return redirect()->route('coupan.index')->with('message','Coupan Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupan::where('id',$id)->delete();
        return redirect()->route('coupan.index')->with('message','Coupan Deleted Successfully');  
    }
}
