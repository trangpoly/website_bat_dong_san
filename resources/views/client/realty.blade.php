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
      @if (count($realty) ==0)
        <span class="property-specs m-auto" style="font-size: 15pt">Không có Bất động sản nào thuộc danh mục này</span>  
      @endif
      @if (count($realty)>0)
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
      @endif
      
    </div>
    <div>
    </div>  
  </div>
</div>
@endsection

    
