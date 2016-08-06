@if(Session::has('success'))

   	<div id="success" class="alert alert-success text-center">


   	<b>{{Session::get('success')}}</b>

	<button type="button" class="close" data-dismiss="alert">×</button>

   	</div>	


@endif