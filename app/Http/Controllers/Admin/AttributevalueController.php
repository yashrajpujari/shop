<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attributevalue;
use App\Models\Attribute;

class AttributevalueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $attributevalues = Attributevalue::all();
        return view('admin/attributevalue.index',compact('attributevalues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $attributevalues = Attribute::where('status',1)->get();
        return view('admin/attributevalue.create',compact('attributevalues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        
        foreach ($request['name'] as $name => $aname) {
          
            $attributevalue = [
                'name' => $aname,
                'status' => $request['status'][$name],
                'attribute_id' => $request['attribute_id'][$name],
              
              ];
            if (!empty($aname) && !empty($request['status'][$name]) and !empty($request['attribute_id'][$name])) {
                Attributevalue::create($attributevalue);
            } else {
                return redirect()->route('attributevalue.create')->with('message', 'All Field Required');
            }

        }
        return redirect()->route('attributevalue.index')->with('message', 'Attribute Added Successfully ...');
}

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
        $attribute=Attributevalue::where('id',$id)->first();
        $attributes = Attribute::where('status',1)->get();
        return view('admin/attributevalue.edit',compact('attribute','attributes'));
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
            'name' => "required",
            'status' => "required",
            'attribute_id' => "required",
          
          ]);
          $data=$request->except(['_token','_method']);
          Attributevalue::where('id',$id)->update($data);
          return redirect()->route('attributevalue.index')->with('message', 'Attribute Edited Successfully ...');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attributevalue::where('id',$id)->delete();
        return redirect()->route('attributevalue.index')->with('message', 'Attribute Deleted Successfully ...');
    }
    public function deleteattributevalue(Request $request)
    {
        $attributevalues=$request['check']??[0];
    
        Attributevalue::wherein('id',$attributevalues)->delete();
          
        
        
       
        return redirect()->route('attributevalue.index')->with('message','Attribute Deleted Successfully...');
    }
}
