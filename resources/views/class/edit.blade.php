<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h3>修改</h3>
<form action="{{url('/class/update/'.$data->w_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    文章名称<input type="text" name="w_name" value="{{$data->w_name}}">
    <p style="color:#8d00ff">{{$errors->first('w_name')}}</p>
    <br>
    文章分类<input type="text" name="c_id" value="{{$data->c_id}}">

    <br>
    文章重要性<input type="radio"name="w_zyx" value="{{$data->w_zyx}}"checked>普通
              <input type="radio"name="w_zyx" value="{{$data->w_zyx}}">置顶
    <br>
    是否显示<input type="radio" name="w_show" value="{{$data->w_show}}" checked>显示
            <input type="radio" name="w_show" value="{{$data->w_show}}">不显示
    <br>
    文章作者<input type="text" name="w_about" value="{{$data->w_about}}">
    <br>
    作者email<input type="text" name="w_email" value="{{$data->w_email}}">
    <br>
    关键字<input type="text" name="w_key" value="{{$data->w_key}}">
    <br>
    网页介绍<input type="text" name="w_desc" value="{{$data->w_desc}}">
    <br>
    品牌logo<input type="file" name="w_logo" value="{{$data->w_logo}}">
    <img src="{{env('UPLOAD_URL')}}{{$data->w_logo}}" width="100">
    <br>
    <input type="submit" value="提交">
</form>
</body>
</html>