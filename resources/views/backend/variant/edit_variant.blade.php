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
                    <p>Sửa giá cho biến thể thuộc tính</p>
                     <div class="col-md-12">
                        <div class="panel panel-default">
                                @if (session('thongbao'))
                                <div class="alert alert-success" role="alert">
                                <strong>{{session('thongbao')}}</strong>
                                </div>
                                @endif
                            <form method="post">
                                @csrf
                                <div class="panel-heading" align='center'>
                                    Giá cho từng biến thể sản phẩm : {{$product->name}} ({{$product->product_code}})
                                 
                                </div>
                                <div class="panel-body" align='center'>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Biến thể</th>
                                                <th>Giá (có thể trống)</th>
                                                <th>Tuỳ chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($product->variant as $variant)
                                          <tr>
                                                <td scope="row">
                                                    @foreach ($variant->values as $value)
                                                        {{$value->attribute->name}} : {{$value->value}},
                                                    @endforeach
                                                 
                                                </td>
                                                <td>
                                                <input name="variant[{{$variant->id}}]" class="form-control" placeholder="Giá cho biến thể" value="{{$variant->price}}">
                                                </td>
                                                <td>
                                                <a onclick="return confirm('Bạn có muốn xóa không?')"  class="btn btn-warning" href="{{route('del_variant',['id'=>$variant->id])}}" role="button">Xoá</a>
                                                </td>
                                            </tr>
                                          @endforeach
                                          

                                        </tbody>
                                    </table>

                                </div>
                                <div align='right'><button class="btn btn-success" type="submit"> Cập nhật </button> <a class="btn btn-warning"
                                        href="admin/product" role="button">Bỏ qua</a></div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>
@stop()


