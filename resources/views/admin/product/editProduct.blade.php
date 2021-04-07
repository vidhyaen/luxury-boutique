@extends('layouts.main')
@section('content')

<body>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6">
   
    <div class="p-2 justify-content-inbetween">
        <form method="POST" action="{{ route('product.submit',$products->id)}}" enctype="multipart/form-data" class="card card-register col-12">
            {{ csrf_field() }}
            <h2 style="color:rgb(10, 108, 153);" class=" p-2 text-center">Edit Product</h2>
            <input type="hidden" class="form-control" placeholder="product name" name="id" value="{{$products->id}}">
            <div class="p-2">
                <label>Product name</label>
                <input type="text" class="form-control" placeholder="product name" name="name"  value="{{$products->name}}">
            </div>
            <div class="p-2">
                <label>Product Category</label>
                <select name="category_id" class="form-control" id="" >
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="p-2">
                <label>Product description</label>
                <input type="text" class="form-control" placeholder="product description" name="description" value="{{$products->description}}"></div>
            <div class="p-2">  
                <label>Product size</label>
                <select name="size_id" id="" class="form-control" value="{{$products->size_id}}">
                    @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" {{ $size->id == $products->size_id ? 'selected' : '' }}>{{ $size->name }}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="p-2"> 
                <label>Product price</label>
                <input type="text" class="form-control" placeholder="product price" name="price" value="{{$products->price}}">
            </div>
            <div class=" p-2">
                <label>Product color</label>
                <select name="color_id" class="form-control"value="{{$products->color_id}}" >
                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}" {{ $color->id == $products->color_id ? 'selected' : '' }}>{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2"> 
                <label>stock</label>
                <input type="text" class="form-control" placeholder="product stock" value="{{$products->stocks}}" name="stock">
            </div>
            <div class="p-2"> 
                <label>Product image</label>
                <input type="file"  placeholder="product image" name="image" value="{{$products->image}}">
            </div>
            <div class=" p-2 text-center">
                <input type="submit" value="submit" class="btn btn-success float-left" />
           
            
                <a href="{{route('Productdetail')}}"class="btn btn-warning float-right" />Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
@endsection
<style>
    body{
    background-image: 
    url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTYtsD18tWenOo8qIDP0q8_LPdkV8j9H1rCow&usqp=CAU');

    background-size: cover;
    background-repeat: no-repeat;
    color:white;
  }
</style>
