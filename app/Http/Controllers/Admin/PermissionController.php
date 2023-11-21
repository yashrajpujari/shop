<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $permissions=Permission::paginate('5');
        return view('admin/permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->name as $name){
          

            if(!empty($name)){
                $data=[
                    'name'=>$name,
                    'guard_name'=>'web',
                ];
                Permission::create($data);
                

            }else{
                return redirect()->route('permission.create')->with('message','Name is Required');
            }
        }
        return redirect()->route('permission.index')->with('message','Permission Added Successfully...');
        
       
       
       
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
        $permission_data=Permission::where('id',$id)->first();
        return view('admin/permission.edit',compact('permission_data'));
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
            'name'=>'required',
        ]);
      
        $data = $request->except(['_token','_method']);
      
        Permission::where('id',$id)->update($data);
        return redirect()->route('permission.index')->with('message','Permission Edited Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::where('id',$id)->delete();
        return redirect()->route('permission.index')->with('message','Permission Deleted Successfully...');
    }
    public function searchPermission(Request $request)
    {
        $permission = $request->input('permission');
        $permissions = Permission::where('name', 'LIKE', '%' . $permission . '%')->get();
        $i = 1;
        $tablerow = "";
    
        foreach ($permissions as $permission) {
            $tablerow .= ' <tr>
            <td><strong>'.$i++.'</strong></td>
          <td><strong>'.$permission->name.'</strong></td>
          <td>'.$permission->guard_name.'</td>
         
          <td style="display: flex; justify-content:end; align-items:center;">
            <a href="'.route('permission.edit',$permission->id).'" class="edit">Edit</a>
        <button formaction= "'.route('permission.destroy',$permission->id).'" method="post"class="delete">Delete</button>
          
          </td>
        </tr>';
           
        }
    
        return $tablerow;
    }
    
    
}
