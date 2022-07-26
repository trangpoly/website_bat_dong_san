@extends('auth.layout')
@section('title',$title)
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$title}}</h4>
                    <?php //Hiển thị thông báo thành công?>
                    @if ( Session::has('success') )
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <?php //Hiển thị thông báo lỗi?>
                    @if ( Session::has('error') )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif
                    <!-- -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form class="form-sample" class="form-sample" action="{{route('route_Banner_Update',['id'=>request()->route('id')])}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="title" value="{{$banner->title}}"/>
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <div class="col-4 m-2 row">
                                    <img id="img_preview" src="{{ url('storage/'.$banner->image) }}" alt="">
                                </div>
                                <div class="input-group col-xs-12">
                                    <input type="file" id="image" name="image" class="form-control file-upload-info"/>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text" class="form-control" name="desc" value="{{$banner->desc}}" />

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                        <button class="btn btn-light">Hủy</button>
                    </form>
                </div>
                </div>
            </div> 
        </div> 
    </div> 
</div> 
@endsection


            
            