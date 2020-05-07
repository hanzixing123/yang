<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<title>展示</title>
</head>
<body>
	<center>
	<form>
		名称:<input type="text"name="name"value="{{$zhi['name'] ??''}}">
		身份证: <input type="text"name="shen"value="{{$zhi['shen']??''}}">
		<input type="submit"value="搜索">
	</form>


		<table >
			<tr>
				<td>I  D</td>
				<td>名字</td>
				<td>年龄</td>
				<td>身份证</td>
				<td>头像</td>
				<td>是否是湖北人</td>
				<td>操作</td>
			</tr>
		<tbody>
			@foreach($res as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->age}}</td>
				<td>{{$v->shen}}</td>
				<td><img width="100"    src="{{env('TUPIAN_URL')}}{{$v->img}}"></td>
				<td><center>{{$v->sex==1?'√':'×'}}</center></td>
				<td><a href="{{url('Yanzheng/destroy/'.$v->id)}}">删除</a>

					<a href="{{url('Yanzheng/edit/'.$v->id)}}">修改</a>
				</td>
			</tr>
			@endforeach
				<tr>
					<td>
			{{$res->appends($zhi)->links()}}						
					</td>
				</tr>
		</tbody>
		</table>
				
	</center>
	<script>
	// $(document).ready(function(){
	// 	$(document).on('click','.page-item a',function(){
	// 		var url=$(this).attr("href");
	// 		$.get(url,function(res){
	// 			$("tbody").html(res);

	// 		});
	// 		return false;


	// 	})




	// })

	</script>




</body>
</html>