@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title fw-semibold mb-0 ">Edit product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="Name" value="{{ $product->Name }}" class="form-control" id="name" placeholder="Enter Product name">
                                @error('Name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="sku" class="form-label">Sku</label>
                                <input type="text" name="Sku" value="{{ $product->Sku }}" class="form-control" id="name" placeholder="Enter sku">
                                @error('Sku')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="Status" class="form-select">
                                    <option value="">-Choose-Option--</option>
                                    <option value="1" {{$product->Status==1?"selected":""}}>Active</option>
                                    <option value="2" {{$product->Status==2?"selected":""}}>Inactive</option>
                                </select>
                                @error('Status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">is Featured</label>
                                <div class="">
                                    <div class="col-sm-10" style="display:inline-block;">
                                        <span class="m-1">
                                            <input class="form-check-input" name="Is_Featured" type="radio" {{$product->Is_Featured==1?"checked":""}} value="1" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">yes</label>
                                        </span>
                                        <span class="m-1">
                                            <input class="form-check-input" name="Is_Featured" type="radio" {{$product->Is_Featured==2?"checked":""}} value="2" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">no</label>
                                        </span>

                                    </div>
                                    @error('Is_Featured')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3" style="flex-direction: row-reverse;">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Qty:</label>
                                <input type="number" name="Qty" value="{{$product->Qty}}" class="form-control" id="name" placeholder="Quantity">
                                @error('Qty')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">

                                <label class="form-label">Stock Status</label>
                                <div class="">
                                    <div class="col-sm-10" style="display:inline-block;">
                                        <span class="m-3">
                                            <input class="form-check-input" name="Stock_Status" type="radio" {{$product->Stock_Status =="Instock"?"checked":""}} value="Instock" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">In stock</label>
                                        </span>
                                        <span class="m-3">
                                            <input class="form-check-input" name="Stock_Status" type="radio" {{$product->Stock_Status =="outofstock"?"checked":""}} value="outofstock" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">out of stock</label>
                                        </span>
                                        @error('Stock_Status')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">

                                <div class="">
                                    <label for="sdict" class="form-label">Short-Description</label>
                                    <textarea name="Short_Description" class="form-control" placeholder="Description">{{$product->Short_Description}}</textarea>

                                    @error('Short_Description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="col-md-12 my-4">
                                        <label for="image" class="form-label">Thumbnail</label>
                                        <input type="file" name="Thumbnail" class="form-control" id="image">
                                        @error('Thumbnail')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-4">
                                    <label for="image" class="form-label">Price</label>
                                    <input type="number" name="Price" value="{{$product->Price}}" class="form-control" id="price" placeholder="Price">
                                    @error('Price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                    <div class="col-md-12 my-4">
                                        <label for="meta_teg" class="form-label">Meta Tag</label>
                                        <input type="text" value="{{$product->Meta_Tag}}" placeholder="Meta Tag" name="Meta_Tag" class="form-control" id="meta_teg">
                                        @error('Meta_Tag')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                  
                                   

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12 my-4">
                                    <label for="image" class="form-label">Banner image</label>
                                    <input type="file" name="Banner_Image[]" class="form-control" id="formFileMultiple" multiple>
                                    @error('Banner_Image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="image" class="form-label">weight</label>
                                    <input type="text" name="Weight" value="{{$product->Weight}}" class="form-control" placeholder="weight">
                                    @error('Weight')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                              
                                <div class="col-md-12 my-4">
                                    <label for="image" class="form-label">special price</label>
                                    <input type="number" name="Special_Price" value="{{$product->Special_Price}}" class="form-control" id="price" placeholder="special price">
                                </div>
                                @error('Special_Price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-md-12 my-4">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" placeholder="Meta Title" value="{{$product->Meta_title}}" name="Meta_title" class="form-control" id="meta_title">
                                        @error('Meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">

                                <div class="col-md-12 ">
                                    <div class="col-md-12 mb-4">
                                        <label for="meta_descripation" class="form-label">Special price from</label>
                                        <input type="date" value="{{$product->Special_price_from}}" name="Special_price_from" class="form-control" id="meta_descripation" placeholder="Meta Description">

                                    </div>
                                    

                                    <div class="col-md-12 my-4">
                                        <label for="parentpage_id" class="form-label">Related Products</label>
                                        <select name="Related_Products[]" id="related_product" class="form-select" multiple>
                                            <option value=""></option>
                                            @php
                                            $product_related=explode(',',$product->Related_Products);
                                            @endphp
                                            @foreach($products as $_product)

                                            <option value="{{$_product->id}}" {{in_array($_product->id, $product_related )?"selected":""}}>{{$_product->Name}}</option>

                                            @endforeach
                                        </select>
                                        @error('Related_Products')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 my-4">
                                    @foreach($attributes as $attribute)
                              <div class="my-5">
                            
                            <label class="form-label"><strong>{{$attribute->name}}</strong>:</label>
                            <div class="">
                                <div class="col-sm-10" style="display:inline-block;">
                                    @foreach($attribute->attributevalues as $value)
                                    <input class="form-check-input" name="productattributes[{{$attribute->id}}][attribute_id]" type="hidden" value="{{$attribute->id}}" id="defaultRadio2">
                                    <span class="m-3">
                                        <input class="form-check-input" name="productattributes[{{$attribute->id}}][value_id][]" type="checkbox" value="{{$value->id}}" id="defaultRadio2"
                                        {{ in_array($value->id, $attribtevalue->pluck('attribute_value_id')->toArray())?'checked': '' }} >
                                        <label for="defaultCheck3">{{$value->name}}</label>
                                    </span>
                                    @endforeach
                                    

                                </div>
                            </div>
                        </div>
                        @endforeach


                                    </div>
                                </div>





                                <div class="col-md-12 my-4 ">
                                    <label for="meta_descripation" class="form-label">Meta Description</label>
                                    <input type="text" value="{{$product->Meta_Description}}" name="Meta_Description" class="form-control" id="meta_descripation" placeholder="Meta Description">
                                    @error('Meta_Description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>


                            <div class="col-md-6">
                            <div class="col-md-12 mb-4">
                                        <div class="col-md-12 mb-4">
                                            <label for="meta_descripation" class="form-label">Special price to</label>
                                            <input type="date" value="{{$product->Special_price_to}}" name="Special_price_to" class="form-control" id="meta_descripation" placeholder="Meta Description">

                                        </div>

                                    </div>

                                    
                                <div class="col-md-12 my-4">
                                    <label for="parentpage_id" class="form-label">Categories</label>
                                    @php
                                    
                                    $product_category=($product->categories->pluck('id')->toArray());
                                     @endphp
                                    <select name="categories[]" id="categories" class="form-select" multiple>
                                        <option value=""></option>
  
                                        @foreach($categories as $_category)
                                        <option value="{{$_category->id}}"{{in_array($_category->id,$product_category)?"selected":""}}>{{$_category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-12">
                                    <label for="Description" class="form-label">Description</label>
                                    <textarea name="Description" class="form-control" id="editor" placeholder="Description">{{$product->Description}}</textarea>
                                    @error('Description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>



                        </div>

                        <div class="row my-3">

                            @foreach($product->getmedia('Banner_Image') as $image)



                            <div class="col-md-1 removewrapper mx-4" style="padding:0px !important;">

                                <input type="hidden" name="Image[]" value="{{$image->id}}">
                                <input type="hidden" name="Banner_Image[]" value="Banner_Image">
                                <img src="{{$image->geturl()}}" width="100px">
                                <button type="button" class="remove removebutton">x</button>
                            </div>
                            @endforeach
                        </div>
                        <button type="reset" class="btn btn-primary mx-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {


        $('.remove').click(function() {
            $(this).closest('div').remove();

        });
    });
</script>

@endsection