@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title fw-semibold mb-0 ">Add New product</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="Name" value="{{ old('Name') }}" class="form-control" id="name" placeholder="Enter Product name">
                                @error('Name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="sku" class="form-label">Sku</label>
                                <input type="text" name="Sku" value="{{ old('Sku') }}" class="form-control" id="name" placeholder="Enter sku">
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
                                    <option value="1" {{old('Status')==1?"selected":""}}>Active</option>
                                    <option value="2" {{old('Status')==2?"selected":""}}>Inactive</option>
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
                                            <input class="form-check-input" name="Is_Featured" type="radio" {{old('Is_Featured')==1?"checked":""}} value="1" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">yes</label>
                                        </span>
                                        <span class="m-1">
                                            <input class="form-check-input" name="Is_Featured" type="radio" {{old('Is_Featured')==2?"checked":""}} value="2" class="form-check-input" id="defaultRadio2">
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
                                <input type="number" name="Qty" value="{{ old('Qty') }}" class="form-control" id="name" placeholder="Quantity">
                                @error('Qty')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">

                                <label class="form-label">Stock Status</label>
                                <div class="">
                                    <div class="col-sm-10" style="display:inline-block;">
                                        <span class="m-3">
                                            <input class="form-check-input" name="Stock_Status" type="radio" {{old('Stock_Status')=="Instock"?"checked":""}} value="Instock" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">In stock</label>
                                        </span>
                                        <span class="m-3">
                                            <input class="form-check-input" name="Stock_Status" type="radio" {{old('Stock_Status')=="outofstock"?"checked":""}} value="outofstock" class="form-check-input" id="defaultRadio2">
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
                                    <textarea name="Short_Description" class="form-control" placeholder="Description">{{ old('Short_Description') }}</textarea>

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
                                        <label for="meta_teg" class="form-label">price</label>
                                        <input type="number" value="{{ old('Meta_Tag') }}" placeholder="price" name="Price" class="form-control" id="meta_teg">
                                        @error('Price')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-4">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" placeholder="Meta Title" value="{{ old('Meta_title') }}" name="Meta_title" class="form-control" id="meta_title">
                                        @error('Meta_title')
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
                                    <input type="text" name="Weight" value="{{old('Weight')}}" class="form-control" id="image" placeholder="weight">
                                    @error('Weight')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 my-4">
                                    <label for="image" class="form-label">special price</label>
                                    <input type="number" name="Special_Price" value="{{ old('Special_Price') }}" class="form-control" id="s_price" placeholder="Special Price">
                                    @error('Special_Price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="image" class="form-label">Meta Tag</label>
                                    <input type="text" name="Meta_Tag" value="{{ old('Meta_Tag') }}" class="form-control" id="Meta Tag" placeholder="Meta Tag">
                                </div>
                                @error('Meta_Tag')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">

                                <div class="col-md-12 ">
                                    <div class="col-md-12 mb-4">
                                        <label for="meta_descripation" class="form-label">Special price from</label>
                                        <input type="date" value="{{ old('Special_price_from') }}" name="Special_price_from" class="form-control" id="meta_descripation" placeholder="Meta Description">

                                    </div>

                                    <div class="col-md-12 my-4">
                                        <label for="parentpage_id" class="form-label">Related Products</label>
                                        <select name="Related_Products[]" id="related_product" class="form-select" multiple>
                                            <option value="">--Choose-Option--</option>
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->Name}}</option>

                                            @endforeach



                                        </select>
                                        @error('Related_Products')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>



                            </div>


                            <div class="col-md-6">
                                <div class="col-md-12 mb-4">
                                    <div class="col-md-12 mb-4">
                                        <label for="meta_descripation" class="form-label">Special price to</label>
                                        <input type="date" value="{{ old('Special_price_to') }}" name="Special_price_to" class="form-control" id="meta_descripation" placeholder="Meta Description">

                                    </div>

                                </div>


                                <div class="col-md-12 my-4 ">

                                    <label for="parentpage_id" class="form-label">Categories</label>
                                    @php ($product->categories->pluck('id')->toArray()) @endphp
                                    <select name="categories[]" id="categories" class="form-select" multiple>
                                        <option value=""></option>

                                        @foreach($categories as $_category)
                                        <option value="{{$_category->id}}">{{$_category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror


                                </div>



                            </div>
                        </div>

                        @foreach($attributes as $attribute)
                        <div class="row  my-5">
                            
                            <label class="form-label"><strong>{{$attribute->name}}</strong>:</label>
                            <div class="">
                                <div class="col-sm-10" style="display:inline-block;">
                                    @foreach($attribute->attributevalues as $value)
                                    <input class="form-check-input" name="productattributes[{{$attribute->id}}][attribute_id]" type="hidden" value="{{$attribute->id}}" id="defaultRadio2">
                                    <span class="m-3">
                                        <input class="form-check-input" name="productattributes[{{$attribute->id}}][value_id][]" type="checkbox" value="{{$value->id}}" id="defaultRadio2">
                                        <label for="defaultCheck3">{{$value->name}}</label>
                                    </span>
                                    @endforeach
                                    

                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="row  my-3">
                            <div class="col-12">
                                <label for="meta_descripation" class="form-label">Meta Description</label>
                                <input type="text" value="{{ old('Meta_Description') }}" name="Meta_Description" class="form-control" id="meta_descripation" placeholder="Meta Description">
                                @error('Meta_Description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="Description" class="form-label">Description</label>
                                <textarea name="Description" class="form-control" id="editor" placeholder="Description">{{ old('Description') }}</textarea>
                                @error('Description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="reset" class="btn btn-primary mx-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection