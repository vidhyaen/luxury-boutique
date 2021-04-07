@extends('layouts.main')
@section('content')
@include('accounts.navbar')
<div class="row">
    <div class="col-4 text-center">
     
    </div>
    <div class="col-6">
        <form method="POST" action="{{route('feedback.submit')}}"  >
            @csrf
            <h1 class="text-center text-danger"> Feedback </h1>
           <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-group">
            <label>Email id</label>
            <input type="text" name="email" value="{{$user->email}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Mobile number</label>
            <input type="text" name="mobile" value="{{$user->mobile}}"class="form-control">
        </div>
        <div class="form-group">
            <label>Query</label>
            <textarea class="form-control rounded-0"  name="description" rows="3">
                
            </textarea>
        </div>
        <input type="submit" value="submit" class="btn btn-success">
        </form>
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
