@if(count($errors)>0)

	<div class="alert alert-danger text-center">
	<button type="button" class="close" data-dismiss="alert">×</button>

		<ul class="list-unstyled">
			@foreach($errors->all() as $error)

				<li><b>{{$error}}</b></li>

			@endforeach
		</ul>
	</div>

@endif