@extends('layouts.dashboard')
@section('content')

<div class="card m-4">
  <h5 class="card-header">Role List</h5>
  @can('role_create')<a href="{{route('role.create')}}" class=" user-add" >Add New Role</a>@endcan
  @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
  <div class="table-responsive">
    <table class="table table-striped my-1" style="text-align:center;">
      <thead>
        <tr>
          <th style="width: 15%;"><strong>Sr.no</srtong></th>
          <th style="width: 20%;">Name</th>
          <th style="width: 15%;">Guard Name</th>
          <th style="width: 35%;">Permissions</th>
          <th style="width: 15%;">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $i=1;
        @endphp
        @foreach($Role as $role)
        <tr>
          <td><strong>{{$i++}}</strong></td>
          <td><strong>{{$role->name}}</strong></td>
          <td>{{$role->guard_name}}</td>
          <td style="width: 40%; max-width:60px;">
            @foreach($role->Permissions as $permission)
            <span><strong>{{$permission->name}}</strong>|</span>
            @endforeach
        </td>
          <td style="display: flex; justify-content: space-between; align-items: center;">
          @can('role_edit')  <a href="{{route('role.edit',$role->id)}}" class="edit">Edit</a>@endcan
           @can('role_delete') <form action="{{route('role.destroy',$role->id)}}" method="post">
                @csrf
                @method('DELETE')
              <input class="delete" type="submit" value="Delete">
            </form>
            @endcan
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function(){
    $('input.delete').click(function(){
       
      alert('DO You Really Want To Delete Record ??');
    })
   });
</script>

@endsection
