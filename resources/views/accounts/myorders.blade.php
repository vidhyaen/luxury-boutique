@extends('layouts.main')
@section('content')
@include('accounts.navbar')
<div class="container">
  <b> <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0" style="color: blue font-size:5px">

        <tr>
          <th>Order id</th>
         
          <th>Order date</th>
          <th>Status</th>
         
          <th>Price</th>
          <th>Actions</th>
          
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
          
            <td>{{$order->created_at}}</td>
            <td>{{$order->orderstatus->name}}</td>
           
            <td>{{$order->price}}</td>
            <td><a href="{{route('info',$order->id)}}"><i class="fa fa-eye" aria-hidden="true"> view details</i></a>
          
            
          </tr></b> 
            
        @endforeach

        

      </table>
    </div>
    
  
</div>