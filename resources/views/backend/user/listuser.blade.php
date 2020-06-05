@extends('backend.master.master')
@section('title','Danh sách người dùng')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tài khoản
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Quản lí tài khoản</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box-header">
            <a href="{{ route('add') }}" class="btn btn-block btn-success" style="width: 200px;">
              <i class=" fa fa-plus"></i>
              Thêm tài khoản
            </a>
          </div>
          @if(session('thongbao'))
        <div class="alert alert-success" roles="alert">
            <strong>{{ session('thongbao') }}</strong>
        </div>
        @endif
          <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
            <div class="col-sm-6">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr role="row">
                  <!--   <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th> -->
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Tên tài khoản</th>
                    {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Ảnh đại diện</th> --}}
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Số điện thoại</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Quyền</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Địa chỉ</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >Hành động</th>
                  </tr>
                </thead>
                @foreach($users as $user)
                <tbody>
                <tr>
                  <td> {{ $user->id }}</td>
                  <td> {{ $user->name }}</td>
                  {{-- <td>
                    <div class="thum-img" style="width: 100px; height: 100px;">
                       <img src="img/{{ $user->img }}" style="width: 100%;height: 100%">
                    </div>
                  </td> --}}
                  <td> {{ $user->email }}</td>
                  <td> {{ $user->phone }}</td>
                  @if ($user->level==0)
                    <td>Admin</td>
                  @else
                    <td>CTV</td>
                  @endif
                  <td> {{ $user->address }}</td>
                  <td style="display: flex;justify-content: space-around;align-items: center;">

                    <a href="{{route('edit_user',['id'=>$user->id])}}" class="btn btn-block btn-info btn-lg" title="Chỉnh sửa" style="width: 50px;">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('del_edit',['id'=>$user->id])}}" title="Xóa" class="btn btn-block btn-danger btn-lg"style="width: 50px; margin-top: 0;">

                    <a href="{{ route('edit_user',['id'=>$user->id] ) }}" class="btn btn-block btn-info btn-lg" title="Chỉnh sửa" style="width: 50px;">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('del',['id'=>$user->id] )}}" title="Xóa" class="btn btn-block btn-danger btn-lg"style="width: 50px; margin-top: 0;">

                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>

          <!-- //phân trang  -->
          <div class="row">
            <div class="col-sm-12 text-right">
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

                {{ $users->links() }}

              </div>
            </div>
          </div><!-- end-row -->

        </div><!-- end-box -->
      </div>
    </div>
  </section><!-- end-content -->
</div>
@stop

