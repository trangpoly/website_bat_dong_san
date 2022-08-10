@extends('auth.layout')
@section('title',$title)
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
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
                    <a href="{{route('route_CateNew_Add')}}" type="button" class="btn btn-outline-primary btn-fw">Thêm mới</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Ảnh</th>
                                <th colspan="2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listCateRealty as $item)
                            <tr>
                                <td>{{$index ++}}</td>
                                <td>{{$item->title}}</td>
                                <td><img src="{{ url('storage/'.$item->image)}}" alt=""></td>
                                <td><a href="{{route("route_CateNew_Detail",$item->id)}}" class="hover-icon-active-del"><i class="mdi mdi-pen"></i></a></td>
                                <td><a href="{{route("route_CateNew_Remove",$item->id)}}" class="hover-icon-active-edit"><i class="mdi mdi-delete"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $listCateRealty->appends($extParams)->links() }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
            
            