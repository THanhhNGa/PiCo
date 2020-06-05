@extends('frontend.master.master')
@section('title','Trang giỏ hàng')
@section('main')
<main class="page_cart">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="breadcrumbs">
					<ul>
						<li><a href="">Trang chủ</a></li>
						<li><a href="" style="color:#333;">Giỏ hàng</a></li>
					</ul>
				</div>
				<p><strong>Hướng dẫn:</strong> Để xóa sản phẩm khỏi giỏ hàng, click <strong>Xóa</strong> / Để thêm số lượng, điền số lượng sản phẩm vào ô rồi click <strong>Cập nhật</strong></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="orderinfo-table">
						<tr>
							<th>Ảnh SP</th>
							<th>Thông tin sản phẩm</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
							<th>Hành động</th>
						</tr>
						<tr>
							@if(isset($cart->items))
							@foreach($cart->items as $row)
							<form action="{{route('update-cart',['id'=>$row['id']])}}">
								<td><a href=""><img src="{{$row['image']}}" alt="" width="100px"></a></td>
								<td>
									<a href="">{{$row['name']}}</a><br>
									<span class="old-price">{{number_format($row['price']),0,'','.'}} VNĐ</span>
								</td>
								<td>
									<input type="number" min="0" style="width: 100px;" value="{{$row['quantity']}}" class="text-center" name="quantity">
								</td>
								<td><span class="price">{{number_format($row['price']*$row['quantity']),0,'','.'}}  VNĐ</span></td>
								<td><button class="btn btn-success">Cập nhật </button> <a href="{{route('delete-cart',['id'=>$row['id']])}}" class="btn btn-danger">Xóa</a></td>
							@endforeach
							@endif
						</tr>
						<tr>
							<td colspan="4" class="align-right">Tổng tiền đơn hàng (<i>* Đã bao gồm VAT </i>)</td>
							<td><strong>{{number_format($cart->total_price),0,'','.'}} VNĐ</strong></td>
						</tr>
						@if(Auth::check())
						<tr><td></td><td></td><td></td><td></td><td><a href="{{route('check_out')}}" class="btn btn-primary" style="margin-right: 0">Mua hàng</a></td></tr>
						@else
						<tr><td></td><td></td><td></td><td></td><td><a href="{{route('sign_checkout')}}" class="btn btn-primary" style="margin-right: 0">Mua hàng</a></td></tr>
						@endif

						<tr><td colspan="5" class="align-left"><strong >→ Miễn phí vận chuyển nội thành Hà Nội với đơn hàng trên 200.000 vnđ</strong></td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

@stop
