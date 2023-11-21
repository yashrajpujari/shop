<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $blocks=Block::all();
        return view('admin/block.index',compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/block.create');
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
            'image'=>'required',
            'discription'=>'required',
        ]);
        $data=$request->all();
        $identifier = Str::slug($data['name']);
        $i = 1;
        while (Block::where('identifier', $identifier)->exists()) {
            $identifier = Str::slug($data['name']) . '-' . $i;
            $i++;
        }
        $data['identifier'] = $identifier;

        $Block=Block::create($data);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $Block->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('block.index')->with('message','Block Added Successfully...');
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
    {   $blockdata=Block::where('id',$id)->first();
        return view('admin/block.edit',compact('blockdata'));
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
            'status'=>'required',
            'discription'=>'required',
        ]);
        $data=$request->except(['_token','_method','image']);
        Block::where('id',$id)->update($data);
        $block=Block::find($id);

         if($request->hasFile('image') && $request->file('image')->isValid()){
            $block->ClearMediaCollection('image');
            $block->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('block.index')->with('message','Block Edited Successfully...');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    Block::where('id',$id)->delete();
        Media::where('model_id',$id)->delete();
        return redirect()->route('block.index')->with('message','Block Deleted Successfully...');
        
    }

    public function deleteblock(Request $request)
    {    $blocks=$request['check'];
        
        if(!empty($blocks)){
            foreach($blocks as $block){
                $delblock=Block::find($block);
                $delblock->ClearMediaCollection('image');
                $delblock->delete();
            }
        }
        
        return redirect()->route('block.index')->with('message','Block Edited Successfully...');
        
    }
}
