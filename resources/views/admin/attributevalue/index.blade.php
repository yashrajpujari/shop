@extends('layouts.dashboard')
@section('content')

<div class="card m-4">
  <form action="{{route('deleteattributevalue')}}" method="post">
    @csrf
    @method('DELETE')
  <h5 class="card-header">Attribute value List</h5>
 <a href="{{route('attributevalue.create')}}" class=" user-add" style="width:20%" >Add-New-Attribute value</a>
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
          <th> name</th>
          <th>attribute_id</th>
          <th>status</th>
          <th>Action</th>
         
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
       @foreach($attributevalues as $attributevalue)
        <tr>
          <td><input class="form-check-input" name="check[]" type="checkbox" value="{{$attributevalue->id}}" id="defaultCheck3"></td>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$attributevalue->name}}</td>
          <td>{{$attributevalue->attribute_id}}</td>
          <td>{{($attributevalue->status ==1)?"Active":"Inactive"}}</td>
         
        
          <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
           <a href="{{route('attributevalue.edit',$attributevalue->id)}}" class="edit">Edit</a>
            <button type="submit"  class="delete" formaction="{{route('attributevalue.destroy',$attributevalue->id)}}" formmethod="post">Delete</button>
           
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
