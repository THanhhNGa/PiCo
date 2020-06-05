@extends('frontend.master.master')
@section('title','Trang chủ')
@section('main')

<main class="page_categories">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="breadcrumbs">
					<ul>
						<li><a href="">Trang chủ</a></li>
						<li><a href="">Điều hòa</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="owl-carousel sidebar-slider owl-theme">
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat1.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat2.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat3.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat4.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="owl-carousel sidebar-slider owl-theme">
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat6.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat5.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat7.jpg" alt="">
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="assets/img/Background/banner/banner_cat8.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<ul class="filter">
					<li>
						<strong>Chọn hãng</strong>
						<ul class="list_chilren">
							<?php for ($i = 0; $i <9 ; $i++) :?>
							<li>
								<input type="radio"  name="aq">
								<label for="">Daikin</label>
							</li>
						<?php endfor; ?>

						</ul>
					</li>
				</ul>
				<ul class="filter">
					<li>
						<strong>Chọn Mức giá</strong>
						<ul class="list_chilren">
							<?php for ($i = 0; $i <3 ; $i++) :?>
							<li>
								<input type="radio" name="aq1">
								<label for="">7 triệu - 9 triệu</label>
							</li>
						<?php endfor; ?>

						</ul>
					</li>
				</ul>
				<ul class="filter">
					<li>
						<strong>Loại máy </strong>
						<ul class="list_chilren">
							<?php for ($i = 0; $i <2 ; $i++) :?>
							<li>
								<input type="radio" name="aq2">
								<label for="">1 chiều</label>
							</li>
						<?php endfor; ?>

						</ul>
					</li>
				</ul>
				<ul class="filter">
					<li>
						<strong>TÍNH NĂNG</strong>
						<ul class="list_chilren">
							<?php for ($i = 0; $i <3 ; $i++) :?>
							<li>
								<input type="radio" name="aq3">
								<label for="">Vòi chống rỉ</label>
							</li>
						<?php endfor; ?>

						</ul>
					</li>
				</ul>
			</div>
			<div class="col-sm-9">
				<div class="row category-line">
					@foreach($product as $item)

					<div class="col-sm-3 br_gray">
						
						<div class="product-info">
							<div class="manufacturer"><img src="{{$item->image}}"  alt=""></div>
							<h5><a href="">{{$item->name}}</a></h5>
							<div class="priceInfo">
								<span class="price">{{number_format($item->sale_price,0,',','.')}} VNĐ</span>
								<del class="old-price">{{number_format($item->price,0,',','.')}} VNĐ</del>
							</div>
						</div>
					</div>
				@endforeach()

				</div>
				<ul class="pagination">
					{{$product->links()}}
				</ul>
			</div>

		</div>
	</div>

</main>

@stop
