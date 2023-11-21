@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title fw-semibold mb-0 ">Edit Page</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('page.update',$pagedata->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="parentpage_id" class="form-label">Parent Page</label>
                                <select name="parentpage_id" id="parentpage_id" class="form-select">
                                    <option value="">-select-option--</option>
                                    <option value="0">--Make-itself-ParentPage--</option>
                                    @foreach($page as $pages)
                                    <option value="{{ $pages->id }}" {{ (($pages->id) ==( $pagedata->parentpage_id))?'selected' : '' }}>{{ $pages->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('parentpage_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $pagedata->name }}" class="form-control" id="name" placeholder="Enter page name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ (($pagedata->status) ==1)?'selected': ''}}>Active</option>
                                    <option value="2" {{ (($pagedata->status) ==2)?'selected': ''}}>Inactive</option>
                                </select>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Show in Menu:</label>
                                <div class="">
                                    <div class="col-sm-10" style="display:inline-block;">
                                        <span class="m-1">
                                            <input class="form-check-input" name="show_in_menu"{{ (($pagedata->show_in_menu) =='yes')?'checked': ''}} type="radio" {{old('show_in_menu')=='yes'?"checked":""}} value="yes" class="form-check-input" id="defaultRadio2">
                                            <label="" for="defaultCheck3">yes</label>
                                        </span>
                                        <span class="m-1">
                                            <input class="form-check-input" name="show_in_menu"{{ (($pagedata->show_in_menu) =='no')?'checked': ''}} type="radio" {{old('show_in_menu')=='no'?"checked":""}} value="no" class="form-check-input" id="defaultRadio2">
                                            <label="" for="defaultCheck3">no</label>
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
                                <label class="form-label">Show in Footer:</label>
                                <div class="">
                                    <div class="">
                                        <span class="m-1">
                                        <input type="radio" name="show_in_footer" class="form-check-input" value="yes" {{ (($pagedata->show_in_footer) == 'yes') ? 'checked' : '' }} id="defaultRadio2"/>
                                            <label for="defaultCheck3">yes</label>
                                        </span>
                                        <span class="m-1">
                                            <input type="radio" name="show_in_footer" class="form-check-input" value="no"{{ (($pagedata->show_in_footer) =='no')?'checked': ''}} id="defaultRadio2"  />
                                            <label="" for="defaultCheck3">no</label>
                                        </span>
                                    </div>
                                </div>
                                @error('show_in_footer')
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
                                    <input type="text" value="{{$pagedata->meta_teg }}" placeholder="Meta Tag" name="meta_teg" class="form-control" id="meta_teg">
                                    @error('meta_teg')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" placeholder="Meta Title" value="{{$pagedata->meta_title }}" name="meta_title" class="form-control" id="meta_title">
                                    @error('meta_title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 my-4">
                                    <label for="meta_descripation" class="form-label">Meta Description</label>
                                    <input type="text" value="{{ $pagedata->meta_description }}" name="meta_description" class="form-control" id="meta_descripation" placeholder="Meta Description">
                                    @error('meta_description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="Description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="editor" placeholder="Description">{{$pagedata->description }}</textarea>
                                @error('description')
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