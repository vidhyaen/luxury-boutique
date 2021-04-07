@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6 mt-5">
    
      

            @foreach ($errors as $error)
            {{ $error }}
            @endforeach
            <form action="{{ route('editcategory.submit',$categories->id)}}" method="post"  class="card card-register">
                @csrf
                @method('POST')
                <div class=" mb-1 px-3">
                    <h6 class="mb-0 mr-4 mt-2 text-center">Edit Categories</h6>
                </div>
                <input type="hidden" placeholder="id" name="id" value="{{$categories->id}}" required="required">

                <div class="p-3"> <input class="mb-1 form-control" type="text" name="name"
                        value="{{$categories->name}}" placeholder="Enter a valid size name ">
                </div>
                <div class="p-3 "> <label class="mb-1">
                        Status
                    </label> <input class="mb-1" type="checkbox" name="status" value="1"
                        {{($categories->status) ? 'checked' : ''}} placeholder="Enter a valid size name ">
                </div>
                <div class=" p-3 "> <button type="submit"
                    class="btn btn-success ">Add</button>
                    <a href="{{route('category')}}" class="btn btn-warning float-right" />Cancel</a>
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
