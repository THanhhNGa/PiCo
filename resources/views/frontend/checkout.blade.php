@extends('frontend.master.master')
@section('title','Trang thanh toán')
@section('main')

<main class="page_checkout">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="breadcrumbs">
					<ul>
						<li><a href="">Trang chủ</a></li>
						<li><a href="" style="color:#333;">Mua hàng</a></li>
					</ul>
				</div>

			</div>
			<div class="col-sm-12">
			<p>Thông tin đơn hàng</p>	
			</div>
		</div>
		<form action="{{route('check_out')}}" method="post">
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
			<div class="col-sm-12">
				<div class="table-responsive">
					
					<table class="orderinfo-table">
						<tr>
							<th>Ảnh SP</th>
							<th>Thông tin sản phẩm</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
						<tr>
							@if(isset($cart->items))
							@foreach($cart->items as $row)
							<td><a href=""><img src="{{$row['image']}}" width="100px" alt=""></a></td>
							<td>
								<a href="">{{$row['name']}}</a>
								<span class="price">{{number_format($row['price']),0,'','.'}} VNĐ</span>
							</td>
							<td>
								<input type="number" min="0" style="width: 100px;" value="{{$row['quantity']}}" class="text-center" disabled>
							</td>
							<td><span class="price">{{number_format($row['price']*$row['quantity']),0,'','.'}}</span></td>
							@endforeach
							@endif
						</tr>
						<tr>
							<td colspan="3" class="align-right">Tổng tiền đơn hàng (<i>* Đã bao gồm VAT </i>)</td>
							<td><strong>{{number_format($cart->total_price),0,'','.'}} VNĐ</strong></td>
						</tr>
						<tr><td colspan="4" class="align-left"><strong >→ Miễn phí vận chuyển nội thành Hà Nội với đơn hàng trên 200.000 vnđ</strong></td></tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 mt-2">
				
					<div class="row sidebar-box sidebar-normal">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="sidebar-box-heading">
							<i class="icons icon-info-circled"></i>
							<h4>Khách hàng khai báo thông tin</h4>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 register-account">
						<div class="page-content">
						@if(Auth::check())
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<p><strong>THÔNG TIN NGƯỜI MUA</strong> (<span class="require color-red">*</span>) <i>Thông tin bắt buộc</i></p>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<p><span>Họ tên (<span class="require color-red">*</span>)</span></p>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" value="{{Auth::user()->name}}" id="txtBuyerFullname" name="name" placeholder="Nhập họ tên người mua...">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3">
									<p><span>E-mail (<span class="require color-red">*</span>)</span></p>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9">
									<input type="text" value="{{Auth::user()->email}}" id="txtBuyerEmail" name="email" placeholder="Nhập e-mail nhận thông tin người mua..." maxlength="100">
								</div>
							</div>

							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-12">
									<p>Điện thoại (<span class="require color-red">*</span>)</p>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" value="{{Auth::user()->phone}}" id="txtBuyerMobile" name="phone" placeholder="Nhập điện thoại người mua..." maxlength="11">
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-12">
									<p>Địa chỉ (<span class="require color-red">*</span>)</p>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" value="{{Auth::user()->address}}" id="txtBuyerAddress" name="address" placeholder="Nhập địa chỉ người mua (số nhà, tên đường)...">
								</div>
							</div>
							@endif
						</div>

					</div>
				</div>
				<div class="payment-notice _block">
					Bằng cách đặt hàng, bạn đồng ý với <a href="/32s-dieu-khoan-bao-mat.html" target="_blank">Chính sách bảo mật</a>, <a href="/33s-quy-dinh-su-dung.html" target="_blank">Điều khoản sử dụng</a> của Pi Co.
				</div>
				<div class="col-sm-12 align-right">
					<button type="submit" class="btn btn-danger">Mua hàng</button>
				</div>

			</div>
		</div>
		</form>
	</div>
</main>

@stop
