@extends('layouts.main')
@section('content')

<body>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-5">
   
    <div class="p-2 justify-content-inbetween">
        <form method="POST" action="{{ route('addproduct.submit')}}" enctype="multipart/form-data" class="card card-register col-12">
            {{ csrf_field() }}
            <h2 style="color:rgb(10, 108, 153);" class=" p-2 text-center">Add product</h2>
            <div class="p-2">
                <label>Product name</label>
                <input type="text" class="form-control" placeholder="product name" name="name">
            </div>
            <div class="p-2">
                <label>Product Category</label>
                <select name="category_id" class="form-control" id="">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="p-2">
                <label>Product description</label>
                <input type="text" class="form-control" placeholder="product description" name="description"></div>
            <div class="p-2">  
                <label>Product size</label>
                <select name="size_id" id="" class="form-control">
                    @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                   
                </select>
            </div>
            <div class="p-2"> 
                <label>Product price</label>
                <input type="text" class="form-control" placeholder="product price" name="price">
            </div>
            <div class=" p-2">
                <label>Product color</label>
                <select name="color_id" class="form-control">
                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2"> 
                <label>stock</label>
                <input type="text" class="form-control" placeholder="product stock" name="stock">
            </div>
            <div class="p-2"> 
                <label>Product image</label>
                <input type="file"  placeholder="product image" name="image">
            </div>
            <div class=" p-2 text-center">
                <input type="submit" value="submit" class="btn btn-success" />
            </div>
            <div class=" p-2 text-center">
                <a href="{{route('Productdetail')}}"class="btn btn-warning" />Cancel</a>
            </div>
        </form></div>
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
