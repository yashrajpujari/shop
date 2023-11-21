<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return $product;
    }

    public function store(Request $request){
        $product = Product::create($request->all());
        if ($request->hasFile('Thumbnail') && $request->file('Thumbnail')->isValid()) {
            $product->addMediaFromRequest('Thumbnail')->toMediaCollection('Thumbnail');
        }
        if ($request->hasfile('Banner_Image')) {
            foreach ($request->file('Banner_Image') as $image) {

                if ($image->isvalid()) {
                    $product->addMedia($image)->toMediaCollection('Banner_Image');
                }
            }
        }
        return $product;
    }

    public function update(request $request ,$id){
       $product= Product::where('id',$id)->update([
            'Name' => $request->input('name'),
            'Status' => $request->input('status'),
            'Is_Featured' =>$request->input('is_featured'),
            'Sku' => $request->input('sku'),
            'Qty' => $request->input('qty'),
            'Stock_Status' =>$request->input('stock_status'),
            'Weight' => $request->input('weight'),
            'Price' => $request->input('price'),
            'Short_Description' => $request->input('short_description'),
            'Description' =>$request->input('description'),
            'Meta_Tag' =>$request->input('meta_tag'),
            'Meta_title' =>$request->input('meta_title'),
            'Meta_Description' =>$request->input('meta_description'),
        ]);

        return ['status'=>'success','message'=>'product updated successfully','data'=>$product];
    }
}
