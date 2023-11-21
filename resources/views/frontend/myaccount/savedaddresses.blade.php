@extends('layouts/useraccount')
@section('dcontent')
<div class="d-flex justify-content-start my-3" >
    <h2>Saved Addresses</h2>
</div>
<div class="d-flex">
    <div class="col-6 md-3 ">
        @foreach($billing_address as $address_1)
        <div class="col-12 md-6 border">
            <h3 style="text-transform:capitalize;">{{$address_1->address_type}}</h3>
            <address>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">Name:</span> {{$address_1->name}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">Address:</span>{{$address_1->address}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">phone:</span>{{$address_1->phone}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">Street:</span> 123 Main St</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">City:</span> {{$address_1->city}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">State:</span> {{$address_1->state}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">ZIP Code:</span> {{$address_1->pincode}}</p>
    </address>
        </div>
        @endforeach
    </div>
    <div class="col-6 md-3 ">

    @foreach($shipping_address as $address_2)
        <div class="col-12 md-6 border">
            <h3 style="text-transform:capitalize;">{{$address_2->address_type}}</h3>
            <address>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">Name:</span> {{$address_2->name}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">Address:</span>{{$address_2->address}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">phone:</span>{{$address_2->phone}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">Street:</span> 123 Main St</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">City:</span> {{$address_2->city}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">State:</span> {{$address_2->state}}</p>
        <p style="margin:0px;"><span style="font-weight:bold;color:black;margin-right:5px;">ZIP Code:</span> {{$address_2->pincode}}</p>
    </address>
        </div>
        @endforeach

    </div>
    </div>
</div>
@endsection