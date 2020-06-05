@extends('backend.master.master')
@section('title','Danh mục sản phẩm ')
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
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                        <form  method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Danh mục cha:</label>
                                <select class="form-control" name="parent" >
                                    <option value="0">----ROOT----</option>
                                    {{ GetCategory($category,0,"",0) }}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tên Danh mục</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới">
                                {{ showError($errors,'name') }}
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                        </form>
                    </div>
                    <div class="col-md-7">
                        @if(session('thongbao'))
                        <div class="alert alert-success alert-dismissible">
                            <strong>{{ session('thongbao') }}</strong>
                        </div>
                        @endif
                        
                        <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                        <div class="vertical-menu">
                            <div class="item-menu active">Danh mục </div>
                            {{ ShowCategory($category,0,"")  }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.col-->
</div>

</section>
</div>

@stop
