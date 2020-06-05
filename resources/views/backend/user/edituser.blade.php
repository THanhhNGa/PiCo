@extends('backend.master.master')
@section('title','Sửa thông tin người dùng')
@section('main')
<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
      <li ><a href="#">Quản lí tài khoản</a></li>
      <li class="active">Thêm tài khoản mới</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Sửa tài khoản</h1>
      </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="panel panel-default">
                <div class="panel-body">


                      <div class="col-md-8">
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"  placeholder="Nhập tên tài khoản">
                            @if ($errors->has('name'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>Phân quyền</label>
                            <select name="level" class="form-control">

                                    @if ($user->level==0)
                                        <option value="0" selected>Admin</option>
                                        <option value="1">Cộng tác viên</option>
                                    @else


                                        <option value="1" selected>Cộng tác viên</option>
                                    @endif

                            </select>
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Nhập email" >
                            @if ($errors->has('email'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" value="" class="form-control" placeholder="Nhập mật khẩu">
                            {{-- @if ($user->password!=""&&$errors->has('password'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif --}}
                          </div>
                          <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="Nhập số điện thoại">
                            @if ($errors->has('phone'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="Nhập địa chỉ">
                            @if ($errors->has('address'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                          </div>
                          <button type="submit" class="btn btn-block btn-primary" style="width: 100px; float: right;">Cập nhật</button>
                        </form>
                      </div>


                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
</div>
@stop
