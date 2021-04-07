@extends('layouts.main')
@section('content')

@include('accounts.navbar')


<div class="d-block ml-1">
    <div class="row bg-info p-1">
        <div class="col-3 ">
            <label>Product Category</label><br>
        
    <select name="category" class="form-group col-8" form="searchform">
        <option value="">All</option>
      @foreach ($categories as $category)
          
    
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
        </div>
    <div class="col-3 ">
    <label>Product color</label><br>
    <select name="color" class="form-group col-8 " form="searchform">
        <option value="">All</option>
       @foreach ($colors as $color)
           
        <option value="{{$color->id}}">{{$color->name}}</option>
        @endforeach
    </select></div>
   
        <div class="col-3 ">
   
            <label>Prize</label><br>
            <select name="price" id="" class="form-group col-8" form="searchform">
                <option value="">All</option>
                <option value="500">100-500</option>
                <option value="1000">500-1000</option>
                <option value="2000">1000-2000</option>
            
               
            </select></div>
        <div class="col-0 text-center">
            
 <a href="{{route('home')}}" class="btn text-center mt-4" style="background-color: white">Reset</a></div>
</div>
</div>
@if (Session::has('message'))
<p class="card card-register bg-secondary text-white p-3 text-center" >{{Session::get('message')}}</p>
    
@endif
<div class="container">


    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <a href="{{route('detail',$product->id)}}">
                <div class="card card-product mt-5">
                    <div class="img-wrap mt-4 "><img src="/{{ $product->image}}">
                    </div>
                    <div class="info-wrap text-primary font-weight-bold text-center">
                        <p class="title">{{$product->name}}</p>
                        <p class="desc">Price {{$product->price}}</p>

                    </div> <!-- bottom-wrap.// -->
                </div>
            </a>
        </div> <!-- col // -->
        @endforeach
    </div>
</div>
    <!--container.//-->
    @endsection