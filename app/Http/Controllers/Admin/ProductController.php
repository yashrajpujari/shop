<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Support\Str;
use App\Models\Productattribute;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate('5');


        return view('admin/product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        $attributes=Attribute::with('attributevalues')->get();
       // dd($attributes);
        return view('admin/product.ceate', compact('products', 'categories','attributes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Status' => 'required',
            'Is_Featured' => 'required',
            'Sku' => 'required',
            'Qty' => 'required',
            'Stock_Status' => 'required',
            'Weight' => 'required',
            'Price' => 'required',
            'Short_Description' => 'required',
            'Description' => 'required',
            'Thumbnail' => 'required',
            'Banner_Image' => 'required',
            'Meta_Tag' => 'required',
            'Meta_title' => 'required',
            'Meta_Description' => 'required',

        ]);
        $data = $request->all();

        $url_key = Str::slug($data['Name']);
        $i = 1;
        while (Product::where('url_key', $url_key)->exists()) {
            $url_key = Str::slug($data['Name']) . '-' . $i;
            $i++;
        }

        $data['url_key'] = $url_key;


        $data['Related_Products'] = implode(', ', $request->input('Related_Products', []));

        $Product = Product::create($data);
        $attributes=$request->input('productattributes',[]);
        foreach($attributes as $attribute){
            $attribute_value_id=$attribute['attribute_id'];
            $value_id=$attribute['value_id'];
            foreach($value_id as $attrvalue){
                $addattribute=[
                    'product_id'=> $Product->id,
                    'attribute_id'=> $attribute_value_id,
                    'attribute_value_id'=> $attrvalue, 
    
                ];
                Productattribute::create($addattribute);
            } 
           
        }
         
        $Product->categories()->sync($request->input('categories'));
        if ($request->hasFile('Thumbnail') && $request->file('Thumbnail')->isValid()) {
            $Product->addMediaFromRequest('Thumbnail')->toMediaCollection('Thumbnail');
        }
        if ($request->hasfile('Banner_Image')) {
            foreach ($request->file('Banner_Image') as $image) {

                if ($image->isvalid()) {
                    $Product->addMedia($image)->toMediaCollection('Banner_Image');
                }
            }
        }
        return redirect()->route('product.index')->with('message', 'Product Added Successfully');
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
        $product = Product::where('id', $id)->first();
        $products = Product::all();
        $categories = Category::all();
        $attributes=Attribute::with('attributevalues')->get();
        $attribtevalue=Productattribute::where('product_id',$id)->get();
       //dd($attribtevalue);
        return view('admin/product.edit', compact('product', 'products', 'categories','attributes','attribtevalue'));
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
            'Name' => 'required',
            'Status' => 'required',
            'Is_Featured' => 'required',
            'Sku' => 'required',
            'Qty' => 'required',
            'Stock_Status' => 'required',
            'Weight' => 'required',
            'Price' => 'required',
            'Short_Description' => 'required',
            'Description' => 'required',
            'Meta_Tag' => 'required',
            'Meta_title' => 'required',
            'Meta_Description' => 'required',

        ]);
        //dd($request->all());
        

        $data = $request->except(['_token', '_method', 'Banner_Image', 'Thumbnail', 'Image', 'categories','productattributes']);
        $data['Related_Products'] = implode(', ', $request->input('Related_Products', []));
        $banner_image = $request['Image'] ?? [0];
        product::where('id', $id)->update($data);
        
        $product = product::find($id);

        $attributes=$request->input('productattributes',[]);
        if($attributes){
            $product_attribute= Productattribute::where('product_id',$id)->delete();
        foreach($attributes as $attribute){
            $attribute_value_id=$attribute['attribute_id'];
            $value_id=$attribute['value_id']??[];
            foreach($value_id as $attrvalue){ 
                $addattribute=[
                    'product_id'=> $product->id,
                    'attribute_id'=> $attribute_value_id,
                    'attribute_value_id'=> $attrvalue, 
    
                ];
                Productattribute::create($addattribute);
            } }
        }

        $imgdelete = Media::where('collection_name', 'Banner_Image')->wherenotin('id', $banner_image)->where('model_id', $id)->get();
        foreach ($imgdelete as $img) {
            $img->delete();
        }

        $product->categories()->sync($request->input('categories'));

        //dd($request->all());

        if ($request->hasFile('Thumbnail') && $request->file('Thumbnail')->isValid()) {
            $product->ClearMediaCollection('Thumbnail');
            $product->addMediaFromRequest('Thumbnail')->toMediaCollection('Thumbnail');
        }
        if ($request->hasfile('Banner_Image')) {
            foreach ($request->file('Banner_Image') as $image) {

                if ($image->isvalid()) {
                    $product->addMedia($image)->toMediaCollection('Banner_Image');
                }
            }
        }

        return redirect()->route('product.index')->with('message', 'product Edited Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('id', $id)->delete();
        Media::where('model_id', $id)->delete();
        return redirect()->route('product.index')->with('message', 'Product Deleted Successfully...');
    }
    public function productdelete(Request $request)
    {
        $products = $request['check'];

        if (!empty($products)) {
            foreach ($products as $product) {
                $deleteproduct = Product::find($product);
                $deleteproduct->ClearMediaCollection('Thumbnail');
                $deleteproduct->ClearMediaCollection('Banner_Image');
                $deleteproduct->delete();
            }
        }


        return redirect()->route('product.index')->with('message', 'product Deleted Successfully...');
    }

    public function searchproduct(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('Name', 'LIKE', "%$search%")->get();
        $i = 1;
        $tableRows = '';

        foreach ($products as $product) {


            $tableRows .= '<table class="table table-striped my-1" style="text-align:center;">
               <thead>
                   <tr>
                       <th><input class="form-check-input" name="role[]" type="checkbox" value="4" id="defaultCheck3"></th>
                       <th>sr.no</th>
                       <th>Product Name</th>
                       <th>Status</th>
                       <th>Thumbnail</th>
                       <th>Category</th>
                       <th>Stock Status</th>
                       <th>Price</th>
                       <th>Qty</th>
                       <th>Url_Key</th>
                       <th style="width:10%">Actions</th>
                   </tr>
               </thead>
               <tbody class="table-border-bottom-0">';

            foreach ($products as $product) {
                $tableRows .= '<tr>
                       <td><input class="form-check-input" name="check[]" type="checkbox" value="' . $product->id . '" id="defaultCheck3"></td>
                       <td><strong>' . $i++ . '</strong></td>
                       <td>' . $product->Name . '</td>
                       <td>' . (($product->Status == 1) ? "Active" : "Inactive") . '</td>
                       <td><img src="' . $product->getfirstmediaurl('Thumbnail') . '" style="height:50px"></td>
                       <td></td>
                       <td>
                       <span class="' . (($product->Stock_Status === 'outofstock') ? 'text-danger' : 'text-success') . '">
                       ' . $product->Stock_Status . '
                   </span> 
                       </td>
                       <td>' . $product->Price . '</td>
                       <td>' . $product->Qty . '</td>
                       <td>' . $product->url_key . '</td>
                       <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
                           <a href="' . route('product.edit', $product->id) . '" class="edit">Edit</a>
                           <button type="submit" class="delete" formaction="' . route('product.destroy', $product->id) . '" formmethod="post">Delete</button>
                       </td>
                   </tr>';
            }
            // $tableRows .='  <div class="d-flex m-3" style ="justify-content: end;">
            //'.$products->links().'</div>';

            return $tableRows;
        }
    }
    public function getproduct_by_stock_status(Request $request)
    {
        $productStatus = $request->input('ProductStock');
        $products = Product::where('Stock_status', $productStatus)->get();
        $i = 1;
        $tableRows = '';

        foreach ($products as $product) {
            $stockStatus = $product->Stock_Status;
            $isOutOfStock = ($stockStatus == 'outofstock');

            $tableRows .= '<table class="table table-striped my-1" style="text-align:center;">
                <thead>
                    <tr>
                        <th><input class="form-check-input" name="role[]" type="checkbox" value="4" id="defaultCheck3"></th>
                        <th>sr.no</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th>Stock Status</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Url_Key</th>
                        <th style="width:10%">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">';

            foreach ($products as $product) {
                $tableRows .= '<tr>
                        <td><input class="form-check-input" name="check[]" type="checkbox" value="' . $product->id . '" id="defaultCheck3"></td>
                        <td><strong>' . $i++ . '</strong></td>
                        <td>' . $product->Name . '</td>
                        <td>' . (($product->Status == 1) ? "Active" : "Inactive") . '</td>
                        <td><img src="' . $product->getfirstmediaurl('Thumbnail') . '" style="height:50px"></td>
                        <td></td>
                        <td>
                            <span class="' . ($isOutOfStock ? 'text-danger' : 'text-success') . '">
                                ' . $stockStatus . '
                            </span>
                        </td>
                        <td>' . $product->Price . '</td>
                        <td>' . $product->Qty . '</td>
                        <td>' . $product->url_key . '</td>
                        <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
                            <a href="' . route('product.edit', $product->id) . '" class="edit">Edit</a>
                            <button type="submit" class="delete" formaction="' . route('product.destroy', $product->id) . '" formmethod="post">Delete</button>
                        </td>
                    </tr>';
            }
            // $tableRows .='  <div class="d-flex m-3" style ="justify-content: end;">
            //'.$products->links().'</div>';

            return $tableRows;
        }

        // Return the generated table rows

    }
    public function getproduct_by_status(Request $request)
    {
        $productStatus = $request->input('hh');
        $products = Product::where('status', $productStatus)->get();
        $i = 1;
        $tableRows = '';

        foreach ($products as $product) {
            $stockStatus = $product->Stock_Status;
            $isOutOfStock = ($stockStatus == 'outofstock');

            $tableRows .= '<table class="table table-striped my-1" style="text-align:center;">
                <thead>
                    <tr>
                        <th><input class="form-check-input" name="role[]" type="checkbox" value="4" id="defaultCheck3"></th>
                        <th>sr.no</th>
                        <th>Product Name</th>
                        <th>Status</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th>Stock Status</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Url_Key</th>
                        <th style="width:10%">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">';

            foreach ($products as $product) {
                $tableRows .= '<tr>
                        <td><input class="form-check-input" name="check[]" type="checkbox" value="' . $product->id . '" id="defaultCheck3"></td>
                        <td><strong>' . $i++ . '</strong></td>
                        <td>' . $product->Name . '</td>
                        <td>' . (($product->Status == 1) ? "Active" : "Inactive") . '</td>
                        <td><img src="' . $product->getfirstmediaurl('Thumbnail') . '" style="height:50px"></td>
                        <td></td>
                        <td>
                            <span class="' . ($isOutOfStock ? 'text-danger' : 'text-success') . '">
                                ' . $stockStatus . '
                            </span>
                        </td>
                        <td>' . $product->Price . '</td>
                        <td>' . $product->Qty . '</td>
                        <td>' . $product->url_key . '</td>
                        <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
                            <a href="' . route('product.edit', $product->id) . '" class="edit">Edit</a>
                            <button type="submit" class="delete" formaction="' . route('product.destroy', $product->id) . '" formmethod="post">Delete</button>
                        </td>
                    </tr>';
            }
            // $tableRows .='  <div class="d-flex m-3" style ="justify-content: end;">
            //'.$products->links().'</div>';

            return $tableRows;
        }

        // Return the generated table rows

    }
}
