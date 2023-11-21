@extends('layouts.dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Permission</h5>
                    <div class="col-sm-10" style="text-align:end;">
                        <button type="btn" class="btn btn-primary" id="add-permisson">Add more</button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('permission.store')}}"method="Post">
                        @csrf
                        <div class="addform-data">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text"  name="name[]"class="form-control" id="basic-default-name" placeholder="Permission Name">
                                    @if(session('message'))
                                   <span class="text-danger">{{session('message')}}</sapn>
                                    @endif
                                   
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Permission</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- End of centered row -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#add-permisson').click(function(){
            var html=' <div class="row mb-3 addnew-row">\
                          <label class="col-sm-2 col-form-label" for="basic-default-name"></label>\
                          <div class="col-sm-10" style="display:flex;">\
                            <input type="text" name="name[]" class="form-control" id="basic-default-name" placeholder="Permission Name">\
                            <button type="btn" class="btn btn-primary" id="remove" style="margin-left:10px;">Remove</button>\
                           </div>\
                        </div>';
            $('.addform-data').append(html);
        });

        $('.addform-data').on('click','#remove',function(){
            $(this).closest('.addnew-row').remove();
        });
    });
</script>
@endsection
