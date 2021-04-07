@extends('layouts.main')


@section('content')

@include('accounts.navbar')
<div class="row">
    <div class="col-3"></div>

    <div class="col-6 px-3 mt-5">
        <div class="card2 card border-0 px-4 py-5 mt-2">
            <h3 class="mb-0 mr-4  text-center text-danger">My profile</h3>


            <form action="{{route('profile.submit',auth()->user()->id)}}" method="post" class="p-2 mt-2">
                @csrf
                @method('POST')



                <div class=" px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">Username</h6>
                    </label> <input class="mb-4" type="text" name="name" value="{{$user->name}}"
                        placeholder="Enter a valid username ">
                </div>
                <div class=" px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">Email </h6>
                    </label> <input class="mb-4" type="email" name="email" value="{{$user->email}}" readonly
                        placeholder="Enter a valid email address">
                </div>


                <div class=" px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">Mobile </h6>
                    </label> <input class="mb-4" type="text" name="mobile" value="{{$user->mobile}}"
                        placeholder="Enter a valid mobile number">
                </div>
                <div class=" px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">Door Number and street name</h6>
                    </label> <input class="mb-4" type="text" name="address" value="{{$user->address}}"
                        placeholder="Enter a valid street name">
                </div>
                <div class=" px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">pincode</h6>
                    </label> <input class="mb-4" type="text" name="pincode" value="{{$user->pincode}}"
                        placeholder="Enter a valid pincode">
                </div>
                <div class=" px-3"> <label class="mb-1">
                    <h6 class="mb-0 text-sm">city</h6>
                </label> <input class="mb-4" type="text" name="city" value="{{$user->city}}"
                placeholder="Enter a valid city">
            </div>
                                    <div class=" px-3"> <label class="mb-1">
                                            <h6 class="mb-0 text-sm">State</h6>
                                        </label> <input class="mb-4" type="text" name="state" value="{{$user->state}}"
                                            placeholder="Enter a valid state">
                                    </div>

                <div class=" px-3 text-center"> <button type="submit" class="btn btn-blue text-center">save</button>


                    <div class=" px-3 text-center mt-3">
                        <a href="{{route('home')}}" class="btn btn-blue text-center">Back</a>

            </form>
        </div>
    </div>
    <div class="col-3"></div>
</div>
@endsection
@push('page-styles')
<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-color: #B0BEC5;
        background-repeat: no-repeat
    }

    .card0 {
        box-shadow: 0px 4px 8px 0px #757575;
        border-radius: 0px
    }

    .card2 {
        margin: 0px 40px
    }

    .logo {
        width: 200px;
        height: 100px;
        margin-top: 20px;
        margin-left: 35px
    }

    .image {
        width: 360px;
        height: 280px
    }

    .border-line {
        border-right: 1px solid #EEEEEE
    }

    .facebook {
        background-color: #3b5998;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .twitter {
        background-color: #1DA1F2;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .linkedin {
        background-color: #2867B2;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .line {
        height: 1px;
        width: 45%;
        background-color: #E0E0E0;
        margin-top: 10px
    }

    .or {
        width: 10%;
        font-weight: bold
    }

    .text-sm {
        font-size: 14px !important
    }

    ::placeholder {
        color: #BDBDBD;
        opacity: 1;
        font-weight: 300
    }

    :-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    ::-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 2px;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304FFE;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    a {
        color: inherit;
        cursor: pointer
    }

    .btn-blue {
        background-color: #1A237E;
        width: 150px;
        color: #fff;
        border-radius: 2px
    }

    .btn-blue:hover {
        background-color: #000;
        cursor: pointer
    }

    .bg-blue {
        color: #fff;
        background-color: #1A237E
    }

    @media screen and (max-width: 991px) {
        .logo {
            margin-left: 0px
        }

        .image {
            width: 300px;
            height: 220px
        }

        .border-line {
            border-right: none
        }

        .card2 {
            border-top: 1px solid #EEEEEE !important;
            margin: 0px 15px
        }
    }
</style>
@endpush