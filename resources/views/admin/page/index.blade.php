@extends('layouts.dashboard')
@section('content')

<div class="card m-4">
  <form action="{{route('deletepage')}}" method="post">
    @csrf
    @method('DELETE')
  <h5 class="card-header">Page-List</h5>
  @can('page_create')<a href="{{route('page.create')}}" class=" user-add" >Add-New-Page</a>@endcan
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
          <th><input class="form-check-input" name="role[]" type="checkbox" value="4" id="defaultCheck3"></th>
          <th >sr.no</th>
          <th>Parent Page</th>
          <th>Name</th>
          <th>status</th>
          <th>show in Menu</th>
          <th>show in footer</th>
          <th>Image</th>
          <th>Url_Key</th>
          <th style=" width:10%">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
       @foreach($pages as $page)
        <tr>
          <td><input class="form-check-input" name="check[]" type="checkbox" value="{{$page->id}}" id="defaultCheck3"></td>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$page->parentpage_id}}</td>
          <td>{{$page->name}}</td>
          <td>{{($page->status)==1?"Active":"Inactive"}}</td>
          <td>{{$page->show_in_menu}}</td>
          <td>{{$page->show_in_footer}}</td>
          <td><img src="{{$page->getFirstMediaUrl('image')}}" style="height:50px"></td>
          <td>{{$page->url_key}}</td>
          <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
           @can('page_edit') <a href="{{route('page.edit',$page->id)}}" class="edit">Edit</a>@endcan
           @can('page_delete') <button type="submit"  class="delete" formaction="{{route('page.destroy',$page->id)}}" formmethod="post">Delete</button>@endcan
           
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
