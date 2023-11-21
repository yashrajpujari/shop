@extends('layouts.dashboard')
@section('content')

<div class="card m-4">
  <form action="{{route('deletepage')}}" method="post">
    @csrf
    @method('DELETE')
  <h5 class="card-header">Category-List</h5>
  @can('page_create')<a href="{{route('category.create')}}" class=" user-add" >Add-New-Category</a>@endcan
  <div class="col-sm-12" style="text-align:end;">
                      @can('page_delete')  <button type="btn" class="btn btn-danger mx-2" id="deletebtn">Delete Selected Records</button>@endcan
                    </div>
  @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
          
  <div class="table-responsive">
    <table class="table table-striped my-1" style="text-align:center;">
      <thead>
        <tr>
          <th><input class="form-check-input" name="" type="checkbox" value="4" id="defaultCheck3"></th>
          <th >sr.no</th>
          <th>Parent Category</th>
          <th>Name</th>
          <th>status</th>
          <th>show in Menu</th>
          <th>banner image</th>
          <th>Image</th>
          <th>Url_Key</th>
          <th style=" width:10%">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
       @foreach($categories as $category)
        <tr>
          <td><input class="form-check-input" name="check[]" type="checkbox" value="" id="defaultCheck3"></td>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$category->parent_category}}</td>
          <td>{{$category->name}}</td>
          <td>{{($category->status)==1?"Active":"Inactive"}}</td>
          
          <td>{{($category->show_in_menu)==1?"Yes":"No"}}</td>
          <td><img src="{{$category->GetFirstMediaUrl('bannerimage')}}" width='50px'></td>
          <td><img src="{{$category->GetFirstMediaUrl('image')}}" style="height:50px"></td>
          <td>{{$category->url_key}}</td>
          <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
            <a href="{{route('category.edit',$category->id)}}" class="edit">Edit</a>
           <button type="submit"  class="delete" formaction="{{route('category.destroy',$category->id)}}" formmethod="post">Delete</button>
           
          </td>
        </tr>
       @endforeach
      </tbody> 
    </table>
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function(){
    $('#defaultCheck3').click(function(){
        $('input[type=checkbox]').prop('checked',$(this).prop('checked'));
    });
    $('#deletebtn').click(function(){
      alert('are you sure to Delete Records??');
    });
   });
   </script>
@endsection
