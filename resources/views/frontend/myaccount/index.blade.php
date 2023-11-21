@extends('layouts/useraccount')
@section('dcontent')

<h1>welcome {{auth()->user()->name}}</h1>
@endsection