@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title fw-semibold mb-0 ">Edit Slider</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" name="title" value="{{$slider->title}}" class="form-control" placeholder="Enter title">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="my-2">
                                    <label class="form-label ">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="">--Choose-Option--</option>
                                        <option value="1" {{($slider->status)==1?"selected":""}}>Active</option>
                                        <option value="2" {{($slider->status)==2?"selected":""}}>Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-md-12 my-1">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 my-1">
                                    <label for="url" class="form-label">Url</label>
                                    <input type="url" name="url" value="{{$slider->url}}" class="form-control" placeholder="www.https:/">
                                    @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 my-1">
                                    <label for="order" class="form-label">Order;</label>
                                    <input type="number" name="order" value="{{$slider->order}}" class="form-control" placeholder="@number">
                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="Description" class="form-label">Description</label>
                                <textarea name="discription" class="form-control" id="editor" placeholder="Description">{{ $slider->discription }}</textarea>
                                @error('discription')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>



                </div>

                <div class="col-md-6 m-3">
                    <button type="reset" class="btn btn-primary mx-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection