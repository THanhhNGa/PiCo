@extends('frontend.master.master')
@section('title','Trang đăng nhập')
@section('main')

<main class="page_login">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="breadcrumbs">
					<ul>
						<li><a href="">Trang chủ</a></li>
						<li><a href="" style="color:#333;">Đăng nhập tài khoản</a></li>
					</ul>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="orange">
					<div class="carousel-heading no-margin">
						<h4>Đăng nhập tài khoản</h4>
					</div>
				</div>
				<div class="page-content">
					<p>Nếu bạn đã có tài khoản, vui lòng đăng nhập </p>
					<form action="{{route('login_cus')}}" method="POST">
						@csrf
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
	    								@foreach ($errors->all() as $error)
	        								<li>{{ $error }}</li>
	    								@endforeach
									</ul>
								</div>
							@endif
						<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="iconic-input">
								<input name="email" type="text" id="Email" placeholder="E-mail">
								<i class="icons icon-user-3"></i>
							</div>
							<div class="clearfix"></div>
							<div class="iconic-input">
								<input name="password" type="password" id="Home" placeholder="Mật khẩu">
								<i class="icons icon-lock"></i>
							</div>
						</div>
					</div>
					<input id="Remember" type="checkbox" name="Remember">
					<label for="Remember">Nhớ tôi lại</label>
					<br>
					<br>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 align-left">
							<button type="submit" class="btn btn-secondary">Đăng nhập</button>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 align-right">
							<a class="align-right" href="{{route('reset_pass')}}">Bạn quên mật khẩu?</a>
							<br>
							<a class="align-right" href="/request-active">Yêu cầu kích hoạt lại tài khoản?</a>
							<br>
						</div>
					</div>
					</form>

				</div>
			</div>
			<div class="col-sm-6 register-account">
                    <div class="green">
                        <div class="carousel-heading no-margin">
                            <h4>Đăng ký thành viên</h4>
                        </div>
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <ul>
                                    <li><strong>Những lợi ích khi đăng ký thành viên:</strong></li>
                                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Quản lý và kiểm tra trạng thái đơn hàng thật dễ dàng</li>
                                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i></i>Quản lý điểm thẻ tích lũy khi mua hàng</li>
                                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Quản lý những sản phẩm yêu thích đã lưu lại</li>
                                </ul>
                                <p>Còn chờ gì nữa! Bạn hãy tạo ngay 1 tài khoản dễ dàng chỉ trong vài phút</p>

                                <a href="{{route('register')}}" class="btn btn-primary"><span>Đăng ký ngay</span></a>
                            </div>
                        </div>
                    </div>
                </div>
		</div>
	</div>
</main>


@stop
