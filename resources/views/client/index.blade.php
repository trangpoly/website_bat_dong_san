@extends('client.layout')
@section('title',$title)
@section('banner')
  <div class="slide-one-item home-slider owl-carousel">
    @foreach ($banners as $banner)
    <div class="site-blocks-cover overlay" style="background-image: url({{ url('storage/'.$banner->image) }});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2"></h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>
          </div>
        </div>
      </div>
    </div> 
  @endforeach
  </div>
@endsection
@section('content')
<div class="site-section site-section-sm bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <div class="site-section-title">
          <h2>Bất động sản</h2>
        </div>
      </div>
    </div>
    <div class="row mb-5">
      @foreach ($realty as $item)
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="property-entry h-100">
          <a href="{{route("route_FE_Realty_Detail",$item->id)}}" class="property-thumbnail">
            <img src="{{ url('storage/'.$item->image)}}" alt="Image" class="img-fluid">
          </a>
          <div class="p-4 property-body">
            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
            <h2 class="property-title"><a href="property-details.html">{{$item->title}}</a></h2>
            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{$item->address}}</span>
            <strong class="property-price text-primary mb-3 d-block text-success">{{$item->price}} $</strong>
            <ul class="property-specs-wrap mb-3 mb-lg-0">
              <li>
                <span class="property-specs">Phòng ngủ</span>
                <span class="property-specs-number">{{$item->bed}}</span>
                
              </li>
              <li>
                <span class="property-specs">Phòng tắm</span>
                <span class="property-specs-number">{{$item->bath}}</span>
                
              </li>
              <li>
                <span class="property-specs">Diện tích</span>
                <span class="property-specs-number">{{$item->area}} m<sup>2</sup></span>
                
              </li>
            </ul>

          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div>
    </div>  
  </div>
</div>
@endsection

@section('news')
<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <div class="site-section-title">
          <h2>Tin tức</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach ($new as $item)
        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
          <a href="{{route('route_FE_New_Detail',$item->id)}}"><img src="{{ url('storage/'.$item->image)}}" alt="Image" class="img-fluid"></a>
          <div class="p-4 bg-white">
            <span class="d-block text-secondary small text-uppercase">{{$item->updated_at}}</span>
            <span class="d-block text-secondary small text-uppercase">{{$item->category->title}}</span>
            <h2 class="h5 text-black mb-3"><a href="#">{{$item->title}}</a></h2>
          </div>
        </div>
      @endforeach
      
      

    </div>

  </div>
</div>
@endsection
    
