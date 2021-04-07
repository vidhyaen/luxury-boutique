@extends('layouts.main')
    @section('content')

    <div class="row">
    <div class="col-2">
        @include('admin.sidebar')
    </div>

    
    <div class="col-7">
        <div class="card shadow mb-4">
            <div class="card-header  bg-info py-3">
              <h6 class="m-0 font-weight-bold text-center" style="color: white">Order Status</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: crimson">
                  <thead>
                    <tr>
                      <th> Order id</th>
                      <th>Product id</th>
                      <th>Product name</th>
                      <th>Order status</th>
                      <th>Order status</th>
                    </tr>
                  </thead>
                  <tfoot>
                  
        
                    <tr>
                      <td>1</td>
                      <td>3</td>
                      <td>Kurthi</td>
                      <td><a href="#" class=" btn btn-success">Approved</td>
                      <td><a href="#" class=" btn btn-danger">Denied</td>
                      
                    </tr>
        
                  
                  </tfoot>
        
                </table> 
              </div>
</div>
        </div>
    </div>