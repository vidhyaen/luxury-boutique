
@extends('layouts.main')
@section('content')


<div class="row">
  <div class="col-2">
    @include('admin.sidebar')
  </div>
  
  <!-- DataTales Example -->
  <div class="col-10 mt-3">

  <div class="card shadow mb-4"  > 
    <div class="card-header bg-info py-3">
      <h6 class="m-0 font-weight-bold text-dark text-center">Click </h6>
    </div>
    
    <div class="card-body">
      <div class="table-responsive table-striped">
        <table class="table table-bordered  font-weight-bold" id="dataTable" width="100%" cellspacing="0" id="table" style="color: black;">
          <thead>
            <tr>
              <th> id</th>
              <th>User</th>
              <th>Product</th>
              
              <th>Click count</th>
              <th>More details</th>
              
            </tr>
          </thead>
          <tfoot>
            @foreach ($clicks as $click)
            <tr>
              <td>{{$click->id}}</td>

              <td>{{isset($click->user->name) ? $click->user->name : '-' }}</td>
              <td>{{isset($click->product->name) ? $click->product->name : '-'}}</td>
             
              <td>{{ isset($click->click_count) ? $click->click_count : '-'}}</td>
              <td><a href="{{route('viewclick',$click->id)}}">View details</a></td>
              
               
            </tr>

            @endforeach
          </tfoot>

        </table>
      </div>
    </div>
    
    </div>
    @endsection
  
    