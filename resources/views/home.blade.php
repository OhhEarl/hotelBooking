@extends('frontLayout')
@section('content')

<!-- SLIDER SECTION START -->
  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="{{asset('img/banner-1.jpg')}}" class="d-block w-100 c-img" alt="Slide 1">
        <div class="carousel-caption top-0 mt-4">
          <p class="mt-5 fs-3 text-uppercase">Discover the hidden world</p>
          <h1 class="display-1 fw-bolder text-capitalize">The Aurora Tours</h1>
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Book a tour</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="{{asset('img/banner-2.jpg')}}" class="d-block w-100 c-img" alt="Slide 2">
        <div class="carousel-caption top-0 mt-4">
          <p class="text-uppercase fs-3 mt-5">The season has arrived</p>
          <p class="display-1 fw-bolder text-capitalize">3 available tours</p>
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
            data-bs-target="#booking-modal">Book a tour</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="{{asset('img/banner-3.webp')}}" class="d-block w-100 c-img" alt="Slide 3">
        <div class="carousel-caption top-0 mt-4">
          <p class="text-uppercase fs-3 mt-5">Destination activities</p>
          <p class="display-1 fw-bolder text-capitalize">Go glacier hiking</p>
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5" data-bs-toggle="modal"
            data-bs-target="#booking-modal">Book a tour</button>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- SLIDER SECTION END -->


<!-- SERVICE SECTION START -->
    <div class="container my-4">
      <h1 class="text-center border-bottom">Services</h1>
      <div class="row my-4">
        <div class="col-md-4">
          <img src="{{asset('img/login-photo.jpg')}}" class="img-thumbnail">
        </div>
        <div class="col-md-8">
          <h3>Service Heading</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In sed sint non facilis minus perferendis aspernatur aliquid maiores vero incidunt impedit.</p>
          <p>
            <a href="#" class="btn btn-primary">Read More</a>
          </p>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-md-4">
          <img src="{{asset('img/login-photo.jpg')}}" class="img-thumbnail">
        </div>
        <div class="col-md-8">
          <h3>Service Heading</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In sed sint non facilis minus perferendis aspernatur aliquid maiores vero incidunt impedit.</p>
          <p>
            <a href="#" class="btn btn-primary">Read More</a>
          </p>
        </div>
      </div>
    </div>
<!-- SERVICE SECTION END -->


<!-- Gallery Section Start -->
<div class="container my-4 ">
    <h1 class="text-center" border-bottom>Gallery</h1>
    <div class="row my-4 d-flex justify-content-center">

      @foreach($roomTypes as $rtype)
      <div class="col-md-3 my-2">
        <div class="card " >
          <h6 class="card-header text-center">{{$rtype->title}}</h6>
          <div class="card-body">
           @foreach($rtype->roomtypeimgs as $index => $img) 
            <a href="{{asset('storage/'.$img->img_src)}}" data-lightbox="rgallery{{$rtype->id}}">
              @if($index > 0)
                  <img class="img-fluid hide images" src="{{asset('storage/'.$img->img_src)}}" /></a>
              @else
                <img class="img-fluid images " src="{{asset('storage/'.$img->img_src)}}" /></a>
              @endif
              @endforeach
          </div>
        </div>
      </div>
      @endforeach
    
    </div>
</div>
<!-- Gallery Section End -->

<!-- LightBox Css -->
 <link rel="stylesheet" type="text/css" href="{{asset('vendor/lightbox2-dev/dist/css/lightbox.min.css')}}"/>
<!-- LightBox Js -->
<script src="{{asset('vendor/lightbox2-dev/dist/js/lightbox.min.js')}}"></script>
<script src="{{asset('vendor/lightbox2-dev/dist/js/lightbox-plus-jquery.min.js')}}"></script>

<style>
    .c-item {
  height: 480px;
}

.c-img {
  height: 100%;
  object-fit: cover;
  filter: brightness(0.6);
}
.img-thumbnail{
  width:300px;
  height:300px;
  object-fit:cover;
}
.images{
  width:270px;
  height:200px;
  object-fit:cover;
}
.hide{
  display: none;
}
  </style>


</body>
</html>
  @endsection
