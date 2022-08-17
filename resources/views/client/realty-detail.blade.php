@extends('client.layout')
@section('title',$title)
@section('banner')
  <div class="slide-one-item home-slider owl-carousel">
    @foreach (json_decode($realty->photo_gallery) as $item)
    <div class="site-blocks-cover overlay" style="background-image: url({{ $item->src }});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">{{$realty->title}}</h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>
          </div>
        </div>
      </div>
    </div> 
  @endforeach
  </div>
@endsection
@section('content')
    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
            </div>
            <div class="desc_detail bg-white property-body border">
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3">{{$realty->price}} $</strong>
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">Phòng ngủ</span>
                    <span class="property-specs-number">{{$realty->bed}}</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Phòng tắm</span>
                    <span class="property-specs-number">{{$realty->bath}}</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Diện tích</span>
                    <span class="property-specs-number">{{$realty->area}} m<sup>2</sup></span>
                    
                  </li>
                </ul>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Loại bất động sản</span>
                  <strong class="d-block">{{$realty->category->title}}</strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Địa chỉ</span>
                  <strong class="d-block">{{$realty->address}}</strong>
                </div>
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Email</span>
                  <strong class="d-block">{{$realty->email}}</strong>
                </div>
              </div>
              <h2 class="h4 text-black">Mô tả</h2>
              <div class="content-desc">
                {!! $realty->desc !!}
              </div>
              
              

              <div class="row no-gutters mt-5 photo_gallery">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3">Gallery</h2>
                </div>
                @foreach (json_decode($realty->photo_gallery) as $item)
                    <div class="col-sm-8 col-md-4 col-lg-3">
                      <a href="{{$item->src}}" class="image-popup gal-item"><img src="{{$item->src}}" alt="Image" class="img-fluid"></a>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

@endsection


