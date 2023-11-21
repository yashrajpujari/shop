@extends('layouts.dashboard')
@section('content')

<div class="card m-4">
  <form action="{{route('deleteattribute')}}" method="post">
    @csrf
    @method('DELETE')
  <h5 class="card-header">Attribute List</h5>
 <a href="{{route('attribute.create')}}" class=" user-add" >Add-New-Attribute</a>
  <div class="col-sm-12" style="text-align:end;">
                       <button type="btn" class="btn btn-danger mx-2" id="deletebtn">Delete Selected Records</button>
                    </div>
  @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
          
  <div class="table-responsive">
    <table class="table table-striped my-1" style="text-align:center;">
      <thead>
        <tr>
          <th><input class="form-check-input" name="role[]" type="checkbox" value="" id="defaultCheck3"></th>
          <th >sr.no</th>
          <th>Attribute name</th>
          <th>status</th>
          <th>Is Variant</th>
          <th>Name_key</th>
          <th>Action</th>
         
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
       @foreach($attributes as $attribute)
        <tr>
          <td><input class="form-check-input" name="check[]" type="checkbox" value="{{$attribute->id}}" id="defaultCheck3"></td>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$attribute->name}}</td>
          <td>{{($attribute->status ==1)?"Active":"Inactive"}}</td>
          <td>{{$attribute->Is_variant}}</td>
          <td>{{$attribute->name_key}}</td>
        
          <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
           <a href="{{route('attribute.edit',$attribute->id)}}" class="edit">Edit</a>
            <button type="submit"  class="delete" formaction="{{route('attribute.destroy',$attribute->id)}}" formmethod="post">Delete</button>
           
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
