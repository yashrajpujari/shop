@extends('layouts.dashboard')
@section('content')

<div class="card m-4">
  <form action="{{route('sliderdelete')}}" method="post">
    @csrf
    @method('DELETE')
  <h5 class="card-header">Slider-List</h5>
  @can('slider_create')<a href="{{route('slider.create')}}" class=" user-add" >Add-New-Slider</a>@endcan
  <div class="col-sm-12" style="text-align:end;">
                      @can('slider_delete')  <button type="btn" class="btn btn-danger mx-2" id="deletebtn">Delete Selected Records</button>@endcan
                    </div>
  @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
          
  <div class="table-responsive">
    <table class="table table-striped my-1" style="text-align:center;">
      <thead>
        <tr>
          <th><input class="form-check-input"  type="checkbox" value="" id="defaultCheck3"></th>
          <th >sr.no</th>
          <th>Title</th>
          <th>Status</th>
        
         
         
          <th>Image</th>
          <th>Url</th>
          <th>Order</th>
          <th style=" width:10%">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
     @foreach($sliders as $slider)
        <tr>
          <td><input class="form-check-input" name="check[]" type="checkbox" value="{{$slider->id}}" id="defaultCheck3"></td>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$slider->title}}</td>
          <td>{{($slider->status==1)?"Active":"Inactive"}}</td>
          <td><img src="{{$slider->GetFirstMediaUrl('image')}}" style="height:50px"></td>
          <td>{{$slider->url}}</td>
          <td>{{$slider->order}}</td>
          <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
          @can('slider_edit')  <a href="{{route('slider.edit',$slider->id)}}" class="edit">Edit</a>@endcan
           @can('slider_delete') <button type="submit"  class="delete" formaction="{{route('slider.destroy',$slider->id)}}" formmethod="post">Delete</button>@endcan
           
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
