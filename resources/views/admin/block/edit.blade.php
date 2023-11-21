@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title fw-semibold mb-0 ">Edit Block</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('block.update',$blockdata->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $blockdata->name }}" class="form-control" id="name" placeholder="Enter page name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="my-3">
                                    <label class="form-label ">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="">--Choose-Option--</option>
                                        <option value="1" {{($blockdata->status)==1?"selected":""}}>Active</option>
                                        <option value="2" {{($blockdata->status)==2?"selected":""}}>Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-md-12 my-4">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <img src="{{$blockdata->GetFirstMediaUrl('image')}}" width="100px" />
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="Description" class="form-label">Description</label>
                                <textarea name="discription" class="form-control" id="editor" placeholder="Description">{{ $blockdata->discription }}</textarea>
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
</div>

@endsection