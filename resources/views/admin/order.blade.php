@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-2">
      @include('admin.sidebar')
    </div>
    <!-- DataTales Example -->
   <div class="col-0"></div>

    <div class="col-10 mt-3">
     
    <div class="card shadow mb-4">
      <div class="card-header  bg-info py-3">
        <h6 class="m-0 font-weight-bold  text-center" style="color: white">Order details</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered " id="dataTable"  style="color: black">
            <thead>
              <tr>
                <th>Order id</th>
                <th>User name</th>
                <th>Address</th>
                <th>Order_status </th>
                <th>Payment</th>
                <th>Transcation id</th>
                <th>Price</th>
                <th>More details</th>
              </tr>
            </thead>
            <tfoot>
              @foreach ($orders as $order)
              <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->orderstatus->name}}</td>
                <td>{{$order->payment->name}}</td>
                <td>{{$order->transcation_id}}</td>
                <td>{{$order->price}}</td>
                <td> <a href="{{route('orderdetails',$order->id)}}"><i class="fa fa-eye text-center" aria-hidden="true"> View details</i></a>
             
            </tr>
                  
              @endforeach
             
  
        
              
  
             
            </tfoot>
          </table>
        </div>
      </div>
    
      </div>
     </div>
@endsection