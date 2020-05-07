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