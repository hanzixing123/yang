<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">


	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--按钮的css -->
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> 
<table class="table table-striped">
	<center><h2><font color='red'>文章列表</font></h2> 
	<a href="{{url('/lianxi/create')}}" type="button" class="btn btn-info btn-lg"><font color='black'>添加商品	</font></a> 
<h3><form action="">
		文章名称: <input type="text"name="title"value="{{$title??''}}">
		类型: 
		<select name="c_id">
			<option value="">请选择品牌</option>
			@foreach($fu as $v)
			<option value="{{$v->c_id}}"@if(isset($c_id) && $v->c_id==$c_id)selected  @endif>{{$v->c_name}}</option>
			@endforeach
		</select>
		</select>
		<button>搜索</button>
	</form></h3>
	</center>
	
	<thead>
		<tr>
			<th>文章ID</th>
			<th>文章名称</th>
			<th>文章类型</th>
			<th>文章是否重要</th>
			<th>是否显示</th>
			<th>文章作者</th>
			<th>作者email</th>
			<th>关键字</th>
			<th>网页简介</th>
			<th>图片</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($res as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->title}}</td>
			<td><font color='green'>{{$v->c_name}}</font></td>
			<td><font color='red'>{{$v->radio==1?'√':'×'}}</font></td>
			<td><font color='red'>{{$v->is_show==1?'√':'×'}}</font></td>
			<td>{{$v->man}}</td>
			<td>{{$v->email}}</td>
			<td>{{$v->guan}}</td>
		
			<td><font color='blue'><h3>{{$v->desc}}</h3></font></td>
			<td>@if($v->img)<img width="100"    src="{{env('TUPIAN_URL')}}{{$v->img}}">@endif</td>
			<td>
		<a href="{{url('/lianxi/destroy/'.$v->id)}}"  type="button"class="btn btn-info btn-lg">
					<font color='red'>删除</font></a>
		<a href="{{url('/lianxi/edit/'.$v->id)}}"  type="button"class="btn btn-info btn-lg">修改</a>
			
		</tr>
		@endforeach
			<tr>
				<td>{{$res->appends([$title,$c_id])->links()}}</td> 
			</tr>	
	</tbody>
</table>
<script>
$(document).ready(function(){
	$(document).on('click','.page-item a',function(){
		var url=$(this).attr("href");
		//alert(url);
		$.get(url,function(res){
			//alert(res);
			$("tbody").html(res);
		});
		return false;
	});

});



</script>
</body>
</html>