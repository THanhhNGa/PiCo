@extends('frontend.master.master')
@section('title','Trang chi tiết sản phẩm')
@section('main')

<main class="page_detail">

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="breadcrumbs">
					<ul>
						<li><a href="">Trang chủ</a></li>
						<li><a href="">Điện tử</a></li>
						<li><a href="">Tivi</a></li>
						<li><a href="" style="color:#333;">{{ $product->name }}</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-sm-12">
				<h2 class="product-title">{{ $product->name }}</h2>
			</div>
			<div class="col-sm-5">
				<div  id="sync1" class="owl-carousel owl-theme">
					<div class="item">
						<a data-fancybox="images" href="assets/img/dtt/Tivi/ct1.jpg">
							<img src="{{$product->image}}" alt="product-view">
						</a>
					</div>
					
				</div>
				<div  id="sync2" class="owl-carousel owl-theme ">
					<?php 
                        $images =json_decode($product->image_list)
                     ?>
                      @if(is_array($images))
                      @foreach($images as $img)
						<div class="item">
							<img src="{{$img}}" alt="product-thumbnail">
						</div>
					@endforeach
					@endif
					
				</div>
			</div>
			<!-- img_product -->
			<div class="col-sm-4">
				<div class="price_product">
					<span class="price_gg">{{number_format($product->sale_price,0,'',',')}}₫</span>
					<span class="save-price">(Tiết kiệm: {{number_format($product->sale_price-$product->price,0,'',',')}}₫)</span>
					<del class="old-price">Giá hãng: <strong>{{number_format($product->price,0,'',',')}}₫</strong></del>
					<p><i>[ Giá bao gồm thuế VAT ]</i></p>
				</div>
				<div class="promotion">
					<strong>KHUYẾN MẠI ÁP DỤNG:</strong>
					<ul>
						<li>
							<div class="iconproduct-check"></div>
							 1 Bộ sản phẩm Lock & Lock Vitamin Stone (Áp dụng: 15/12/2019 - 31/12/2019)
						</li>
						<li>
							<div class="iconproduct-check"></div>
							 1 Phiếu xem film dùng cho code của Voucher Film + 4k (Áp dụng: 13/12/2019 - 31/12/2019)
						</li>
					</ul>
				</div>
				<div class="call-support">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<div class="call-content">
						Gọi mua hàng: <a href=""><b>0904.881169</b></a> - <a href=""><b>1900.6619</b></a>
						<span>(từ 8h15 đến 17h15 hàng ngày)</span>
					</div>
				</div>
				<div class="product-actions-single ">
					<a href="" class="action-button green">
						<span class="add-to-cart">
							<span class="action-name">Mua ngay, giao tận nơi</span>
							<span class="action-note">(Xem hàng, không mua không sao)</span>
						</span>
					</a>
					<a href="{{route('add-cart',['id'=>$product->id])}}" class="action-button light-blue">
						<span class="add-to-cart">
							<span class="action-name">Thêm sản phẩm vào giỏ</span>
							<span class="action-note">(Dành cho mua cùng lúc nhiều sản phẩm)</span>
						</span>
					</a>
					<p>Bảo hành chính hãng: <a href="">Xem điểm bảo hành Panasonic</a></p>
				</div>
			</div> <!-- end_info_product -->
			<div class="col-sm-3">
				<div class="sku-line">
					<span><strong>SKU: </strong>RC18NMFVNWT</span>
				</div>
				<div class="adress_shop mt-2">
					<strong>Đến xem hàng ở Miền Bắc:</strong>
					<div class="branch-qtyremain">
						<ul class="list_branch">
							<?php for ($i = 0; $i <9 ; $i++) : ?>
							<li>
								<i class="fa fa-map-marker" aria-hidden="true"></i> 2175 Đại lộ Hùng Vương, Tp. Việt Trì
								<a href="">Có hàng</a>
							</li>
						<?php endfor; ?>
						</ul>
					</div>
				</div>

			</div>

		</div>
		<!-- product_info -->
		<div class="row product_or">
			<div class="col-sm-8">
				<h3>SẢN PHẨM THƯỜNG ĐƯỢC XEM CÙNG</h3>
				<div class="owl-carousel product_orther owl-theme">
					<?php for ($i = 0; $i <5 ; $i++) :?>
					<div class="item">
						<a href="">
							<div class="product-img">
								<div class="sale">8%</div>
								<img src="assets/img/dtt/Tivi/tivi1.jpg" alt="">
							</div>
						</a>
						<div class="product-info">
							<h5><a href="">Tivi Oled Sony KD-55A8G 55 Inch 4K HDR Android</a></h5>
							<div class="priceInfo">
								<span class="price">52.900.000₫</span>
								<del class="old-price">52.900.000₫</del>
							</div>
						</div>
					</div>
				<?php endfor; ?>
				</div>
				<div class="content_product_detail">
					<h4>Thiết kế hiện đại</h4>
					<p>Nồi cơm điện tử Toshiba RC-18NMFVNWT có kiểu dáng hiện đại sang trọng, màu sắc bắt mắt cho căn bếp tiện nghi. Dung tích 1.8L đáp ứng nhu cầu của gia đình có từ 4-6 thành viên.</p>
					<img src="assets/img/dogiadung/noicom/321540_noi_com_dien_tu_toshiba_rc-18nmfvnwt_1 (1).jpg" alt="">
					<h4>Lòng nồi chống dính</h4>
					<p>Lòng nồi được làm từ nhôm dập có khả năng dẫn nhiệt nhanh đều làm chín nhanh chóng, giữ được vitamin của gạo. Lớp men chống dính thức ngăn thức ăn bám vào nồi, vệ sinh dễ dàng.</p>
					<img src="assets/img/dogiadung/noicom/304231_untitled-1.jpg" alt="">
					<h4>Chế độ nấu đa dạng</h4>
					<p>Nồi cơm điện tử Toshiba có nhiều tính năng khác như: nấu súp, hầm thịt, nấu cháo... trợ giúp cho việc nấu ăn hàng ngày của người nội trợ được dễ dàng, tiện lợi với thực đơn phong phú hơn.</p>
					<img src="assets/img/dogiadung/noicom/309388_bua-com-day-du-dinh-duong1.jpg" alt="">
				</div>
				<div class="comment">
					<div class="title_cm">
						<span><strong>0 bình luận</strong></span>
						<span>
						Sắp xếp theo
						<select name="" id="">
							<option value="">Mới nhất</option>
							<option value="">Cũ nhất</option>
						</select>
						</span>
					</div>
					<div class="content">
						<img src="https://scontent.fhan3-1.fna.fbcdn.net/v/t1.0-1/p74x74/80435886_2462447350660602_8212219723287363584_o.jpg?_nc_cat=102&_nc_ohc=ikkGzKmPR7cAQl0hBnwH4PlDIp-zCNNk_kCDE6n_q4NMhLX9YGROaW3Hg&_nc_ht=scontent.fhan3-1.fna&oh=151de53dca59557e9ef9bbbc2012a56a&oe=5EB39024" alt="">
						<form action="" class="form_post_cmt">
							<div class="comment_active">
								<textarea name="" placeholder="Thêm bình luận" id="textarea"></textarea>
								<input type="file" id="input_img" class="hidden">
								<label for="input_img" class="input_img"></label>

							</div>
							<div class="post_comment">
									<button type="submit" class="btn btn-info">Đăng</button>
								</div>

						</form>

					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="content-special">
					<h4 class="content-block-title">Thông số kỹ thuật</h4>
					<table width="100%">
						<tbody>
							<tr>
								<th colspan="2">Thông tin chung</th>
							</tr>
							<tr>
								<td class="spec-title">Hãng sản xuất</td>
								<td class="spec-content"><span>Toshiba</span></td>
							</tr>
							<tr>
								<td class="spec-title">Xuất xứ</td>
								<td class="spec-content"><span>Thái Lan</span></td>
							</tr>
							<tr>
								<td class="spec-title">Bảo hành</td>
								<td class="spec-content"><span>12 tháng</span></td>
							</tr>
							<tr>
								<th colspan="2">Đặc điểm sản phẩm</th>
							</tr>
							<tr>
								<td class="spec-title">Loại nồi</td>
								<td class="spec-content"><span>Điện tử</span></td>
							</tr>
							<tr>
								<td class="spec-title">Số người ăn</td>
								<td class="spec-content"><span>4-6 người</span></td>
							</tr>
							<tr>
								<td class="spec-title">Thể tích chứa</td>
								<td class="spec-content"><span>1.8 lít</span></td>
							</tr>
							<tr>
								<td class="spec-title">Lòng nồi</td>
								<td class="spec-content"><span>Chống dính</span></td>
							</tr>
							<tr>
								<td class="spec-title">Chế độ nấu</td>
								<td class="spec-content"><span>Nấu cơm</span></td>
							</tr>
							<tr>
								<td class="spec-title">Nắp thoát hơi thông minh</td>
								<td class="spec-content"><span>Có</span></td>
							</tr>
							<tr>
								<td class="spec-title">Hẹn giờ nấu</td>
								<td class="spec-content"><span>Có</span></td>
							</tr>
							<tr>
								<td class="spec-title">Khay hấp thực phẩm</td>
								<td class="spec-content"><span>Có</span></td>
							</tr>
							<tr>
								<td class="spec-title">Muỗng xới cơm</td>
								<td class="spec-content"><span>Có</span></td>
							</tr>
							<tr>
								<td class="spec-title">Nút điều khiển</td>
								<td class="spec-content"><span>Nút bấm điện tử</span></td>
							</tr>
							<tr>
								<td class="spec-title">Đặc điểm khác</td>
								<td class="spec-content"><span>680W</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

</main>
@stop


@section('script')
    @parent
    <script>
        jQuery(document).ready(function($) {
            $('.comment_active #textarea').click(function(event) {
                $('.post_comment').show();
                event.stopPropagation();

            });
            $('body').click(function(event) {
                $('.post_comment').hide();
            });
        });
    </script>

@stop
