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

            <h3 class="m-4">Order List</h3>

          
        <div class="d-flex justify-content-between mx-2">
    
       <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label>
      
</div>
         
</div>


            <div class="container mt-5">

                <table class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th> order_increment_id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User</th>
                         
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
                        ajax: "{{ route('customerorders') }}",
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'order_increment_id',
                                name: 'order_increment_id'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'email',
                                name: 'email'
                            },
                            { data: 'user', 
                                name: 'user' },

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