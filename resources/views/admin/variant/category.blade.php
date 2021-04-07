@extends('layouts.main')
@section('content')


<div class="row">
  <div class="col-3">
    @include('admin.sidebar')
  </div>
  <div class="col-1"></div>
  <!-- DataTales Example -->
  <div class="col-6 mt-3">

  <div class="card shadow mb-4"  > 
    <div class="card-header bg-info py-3">
      <h6 class="m-0 font-weight-bold text-dark text-center">Categories</h6>
    </div>
    
    <div class="card-body">
      <div class="table-responsive table-striped">
        <table class="table table-bordered  font-weight-bold" id="dataTable" width="100%" cellspacing="0" id="table" style="color: black;">
          <thead>
            <tr>
              <th> id</th>
              <th>Categories</th>
              <th>Edit</th>
              
             
            </tr>
          </thead>
          <tfoot>
            @foreach ($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td><a href="{{ route('editcategory',$category->id)}}" class="btn btn-warning float-center">Edit</a></td>
                
            </tr>

            @endforeach
          </tfoot>

        </table>
      </div>
    </div>
    
    </div>
    <center> <a href="{{ route('addcategory')}}" class="btn col-4 btn-success">Add</a></center>
    @endsection</div>
  
    