<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('/class/create')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>文章标题</td>
            <td>
                <input type="text" name="w_name">
                <p style="color:red">{{$errors->first('w_name')}}</p>
            </td>
        </tr>

        <tr>
            <td>文章分类</td>
            <td>
                <select name="c_id" id="">
                    @foreach($data as $v)
                    <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>

        <tr>
            <td>文章的重要性</td>
            <td>
                <input type="radio" name="w_zyx" value="普通" checked>普通
                <input type="radio" name="w_zyx" value="置顶">置顶
            </td>
        </tr>
        <tr>
            <td>是否显示</td>
            <td>
                <input type="radio" name="w_show"value="√" checked>显示
                <input type="radio" name="w_show"value="×">不显示
            </td>
        </tr>
        <tr>
            <td>文章作者</td>
            <td><input type="text" name="w_about"></td>
        </tr>
        <tr>
            <td>作者email</td>
            <td><input type="text" name="w_email"></td>
        </tr>
        <tr>
            <td>关键字</td>
            <td><input type="text" name="w_key"></td>
        </tr>
        <tr>
            <td>网页介绍</td>
            <td>
                <textarea name="w_desc" id="" cols="30" rows="10">

                </textarea>
            </td>
        </tr>
        <tr>
            <td>文件上传</td>
            <td><input type="file" name="w_logo"></td>
        </tr>
        <tr>
            <td><input type="submit" value="确定"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>
</body>
</html>