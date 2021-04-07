@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class=" col-5 card card-register mt-5 px-4 py-5">
        <div class="mb-2 px-3">
            <h6 class="mb-0 mr-4 mt-2 text-center text-bold" style="color:indigo">Edit stock</h6>

        </div>

        <form action="#">
            @csrf
            
            <div class=" px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">product name</h6>
            </label> <input class="mb-4 form-control" type="text" name="pname" placeholder="product name">
        </div>
    
            <div class=" px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Stock</h6>
            </label> <input class="mb-4 form-control" type="text" name="stock" placeholder="Edit stock">
        </div>
            <div class=" mb-3 px-3"> <button type="submit" class="btn btn-info text-center">submit</button>
         <a href="{{route('stock')}}" class="btn btn-warning float-right" />Cancel</a>
            </div>
        </form>
    </div>

</div>

    
@endsection

    
<style>
   body{
    background-image: url("https://sme.asia/en/wp-content/uploads/2020/05/20200513-SME-Singapore-New-ECommerce-Image.jpg");
    background-size: 60%;
    background-repeat: repeat;
}
</style>
