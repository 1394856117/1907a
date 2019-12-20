<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootstrap 实例 - 条纹表格</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h2>列表展示</h2>
<form action="" method="">
	<input type="text" name="brand_name" value="{{$query['brand_name']??''}}">
	<input type="text" name="brand_url" value="{{$query['brand_url']??''}}">
	<input type="submit" value="搜索">
</form>
<h4><a href="{{url('/brand/create')}}">添加</a></h4>
<b style="color:#8d00ff">{{session('msg')}}</b>
<b style="color:#8d00ff">{{session('ms')}}</b>

	<table  class="table table-striped">
	
	<tr>
		<td>品牌名称</td>
		<td>品牌logo</td>
		<td>品牌网址</td>
		<td>品牌描述</td>
		<td>操作</td>
	</tr>
	@foreach ($data as $v)
	<tr>
		<td>{{$v->brand_name}}</td>
		<td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="100"></td>
		<td>{{$v->brand_url}}</td>
		<td>{{$v->brand_desc}}</td>
		<td>	
		<a href="{{url('brand/delete/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
		<a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-primary">修改</a>
</td>
	</tr>
@endforeach
	</table>
	{{$data->appends($query)->links()}}

</body>
</html>