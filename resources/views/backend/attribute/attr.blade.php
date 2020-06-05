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
						<div class="row">
							<div class="col-lg-12">
								<h1 class="page-header">Quản lý thuộc tính</h1>

							</div>
						</div>
						<!--/.row-->
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-body">
										@foreach($attrs as $attr)
										<div class="row magrin-attr">
											<div class="col-md-4">
												<strong class="large">{{$attr->name}}</strong>
												<a class="btn btn-danger" href="{{route('delete_attr',['id'=>$attr->id])}}" onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-times"></i></a>
												<a class="btn btn-default" href="{{route('edit_attr',['id'=>$attr->id])}}"><i class="fa fa-edit"></i></a>
											</div>
											<div class="col-md-8">
												@foreach($attr->values as $value)
												<div class="text-attr">{{$value->value}} 
													<a href="{{route('edit_value',['id'=>$value->id])}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
													<a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a>
													
												</div>
												@endforeach
												<a  type="" class="btn btn-primary">Thêm giá trị thuộc tính  </a>
												
											</div>		
										</div>
										<hr>
										@endforeach
										
									</div>
								</div>
							</div>
							<!--/.col-->
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</section>
</div>
@stop()