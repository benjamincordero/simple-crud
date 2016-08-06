@extends('welcome')

@section('title', 'Welcome')
@section('main')
    <div id="" class="alert alert-warning text-center ajaxsuccess" hidden>
        <b id="success_message"></b>
    </div>

@include('elements.success')
<div class="panel panel-primary">
	
	<div class="panel-heading">

	<a href="{{action('PersonsController@create')}}" class="btn btn-primary btn-xs pull-right">Add Person <i class="fa fa-plus"></i></a>
		
		<b>Persons List</b>
		
	</div>

<div class="patner_table">

@include('persons.elements.personstable')

</div>
@include('elements.modal-delete')
</div>	

@endsection