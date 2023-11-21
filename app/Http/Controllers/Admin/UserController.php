<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    { 
        $role = Role::all();
        $users = User::all();
        if ($request->ajax()) {
            $data = User::where('is_admin',1)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('roles', function($row){
                    return implode(",", $row->roles->pluck('name')->toArray());
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('user.edit',$row->id).'" class="edit btn btn-success btn-sm">Edit</a> ';
                    $actionBtn=$actionBtn.
                    '<form action="'.route('user.destroy',$row->id).'"method="post" style="display:inline-block; ">
                   <input type="hidden" name="_token" value="'.csrf_token().'">
                   <input type="hidden" name="_method" value="delete">
                   <button type="submit"  class="edit btn btn-danger btn-sm">Delete</button>
                    </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin/user.index', compact('users', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin/user.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $password = Hash::make($request['password']);
        $data = $request->except('password');
        $data['password'] = $password;
        $data['is_admin']= 1 ;
       // dd($data);
        $user = User::create($data);
        $user->syncroles($request->input('role'));
        return redirect()->route('user.index')->with('message', 'User Added Successfully...');
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
        $roles = Role::all();
        $userdata = User::where('id', $id)->first();
        return view('admin/user.edit', compact('userdata', 'roles'));
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
            'email' => 'required',

        ]);
        $data = $request->except(['_token', '_method', 'role']);
        if (isset($data['password'])) {
            $password = Hash::make($data['password']);
            $data['password'] = $password;
            User::where('id', $id)->update($data);
            $user = User::find($id);
            $user->syncroles($request->input('role'));
        } else {
            User::where('id', $id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
            $user = User::find($id);
            $user->syncroles($request->input('role'));
        } 
        return redirect()->route('user.index')->with('message', 'User Edited Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        User::where('id', $id)->delete();
        return redirect()->route('user.index')->with('message', 'User Added Successfully...');
    }

    public function login()
    {
        return view('admin/login.index');
    }

    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('email', 'password');
        $data['is_admin']=1;
        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('message', 'Please Check Your Credentials !!!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }



    
}
