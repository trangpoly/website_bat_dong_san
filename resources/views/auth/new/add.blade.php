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
                    <form class="form-sample"  class="form-sample" action="" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <div class="row" id="form">
                        <div class="form-group">
                            <label class="label">Tiêu đề</label>
                            <input type="text" class="form-control" name="title"/>
                        </div>
                        <div class="form-group">
                            <label class="label">Ảnh đại diện</label>
                            <div class="col-4 m-2 row">
                                <img id="img_preview" src="" alt="">
                            </div>
                            <div class="input-group col-xs-12">
                                <input type="file" id="image" name="image" class="form-control file-upload-info"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Danh mục Tin tức</label>
                            <select class="form-control" style="line-height: 2" name="category_new_id">
                                @foreach ($listCate as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label">Nội dung</label>
                            <textarea class="ckeditor" name="content" id="editor"></textarea>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Thêm mới</button>
                    <button class="btn btn-light">Hủy</button>
                    </form>
                </div>
                </div>
            </div> 
        </div> 
    </div> 
</div> 
@endsection
            
            