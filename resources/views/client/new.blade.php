@extends('client.layout')
@section('title',$title)
@section('content')
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

    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2>Tin tức</h2>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($news as $item)
            <div class="col-md-6 col-lg-4 mb-7" data-aos="fade-up" data-aos-delay="300">
              <a href="{{route('route_FE_New_Detail',$item->id)}}"><img src="{{ url('storage/'.$item->image)}}" alt="Image" class="img-fluid"></a>
              <div class="p-4 bg-white">
                <span class="d-block text-secondary small text-uppercase">{{$item->updated_at}}</span>
                <h2 class="h5 text-black mb-3"><a href="#">{{$item->title}}</a></h2>
                <span class="d-block text-secondary small text-uppercase">{{$item->category->title}}</span>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection
    

