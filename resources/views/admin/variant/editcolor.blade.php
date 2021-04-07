@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6 mt-5">

        @foreach ($errors as $error)
        {{ $error }}
        @endforeach
        <form action="{{ route('editcolor.submit',$colors->id)}}" method="post" class="card card-register ">
            @csrf 
            @method('POST')
            <div class="p-3 text-center">
                <h6 class="mb-0 mr-4 mt-2">Edit color</h6>

            </div>
            <input type="hidden" class="form-control" placeholder="id" name="id" value="{{$colors->id}}"
                required="required">
            <div class=" p-3"> <label class="mb-1">
                    Color Name
                </label> <input class="form-control" type="text" name="name" value="{{$colors->name}}"
                    placeholder="Enter a valid color name ">
            </div>
            <div class=" p-3"> <label class="mb-1">
                    <h6 class="mb-0 text-sm">Status</h6>
                </label> <input class="mb-4" type="checkbox" name="status" value="1"
                    {{($colors->status) ? 'checked' : ''}} placeholder="Enter a valid size name ">
            </div>
            <div class=" p-3 "> <button type="submit"
                class="btn btn-success ">Add</button>
                <a href="{{route('color')}}" class="btn btn-warning float-right" />Cancel</a>
        </div>
        </form>
    </div>
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
