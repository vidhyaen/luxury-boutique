<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        .height {
            min-height: 200px;
        }

        .icon {
            font-size: 47px;
            color: #5CB85C;
        }

        .iconbig {
            font-size: 77px;
            color: #5CB85C;
        }

        .table>tbody>tr>.emptyrow {
            border-top: none;
        }

        .table>thead>tr>.emptyrow {
            border-bottom: none;
        }

        .table>tbody>tr>.highrow {
            border-top: 3px solid;
        }

        img {
            height: 20%;
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">

                    <h2>Invoice</h2>
                </div>
                <hr>
                <table class="table table-border table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>

                    </tr>
                    <tr>
                        <td>{{isset($orders->user->name) ? $orders->user->name : '-'  }}</td>
                        <td>{{isset($orders->user->mobile) ? $orders->user->mobile : '-'}}</td>
                        <td>{{isset($orders->user->email) ? $orders->user->email : '-'}}</td>
                        <td>
                            {{isset($orders->user->address) ? $orders->user->address : '-'}}<br>
                            {{isset($orders->user->city) ? $orders->user->city : '-'}}<br>
                            {{isset($orders->user->state) ? $orders->user->state : '-'}}<br>
                            {{isset($orders->user->pincode) ? $orders->user->pincode : '-'}}<br>

                        </td>

                    </tr>
                </table>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>

                </div>
                <div class="panel-body">
                    <div class=" table table-responsive">
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                                
                                @foreach ($orders->orderdetails as $order)
                                <tr>
                                    <td>{{isset($order->product->name) ? $order->product->name : '-'}}</td>
                                    <td>{{isset($order->product->price) ? $order->product->pricee : '-'}}</td>
                                    <td>{{isset($order->quantity) ? $order->quantity : '-'}}</td>
                                    <td>{{$order->product->price * $order->quantity}}</td>

                                </tr>
                                @endforeach




                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>