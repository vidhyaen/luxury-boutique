@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-4"></div>
    <div class=" col-5 card card-register mt-5 px-4 py-5">
        <div class="mb-2 px-3">
            <h6 class="mb-0 mr-4 mt-2 text-center text-bold" style="color:indigo">Change password</h6>

        </div>

        <form action="#">
            @csrf
            
            <div class=" px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Current password</h6>
            </label> <input class="mb-4 form-control" type="password" name="cpass" placeholder="Enter new password">
        </div>
            <div class=" px-3"> <label class="mb-1">
                    <h6 class="mb-0 text-sm">New password</h6>
                </label> <input class="mb-4 form-control" type="password" name="npass" placeholder="Enter new password">
            </div>
            <div class=" px-3"> <label class="mb-1">
                <h6 class="mb-0 text-sm">Retype password</h6>
            </label> <input class="mb-4 form-control" type="password" name="rpass" placeholder="Enter new password">
        </div>
            <div class=" mb-3 px-3"> <button type="submit" class="btn btn-info text-center">change password</button>
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
