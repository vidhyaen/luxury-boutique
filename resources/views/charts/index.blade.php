@extends('layouts.main')

@section('content')


<div class="row">
    <div class="col-2">
        @include('admin.sidebar')
    </div>
    <div class="col-10 bg-primary">
        <div class="row mt-5 ">
            <div class="row mt-5">
                <div class="col-5 ml-2">
                    <h1 style="color:white" class="text-center">Categories</h1>
                    <div class="card card-register">
    
                        {!! $chart->container() !!}
    
                    </div>
                </div>
                <div class="col-5">
                    <h1 style="color:white" class="text-center">User account </h1>
                    <div class="card card-register">
    
                        {!! $userchart->container() !!}
    
                    </div>
                </div>
               
            <div class="col-6 mt-2">

                <h2 class="text-primary text-center card card-register p-5 mt-5">No of vistors {{$vistors}} </h2>

            </div>
            <div class="col-5 mt-2">
              
                <div class="card card-register  mt-5">

                    <h2 class="text-primary text-center p-4">Today's most sales &trends Kurti with plazoo set</h2>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-6">
                <h1 style="color:white" class="text-center mt-5">Order</h1>
                <div class="card card-register  mt-5">

                    {!! $orderchart->container() !!}

                </div>
            </div>
            <div class="col-6">
                <h1 style="color:white" class="text-center mt-5">Click</h1>
                <div class="card card-register  mt-5">

                    {!! $clickschart->container() !!}

                </div>
            </div>


            
        </div>

        


        </div>

        @endsection
        @push('page-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
        {!! $userchart->script() !!}
        {!! $orderchart->script() !!}
        {!! $clickschart->script() !!}

        @endpush
        @push('page-styles')

        @endpush