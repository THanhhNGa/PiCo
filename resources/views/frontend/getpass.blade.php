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
						<h4>Lấy lại mật khẩu</h4>
					</div>
				</div>
				<div class="page-content">
					
					<form action="" method="POST">
						@csrf
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="iconic-input">
									<label>Vui lòng nhấn vào nút reset để reset mật khẩu</label>
									<!-- <input name="email" type="text" id="Email" placeholder="E-mail">
									<i class="icons icon-user-3"></i> -->
									<a href="{{url('reset_pass/'.$user->email.'/'.$code)}}">Reset pass</a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						
						<button type="submit" class="btn btn-primary">Gửi</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</main>
@stop