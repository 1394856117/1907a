<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<form action="" method="">
    <input type="text" name="w_name" value="{{$query['w_name']??''}}">
    <input type="submit" value="搜索">
</form>
<body>
<form action="">
    <a href="{{url('class/index')}}">添加</a>
    <table border="1">
        <tr>
            <td>编号</td>
            <td>文章标题</td>
            <td>文章分类</td>
            <td>文章重要性</td>
            <td>是否显示</td>
            <td>添加日期</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->w_id}}</td>
            <td>{{$v->w_name}}</td>
            <td>{{$v->c_name}}</td>
            <td>{{$v->w_zyx}}</td>
            <td>{{$v->w_show}}</td>
            <td>{{date("Y-m-d H:i:s")}}</td>
            <td>
                <a href="{{url('/class/delete/'.$v->w_id)}}">删除</a>|
                <a href="{{url('/class/edit/'.$v->w_id)}}">编辑</a>
            </td>
        </tr>
            @endforeach
    </table>
    {{$data->appends($query)->links()}}
</form>
</body>
</html>