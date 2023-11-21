<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productattribute;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin/category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_category', 0)->get();

        return view('admin/category.create', compact('categories'));
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
            'parent_category' => 'required',
            'name' => 'required',
            'status' => 'required',
            'show_in_menu' => 'required',
            'shortDescription' => 'required',
            'Description' => 'required',
            'meta_teg' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'image' => 'required',
            'bannerimage' => 'required',
        ]);
        $data = $request->all();
        $url_key = Str::slug($data['name']);
        $i = 1;
        while (Category::where('url_key', $url_key)->exists()) {
            $identifier = Str::slug($data['name']) . '-' . $i;
            $i++;
        }
        $data['url_key'] = $url_key;
        $category = category::create($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->addMediaFromRequest('image')->toMediaCollection('image');
        }
        if ($request->hasFile('bannerimage') && $request->file('bannerimage')->isValid()) {
            $category->addMediaFromRequest('bannerimage')->toMediaCollection('bannerimage');
        }

        return redirect()->route('category.index')->with('message', 'Category Added Successfully...');
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
        $category = Category::where('id', $id)->first();
        $categories = Category::all();
        return view('admin/category.edit', compact('category', 'categories'));
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
            'parent_category' => 'required',
            'name' => 'required',
            'status' => 'required',
            'show_in_menu' => 'required',
            'shortDescription' => 'required',
            'Description' => 'required',
            'meta_teg' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',

        ]);
        $data = $request->except(['_token', '_method', 'image', 'bannerimage']);
        category::where('id', $id)->update($data);
        $category = category::find($id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->ClearMediaCollection('image');
            $category->addMediaFromRequest('image')->toMediaCollection('image');
        }
        if ($request->hasFile('bannerimage') && $request->file('bannerimage')->isValid()) {
            $category->ClearMediaCollection('bannerimage');
            $category->addMediaFromRequest('bannerimage')->toMediaCollection('bannerimage');
        }

        return redirect()->route('category.index')->with('message', 'Category Added Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id', $id)->delete();
        Media::where('model_id', $id)->delete();
        return redirect()->route('category.index')->with('message', 'Category Delete Successfully...');
    }
   
   
   
   
    public function get_product_by_category($url_key, request $request)
    {   
        
        $category = Category::where('url_key', $url_key)->first();
      
        $categories_id = $category->id;
        $products = $category->products;
        $productId=$category->products->pluck('id')->all();
       // dd($products);
       $attribute =$request->input('attribute',[]);
       // dd($attribute);
       $minPrice = $request->input('min_price');
       $maxPrice = $request->input('max_price');
       $att = [];
       //dd($attribute);
       $attributeValues = [];
       foreach($attribute as $key => $_attribute){
           $att[$key] = $_attribute;
         $_attribute = Productattribute::where('attribute_id',$key)->whereIn('attribute_value_id',$_attribute)->pluck('product_id')->toArray();
       //   dd($_attribute);
       $attributeValues[] = $_attribute;
       //dd($_attribute);
       //dd($attributeValues);
       }
       //print_r($attributeValues);


       if ($minPrice !== null && $maxPrice !== null && $attribute!==[]) {
        $products =  $category->products()->whereBetween('Price', [$minPrice, $maxPrice])->get();
        $products = $category->products()
        ->whereIn('products.id', $_attribute)
        ->get();
          //dd($products);
         
           // dd($productDatas);
           // dd($productData);
       }elseif ($minPrice !== null && $maxPrice !== null) {
        $products =  $category->products()->whereBetween('Price', [$minPrice, $maxPrice])->get();

       // dd($products);


       }else {
           $products = $category->products()->get();
          // dd('laxman');
       }
       // dd($request);










        return view('frontend.shop', compact('products', 'categories_id', 'category','productId'));
    }


    public function categoryProduct(Request $request)
    {
        $max = $request->input('max');
        $min = $request->input('min');
        $urlkey = $request->input('urlkey');
        $category = Category::where('url_key',$urlkey)->first();
        $productdata = $category->products();
        $productss = $productdata->whereBetween('Price', [$min, $max])->get(); 
        

    //dd($productss);
        $rowHtml = '<div class="row">';
    
        foreach ($productss as $product) {
            
            
            $rowHtml .= '<div class="col-xl-4 col-sm-6 col-12 my-3">';
            $rowHtml .= '<div class="product-default-single-item product-color--golden">';
            $rowHtml .= '<div class="image-box">';
            $rowHtml .= '<a href="' . route('products', $product->url_key) . '" class="image-link">';
            $rowHtml .= '<img src="' . $product->getFirstMediaUrl('Thumbnail') . '" alt="">';
            $rowHtml .= '<img src="' . $product->getFirstMediaUrl('Thumbnail') . '" alt="">';
            $rowHtml .= '</a>';
            $rowHtml .= '<div class="action-link" style="bottom:75px !important">';
            $rowHtml .= '<div class="action-link-left">';
            $rowHtml .= '<form action="' . route('cart.store') . '" method="post">';
            $rowHtml .= csrf_field();
            $rowHtml .= '<input type="hidden" value="' . $product->id . '" name="product_id">';
            $rowHtml .= '<button class="addtocartbtn" type="submit" style="color:white;border:none;">Add to Cart</button>';
            $rowHtml .= '</form>';
            $rowHtml .= '</div>';
            $rowHtml .= '<div class="action-link-right">';
            $rowHtml .= '<form action="' . route('mywishlist.store') . '" method="post">';
            $rowHtml .= csrf_field();
            $rowHtml .= '<input type="hidden" value="' . $product->id . '" name="product_id">';
            $rowHtml .= '<button class="addtocartbtn" type="submit" style="color:white;border:none;"><i class="icon-heart" style="color:white;"></i></button>';
            $rowHtml .= '</form>';
            $rowHtml .= '</div>';
            $rowHtml .= '</div>';
            $rowHtml .= '<div class="content">';
            $rowHtml .= '<div class="content-left">';
            $rowHtml .= '<h6 class="title"><a href="' . route('products', $product->url_key) . '">' . $product->Name . '</a></h6>';
            $rowHtml .= '<ul class="review-star">';
            $rowHtml .= '<li class="fill"><i class="ion-android-star"></i></li>';
            $rowHtml .= '<li class="fill"><i class="ion-android-star"></i></li>';
            $rowHtml .= '<li class="fill"><i class="ion-android-star"></i></li>';
            $rowHtml .= '<li class="fill"><i class="ion-android-star"></i></li>';
            $rowHtml .= '<li class="empty"><i class="ion-android-star"></i></li>';
            $rowHtml .= '</ul>';
            $rowHtml .= '</div>';
            $rowHtml .= '<div class="content-right">';
            $rowHtml .= '<span class="price">₹' . $product->Price . '.00</span>';
            $rowHtml .= '</div>';
            $rowHtml .= '</div>';
            $rowHtml .= '</div>';
            $rowHtml .= '</div>';
            $rowHtml .= '</div>';
           
        }
        
        return $rowHtml;
    }
    



}
