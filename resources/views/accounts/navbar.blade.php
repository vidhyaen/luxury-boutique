<body>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: black;"> 
      
      
       <div class="text-center">
          <form class="form-inline" action="{{route('home')}}" id="searchform">
            <input class="form-control" name="search" type="text" value="{{request('search')}}" placeholder="Search">
            <button class="btn btn-success ml-2" type="submit">Search</button>
          </form></div>
   
        <ul class="navbar-nav ml-auto"> 
            <li class="nav-item"> 
              <a class="nav-link text-white" href="{{route('home')}}">Home</a>
            </li> 
            <li class="nav-item"> 
              <a class="nav-link text-white" href="{{route('cart')}}">Cart</a>
            </li>
          <li class="nav-item"> 
            <a class="nav-link text-white" href="{{route('myprofile')}}">My Profile</a>
          </li> 
          <li class="nav-item"> 
            <a class="nav-link text-white" href="{{route('myorders')}}">My orders</a>
          </li> 
            <li class="nav-item"> 
              <a class="nav-link text-white" href="/admin/logout">Logout</a>
            </li> 
          </ul>
    </nav> 
    
   
    <!-- Copyright -->
  

@push('page-styles')
<style>
.card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
}
.card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
}
.card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
}

.label-rating { margin-right:10px;
    color:peru;
    display: inline-block;
    vertical-align: middle;
}

.card-product .price-old {
    color: #999;
}</style>
@endpush