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
                            <p>{{ Session::get('error') }}<p>
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
                    <form class="form-sample" action="" method="POST"  enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">Tiêu đề</label>
                                <div class="col-sm-11">
                                <input type="text" class="form-control" name="title"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Giá</label>
                                <div class="col-sm-10">
                                <input type="number" min="10" class="form-control" name="price" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <div class="col-4 m-2 row">
                                <img id="img_preview" src="" alt="">
                            </div>
                            <div class="input-group col-xs-12">
                                <input type="file" name="image" id="image" class="form-control file-upload-info"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Thư viện ảnh</label>
                                <div class="col-sm-10"></div>
                                <div class="col-sm-5 col-form-label">
                                    <div class="col-md-12">
                                        <div class="row" id="photo_preview"></div>
                                    </div>
                                    <div class="upload-btn-wrapper row">
                                        <input type="text" name="photo_gallery" id="photo_gallery" hidden>
                                        <div class="col-3 text-primary btn-fw" id="btnAddPhoto">Thêm ảnh</div>
                                        <p id="count"></p>
                                        <input type="file" name="photo[]" id="photo" class="file" multiple />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Thư viện ảnh</label>
                                <div class="col-sm-10"></div>
                                <div class="col-sm-5 col-form-label">
                                    <div class="col-md-12">
                                        <div class="row" id="previewMainImg"></div>
                                    </div>
                                    <div class="upload-btn-wrapper row">
                                        <input type="text" name="photo_gallery" id="photo_gallery" hidden>
                                        <div class="col-3 text-primary btn-fw" id="btnAddMainImg">Thêm ảnh</div>
                                        <p id="count"></p>
                                        <input type="file" name="img" id="img" class="file" multiple />
                                    </div>
                                </div>
                                
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Danh mục Bất động sản</label>
                                <div class="col-sm-5">
                                <select class="form-control" style="line-height: 2" name="category_realty_id">
                                    @foreach ($listCate as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-12 mb-3"><strong>Thông tin biệt thự</strong></div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Số phòng ngủ</label>
                                <div class="col-sm-10">
                                <input type="number" min="1" max="10" class="form-control" name="bed"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Số phòng tắm</label>
                                <div class="col-sm-10">
                                <input type="number" min="1" max="10"  class="form-control" name="bath" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Diện tích</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" name="area"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="address"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mô tả ngắn</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" name="short_desc"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mô tả</label>
                                <div class="col-sm-12">
                                    <textarea class="ckeditor" name="desc" id="editor"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3"><strong>Thông tin liên hệ</strong></div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">Email</label>
                                <div class="col-sm-11">
                                <input type="text" class="form-control" name="email"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">Số điện thoại</label>
                                <div class="col-sm-11">
                                <input type="text" class="form-control" name="phone"/>
                                </div>
                            </div>
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

<script src="{{asset('auth/js/upload-photo.js')}}"></script>
@endsection
            
            