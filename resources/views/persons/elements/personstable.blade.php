<table class="table text-center table-hover">
	<tr class="info">
		<th>First Name</th>
		<th>Last Name</th>
		<th>DNI</th>
		<th>Actions</th>
	</tr>
@foreach($persons as $p)
	<tr id ="{{ $p->id }}">
		<td>{{$p->firstname}}</td>
		<td>{{$p->lastname}}</td>
		<td>{{$p->dni}}</td>
		<td>
			<a href="{{action('PersonsController@show', $p->id)}}" class="btn btn-xs btn-info"><i class="fa fa-info"></i></a>
			<a href="{{ action('PersonsController@edit', $p->id) }}" class="btn btn-xs btn-success"><i class="fa fa-wrench"></i></a>
			<a href="#" onclick="confirmdelete({{$p->id}}, event)" id="delete{{$p->id}}" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
			{!! csrf_field() !!}
		</td>
	</tr>
@endforeach
	
</table>

<div class="panel-footer text-center">
	
	{{$persons->render()}}

</div>