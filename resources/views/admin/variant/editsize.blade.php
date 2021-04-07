@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6 mt-5">

        
        @foreach ($errors as $error)
            {{ $error }}
        @endforeach
        <form action="{{ route('edit.submit',$sizes->id)}}" method="post" class="card card-register ">
            @csrf
            @method('POST')
            <div class="p-1 text-center">
                <h6 class="mb-0 mr-4 mt-2">Edit size</h6>
                
            </div>
            <input type="hidden" class="form-control" placeholder="id"  name="id" value="{{$sizes->id}}" required="required">
            <div class=" p-3"> <label class="mb-1">
                    <h6 class="mb-0 text-center p-1"> Size Name </h6>
                </label> <input class=" form-control" type="text" name="name" value="{{$sizes->name}}"
                    placeholder="Enter a valid size name ">
            </div>
            <div class="p-3"> <label>
                <h6 class="mb-0 text-sm">Status</h6>
            </label> <input class="p-1" type="checkbox" name="status" value="1" {{($sizes->status) ? 'checked' : ''}}
            
                placeholder="Enter a valid size name ">
        </div>
        <div class=" p-3 "> <button type="submit"
            class="btn btn-success ">Add</button>
            <a href="{{route('admin.sizevariant')}}" class="btn btn-warning float-right" />Cancel</a>
    </div>
        </form>
        <style>
            body{
            background-image: 
            url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTYtsD18tWenOo8qIDP0q8_LPdkV8j9H1rCow&usqp=CAU');
        
            background-size: cover;
            background-repeat: no-repeat;
            color:white;
          }
        </style>
        