@extends('layouts.main')
@section('content')

@include('accounts.navbar')


<div class="container">
    <div class="row">
        <!-- Image -->

        <div class="col-4">
            <div class="card bg-light mt-5">
                <div class="card-body">

                    <img class="img-fluid img-responsive" src="/{{ $product->image }}">
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-6 add_to_cart_block">
            <div class="card bg-light mb-5 mt-5">
                <div class="card-body">



                    <div class="form-group">
                        <label>Product Name :</label>
                        <div class="mb-3">

                            <input type="text" class="form-control" value="{{$product->name}}" readonly>
                            </input>
                        </div>
                        <div class="mb-3">
                            <label>Price :</label>
                            <input type="text" class="form-control" value="{{$product->price}}" readonly>

                        </div>
                        <form action="{{route('add-to-cart')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label>Product size</label><br>
                                <select name="size" id="" class="form-group form-control " required>
                                    <option value=""></option>
                                    @foreach ($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Product color</label><br>
                                <select name="color" id="" class="form-group form-control " required>
                                    <option value=""></option>
                                    @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="text" class="form-control" name="quantity">
                            </div>
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <button type="submit" class="btn btn-success">Add to cart</button>
                            <a href="{{route('checkout')}}" class="btn btn-warning">Buy now</a>
                        </form>
                    </div>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br />Fast delivery</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br />Secure payment
                            </li>

                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        Ratings
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <a class="pull-right" href="#reviews">View all reviews</a>
                    </div>

                </div>
            </div>
            <i class="fa fa-arrow-down"></i> see the description below
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3 mt-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i>
                    Description</div>
                <div class="card-body">
                    <p class="card-text">
                        Blue and off-gold printed kurta with palazzos and dupatta
Blue and off-white printed straight calf length kurta with gotta patti detail, has a mandarin collar,
 three-quarter sleeves, straight hem, side slits<br>
<p>
    Blue printed palazzos, has a partially elasticated waistband with slip-on closure
Blue and off-gold printed dupatta
</p>
<p>
  <p>Material & Care</p>  
Kurta fabric: pure cotton
Bottom fabric: pure cotton
Dupatta fabric: poly chiffon 
Hand-wash
</p>

             {{$product->description}}      
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Reviews
                </div>
                <div class="card-body">
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2020">July 01,2020

                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
               
                        <p class="blockquote">
                            <p class="mb-0">This is a very pretty kurta. The color and the print are quite bright and has perfect contrast. The net with the golden beads gives it a festive look and makes it look grand. My size is medium and it was a perfect fit.</p>
                        </p>
                        <hr>
                    </div>
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="10-02-2020">August 10,2020

                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                        <span class="fa fa-star" aria-hidden="true"></span>
                    
                        <p class="blockquote">
                            <p class="mb-0">Perfect fittings..... colour & materials are also very good.</p>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>