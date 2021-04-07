@extends('layouts.main')
@section('content')
@include('accounts.navbar')
<div class="container">
    <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0" style="color: blue">

        <b>
            <tr>

                <th>Product name</th>
                <th>Color name</th>
                <th>Size name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>

            @foreach ($order->orderdetails as $detail)
            <tr>
                <td>{{$detail->product->name}}</td>
                <td>{{$detail->color->name}}</td>
                <td>{{$detail->size->name}}</td>
                <td>{{$detail->quantity}}</td>
                <td>{{$detail->price}}</td>

            </tr>

            @endforeach


    </table>
    <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0" style="color:blue">

        <tr>
            <th>Order id</th>

            <th>Order date</th>
            <th>Status</th>

            <th>Price</th>

        </tr>

        <tr>
            <td>{{$order->id}}</td>

            <td>{{$order->created_at}}</td>
            <td>{{$order->orderstatus->name}}</td>

            <td>{{$order->price}}</td>



        </tr>

    </table>
    @if (!in_array($order->order_status_id,[4,6]))
    <form method="POST" action="{{route('changestatus',$order->id)}}">
        @csrf
        <select name="status" class="form-control text-center">

            @if (in_array($order->order_status_id,[1,2,3]))
            <option value="4">Cancel</option>
            @endif
            @if (in_array($order->order_status_id,[5]))
            <option value="6">Replacement</option>
            @endif

        </select>
        <div class="form-group">
            <label class=" mt-2" style="color:blue">Reason</label>
            <textarea class="form-control rounded-0" name="query" rows="3">

            </textarea>
        </div>
        <input type="submit" value="Submit" class="btn btn-success mt-2">
    </form>
    @endif
    <div class="text-center font-weight-bold">
        @php
        $base_path =$order->order_request_pdf_base_path;
        $file_name = $order->order_request_pdf_file_name;
        $path = Storage::disk('public')->url($base_path . $file_name);
        @endphp
        
        <a href="{{$path}}" target="_blank">Download invoice</a>
    </div>
    <div class="footer-copyright footer text-center mt-5" style="background-color: black; color:white">© 2020 Copyright:

        <a href="{{route('feedback')}}"> Feedback</a>
    </div></b>
</div>