@extends('backend.master.master')
@section('title','Chỉnh sửa danh mục')
@section('category')
    class="active"
@endsection
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
         <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Danh mục</li>
            </ol>
        </div>
        <!--/.row--> 
        <div class="row">
            <div class="col-sm-12">
                <section class="content-header">
                    <h1>
                      Sửa danh mục
                    </h1>
                    <ol class="breadcrumb">
                      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active">Sửa danh mục</li>
                    </ol>
                </section>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa danh mục</h1>
            </div>
        </div>
        <!--/.row--> 
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form method="POST">
                                    @csrf
                                <div class="form-group">
                                    <label for="">Danh mục cha:</label>
                                    <select class="form-control" name="parent" id="">
                                        <option value="0">----ROOT----</option>
                                        {{ GetCategory($category,0,'',$cate->parent) }}
                                        {{-- <option>Nam</option>
                                        <option>---|Áo khoác nam</option>
                                        <option>---|---|Áo khoác nam</option>
                                        <option>Nữ</option>
                                        <option>---|Áo khoác nữ</option> --}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Danh mục</label>
                                    <input type="text" class="form-control" name="name" id="" placeholder="Tên danh mục mới" value="{{ $cate->name }}">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-warning" role="alert">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif

                                </div>
                                <button type="submit" class="btn btn-primary">Sửa danh mục</button>
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
                                    {{ ShowCategory($category,0,'') }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->


        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
@stop
