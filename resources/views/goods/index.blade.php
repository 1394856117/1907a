<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 基本的表格</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table">
    <h3>商品的展示</h3>
    <a href="{{url('goods/create')}}">添加</a>

    <thead>
    <tr>
        <td>商品id</td>
        <td>商品姓名</td>
        <td>商品价格</td>
        <td>商品库存</td>
        <td>商品图片</td>
        <td>商品品牌</td>
        <td>商品介绍</td>
        <td>操作</td>
    </tr>
    @if($data)
    @foreach($data as $v)
    <tr>
        <td>{{$v->goods_id}}</td>
        <td>{{$v->goods_name}}</td>
        <td>{{$v->goods_price}}</td>
        <td>{{$v->goods_num}}</td>
        <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}"width="100"></td>
        <td>{{$v->brand_id}}</td>
        <td>{{$v->goods_desc}}</td>
        <td>
            <a href="{{url('/goods/delete/'.$v->goods_id)}}" class="btn btn-danger">删除</a>|
            <a href="" class="btn btn-warning">修改</a>
        </td>
    </tr>
    @endforeach
    @endif


</table>

</body>
</html>