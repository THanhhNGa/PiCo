@extends('frontend.master.master')
@section('title','Trang chủ')
@section('main')
<main class="page_home">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="owl-carousel sidebar-slider owl-theme">
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner1.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner2.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner3.png" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner4.jpg" alt="">
						</a>
					</div>
				</div>
			</div> <!-- banner_left -->
			<aside class="col-sm-4">
				<div class="row">
					<div class="col-sm-12">
							<a href="">
								<img src="assets/img/Background/qc/quangcao1.jpg" alt="">
							</a>
					</div>
					<div class="col-sm-12 custom_type">
						<a href="" target="_blank">
							<div class="item  pl-80 orange mt-2">
								<i class="fa fa-star icon"></i>
								<h4>CRAZY SALES!</h4>
								<p>Giá rẻ mỗi ngày</p>
								<span class="view">Xem</span>
							</div>
						</a>
					</div>
					<div class="col-sm-12 custom_type">
						<a href="" target="_blank">
							<div class="item  pl-80 green mt-1">
								<i class="fa fa-gift icon"></i>
								<h4>Mua trả góp</h4>
								<p>Lãi suất thấp, nhiều ưu đãi</p>
								<span class="view3">Xem</span>
							</div>
						</a>
					</div>
				</div>
			</aside>
		</div>
		<div class="row main-content">
			<div class="col-sm-8">
				<h2 class="title-sp">
					Sản phẩm mới nhất
				</h2>
				<div class="row w_product">
                    @foreach ($product_new as $item)
                    <div class="col-sm-4">
						<a href="{{ route('detail',['id'=>$item->id] )}}">
							<div class="product-image">
								<img src="{{$item->image}}" alt="">
								<span class="product-gift"><i class="fa fa-gift"></i>Quà tặng</span>
							</div>
						</a>
						<div class="product-info">
							<div class="manufacturer"><img src="assets/img/80_logo_sony_copy_copy.png" alt=""></div>
							<h5><a href="{{ route('detail',['id'=>$item->id] )}}">{{ $item->name }}</a></h5>
							<div class="priceInfo">
								<span class="price">{{number_format($item->sale_price,0,'',',')}}₫ </span>
								<del class="old-price">{{number_format($item->price,0,'',',')}}₫</del>
							</div>
						</div>
					</div>
                    @endforeach

					<div style="margin-left: 600px">
						{{$product_new->links()}}
					</div>

				</div>
			</div>
			<div class="col-sm-4">

				<div class="row">
					<div class="col-sm-12">
						<h2 class="title-sp mb-1">
							BẢN TIN
						</h2>
						<a href="">
							<span class="product-image">
								<img src="assets/img/medium_14331_1200x628.jpg" alt="">
							</span>
						</a>
						<div class="product-info">
							<h5><a href="">Ưu đãi Tết: Hoàn tiền 20% khi thanh toán thẻ VPBANK</a></h5>
						</div>
						<span class="pull-right">
							<strong><a href="">Đọc tiếp →</a></strong>
						</span>
					</div>
					<div class="col-sm-12">
						<h2 class="title-sp mb-1">
							TƯ VẤN MUA SẮM
						</h2>
						<a href="">
							<span class="product-image">
								<img src="assets/img/medium_14352_benh-de-mac-khi-quan-ao-am.jpg" alt="">
							</span>
						</a>
						<div class="product-info">
							<h5><a href="">Tác hại của việc mặc quần áo ẩm mốc và cách khắc phục</a></h5>
						</div>
						<span class="pull-right">
							<strong><a href="">Đọc tiếp →</a></strong>
						</span>
					</div>
				</div>
				<div class="box-news mt-2">
					<a href="" target="_blank">
						<span class="item_box_left red">
							<i class="fa fa-file" aria-hidden="true"></i>
							<h4>Hóa đơn</h4>
							<span>Điện tử</span>
						</span>
					</a>
					<a href="" target="_blank">
						<span class="item_box_right gray">
							<i class="fa fa-users" aria-hidden="true"></i>
							<h4>Khách hàng</h4>
							<span>Góp ý</span>
						</span>
					</a>
				</div>
				<div class="box-news">
					<a href="" target="_blank">
						<span class="item_box_left purple">
							<i class="fa fa-credit-card" aria-hidden="true"></i>
							<h4>Thẻ</h4>
							<span>Thành viên</span>
						</span>
					</a>
					<a href="" target="_blank">
						<span class="item_box_right orange">
							<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
							<h4>Mẹo vặt</h4>
							<span>Hàng ngày</span>
						</span>
					</a>
				</div>
				<div class="box-news">
					<a href="" target="_blank">
						<span class="item_box_left green">
							<i class="fa fa-male" aria-hidden="true"></i>
							<h4>Tuyển dụng</h4>
							<span>Nhân tài</span>
						</span>
					</a>
					<a href="" target="_blank">
						<span class="item_box_right light-blue">
							<i class="fa fa-wrench" aria-hidden="true"></i>
							<h4>Chính Sách</h4>
							<span>Bảo hành sản phẩm</span>
						</span>
					</a>
				</div>
				<div class="owl-carousel sidebar-qc1 owl-theme mb-2 ">
					<div class="item">
						<a href="">
							<img src="assets/img/Background/qc/quangcao2.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/qc/quangcao3.jpg" alt="">
						</a>
					</div>
				</div>
				<div class="owl-carousel sidebar-qc2 owl-theme ">
					<div class="item">
						<a href="">
							<img src="assets/img/Background/qc/quangcao4.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/qc/quangcao5.jpg" alt="">
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>

</main>

@stop


