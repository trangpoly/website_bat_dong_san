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
                        <p class="card-description">
                            Add class <code>.table-hover</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Email</th>
                                    <th>Phân quyền</th>
                                    <th colspan="3">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listUser as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{$item->avatar}}" alt=""></td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->role===0?"Admin":"Nhân viên"}}</td>
                                        <td><a href="#" class="hover-icon-active-del"><i class="mdi mdi-delete"></i></a></td>
                                        <td><a href="#" class="hover-icon-active-edit"><i class="mdi mdi-pen"></i></a></td>
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
            
            