<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>分类展示页面</h1>
<h3><a href="{{url('/cate/create')}}">添加</a></h3>
<form action="">
<input type="text" name="cate_name" value="{{$query['cate_name']??''}}" placeholder="请输入品牌名称关键字">
<input type="submit" value="搜索">
</form>
<b style="color:#8d00ff">{{session('msg')}}</b>

	<table border="4">
	<tr>
	<td>分类ID</td>
	<td>分类名称</td>
	<td>是否展示</td>
	<td>状态</td>
	</tr>
	@foreach ($data as $v)
	<tr>
	<td>{{$v->cate_id}}</td>
	<td>{{$v->cate_name}}</td>
     <td>{{$v->cate_show}}</td>
	<td>
<a href="{{url('/cate/delete/'.$v->cate_id)}}">删除</a>
<a href="{{url('/cate/edit/'.$v->cate_id)}}">修改</a>
</td>
	@endforeach
	</tr>
	</table>
	{{$data->appends($query)->links()}}
</body>
</html>