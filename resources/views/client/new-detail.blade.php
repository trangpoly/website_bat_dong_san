@extends('client.layout')
@section('title',$title)
@section('content')
    <!--Banner realty-->
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ url('storage/'.$new->image) }});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">{{$new->title}}</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div>
              <h2 class="h6 text-black">{{$new->updated_at}}</h2>
              <div class="content-desc">
                {!! $new->content !!}
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

@endsection


