@extends('auth.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Danh sách Banner</h4>
                        <button type="button" class="btn btn-outline-primary btn-fw">Thêm mới</button>
                        <div class="table-responsive">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>User</th>
                                <th>Product</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>Jacob</td>
                                <td>Photoshop</td>
                                <td><a href="#" class="hover-icon-active-del"><i class="mdi mdi-delete"></i></a></td>
                                <td><a href="#" class="hover-icon-active-edit"><i class="mdi mdi-pen"></i></a></td>
                                </tr>
                                <tr>
                                <td>Messsy</td>
                                <td>Flash</td>
                                <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                                <td><label class="badge badge-warning">In progress</label></td>
                                </tr>
                                <tr>
                                <td>John</td>
                                <td>Premier</td>
                                <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                                <td><label class="badge badge-info">Fixed</label></td>
                                </tr>
                                <tr>
                                <td>Peter</td>
                                <td>After effects</td>
                                <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                                <td><label class="badge badge-success">Completed</label></td>
                                </tr>
                                <tr>
                                <td>Dave</td>
                                <td>53275535</td>
                                <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                                <td><label class="badge badge-warning">In progress</label></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>

            @endsection
            
            