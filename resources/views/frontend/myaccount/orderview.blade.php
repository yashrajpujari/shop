@include('frontend/include/head')
<div class="container mt-5 mb-5">
<div class="row d-flex justify-content-center">
<div class="col-md-12">
<div class="card shadow p-3 mb-5 bg-body rounded">
<div class="text-left logo p-2 px-5"> <img src="{{asset('frontend/assets/images/logo/logo_black.png')}}" width="50"> </div>
<div class="invoice p-5">
 
  <div class="col-md-12 d-flex">
@foreach($order_addr as $orderaddress)
<div class="col-6 border">

<span class="font-weight-bold d-block mt-4">
  <h5 style="text-transform:capitalize;padding-left:2px;"><i class="fa fa-home mr-2" aria-hidden="true"></i>{{$orderaddress->address_type}}</h5>
  <p style="margin:0px;"><span class="font-weight-bold"style="color:black;padding-left:5px;"> {{$orderaddress->name}}</p> 
   <p style="margin:0px;"><span class="font-weight-bold"style="color:black;padding-left:5px;">Address:</span>{{$orderaddress->address}}</p>
   <p style="margin:0px;"><span class="font-weight-bold"style="color:black;padding-left:5px;">Phone:</span>{{$orderaddress->phone}}</p>
   <p style="margin:0px;"><span class="font-weight-bold"style="color:black;padding-left:5px;">City:</span>{{$orderaddress->city}}</p>
   <p style="margin:0px;"><span class="font-weight-bold"style="color:black;padding-left:5px;">pin code:</span>{{$orderaddress->pincode}}</p>
   <p style="margin:0px;"><span class="font-weight-bold"style="color:black;padding-left:5px;">Country:</span>{{$orderaddress->country}}</p>
 
</div>
@endforeach
</div>
<div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
<table class="table table-borderless">
<tbody>
<tr>
<td>
<div class="py-2">  
<span class="d-block text-muted">Order Date</span> <span>{{ $order->created_at->format('d-m-y ') }}</span>

</div>

</td>
<td>
<div class="py-2"> <span class="d-block text-muted">Order No</span> <span>{{$order->order_increment_id}}</span> </div>
</td>
<td>
<div class="py-2"> <span class="d-block text-muted">Payment</span> <span>{{$order->payment_method}}</span> </div>
</td>
<td>
<div class="py-2"> <span class="d-block text-muted"><i class="fa fa-truck mr-2" aria-hidden="true"></i>
Shiping Method</span> <span>{{$order->shipping_method}}</span> </div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="product border-bottom table-responsive">
<table class="table table-borderless">
<tbody>
  @foreach($order_item as $item)
<tr>
<td width="20%"> <img src="{{getproductimg($item->product_id)}}" width="90"> </td>
<td width="60%"> <span class="font-weight-bold">₹{{$item->name}}</span>
<div class="product-qty"> <span class="d-block" style="color:black;">Quantity:{{$item->qty}}</span> <span>Color:Dark</span> </div>
</td>
<td width="20%">
<div class="text-right"> <span class="font-weight-bold">₹{{$item->row_total}}</span> </div>
</td>
</tr>
@endforeach

</tbody>
</table>
</div>
<div class="row d-flex justify-content-end">
<div class="col-md-5">
<table class="table table-borderless">
<tbody class="totals">
<tr>
<td>
<div class="text-left"> <span class="text-muted">Subtotal</span> </div>
</td>
<td>
<div class="text-right"> <span>₹{{$order->subtotal}}</span> </div>
</td>
</tr>
<tr>
<td>
<div class="text-left"> <span class="text-muted">Shipping Fee</span> </div>
</td>
<td>
<div class="text-right"> <span>₹{{$order->shipping_cost}}</span> </div>
</td>
</tr>
<tr>
<td>
<div class="text-left"> <span class="text-muted">Tax Fee</span> </div>
</td>
<td>
<div class="text-right"> <span>₹0.00</span> </div>
</td>
</tr>
<tr>
<td>
<div class="text-left"> <span class="text-muted">Discount</span> </div>
</td>
<td>
<div class="text-right"> <span class="text-success">₹ 0.00</span> </div>
</td>
</tr>
<tr class="border-top border-bottom">
<td>
<div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
</td>
<td>
<div class="text-right"> <span class="font-weight-bold">₹{{$order->total}}</span> </div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<p>We will be sending shipping confirmation email when the item shipped successfully!</p>
<p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Nike Team</span>
</div>
<div class="d-flex justify-content-center my-4">
<button class="btn btn-success mx-3" id="downloadButton">
            <a href="#" style="color:white;">Print</a>
        </button>    <button class="btn btn-success" id="continueShoppingBtn">
            <a href="{{ route('home') }}" style="color:white;">Continue Shopping</a>
        </button></div>
<div class="d-flex justify-content-between footer p-3"> <span>Need Help? visit our <a href="" > help center</a></span> <span>12 June, 2020</span> </div>
</div>
</div>
</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#downloadButton').click(function () {
            // Hide the buttons when the download button is clicked
            $('#continueShoppingBtn').hide();
            $('#downloadButton').hide();

            // Print the receipt 
            window.print();

            // Show the buttons again after printing
            setTimeout(function () {
                $('#continueShoppingBtn').show();
                $('#downloadButton').show();
            }, 100); // You can adjust the delay as needed
        });
    });
</script>

