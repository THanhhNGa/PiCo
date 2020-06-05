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
                    <p>Sửa thông tin sản phẩm</p>
                    <form method="post" action="{{route('edit_pro',['id'=>$product->id])}}" accept-charset="utf-8">
                       @csrf
                       <div class="panel-body">

                        <div class="row" style="margin-bottom:40px">
                            
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="category" class="form-control">
                                                 {{GetCategory($category,0,'',$product->id)}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input required="" type="text" name="product_code" value="{{$product->product_code}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input required="" type="text" value="{{$product->name}}"  name="name"  id="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input required="" type="text" name="slug" id="slug" value="{{$product->slug}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label><a href="{{route('edit_variant',['id'=>$product->id])}}"><span class="glyphicon glyphicon-chevron-right"></span>
                                                    Giá theo biến thể</a>
                                            <input required="" type="number" value="{{$product->price}}"  name="price" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá khuyến mãi</label>
                                            <input required="" type="number" value="{{$product->sale_price}}"  name="sale_price" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select required="" name="status" class="form-control">
                                                <option {{($product->status==1)?'selected':''}} value="1">Còn hàng</option>
                                                <option {{($product->status==0)?'selected':''}} value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="" for="">Ảnh đại diện</label>
                                            <input type="hidden" name="image" width="200px" value="{{$product->image}}" id="image">
                                            <span class="input-group-btn">
                                                <a href="#modal-file"  data-toggle="modal" class="btn btn-primary">Chọn ảnh</a>
                                            </span>
                                            <img src="{{$product->image}}" alt="{{$product->name}}" id="show_img" width="150px">
                                        </div>

                                        <div class="form-group">
                                            <label class="" for="">Ảnh chi tiết</label>
                                            <?php 
                                                $images =json_decode($product->image_list)
                                             ?>
                                            <input type="hidden" name="image_list" value="{{$product->image_list}}" width="100px" id="image_list">
                                            <span class="input-group-btn">
                                                <a href="#modal-files"  data-toggle="modal" class="btn btn-primary">Chọn ảnh</a>
                                            </span>
                                            <div class="row" id="image_show_list">
                                                @if(is_array($images))
                                                <div class="row">
                                                    <br>                                                
                                                    @foreach($images as $img)
                                                    <div class="col-md-4">
                                                        <img src="{{$img}}" alt="" style="width: 100px">
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Thông tin</label>
                                    <textarea required="" name="info" style="width: 100%;height: 100px;">{{$product->info}}</textarea>
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
                                        @foreach ($attrs as $attr)
                                        <li @if($i==0) class='active' @endif><a href="#tab{{$attr->id}}" data-toggle="tab">{{$attr->name}}</a></li>
                                        @php
                                            $i=1;
                                        @endphp
                                        @endforeach

                                </ul>
                                <div class="tab-content">
                                    @foreach ($attrs as $attr)
                                    <div class="tab-pane fade  @if($i==1) active @endif in" id="tab{{$attr->id}}">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    @foreach ($attr->values as $value)
                                                    <th>{{$value->value}}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach ($attr->values as $value)
                                                    <td> <input @if(check_value($product,$value->id)) checked  @endif class="form-check-input" type="checkbox" name="attr[{{$attr->id}}][]" value="{{$value->id}}"> </td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>

                                    </div> 
                                    @php
                                    $i=2;
                                    @endphp
                                    @endforeach

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
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>

</section>
</div>
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
    <script src="{{url('/public/admin')}}/js/slug.js"></script>
    <script type="text/javascript">
        $('#modal-file').on('hide.bs.modal',function(){
            var _img=$('input#image').val();
            $('img#show_img').attr('src',_img);
        });
        
</script>
@stop()