@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title fw-semibold mb-0 ">Edit Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="parentpage_id" class="form-label">Parent Category</label>
                                <select name="parent_category" id="parentpage_category" class="form-select">
                                    <option value="0">-select-option--</option>
                                    @foreach($categories as $_cate)
                                    <option value="{{$_cate->id}}"{{($_cate->id)==$category->parent_category ?"selected":""}}>{{$_cate->name}}</option>
                                    @endforeach
                                </select>
                                @error('parent_category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Enter page name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{$category->status==1?"selected":""}}>Active</option>
                                    <option value="2" {{$category->status==2?"selected":""}}>Inactive</option>
                                </select>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Show In Menu</label>
                                <div class="">
                                    <div class="col-sm-10" style="display:inline-block;">
                                        <span class="m-1">
                                            <input class="form-check-input" name="show_in_menu" type="radio" {{$category->show_in_menu== 1?"checked":""}} value="1" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">yes</label>
                                        </span>
                                        <span class="m-1">
                                            <input class="form-check-input" name="show_in_menu" type="radio" {{$category->show_in_menu== 2?"checked":""}} value="2" class="form-check-input" id="defaultRadio2">
                                            <label for="defaultCheck3">no</label>
                                        </span>
                                        @error('show_in_menu')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">

                                <div class="">
                                    <label for="image" class="form-label">Short-Description</label>
                                    <textarea name="shortDescription" class="form-control" placeholder="Description">{{$category->shortDescription}}</textarea>

                                    @error('shortDescription')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="col-md-12 my-4">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 my-4">
                                        <label for="meta_teg" class="form-label">Meta Tag</label>
                                        <input type="text" value="{{$category->meta_teg }}" placeholder="Meta Tag" name="meta_teg" class="form-control" id="meta_teg">
                                        @error('meta_teg')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-4">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" placeholder="Meta Title" value="{{$category->meta_title }}" name="meta_title" class="form-control" id="meta_title">
                                        @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-4">
                                        <label for="meta_descripation" class="form-label">Meta Description</label>
                                        <input type="text" value="{{ $category->meta_description }}" name="meta_description" class="form-control" id="meta_descripation" placeholder="Meta Description">
                                        @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12 mb-4">
                                    <label for="image" class="form-label">Banner image</label>
                                    <input type="file" name="bannerimage" class="form-control" id="image">
                                    @error('bannerimage')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="Description" class="form-label">Description</label>
                                    <textarea name="Description" class="form-control" id="editor" placeholder="Description">{{$category->Description }}</textarea>
                                    @error('Description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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