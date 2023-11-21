@extends('layouts.dashboard')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New Coupon</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('coupan.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Title</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-pen"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname" name="title" placeholder="title" aria-label="title" aria-describedby="basic-icon-default-fullname2" value="{{ old('title') }}">
                            </div>
                            @error('title')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Coupan_code</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-pen"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname" name="coupon_code" placeholder="Discount_Code" aria-label="title" aria-describedby="basic-icon-default-fullname2" value="{{ old('coupan_code') }}">
                            </div>
                            @error('coupon_code')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Discount Ammount</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-pen"></i></span>
                                <input type="number" class="form-control" id="basic-icon-default-fullname" name="discount_amount" placeholder="Discount Ammount" aria-label="Discount Ammount" aria-describedby="basic-icon-default-fullname2" value="{{ old('discount_amount') }}">
                            </div>
                            @error('discount_amount')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>





                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Valid From</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" class="form-control" id="basic-icon-default-fullname" name="valid_from" aria-describedby="basic-icon-default-fullname2" value="{{ old('valid_from') }}">
                            </div>
                            @error('valid_from')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Valid To</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" class="form-control" id="basic-icon-default-fullname" name="valid_to" aria-describedby="basic-icon-default-fullname2" value="{{ old('valid_to') }}">
                            </div>
                            @error('valid_to')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Add Coupon</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection