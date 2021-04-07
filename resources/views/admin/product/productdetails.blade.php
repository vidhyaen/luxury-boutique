@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-2">
      @include('admin.sidebar')
    </div>
    <!-- DataTales Example -->
   <div class="col-0"></div>

    <div class="col-9 mt-3">
      
    <div class="card shadow mb-4">
      <div class="card-header  bg-info py-3">
        <h6 class="m-0 font-weight-bold  text-center" style="color: white">Product data</h6>
      </div>
      <div class="card-body">
        <div class="">
          <table class="table table-bordered table-responsive" id="dataTable"  style="color:black">
            <thead>
              <tr>
                <th>product id</th>
                <th> Product name</th>
                
                <th>Product description</th>
                
                <th>Price</th>
            
                <th>Edit</th>
             
              </tr>
            </thead>
            <tfoot>
              @foreach ($products as $product)
  
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
               
                <td>{{$product->description}}</td>
                
                <td>{{$product->price}}</td>
                
                <td><a href="{{ route('viewproduct',$product->id)}}" class="btn btn-warning float-center">Edit</a></td>
               
              </tr>
  
              @endforeach
            </tfoot>
  
          </table>
        </div>
      </div>
    
      </div><center>
      <a href="{{ route('addproduct')}}" class="btn col-4 btn-success">Add</a></center>
     </div>
@endsection