
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
      <h6 class="m-0 font-weight-bold text-dark text-center">Custom search</h6>
    </div>
    
    <div class="card-body">
      <div class="table-responsive table-striped">
        <table class="table table-bordered  font-weight-bold" id="dataTable" width="100%" cellspacing="0" id="table" style="color: black;">
          <thead>
            <tr>
              <th> id</th>
              <th>User</th>
              <th>search term</th>
              <th>Category</th>
              <th>Color</th>
              <th>Session_id</th>
              <th>Price</th>
              
            </tr>
          </thead>
          <tfoot>
            @foreach ($searches as $search)
            <tr>
              <td>{{$search->id}}</td>

              <td>{{ isset($search->user->name) ? $search->user->name : '-' }}</td>
              <td>{{isset($search->search_term) ? $search->search_term : '-'}}</td>
              <td>{{isset($search->category->name) ? $search->category->name : '-'}}</td>
              <td>{{isset($search->color->name) ? $search->color->name: '-'}}</td>
              <td>{{$search->session_id}}</td>
              <td>{{ isset($search->price) ? $search->price: '-'}}</td>
              
               
            </tr>

            @endforeach
          </tfoot>

        </table>
      </div>
    </div>
    
    </div>
    @endsection
  
    