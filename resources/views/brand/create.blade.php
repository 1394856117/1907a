<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<!-- //复制粘贴 -->
<!-- @if ($errors->any())
	<div Class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
	</div>
@endif -->
	<form action="{{url('/brand/store')}}" method="post" enctype="multipart/form-data">
	@csrf
	 品牌名称<input type="text" name="brand_name" id="firstname">
<!-- 复制粘贴 -->
    <p style="color:red">{{$errors->first('brand_name')}}</p>
	<br>
	品牌logo<input type="file" name="brand_logo">
<!-- 复制粘贴 -->
	<br>
	品牌网址<input type="text" name="brand_url"  id="urller"><br>
	<p style="color:red">{{$errors->first('brand_url')}}</p>
	品牌描述<textarea name="brand_desc" ></textarea><br>
	<input type="submit" value="提交">
	</form>
</body>
</html>`
<script type="text/javascript" src="/jquery.js"></script>
<script>
	$('#firstname').blur(function(){
		$(this).next().text('');
		var brand_name=$(this).val();
//		alert($brand_name);
		var reg=/^[\u4e00-\u9fa5]{2,12}$/;
		if(!reg.test(brand_name)){
			$(this).next().text('品牌名称需是中文数字,字母下划线组成,长度为2-12位');
			return;
		}
	});
	//唯一性验证
	$.ajax({
		  method: "POST",
			  url: "/brand/checkonly",
			  data: { brand_name:brand_name }
	}).done(function( msg ) {
		  alert( "Data Saved: " + msg );
		});



	$('#urller').blur(function(){
//		$(this).next().text('');
		var brand_url=$(this).val();
//		alert(brand_url);
		var reg=/^http:\/\/*/;
		if(!reg.test(brand_url)){
			$(this).next().text('品牌网址必需是http://开头');
		}
	});

</script>