<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章</title>
</head>
<body>
	<center>
				<h2><font color='green'>文章添加页面</font></h2>
		<form action="{{url('lianxi\store')}}"action="post"method="post"enctype="multipart/form-data">
			@csrf
			<table botder="1">
				<tr>
					<td>文章名称</td>
					<td><input type="text" name="title"value="">
						<b><font color='red'><h4>{{$errors->first('title')}}</h4></font></b></td>
					
				</tr>
				<tr>
					<td>文章分类</td>
					<td>
						<select name="c_id">
							<option value="">请选择</option>
							@foreach($fu as $v)
							<option value="{{$v->c_id}}">{{$v->c_name}}</option>
							@endforeach
						</select>
						<b><font color='red'><h4>{{$errors->first('c_id')}}</h4></font></b>
					</td>
				</tr>
				<tr>
					<td>文章重要性</td>
					<td>
						<input type="radio"name="radio"value="1" checked>是
						<input type="radio"name="radio"value="0">否
					</td>
				</tr>
				<tr>
					<td>是否显示</td>
					<td>
						<input type="radio"name="is_show"value="1" checked>是
						<input type="radio"name="is_show"value="0">否
					</td>
				</tr>
				<tr>
					<td>文章作者</td>
					<td><input type="text"name="man" value=""></td>
				</tr>
				<tr>
					<td>作者email</td>
					<td><input type="email"name="email" value=""></td>
				</tr>
				<tr>
					<td>关键字</td>
					<td><input type="text"name="guan"value=""></td>
				</tr>
				<tr>
					<td>网页描述</td>
					<td>
						<textarea name="desc"  cols="50" rows="10"></textarea>
					</td>
				</tr>
				<tr>
					<td>上传文件</td>
					<td><input type="file"name="img"></td>
				</tr>
				<tr>
					<td>操作</td>
					<td><input type="submit" value="提交"></td>
				</tr>
			</table>
		</form>
	</center>
<script src="/"></script>
<script>
	$(document).ready(function(){
alert("ashdauskdh");
	});
	

</script>
</body>
</html>
