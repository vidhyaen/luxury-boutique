@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-2">
      @include('admin.sidebar')
    </div>
    <!-- DataTales Example -->
  

    <div class="col-10 mt-3">
      
    <div class="card shadow mb-4">
      <div class="card-header  bg-info py-3">
        <h6 class="m-0 font-weight-bold  text-center" style="color: white">Cart data</h6>
      </div>
      <div class="mt-3">
        <form class="form-inline" action="{{route('admin.customer.list')}}" id="searchform">
          <input class="form-control col-8" name="search" type="text" value="{{request('search')}}" placeholder="Search">
          <button class="btn btn-success ml-2" type="submit">Search</button>
        </form>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered " id="dataTable"  style="color: black">
            <thead>
              <tr>
                <th>Cart id</th>
                <th>Product name</th>
                <th>User name</th>
             
                <th>Size name</th>
                <th>Color name</th>
                <th>Quantity</th>
                <th>Price</th>
            
              </tr>
            </thead>
            <tfoot>
          
  @foreach ($carts as $cart)
  <tr>
  <td>{{$cart->id}}</td>
  <td>{{$cart->product->name}}</td>
  <td>{{$cart->user->name}}</td>
  <td>{{$cart->size->name}}</td>
  <td>{{$cart->color->name}}</td>
  <td>{{$cart->quantity}}</td>
  <th>{{$cart->product->price}}</th>
  
 
</tr>

  @endforeach
              
             
              
              
  
             
            </tfoot>
          </table>
        </div>
      </div>
    
      </div>
     </div>
@endsection