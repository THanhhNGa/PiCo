@extends('backend.master.master')
@section('title','QL Đơn hàng')
@section('main')
<div class="content-wrapper" style="min-height: 313px;">
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-sm-12 col-lg-12  main">
				<div class="box">
					<div class="table-responsive">

						<div class="box-body">
								<div class="container">
									<legend>Chi tiết đơn hàng</legend>
									<div class="row">
										<div class="col-md-5">
											<div class="panel panel-info">
												<div class="panel-heading">
													<h3 class="panel-title">Thông tin khách hàng</h3>
												</div>
												<div class="panel-body">
													<p>Họ tên: {{$order->us->name}}</p>
													<p>Địa chỉ email KH: {{$order->us->email}} </p>
												</div>
											</div>
											<div class="panel panel-info">
												<div class="panel-heading">
													<h3 class="panel-title">Trạng thái đơn hàng</h3>
												</div>
												<div class="panel-body">
													<form action="{{route('update_order')}}" method="POST">
														@csrf
														<input type="hidden" name="id" value="{{$order->id}}">
														<select name="status" >
															<option value="0" {{($order->status==0)?'selected':''}}>Chờ duyệt</option>
															<option value="1" {{($order->status==1)?'selected':''}}>Đang giao hàng</option>
															<option value="2" {{($order->status==2)?'selected':''}}>Đã giao hàng</option>
														</select>


														<button type="submit" class="btn btn-primary">Submit</button>
													</form>
												</div>
											</div>
										</div>
										<div class="col-md-7">
											<div class="panel panel-info">
												<div class="panel-heading">
													<h3 class="panel-title">Danh sách sản phẩm</h3>
												</div>
												<div class="panel-body">
													<table class="table table-hover">
														<thead>
															<tr>
																<td>STT</td>
																<td>Tên </td>
																<td>Image</td>
																<td>Quantity</td>
																<td>Price</td>
															</tr>
														</thead>
														<tbody>
															@foreach($pro as $value)
															<tr>
																<td>{{$loop->index+1}}</td>
																<td>{{$value->pro->name}}</td>
																<td><img src="{{$value->pro->image}}" alt="" width="50px"></td>
																<td>{{$value->quantity}}</td>
																<td>{{$value->price}}</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
<!-- --- -->


@stop()
