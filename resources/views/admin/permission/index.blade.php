@extends('layouts.dashboard')
@section('content')

       <div class="card m-4">
        <h5 class="card-header">Permission List</h5>
        @can('permission_create')
        <div class="d-flex justify-content-between mx-2">
       <a href="{{route('permission.create')}}" class=" user-add" >Add-New-Permission</a>@endcan
       <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label>
      
                  <input type="text"  id="permission"class="form-control" placeholder="Search Permission" aria-controls="DataTables_Table_0"></label></div>
         
</div>
          @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
      <form action="" method="post">
      @csrf
            @method('DELETE')                      
  <div class="table-responsive">
   
    <table class="table table-striped my-1" style="text-align:center;">
      <thead>
        <tr>
          <th >SR.No</th>
          <th >Name</th>
          <th >Guard-name</th>
          
          <th style="max-width:338px;display: flex; justify-content:end; align-items:center;">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" id ='container'>
        @php
        $i=1;
        @endphp
        @foreach($permissions as $permission)
        <tr>
            <td><strong>{{$i++}}</strong></td>
          <td><strong>{{$permission->name}}</strong></td>
          <td>{{$permission->guard_name}}</td>
         
          <td style="display: flex; justify-content:end; align-items:center;">
           @can('permission_edit') <a href="{{route('permission.edit',$permission->id)}}" class="edit">Edit</a>@endcan
           @can('permission_delete') <button formaction= "{{route('permission.destroy',$permission->id)}}" method="post"class="delete">Delete</button>@endcan
          
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <div class="d-flex m-3" style ="justify-content: end;">
         {!!$permissions->links()!!}</div>


</form>
</div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
$('#permission').on('keyup',function(){
  var permission =$(this).val();
  console.log(permission);
  $.ajax({
    url:"{{route('searchpermission')}}",
    data:{'permission':permission},
    method:'Get',
    success:function(result){
     $('#container').html(result);
    },
    error:function(error){
      alert('something went wrong');
    },
  });
})
});
</script>
@endsection
