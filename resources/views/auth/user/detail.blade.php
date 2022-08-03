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
                    <form class="form-sample" class="form-sample" action="{{route('route_User_Update',['id'=>request()->route('id')])}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{$user->password}}"/>
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <div class="col-4 m-2 row">
                                    <img id="img_preview" src="{{ url('storage/'.$user->avatar) }}" alt="">
                                </div>
                                <div class="input-group col-xs-12">
                                    <input type="file" id="image" name="avatar" class="form-control file-upload-info"/>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}"/>
                            </div>
                            <div class="form-group">
                                <label>Phân quyền</label>
                                <select class="form-control" style="line-height: 2" name="role">
                                    <option value="{{$user->role}}" selected>{{$user->role===0?"Admin":"Nhân viên"}}</option>
                                    <option value="1">Nhân viên</option>
                                    <option value="0">Admin</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
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


            
            