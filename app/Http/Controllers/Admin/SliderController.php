<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $sliders=Slider::all();
        return view('admin/slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slider.create');
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
            'image'=>'required',
            'discription'=>'required',
            'url'=>'required',
            'order'=>'required',
        ]);
        $data=$request->all();
      
        $slider=Slider::create($data);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $slider->addMediaFromRequest('image')->toMediaCollection('image');
        }
        return redirect()->route('slider.index')->with('message','Slider Added Successfully...');
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
        $slider=Slider::where('id',$id)->first();
        return view('admin/slider.edit',compact('slider'));
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
            'discription'=>'required',
            'url'=>'required',
            'order'=>'required',
        ]);
        $data=$request->except(['_token','_method','image']);
        Slider::where('id',$id)->update($data);
        $updatedslider=Slider::find($id);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $updatedslider->ClearMediaCollection('image');
            $updatedslider->addMediaFromRequest('image')->toMediaCollection('image');}
         return redirect()->route('slider.index')->with('message','slider Edited Successfully...');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::where('id',$id)->delete();
        Media::where('model_id',$id)->delete();
        return redirect()->route('slider.index')->with('message','Page Deleted Successfully...');
    }
    public function sliderdelete(Request $request)
    {
        $sliders=$request['check'];
    
        if(!empty($sliders)){
            foreach($sliders as $slider){
                $deleteslider=Slider::find($slider);
                $deleteslider->ClearMediaCollection('image');
                $deleteslider->delete();
            }
            
        }
        
       
        return redirect()->route('slider.index')->with('message','Slider Deleted Successfully...');
    }
}
