<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加页面</title>
</head>
<body>
	<center>
		<form action="{{url('Yanzheng/store')}}"method="post"enctype="multipart/form-data">
			<table border='1'>
				@csrf
				<tr>
					<td>名字</td>
					<td><input type="text"name="name" value=""></td>
				</tr>
				<tr>
					<td>年龄</td>
					<td><input type="text"name="age" value=""></td>
				</tr>
				<tr>
					<td>身份证</td>
					<td><input type="text"name="shen"value=""></td>
				</tr>
				<tr>
					<td>头像</td>
					<td><input type="file"name="img"></td>
				</tr>
				<tr>
					<td>是否湖北人</td>
					<td>
						<input type="radio"name="sex"value="1">是
						<input type="radio"name="sex"value="0" checked>否
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit"value="添加"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>