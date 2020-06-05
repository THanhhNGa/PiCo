@extends('backend.master.master')
@section('title','Thêm người dùng')
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
        <h1 class="page-header">Thêm tài khoản mới</h1>
      </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post">
                        @csrf
                      <div class="col-md-8">
                          <div class="form-group">
                            <label>Tên tài khoản</label>
                            <input type="text" name="name"  class="form-control" value=""  placeholder="Nhập tên tài khoản">
                            @if ($errors->has('name'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>Phân quyền</label>
                            <select name="level" class="form-control">
                              <option value="0">Admin</option>
                              <option value="1">Cộng tác viên</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email"  value="" class="form-control" placeholder="Nhập email" >
                            @if ($errors->has('email'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password"  value="" class="form-control" placeholder="Nhập mật khẩu">
                            @if ($errors->has('password'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone"  value="" class="form-control" placeholder="Nhập số điện thoại">
                            @if ($errors->has('phone'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                          </div>
                          <div class="form-group">
                            <label>Quê quán</label>
                            <input type="text" name="address"  value="" class="form-control" placeholder="Nhập số quê quán">
                            @if ($errors->has('address'))
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                          </div>
                           <div class="form-group">
                            <label>Ảnh admin</label>
                            <input id="img" type="file" name="img" class="form-control hidden"
                                onchange="changeImg(this)">
                            <img id="avatar" class="thumbnail" width="50%" height="50%" src="img/import-img.png">
                        </div> --}}
                        <button type="submit" class="btn btn-block btn-primary" name="sbm" style="width: 100px; float: right;">Thêm mới</button>
                      </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
</div>
@stop
 @section('script')
    @parent
    <script>
        function changeImg(input){
               //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
               if(input.files && input.files[0]){
                   var reader = new FileReader();
                   //Sự kiện file đã được load vào website
                   reader.onload = function(e){
                       //Thay đổi đường dẫn ảnh
                       $('#avatar').attr('src',e.target.result);
                   }
                   reader.readAsDataURL(input.files[0]);
               }
           }
           $(document).ready(function() {
               $('#avatar').click(function(){
                   $('#img').click();
               });
           });

       </script>
   @stop 
