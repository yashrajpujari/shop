<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InquiryNotification;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {


        if ($request->ajax()) {
            $data = Inquiry::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm">Edit</a> ';
                    $actionBtn = $actionBtn .
                        '<form action="' . route('contact.destroy', $row->id) . '"method="post" style="display:inline-block; ">
                   <input type="hidden" name="_token" value="' . csrf_token() . '">
                   <input type="hidden" name="_method" value="delete">
                   <button type="submit"  class="edit btn btn-danger btn-sm">Delete</button>
                    </form>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $user=User::all();
        $data = $request->all();
        Inquiry::create($data);
        Notification::send($user, New InquiryNotification($request->name));
        return redirect()->route('contactus')->with('message', 'We Will Contact you Shortly....');
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
        Inquiry:: where('id',$id)->delete();
        return redirect()->route('contact.index')->with('success', 'Record has been Deleted Successfully..');

    }

    public function contactus(){
        return view('frontend.contact');    }
}
