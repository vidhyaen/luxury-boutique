@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-4">
      @include('admin.sidebar')
    </div>
    <!-- DataTales Example -->

      <div class="col-6 mt-3">
      
    <div class="card shadow mb-4">
      <div class="card-header  bg-info py-3">
        <h6 class="m-0 font-weight-bold  text-center" style="color: white">Stock data</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered " id="dataTable"  style="color: black">
            <thead>
              <tr>
                <th>Product id</th>
                <th>Product name</th>
                <th>Stocks</th>
                
                
              
                
               
                
                 
                
                <th>Edit</th>
            
             
              </tr>
            </thead>
            <tfoot>
             
                @foreach ($products as $product)
                    
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->stocks}}</td>
                  <td><a href="{{ route('viewproduct',$product->id)}}" class="btn btn-warning float-center">Edit</a></td>
                </tr>
                @endforeach
             
              
  
            
            </tfoot>
          </table>
        </div>
      </div>
    
      </div>
     </div>
@endsection