@extends('layouts/useraccount')
@section('dcontent')

<div>
    
                        <h4>Orders</h4>
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order id</th>
                                        <th>name</th>
                                        <th>date</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($orders->count() > 0)
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->order_increment_id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td><span class="success">{{$order->created_at->format('d-m-y')}}</span></td>
                                        <td>₹{{$order->total}} </td>
                                        <td><a href="{{route('orderdetail',$order->id)}}" class="view">view</a></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
@endsection