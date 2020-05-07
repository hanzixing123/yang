<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文章</title>
</head>
<body>
	<center>
				<h2><font color='green'>文章编辑页面</font></h2>
		<form action="{{url('lianxi/update/'.$res->id)}}"action="post"method="post"enctype="multipart/form-data">
			@csrf
			<table botder="1">
				<tr>
					<td>文章名称</td>
					<td><input type="text" name="title"value="{{$res->title}}">

<b><font color='red'><h4>{{$errors->first('title')}}</h4></font></b></td>
					</td>
				</tr>
				<tr>
					<td>文章分类</td>
					<td>
						<select name="c_id">
							<option value="">请选择</option>
							@foreach($fu as $v)
							<option value="{{$v->c_id}}"@if($v->c_id==$res->c_id) selected @endif>{{$v->c_name}}</option>
							@endforeach
						</select>
						<b><font color='red'><h4>{{$errors->first('c_id')}}</h4></font></b>
					</td>
				</tr>
				<tr>
					<td>文章重要性</td>
					<td>
						<input type="radio"name="radio"value="1"@if($res->radio==1) checked @endif>是
						<input type="radio"name="radio"value="0"@if($res->radio==0) checked @endif>否
					</td>
				</tr>
				<tr>
					<td>是否显示</td>
					<td>
						<input type="radio"name="is_show"value="1" @if($res->is_show==1) checked @endif>是
						<input type="radio"name="is_show"value="0"@if($res->is_show==0) checked @endif>否
					</td>
				</tr>
				<tr>
					<td>文章作者</td>
					<td><input type="text"name="man" value="{{$res->man}}"></td>
				</tr>
				<tr>
					<td>作者email</td>
					<td><input type="email"name="email" value="{{$res->email}}"></td>
				</tr>
				<tr>
					<td>关键字</td>
					<td><input type="text"name="guan"value="{{$res->guan}}"></td>
				</tr>
				<tr>
					<td>网页描述</td>
					<td>
						<textarea name="desc"  cols="50" rows="10">{{$res->desc}}</textarea>
					</td>
				</tr>
				<tr>
					<td>上传文件</td>
					
					<td><img src="{{env('TUPIAN_URL')}}{{$res->img}}">
						<input type="file"name="img"></td>
				</tr>
				<tr>
					<td>操作</td>
					<td><input type="submit" value="提交"></td>
				</tr>
			</table>
		</form>
	</center>

</body>
</html>