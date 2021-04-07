<head>
    <link href="~/Content/sweetalert/sweet-alert.css" rel="stylesheet" />
    <script src="https://lipis.github.io/bootstrap-sweetalert/lib/sweet-alert.js"></script>
</head>

@extends('layouts.main')
@section('content')
@include('accounts.navbar')


<div class="container">
    <div class="row">
        <!-- Image -->
        @foreach ($carts as $cart)
        <div class="col-12 col-lg-6">
            <div class="card bg-light mt-5">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img class="img-fluid col-6 img-responsive text-center" src="/{{ $cart->product->image }}">

                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-5 mt-5">
                <div class="card-body">
                    <form method="post" action="{{route('cart-update',$cart->id)}}">
                        @csrf
                        <div class="form-group">
                            <label>Product Name :</label>
                            <div class="mb-3">

                                <input type="text" class="form-control" value="{{$cart->product->name}}" readonly>
                                </input>
                            </div>
                          
                            <label>Size :</label>
                            <div class="mb-3">

                                <input type="text" class="form-control" value="{{$cart->size->name}}" readonly>
                                </input>
                            </div>
                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{$cart->quantity}}">
                            </div>
                            <label>Product amount: {{$cart->quantity * $cart->product->price}}</label><br>
                            <a href="{{route('cart-remove',$cart->id)}}"
                                class="btn btn-warning text-center text-uppercase">
                                Remove
                            </a>
                            <input type="submit" value="update" class="btn btn-warning text-center text-uppercase">
                           
                        </div>
                        
                    </form>
                   
                </div>
               
            </div>
            {{-- <center>
            <a href="home" class="btn btn-success col-6"> <i class="fa fa-plus" aria-hidden="true"></i> Add more</a></center> --}}
        </div>
        {{-- <center>
            
        </center> --}}


        @endforeach
    </div>

    <div class="card card-register border border-info col-4 text-center font-weight-bold">
        @php
        $amount=0;
        foreach ($carts as $cart) {
        $amount+=$cart->quantity * $cart->product->price;
        }
         $totalamount=$amount+(isset(auth()->user()->level->amount) ? auth()->user()->level->amount: 0);  
          @endphp
     
        <p>Amount:{{$amount}}</p>
        <p>Discount amount:{{abs((isset(auth()->user()->level->amount) ? auth()->user()->level->amount: 0) )}}</p>
         <p> Total amount:{{$totalamount}} </p>
        <div class="text-center">
            <a href="{{route('checkout')}}" class="btn btn-info ">PlaceOrder</a>
        </div>


    </div>
   
</div>