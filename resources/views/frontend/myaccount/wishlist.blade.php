@extends('layouts/useraccount')
@section('dcontent')
<div>
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
    <h4><strong>Wishlist</strong></h4>
    <div class="table_page table-responsive">
        <table>
            <thead>
                <tr>
                    <th>sr.no</th>
                    <th>image</th>
                    <th>name</th>
                    <th>Rate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($wishlist->count() > 0)

                @php
                $i=1;
                @endphp
                @foreach($wishlist as $order)
                <tr><td><strong>{{$i++}}</strong></td>
                <td><img src="{{getproductimg($order->product->id)}}" style="height:60px; object-fit:cover;"></td>
                    <td>{{$order->product->Name}}</td>
                    <td>{{number_format($order->product->Price,2)}}</td>
                    <td>
                        <form action="{{route('mywishlist.destroy',$order->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="wishlist_id" value="{{$order->id}}">
                   <button type="submit"><i class="fa fa-trash-o"></i></button>
                        </form>
                </td>
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