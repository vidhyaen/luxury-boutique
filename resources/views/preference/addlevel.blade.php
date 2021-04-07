@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6 mt-5">
            
        @foreach ($errors as $error)
        {{ $error }}
        @endforeach
        <form action="{{ route('level.submit') }}" method="post" class="card card-register ">
            @csrf
            @method('POST')
            <div class="mb-4 p-3 text-center">
                <h6 class="mb-0 mr-4 mt-2">Customer level</h6>

            </div>
            <div class=" p-3"> <label class="mb-1 p-1">
                     Name
                </label> <input class="mb-1 form-control" type="text" name="name"
                    placeholder="Enter a valid  name ">
            </div>
            <div class=" p-3"> <label class="mb-1 p-1">
                    Amount
                </label> <input class="mb-1 form-control" type="text" name="amount"
                    placeholder="Enter a extra amount ">
            </div>
            <div class=" p-3 "> 
                <input type="submit" value="submit" class="btn btn-success float-left" />
               <a href="{{route('offers')}}"
                    class="btn btn-warning float-right ">Cancel</a>
        </div>
        </form>
   
        </div>
    <div class="px-4 py-5 ">

</div>
</div>
<style>
    body{
    background-image: 
    url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTYtsD18tWenOo8qIDP0q8_LPdkV8j9H1rCow&usqp=CAU');

    background-size: cover;
    background-repeat: no-repeat;
    color:white;
  }
</style>
