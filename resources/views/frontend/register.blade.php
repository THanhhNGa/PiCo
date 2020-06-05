@extends('frontend.master.master')
@section('title','Trang tài khoản khách hàng')
@section('main')

<main class="page_register">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="breadcrumbs">
					<ul>
						<li><a href="">Trang chủ</a></li>
						<li><a href="" style="color:#333;">Đăng kí tài khoản</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 register-account">
                        <div class="green">
                            <div class="carousel-heading no-margin">
                                <h4>Đăng ký thành viên</h4>
                            </div>
                        </div>
                        <form action="" method="post">
                            @csrf
                        	<div class="page-content">
                        		<div class="row">
                        			<div class="col-lg-12 col-md-12 col-sm-12">
                        				<p><strong>Thông tin đăng nhập</strong></p>
                        			</div>
                        		</div>
                        		<div class="row">
                        			<div class="col-lg-12 col-md-12 col-sm-12">
                        				<div class="no-iconic-input required-input">

                        					<input type="text" id="Email" name="email" placeholder="Địa chỉ e-mail">
                        				</div>
                        			</div>
                        		</div>
                        		<div class="row">
                        			<div class="col-lg-6 col-md-6 col-sm-6">
                        				<div class="no-iconic-input">

                        					<input name="password" type="password" id="password" placeholder="Mật khẩu">
                        				</div>
                        			</div>
                        			<div class="col-lg-6 col-md-6 col-sm-6">
                        				<div class="no-iconic-input">
                        					<input name="ConfirmPasw" type="password" id="Home_ContentPlaceHolder_tb_ConfirmPasw" placeholder="Nhập lại mật khẩu">
                        				</div>
                        			</div>
                        		</div>
                        		<div class="row">
                        			<div class="col-lg-12 col-md-12 col-sm-12">
                        				<p><strong>Thông tin cá nhân</strong></p>
                        			</div>
                        		</div>
                        		<div class="row">
                        			<div class="col-lg-6 col-md-6 col-sm-6">
                        				<div class="no-iconic-input">

                        					<input name="name" type="text" id="name" placeholder="Họ và tên">
                        				</div>
                        			</div>
                        			
                        		</div>

                        		<div class="row">
                        			<div class="col-lg-6 col-md-6 col-sm-6">
                        				<div class="no-iconic-input">

                        					<input name="phone" type="text" id="phone" placeholder="Di động">
                        				</div>
                        			</div>
                        		</div>
                        		<div class="row">
                        			<div class="col-lg-12 col-md-12 col-sm-12">
                        				<div class="no-iconic-input">

                        					<input name="address" type="text" id="address" placeholder="Địa chỉ nhà bạn">
                        				</div>
                        			</div>
                        		</div>
                        		<div class="row">
                        			<div class="col-lg-12 col-md-12 col-sm-12">
                        				<button type="submit" class="btn btn-primary">Đăng kí ngay</button>
                        			</div>
                        		</div>
                        	</div>
                        </form>

                    </div>
			<div class="col-sm-4 register-account">
                    <div class="green">
                        <div class="carousel-heading no-margin">
                            <h4>Đăng Nhập tài khoản</h4>
                        </div>
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                               <p>Nếu bạn đã có tài khoản</p>
                               <a href="{{route('login_cus')}}" class="login">Đăng nhập ngay <small>(Để hưởng nhiều ưu đãi cho thành viên)</small></a>
                            </div>
                        </div>
                    </div>
                     <div class="green">
                        <div class="carousel-heading no-margin">
                            <h4>CÂU HỎI THƯỜNG GẶP</h4>
                        </div>
                    </div>
                    <ul class="page-content">
                    	<li><a href=""><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Hướng dẫn mở Tài khoản</a></li>
                    	<li><a href=""> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Không nhận được mail xác nhận kích hoạt tài khoản, tôi phải làm gì?</a></li>
                    	<li><a href=""><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Làm thế nào tôi có thể thay đổi, cập nhật thông tin tài khoản sau khi đăng ký thành công?</a></li>
                    </ul>
                </div>
		</div>
	</div>
</main>


@stop
