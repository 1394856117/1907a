<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<form  action="{{url('goods/store')}}"  method="post"  enctype="multipart/form-data"  class="form-horizontal" role="form">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">商品名</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="goods_name" placeholder="请输入名字">
        </div>
    </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品价格</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" name="goods_price" placeholder="请输入名字">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品库存</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" name="goods_num" placeholder="请输入名字">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="firstname" name="goods_img" placeholder="请输入名字">
            </div>
        </div>
        <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品品牌</label>
            <div class="col-sm-10">
                {{--<input type="text" class="form-control" name="brand_id" id="firstname" placeholder="请输入名字">--}}
                <select name="" id="">
                    <option value="">--请选择--</option>
                    @foreach($brandInfo as $v)
                        <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                    @endforeach
                </select>
            </div>
        </div><div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">商品介绍</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" name="goods_desc" placeholder="请输入名字">
            </div>
        </div>

    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加</button>
        </div>
    </div>
</form>

</body>
</html>