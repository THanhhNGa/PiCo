@extends('backend.master.master')
@section('title','QL Sản Phẩm')
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
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12 col-lg-12  main">
				<div class="box">
					<div class="table-responsive">
						<div class="row col-md-offset-3 ">
							<div class="col-md-6">	
								<div class="panel panel-blue">
									<div class=""><b>  Sửa giá trị thuộc tính</b></div>
									<div class="panel-body">
										<form action="" method="post" accept-charset="utf-8">
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
											<div class="form-group">

												<label for="">Tên Giá Trị Thuộc tính</label>
												<input type="text" name="value_name" value="{{$val->value}}" id="" class="form-control" placeholder="" aria-describedby="helpId">

											</div>
											<div  align="right"><button class="btn btn-success" type="submit">Sửa</button></div>
										</form>
									</div>
								</div>
							</div>
							<!--/.col-->
						</div>

					</div>
	</section>
</div>

@stop()
