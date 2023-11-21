@extends('layouts.dashboard')
@section('content')


    <div class="container-fluid">
        <div class="card my-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h3 class="m-4">User List</h3>

            @can('user_create')
        <div class="d-flex justify-content-between mx-2">
       <a href="{{route('user.create')}}" class=" user-add" >Add-New-user</a>@endcan
       <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label>
      
</div>
         
</div>


            <div class="container mt-5">

                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
          
        </div>
    </div>
    <script type="text/javascript">
                $(function() {

                    var table = $('.yajra-datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('user.index') }}",
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'email',
                                name: 'email'
                            },
                            {
                                data: 'roles',
                                name: 'roles'
                            },

                            {
                                data: 'action',
                                name: 'action',
                                orderable: true,
                                searchable: true
                            },
                        ]
                    });

                });
            </script>
@endsection

