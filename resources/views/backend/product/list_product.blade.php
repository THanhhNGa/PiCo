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
                    <div class="box-header"><a href="{{route('add_pro')}}" class="btn btn-primary">Thêm sản phẩm</a></div>
                    <div class="box-body">
                     <table class="table table-bordered" style="margin-top:20px;">

                        <thead>
                            <tr class="bg-primary">
                                <th>ID</th>
                                <th>Thông tin sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Giá KM</th>
                                <th>Tình trạng</th>
                                <th>Danh mục</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $pro)
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3"><img src="{{$pro->image}}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
                                        <div class="col-md-9">
                                            <p><strong>{{$pro->product_code}}</strong></p>
                                            <p>{{$pro->name}}</p>
                                            <p>{{$pro->category->name}}</p>
                                            @foreach(attr_values($pro->values) as $key=>$value)
                                            <p>{{$key}}: 
                                                @foreach($value as $item)
                                                {{$item}},
                                                @endforeach
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td>{{number_format($pro->price,0,'','.')}} VNĐ</td>
                                <td>{{number_format($pro->sale_price,0,'','.')}} VNĐ</td>
                                <td>
                                    <a name="" id="" class="btn btn-success" href="#" role="button">{{($pro->status==1)?'Còn hàng':'Hết hàng'}}</a>
                                </td>
                                <td>{{$pro->category->name}}</td>
                                <td>
                                    <a href="{{route('edit_pro',['id'=>$pro->id])}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
                                    <a href="{{route('del_pro',['id'=>$pro->id])}}" onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table> 
                    <div align="right">
                        {{$product->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
</div>

@stop()