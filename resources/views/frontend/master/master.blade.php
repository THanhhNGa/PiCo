<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>@yield('title')</title>
		<base href="{{ asset('public/frontend') }}/">
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=vietnamese" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/css/jquery.fancybox.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="main-hearder">
						<div class="col-sm-3">
							<div class="logo">
								<a href="{{route('index')}}">
									<img src="assets/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="top-navigation">
								<ul>
									<li><a href="" class="orange" title="Giá sốc"><i class="fa fa-star-o" aria-hidden="true"></i>Giá sốc</a></li>
									<li><a href="" class="orange" title="Khuyến mại"><i class="fa fa-gift" aria-hidden="true"></i>Khuyến mại</a></li>
									<li><a href=""><i class="fa fa-comments" aria-hidden="true" title="Khách hàng chia sẻ thông tin "></i>Góp ý</a></li>
									<li><a href=""><i class="fa fa-file" aria-hidden="true" title="Hóa đơn điện tử"></i>Hóa đơn</a></li>
									<li><a href=""><i class="fa fa-file-text" aria-hidden="true" title="Tin tức"></i>Tin tức</a></li>
									<li><a href=""><i class="fa fa-map-marker" aria-hidden="true" title="Hệ thống siêu thị"></i>Tìm siêu thị</a></li>
								</ul>
								</div> <!-- end-top-navigation -->
								<div class="top-search">
									<form action="get">
										<div class="control-group">
											<input type="text" class="key_search">
											<button><i class="fa fa-search" aria-hidden="true"></i></button>
										</div>
									</form>
								</div>
							</div>
							<div class="col-sm-3">
								<div id="notify-box">
									<ul>
										<li class="cart-box">
											<a href="">
												Giỏ hàng
												<span>0</span>
											</a>
										</li>
										<li class="help-box">
											<a href=""  title="Hướng dẫn">
												Hướng dẫn
											</a>
										</li>
										<li class="support-box">
											<a href="" title="Hỗ trợ">Hỗ trợ</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="sub-header col-sm-3">
							<div class="dropdown menu-box">
								<a href="javascript:void(0)" class="dropdown-toggle"data-toggle="dropdown">
									<div class="sidebar-box-heading">
										<i class="fa fa-list"></i>
										<h4>Danh mục mặt hàng</h4>
									</div>
								</a>
								<ul class="dropdown-menu"  role="menu">
									@php
									$i=1;
									@endphp
									@foreach ($category as $cate)
									@if ($cate->parent==0)
									<li class="submenu{{ $i }}">
										<a href="{{route('categories',['slug'=>$cate->slug])}}">
											<strong class="submenu-title">
											{{ $cate->name }}
											</strong>
										</a>
										<div class="guide">
											@foreach ($category as $cate1)
											@if ($cate1->parent==$cate->id)
											<a href="">{{ $cate1->name }}</a>
											@endif
											@endforeach
										</div>
										<div class="sub-list-menu popover" style="width: 200px">
											<div class="" >
												@foreach ($category as $cate1)
													@if ($cate1->parent==$cate->id)
													<ul>
														<li style="margin: 10px 20px"><a href="" class="title">{{ $cate1->name }}</a></li>
														@foreach ($category as $cate2)
															@if ($cate2->parent==$cate1->id)
															<li><a href="">{{$cate2->name }} </a></li>
															@endif
														@endforeach
													</ul>
													@endif
												@endforeach
											</div>
											
											</div> <!-- end-submenu -->
										</li>
										@endif
										@php
										$i++;
										@endphp
										@endforeach
									</ul>
								</div>
							</div>
							<div class="col-sm-offset-4 col-sm-5">
								<i class="fa fa-phone-square" aria-hidden="true"></i>
								<span class="phone" style="margin-right: 5px;"><a href="">1900.6619 </a> - <a href="">0904.881169 </a>(8h15 - 17h30)</span>
								@if(Auth::guard('cus')->check())
								<span class="login-account"><a href="">Hi {{Auth::guard('cus')->user()->name}}</a> | <a href="{{route('logout_cus')}}" title="">Đăng xuất</a></span>
								@else
								<span class="login-account"><a href="{{route('login_cus')}}"> Đăng nhập </a> hoặc <a href="{{route('register')}}"> Đăng ký </a></span>
								@endif
							</div>
						</div>
					</div>
				</header>
				@yield('main')
				@include('frontend.master.footer')