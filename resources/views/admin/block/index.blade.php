@extends('layouts.dashboard')
@section('content')

<div class="card m-4">
  <form action="{{route('deleteblock')}}" method="post">
    @csrf
    @method('DELETE')
  <h5 class="card-header">Blog-List</h5>
 @can('block_create') <a href="{{route('block.create')}}" class=" user-add my-2" >Add-New-Blog</a>@endcan
  <div class="col-sm-12" style="text-align:end;">
  @can('block_delete')   <button type="btn" class="btn btn-danger mx-2" id="deletebtn">Delete Selected Records</button>@endcan
                    </div>
  @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
          
  <div class="table-responsive">
    <table class="table table-striped my-1" style="text-align:center;">
      <thead>
        <tr>
          <th ><input class="form-check-input" name="role[]" type="checkbox" value="4" id="defaultCheck3"></th>
          <th >sr.no</th>
          <th>Name</th>
          <th>Status</th>
        
         
         
          <th>Image</th>
          <th>Identifier</th>
          <th style=" width:10%">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
      @foreach($blocks as $block)
        <tr>
          <td><input class="form-check-input" name="check[]" type="checkbox" value="{{$block->id}}" id="defaultCheck3"></td>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$block->name}}</td>
          <td>{{($block->status ==1)?"Active":"Inactive"}}</td>
          
          <td><img src="{{$block->GetFirstMediaUrl('image')}}" style="height:50px"></td>
          <td>{{$block->identifier}}</td>
          <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
          @can('block_edit') <a href="{{route('block.edit',$block->id)}}" class="edit">Edit</a>@endcan
          @can('block_delete')<button type="submit"  class="delete" formaction="{{route('block.destroy',$block->id)}}" formmethod="post">Delete</button>@endcan
           
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
