<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order status</title>
</head>

<body>
  @extends('layouts.main')
  @section('content')

  <div class="row">
    <div class="col-2">
      @include('admin.sidebar')
    </div>


    <div class="col-10">
      <div class="card shadow mb-4">
        <div class="card-header  bg-info py-3">
          <h6 class="m-0 font-weight-bold text-center" style="color: white">Order details</h6>
        </div>
       
          <form class="form-inline mt-3 ml-4" action="{{route('admin.customer.list')}}" id="searchform">
            <input class="form-control col-4" name="search" type="text" value="{{request('search')}}" placeholder="Search">
            <button class="btn btn-success ml-2" type="submit">Search</button>
          </form>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color:blue">
              <thead>
                <tr>

                  <th>Product name</th>
                  <th>Color name</th>
                  <th>Size name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
              </thead>

              <tfoot>
                @foreach ($order->orderdetails as $detail)
                <tr>
                  <td>{{$detail->product->name}}</td>
                  <td>{{$detail->color->name}}</td>
                  <td>{{$detail->size->name}}</td>
                  <td>{{$detail->quantity}}</td>
                  <td>{{$detail->price}}</td>



                </tr>

                @endforeach


              </tfoot>

            </table>
           
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: blue">

              <tr>
                <th>Order id</th>
                <th>User name</th>
                <th>Address</th>
                <th>Order_status </th>
                <th>Payment</th>
                <th>Transcation id</th>
                <th>Price</th>
                <th>Delievery date</th>
                
              </tr>

              <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->orderstatus->name}}</td>
                <td>{{$order->payment->name}}</td>
                <td>{{$order->transcation_id}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->delivery_date}}</td>
                
              </tr>

            </table>
          </div>


          <div class="text-center">
            <form action="{{route('orderstatus',$order->id)}}" method="POST">
              @csrf
              <select name="status" class="form-control">
                @foreach ($orderstatuses as $orderstatus)
                <option value="{{$orderstatus->id}}">{{$orderstatus->name}}</option>
                @endforeach


              </select>
              <input type="submit" value="submit" class="btn btn-success  mt-2">
            </form>
          </div>
        </div>

      </div>
</body>

</html>