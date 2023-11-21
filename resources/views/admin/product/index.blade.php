@extends('layouts.dashboard')
@section('content')

<div class="card m-4" bis_skin_checked="1">
        <div class="card-header" bis_skin_checked="1">
          <h4 class="card-title mb-0">Product list</h4>
          <form action="{{route('productdelete')}}" method="post">
            @csrf
            @method('DELETE')
          <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0" bis_skin_checked="1">
            <div class="col-md-4 product_status" bis_skin_checked="1">
              <select name="ProductStatus" id="ProductStatus" class="form-select text-capitalize">
                <option value="">status</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select></div>
            <div class="col-md-4 product_category" bis_skin_checked="1"><select id="ProductCategory" class="form-select text-capitalize">
                <option value="">Category</option>
                <option value="Household">Household</option>
                <option value="Office">Office</option>
                <option value="Electronics">Electronics</option>
                <option value="Shoes">Shoes</option>
                <option value="Accessories">Accessories</option>
                <option value="Game">Game</option>
              </select></div>
            <div class="col-md-4 product_stock" bis_skin_checked="1">
              <select name="ProductStock" id="ProductStock" class="form-select text-capitalize">
                <option value=""> Stock </option>
                <option value="outofstock">Out of Stock</option>
                <option value="Instock">In Stock</option>
              </select></div>
          </div>
        </div>
        <div class="card-datatable table-responsive" bis_skin_checked="1">
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer" bis_skin_checked="1">
            <div class="card-header d-flex border-top rounded-0 flex-wrap py-2 customflextable" bis_skin_checked="1">
              <div class="me-5 ms-n2 pe-5" bis_skin_checked="1">
                <div id="DataTables_Table_0_filter" class="dataTables_filter" bis_skin_checked="1"><label>
                  <input type="text"  id="search"class="form-control" placeholder="Search Product" aria-controls="DataTables_Table_0"></label></div>
              </div>
              <div class="d-flex justify-content-start justify-content-md-end align-items-baseline" bis_skin_checked="1">
                <div class="dt-action-buttons d-flex flex-column align-items-start align-items-md-center justify-content-sm-center mb-3 mb-md-0 pt-0 gap-4 gap-sm-0 flex-sm-row" bis_skin_checked="1">
                @if(session('message'))
          <div class="alert alert-success" style="text-align:center;">{{ session('message') }}</div>
           @endif
                  <div class="dt-buttons btn-group flex-wrap" bis_skin_checked="1">
                    <div class="btn-group" bis_skin_checked="1">
                   <button type="btn" class="btn btn-danger mx-2" id="deletebtn">Delete Selected Records</button>
                    </div> 
                    <button class="btn btn-secondary add-new btn-primary ms-2 ms-sm-0" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                      <a href="{{route('product.create')}} " class="d-none d-sm-inline-block" style="color:white;">Add Product</a></button>
                  </div>
                </div>
              </div>
            </div>
            <div id="tablebody">
            <table class="table table-striped my-1" style="text-align:center;">
      <thead>
        <tr>
          <th><input class="form-check-input" name="role[]" type="checkbox" value="F" id="defaultCheck3"></th>
          <th >sr.no</th>
          <th>Product Name</th>
          <th>Status</th>
          <th>Thumbnail </th>
          <th>Category</th>
          <th>Stock Status</th>
          <th>Price</th>
          <th>Qty</th>
          <th>Realted Products</th>
         
          <th style=" width:10%">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0" >
        @php
        $i=1;
        @endphp
      @foreach($products as $product)
        <tr>
          <td><input class="form-check-input" name="check[]" type="checkbox" value="{{$product->id}}" id="defaultCheck3"></td>
          <td><strong>{{$i++}}</strong></td>
          <td>{{$product->Name}}</td>
          <td>{{($product->Status==1)?"Active":"Inactive"}}</td>
          <td><img src="{{$product->getfirstmediaurl('Thumbnail')}}" style="height:50px"></td>
          <td>{{ implode(', ', $product->categories->pluck('name')->toArray()) }}</td>
          <td>
    
    @php
        $stockStatus = $product->Stock_Status;
        $isOutOfStock = ($stockStatus == 'outofstock');
    @endphp
    <span class="{{ $isOutOfStock ? 'text-danger' : 'text-success' }}">
        {{ $stockStatus }}
    </span>
</td>
          <td>{{$product->Price}}</td>
          <td>{{$product->Qty}}</td>
          <td>{{$product->Related_Products}}</td>
          

          <td style="display: flex; justify-content:center; align-items:center;padding:24px 0rem;">
           <a href="{{route('product.edit',$product->id)}}" class="edit">Edit</a>
           <button type="submit"  class="delete" formaction="{{route('product.destroy',$product->id)}}}" formmethod="post">Delete</button>
           
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <div class="d-flex m-3" style ="justify-content: end;">
         {!!$products->links()!!}</div>    
</div>
          </div>
</form>
        </div>
        
       
       
</div>
      </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $('#defaultCheck3').click(function() {
      $('input[type=checkbox]').prop('checked', $(this).prop('checked'));
    });
    $('#deletebtn').click(function() {
      alert('are you sure to Delete Records??');
    });
  });
</script>
<script>

  $(document).ready(function(){
$('#ProductStatus').change(function(){

  productstatus=$(this).val();

  //console.log(productstatus);
  $.ajax({
    url:"{{route('getproduct')}}",
    method:"GET",
    data:{'hh':productstatus}, 
    success:function(result){
      $('#tablebody').html(result);
    },
   error:function(re){
      alert('something went wrong');
    }

  });


});
$('#ProductStock').change(function(){

productstatus=$(this).val();

$.ajax({
  url:"{{route('getproductbystock')}}",
  method:"GET",
  data:{'ProductStock':productstatus}, 
  success:function(result){
    $('#tablebody').html(result);
  },
 error:function(re){
    alert('something went wrong');
  }

});


});

$('#search').on('keyup',function(){
   var search=$(this).val();
   $.ajax({
  url:"{{route('searchproduct')}}",
  method:"GET",
  data:{'search':search}, 
  success:function(result){
    $('#tablebody').html(result);
  },
 error:function(re){
    alert('something went wrong');
  }

});
});

  });
</script>
@endsection