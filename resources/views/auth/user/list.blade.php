@php
    $objUser = \Illuminate\Support\Facades\Auth::user();
@endphp
@extends('auth.layout')
@section('title',$title)
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Danh sách Người dùng</h4>
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
                    {{-- @if ($objUser->role==0)
                        <a href="{{route('route_User_Add')}}" class="btn btn-outline-primary btn-fw">Thêm mới</a>
                    @endif --}}
                        <a href="{{route('route_User_Detail',$objUser->id)}}" class="btn btn-outline-primary btn-fw">Cập nhật tài khoản của bạn</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh đại diện</th>
                                <th>Email</th>
                                <th>Phân quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUser as $item)
                                <tr>
                                    <td>{{$index ++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{ url('storage/'.$item->avatar)}}" alt=""></td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->role===0?"Admin":"Nhân viên"}}</td>
                                    {{-- @if ($objUser->role==0)
                                        <td><a href="{{route("route_User_Detail",$item->id)}}" class="hover-icon-active-del"><i class="mdi mdi-pen"></i></a></td>
                                        <td><a href="{{route("route_User_Remove",$item->id)}}" class="hover-icon-active-edit"><i class="mdi mdi-delete"></i></a></td>
                                    @endif --}}
                                    {{-- @if ($objUser->role==1) --}}
                                        <td><a href="{{route("route_User_Detail",$item->id)}}" class="hover-icon-active-del"><i class="mdi mdi-eye"></i></a></td>
                                    {{-- @endif --}}
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $listUser->appends($extParams)->links() }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            
            