@extends('layouts.main')
@section('content')



<div class="row">
  <div class="col-2">
    @include('admin.sidebar')
  </div>
  <!-- DataTales Example -->
  <div class="col-10 mt-3">
    <form class="form-inline" action="{{route('admin.customer.list')}}" id="searchform">
      <input class="form-control col-8" name="search" type="text" value="{{request('search')}}" placeholder="Search">
      <button class="btn btn-success ml-2" type="submit">Search</button>
    </form>
  <div class="card shadow mb-4">
    <div class="card-header  bg-info py-3">
      <h6 class="m-0 font-weight-bold text-center" style="color: white">Customer data</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color:black">
          <thead>
            <tr>
              <th>User id</th>
              <th> User Name</th>
              <th>Email</th>
              <th>Door no& street name</th>
              <th>Mobile</th>
              <th>State</th>
              <th>City</th>
              <th>Pin code</th>
            </tr>
          </thead>
          <tfoot>
            @foreach ($users as $user)

            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->address}}</td>
              <td>{{$user->mobile}}</td>
              <td>{{$user->state}}</td>
              <td>{{$user->city}}</td>
              <td>{{$user->pincode}}</td>
            </tr>

            @endforeach
          </tfoot>

        </table>
      </div>
    </div>
    
    </div>
    @endsection</div>