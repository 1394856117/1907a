<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h2>管理员添加</h2>
<form action="{{url('/admin/store')}}" method="post"  enctype="multipart/form-data">
			@csrf
	姓名<input type="text" name="a_name"> <b style="color:red">{{$errors->first('a_name')}}</b><br>
	头像<input type="file" name="a_img"><br>
	年龄<input type="text" name="a_age"><br>
	性别<input type="radio" name="a_sex" value="女">女
	<input type="radio" name="a_sex"  value="男">男<br>
	邮箱<input type="email" name="email"><br>
	密码<input type="password" name="pwd"><br><b style="color:red">{{$errors->first('pwd')}}</b>
	<input type="submit" value="提交">

	</form>
</body>
</html>