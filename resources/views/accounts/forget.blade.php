@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class=" col-5 card card-register mt-5 px-4 py-5">
        <div class="mb-2 px-3">
            <h6 class="mb-0 mr-4 mt-2 text-center text-bold" style="color:indigo">Forget password</h6>

        </div>

        <form action="#" >
            @csrf
          
            <p class="text-dark ml-4"> If you forgetten your password you can reset them please enter your email address</p>
            <div class=" px-3"> <label class="mb-1">
                    <h6 class="mb-0 text-sm">Email Address</h6>
                </label> <input class="mb-4 form-control" type="text" name="email" placeholder="Enter a valid email address">
            </div>
            <div class=" mb-3 px-3"> <a href="{{route('change-password')}}" class="btn btn-info text-center" >Reset password</a>
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
