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
                    <p>Quản lý sản phẩm</p>
                    <form action="{{route('add_pro')}}" method="post" accept-charset="utf-8">
                     @csrf
                     <div class="panel-body">
                         
                        <div class="row" style="margin-bottom:40px">
                            <form action="" method="post" accept-charset="utf-8"></form>
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                                {{GetCategory($category,0,'',0)}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input required="" type="text" name="product_code" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input required="" type="text" name="name"  id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input required="" type="text" name="slug" id="slug" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input required="" type="number" name="price" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá khuyến mãi</label>
                                            <input required="" type="number" name="sale_price" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select required="" name="status" class="form-control">
                                                <option value="1">Còn hàng</option>
                                                <option value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="" for="">Ảnh đại diện</label>
                                            <input type="hidden" name="image" width="200px" id="image">
                                            <span class="input-group-btn">
                                                <a href="#modal-file"  data-toggle="modal" class="btn btn-primary">Chọn ảnh</a>
                                            </span>
                                            <img src="" alt="" id="show_img" width="150px">
                                        </div>

                                        <div class="form-group">
                                            <label class="" for="">Ảnh chi tiết</label>
                                            <input type="hidden" name="image_list" width="100px" id="image_list">
                                            <span class="input-group-btn">
                                                <a href="#modal-files"  data-toggle="modal" class="btn btn-primary">Chọn ảnh</a>
                                            </span>
                                            <div class="row" id="image_show_list">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thông tin</label><br>
                                    <textarea name="info" id="editor1" rows="10" cols="120"></textarea>
                                </div>
                                

                            </div>
                            <div class="col-xs-4">

                                <div class="panel panel-default">
                                    <div class="panel-body tabs">
                                        <label>Các thuộc Tính <a href="{{route('detail_attr')}}"><span class="glyphicon glyphicon-cog"></span>
                                        Tuỳ chọn</a></label>
                                        <ul class="nav nav-tabs">

                                            @php
                                            $i=0;
                                            @endphp
                                            @foreach($attrs as $attr)
                                            <li @if($i==0) class="active" @endif><a href="#tab{{$attr->id}}" data-toggle="tab">{{$attr->name}}</a></li>
                                            <?php $i=1 ?>
                                            @endforeach

                                            <li><a href="#tab-add" data-toggle="tab">+</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            @foreach($attrs as $attr)
                                            <div class="tab-pane fade  ($i==1)?'active':''  in" id="tab{{$attr->id}}">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            @foreach($attr->values as $value)
                                                            <th>{{$value->value}}</th>
                                                            @endforeach

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @foreach($attr->values as $value)
                                                            <td> <input class="form-check-input" type="checkbox" name="attr[{{$attr->id}}][]" value="{{$value->id}}"> </td>
                                                            @endforeach

                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <div class="form-group">
                                                    <form action="{{route('add_value')}}" method="post" accept-charset="utf-8">
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
                                                        <label for="">Thêm giá trị cho thuộc tính</label>
                                                        <input type="hidden" name="attr_id" value="{{$attr->id}}">
                                                        <input name="value_name" type="text" class="form-control" aria-describedby="helpId" placeholder="">
                                                        <div> <button name="add_val" type="submit">Thêm</button></div>
                                                    </form>
                                                </div>
                                            </div>
                                            <?php $i=2 ?>
                                            @endforeach
                                            
                                            <div class="tab-pane fade" id="tab-add">
                                                <form action="{{route('add_attr')}}" method="post" accept-charset="utf-8">
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
                                                        <label for="">Tên thuộc tính mới</label>
                                                        <input type="text" class="form-control" name="attr_name" aria-describedby="helpId" placeholder="">
                                                    </div>

                                                    <button type="submit" name="add_pro" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span>
                                                    Thêm thuộc tính</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <p></p>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-primary">Thêm SP</button>
                    </div>
                </form>
                @stop()

                @section('js')
                <div class="modal fade" id="modal-file">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Quản lý file</h4>
                            </div>
                            <div class="modal-body">
                                
                                <iframe src="{{url('file')}}/dialog.php?field_id=image" style="width: 100%; height: 500px; border: 0; overflow-y: auto"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ---model 2-- -->
                <div class="modal fade" id="modal-files">
                    <div class="modal-dialog" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Quản lý file</h4>
                            </div>
                            <div class="modal-body">
                                
                                <iframe src="{{url('file')}}/dialog.php?field_id=image_list" style="width: 100%; height: 500px; border: 0; overflow-y: auto"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#modal-file').on('hide.bs.modal',function(){
                        var _img=$('input#image').val();
                        $('img#show_img').attr('src',_img);
                    });
                    $('#modal-files').on('hide.bs.modal',function(){
                        var _imgs =$('input#image_list').val();
                        var img_list =$.parseJSON(_imgs);
                        var _html='';
                        for (var i =0; i< img_list.length; i++) {
                            _html+='<div class="col-md-3 thumbnail">';
                            _html+='<img src="'+img_list[i]+'" alt="">';
                            _html+='</div>';
                        }
                        $('#image_show_list').html(_html);
                    });

                </script>
                <script src="{{url('/public/backend')}}/js/slug.js"></script>
                <script type="text/javascript">
                    $('#modal-file').on('hide.bs.modal',function(){
                        var _img=$('input#image').val();
                        $('img#show_img').attr('src',_img);
                    });
                    config={};
                    config.entities_latin = false;
                    config.enterMode = CKEDITOR.ENTER_BR;
                    CKEDITOR.replace( 'editor1',config);
                    
                </script>
            </div>
        </div>
    </div>
</div>

</section>
</div>
@stop()