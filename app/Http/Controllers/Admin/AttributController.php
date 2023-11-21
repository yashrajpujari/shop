<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Attributevalue;
use Illuminate\Support\Str;

class AttributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $attributes=Attribute::all();
        return view('admin/attribute.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/attribute.create');
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
            'name'=>'required',
            'status'=>'required',
            'Is_variant'=>'required',
        ]);
        $data = $request->only('name','status','Is_variant');
        $name_key = preg_replace('/[^A-Za-z0-9\-]/', '', $data['name']);
        $name_key = Str::slug($name_key);
        $i = 1;
        while (Attribute::where('name_key', $name_key)->exists()) {
            $name_key = preg_replace('/[^A-Za-z0-9\-]/', '', $data['name']);
            $name_key = Str::slug($name_key) . '-' . $i;
            $i++;
        }
        $data['name_key']=$name_key;
        $attribute=Attribute::create($data);
        foreach ($request['attributename'] as $name => $aname) {
          
            $attributevalues = [
                'attribute_id'=>$attribute->id,
                'name' => $aname,
                'status' => $request['attributestatus'][$name],
                
                

            ];
            if (!empty($aname) && !empty($request['attributestatus'][$name]) ) {
                Attributevalue::create($attributevalues);
            } else {
                return redirect()->route('attribute.create')->with('message', 'All Field Required');
            }
 
        }
        return redirect()->route('attribute.index')->with('message', 'Attribute Added Successfully ...');
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
    {   $attribute=Attribute::where('id',$id)->first();
      $attributevalues=Attributevalue::where('attribute_id',$id)->get();
        return view('admin/attribute.edit',compact('attribute','attributevalues'));
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
            'name' => 'required',
            'status' => 'required',
            'Is_variant' => 'required',

        ]);
        
        $data=$request->only('name','status','Is_variant');
        Attribute::where('id',$id)->update($data);
        $c_id=$request['value_id'];
        $deletvalue = Attributevalue::whereNotIn('id',$c_id??[0] )->where('attribute_id',$id)->delete();
       
        foreach ($request['attributename']??[0] as $name => $aname) {
            $value_id=$request['value_id'][$name]??null;
            
            $attributevalues = [
                'attribute_id'=>$id,
                'name' => $aname,
                'status' => $request['attributestatus'][$name]??null,
                
                

            ];
            if($value_id){
                Attributevalue::where('id',$value_id)->update($attributevalues);
              }elseif(!empty($aname) && !empty($request['attributestatus'][$name])){
           
                Attributevalue::create($attributevalues);

             }
          
        }


        return redirect()->route('attribute.index')->with('message', 'Attribute Edited Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::where('id',$id)->delete();
        Attributevalue::where('attribute_id',$id)->delete();
        return redirect()->route('attribute.index')->with('message', 'Attribute Deleted Successfully...');
    }
    public function deleteattribute(Request $request)
    {
        $products=$request['check'];
    
        Attribute::wherein('id',$products)->delete();
          
        
        
       
        return redirect()->route('attribute.index')->with('message','Attribute Deleted Successfully...');
    }
}
