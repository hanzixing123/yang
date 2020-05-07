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
			<td><a href="{{url('/lainxi/destroy/'.$v->id)}}"  type="button"class="btn btn-info btn-lg"><font color='red'>删除</font></a> 

				 <a href="{{url('/lainxi/edit/'.$v->id)}}"  type="button"class="btn btn-info btn-lg">修改</a></td>
		</tr>
		@endforeach
		<tr>
			<td>{{$res->appends([$title,$c_id])->links()}}</td> 
		</tr>
