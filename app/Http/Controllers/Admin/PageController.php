<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $pages=Page::all();
        return view('admin/page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $pages=Page::all();
        return view('admin/page.create',compact('pages'));
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
            'parentpage_id'=>'required',
            'name'=>'required',
            'status'=>'required',
            'show_in_menu'=>'required',
            'show_in_footer'=>'required',
            'Description'=>'required',
            'meta_teg'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
            'image'=>'required',
        ]);
        $data=$request->all();
        $urlkey=strtolower($request['name']);
        if(Page::where('url_key',$urlkey)->exists()){
            $urlkey=str_replace(" ","/",$urlkey).rand(0,100);
            $data['url_key']=$urlkey;
            $page= Page::create($data);
            
        }else{
            $urlkey=str_replace(" ","/",$urlkey);
            $data['url_key']=$urlkey;
            $page= Page::create($data);
            
        }
        if($request->hasFile('image') && $request->file('image')->isValid()){
         $page->addMediaFromRequest('image')->toMediaCollection('image');
     }
       
       
        return redirect()->route('page.index')->with('message','Page Added Successfully...');
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
        $pagedata =Page::where('id',$id)->first();
        $page=Page::all();

        return view('admin/page.edit',compact('pagedata','page'));

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
            'parentpage_id'=>'required',
            'name'=>'required',
            'status'=>'required',
            'show_in_menu'=>'required',
            'show_in_footer'=>'required',
            'description'=>'required',
            'meta_teg'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',
            
        ]);
       
        $data=$request->except(['_token','_method','image']);
        Page::where('id',$id)->update($data);
        $updatedpage=Page::find($id);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $updatedpage->ClearMediaCollection('image');
            $updatedpage->addMediaFromRequest('image')->toMediaCollection('image');}
         return redirect()->route('page.index')->with('message','Page Edited Successfully...');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        page::where('id',$id)->delete();
        Media::where('model_id',$id)->delete();
        return redirect()->route('page.index')->with('message','Page Deleted Successfully...');
    }
    public function pagedelete(Request $request)
    {
        $pages=$request['check'];
        
        if(!empty($pages)){
            foreach($pages as $page){
                $deletepage=Page::find($page);
                $deletepage->ClearMediaCollection('image');
                $deletepage->delete();
            }
            
        }
        
       
        return redirect()->route('page.index')->with('message','Page Deleted Successfully...');
    }
    
}
