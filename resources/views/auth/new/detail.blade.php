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
                    <form class="form-sample"  class="form-sample" action="{{route('route_New_Update',['id'=>request()->route('id')])}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <div class="row" id="form">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label>Tiêu đề</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{$new->title}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label>Ảnh đại diện</label>
                                <div class="col-4 m-2 row">
                                    <img id="img_preview" src="{{ url('storage/'.$new->image)}}" alt="">
                                </div>
                                <div class="input-group col-xs-12">
                                    <input id="image" type="file" name="image" class="form-control file-upload-info"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label>Danh mục Tin tức</label>
                                <div class="col-sm-5">
                                <select class="form-control" style="line-height: 2" name="category_new_id">
                                        <option value="{{$new->category_new_id}}" selected>{{$new->category->title}}</option>
                                    @foreach ($listCate as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nội dung</label>
                                <div class="col-sm-12">
                                    <textarea class="ckeditor" name="content" id="editor">{{$new->content}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" id="btn-update" class="btn btn-primary me-2">Cập nhật</button>
                    <button class="btn btn-light">Hủy</button>
                    </form>
                </div>
                </div>
            </div> 
        </div> 
    </div> 
</div> 
<script>
    let x = document.getElementById('btn-update');
    setTimeout(function(){x }, 5000);
</script>
@endsection
            
            