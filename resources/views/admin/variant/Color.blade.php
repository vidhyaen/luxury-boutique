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
      <h6 class="m-0 font-weight-bold text-dark text-center">Color</h6>
    </div>
    
    <div class="card-body">
      <div class="table-responsive table-striped">
        <table class="table table-bordered  font-weight-bold" id="dataTable" width="100%" cellspacing="0" id="table" style="color: black;">
          <thead>
            <tr>
              <th> id</th>
              <th>Color</th>
              <th>Edit</th>
          
             
            </tr>
          </thead>
          <tfoot>
            @foreach ($colors as $color)
            <tr>
              <td>{{$color->id}}</td>
              <td>{{$color->name}}</td>
              <td><a href="{{ route('editcolor',$color->id)}}" class="btn btn-warning float-center">Edit</a></td>
               
            </tr>

            @endforeach
          </tfoot>

        </table>
      </div>
    </div>
    
    </div><center>
      <a href="{{route('addcolor')}}" class="btn col-4 btn-success">Add</a></center>
    @endsection</div>
  
    