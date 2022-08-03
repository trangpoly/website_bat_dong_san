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
                    <form class="form-sample" action="" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="title"/>
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <div class="col-4 m-2 row">
                                    <img id="img_preview" src="" alt="">
                                </div>
                                <input type="file" id="image" name="image" class="form-control file-upload-info"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Thêm mới</button>
                        <button class="btn btn-light">Hủy</button>
                    </form>
                    <?php //Hiển thị thông báo thành công?>
                    @if ( Session::has('success') )
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                    <?php //Hiển thị thông báo lỗi?>
                    @if ( Session::has('error') )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                    <!-- -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            <button type="button" class="close btn-outline-danger btn-fw" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif

                </div>
                </div>
            </div> 
        </div> 
    </div> 
</div> 
@endsection


            
            