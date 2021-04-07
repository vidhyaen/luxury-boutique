
@extends('layouts.main')
@section('content')


<div class="row">
  <div class="col-4">
    @include('admin.sidebar')
  </div>
  
  <!-- DataTales Example -->
  <div class="col-6 mt-3">

  <div class="card shadow mb-4"  > 
    <div class="card-header bg-info py-3">
      <h6 class="m-0 font-weight-bold text-dark text-center">Custom Level</h6>
    </div>
    
    <div class="card-body">
      <div class="table-responsive table-striped">
        <table class="table table-bordered  font-weight-bold" id="dataTable" width="100%" cellspacing="0" id="table" style="color: black;">
          <thead>
            <tr>
              <th>id</th>
              <th>Level name</th>
              <th>Level amount</th>
              <th>Edit</th>
              
            </tr>
          </thead>
          <tfoot>
            @foreach ($levels as $level)
            <tr>
              <td>{{$level->id}}</td> 
              <td>{{$level->name}}</td> 
              <td>{{abs($level->amount)}}</td>
              <td><a href="{{ route('editlevel',$level->id)}}" class="btn btn-warning float-center">Edit</a></td>    
            </tr>

            @endforeach
          </tfoot>

        </table>
      </div>
    </div>
    
    </div>
    @endsection
  
    