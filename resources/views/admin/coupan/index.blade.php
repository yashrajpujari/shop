@extends('layouts.dashboard')
@section('content')



<div class="card m-4">
 
  <h5 class="card-header">Coupans List</h5>
 <a href="{{route('coupan.create')}}" class=" user-add" >Add-New-Coupan</a>

  @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
          
  <div class="table-responsive">
    <table class="table-hover" style="text-align:center;">
      <thead>
        <tr>
          
          <th >sr.no</th>
          <th>Tittle</th>
          <th>status</th>
          <th>Coupan Code</th>
          <th>Discount Ammount</th>
         
          <th>Action</th>
         
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
        @if($coupans->count()>0)
      @foreach($coupans as $coupan)
        <tr>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$coupan->title}}</td>
          <td>{{$coupan->status ==1?"Active":"Inactive"}}</td>
          <td>{{$coupan->coupon_code}}</td>
          <td>{{$coupan->discount_amount}}</td>
          <td style="display: flex; justify-content:center; align-items:center;padding:5px 0rem;">
           <a href="{{route('coupan.edit',$coupan->id)}}" class="edit">Edit</a>
           <form action="{{route('coupan.destroy',$coupan->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit"  class="delete" formaction="{{route('coupan.destroy',$coupan->id )}}" formmethod="post">Delete</button>
           </form>
           
          </td>
        </tr>
        @endforeach
        @else
        <tr><td colspan="6">No record Found</td></tr>
        
        @endif
      </tbody>
    </table>
  </div>

</div>

@endsection
