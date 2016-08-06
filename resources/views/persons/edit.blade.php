@extends('welcome')

@section('title', 'Edit People Info')
@section('main')

@include('elements.errors')

<div class="panel panel-success">
	
	<div class="panel-heading">
		<b>Register Form</b>
		<a href="{{action('PersonsController@index')}}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-home"></i> Home</a>
	</div>
	<div class="panel-body">
		{!! Form::model($person,['action'=>['PersonsController@edit', $person->id], 'class'=>'form-horizontal', 'method'=>'PUT']) !!}


		<div class="row">
			<div class="col-md-4">
				<div class="form group">
					<label for="firstname" class="col-sm-4 control-label">First Name</label>

					<div class="col-sm-8">
						{!! Form::text('firstname', null, ['class'=>'form-control', 'placeholder'=>'example: James']) !!}
					</div>
				</div>		
			</div>

			<div class="col-md-4">
				<div class="form group">
					<label for="lastname" class="col-sm-4 control-label">Last Name</label>

					<div class="col-sm-8">
						{!! Form::text('lastname', null, ['class'=>'form-control', 'placeholder'=>'example: Bond']) !!}
					</div>
				</div>		
			</div>
			<div class="col-md-4">
				<div class="form group">
					<label for="dni" class="col-sm-4 control-label">ID</label>

					<div class="col-sm-8">
						{!! Form::text('dni', null, ['class'=>'form-control', 'placeholder'=>'Id or DNI']) !!}
					</div>
				</div>		
			</div>
		</div>

<br>
		<div class="row">
			<div class="col-md-4">
				<div class="form group">
					<label for="age" class="col-sm-4 control-label">Age</label>

					<div class="col-sm-8">
						{!! Form::number('age', null, ['class'=>'form-control', 'placeholder'=>'example: 18']) !!}
					</div>
				</div>		
			</div>

			<div class="col-md-4">
				<div class="form group">
					<label for="sex" class="col-sm-4 control-label">Sex</label>

					<div class="col-sm-8">
						{!! Form::select('sex', ['Male'=>'Male', 'Female'=>'Female'], null,['class'=>'form-control', 'placeholder'=>'Select']) !!}
					</div>
				</div>		
			</div>
			<div class="col-md-4">
				<div class="form group">
					<label for="birthdate" class="col-sm-4 control-label">Birthday</label>

					<div class="col-sm-8">
						{!! Form::text('birthdate', null, ['class'=>'form-control', 'placeholder'=>'Birthday', 'id'=>'birthdate']) !!}
					</div>
				</div>		
			</div>
		</div>

<br>

		<div class="row">
			<div class="col-md-4">
				<div class="form group">
					<label for="country" class="col-sm-4 control-label">Country</label>

					<div class="col-sm-8">
						{!! Form::select('country', $countries, null, ['class'=>'form-control', 'placeholder'=>'Select Country', 'id'=>'country']) !!}
					</div>
				</div>		
			</div>

			<div class="col-md-4">
				<div class="form group">
					<label for="state" class="col-sm-4 control-label">State</label>
					<div class="col-sm-8">

						{!! Form::select('state', $states ,null, ['class'=>'form-control', 'id'=>'state', 'placeholder'=>'Select State']) !!}
					</div>
				</div>		
			</div>


			<div class="col-md-4">
				<div class="form group">
					<label for="city" class="col-sm-4 control-label">City</label>
					<div class="col-sm-8">
						{!! Form::select('city', $cities ,null, ['class'=>'form-control', 'placeholder'=>'Select City', 'id'=>"city"]) !!}
					</div>
				</div>		
			</div>
		</div>

<br>
		<div class="row">
			<div class="col-md-4">
				<div class="form group">
					<label for="email" class="col-sm-4 control-label">Email</label>

					<div class="col-sm-8">
						{!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'example: james@email.com']) !!}
					</div>
				</div>		
			</div>

			<div class="col-md-4">
				<div class="form group">
					<label for="phone" class="col-sm-4 control-label">Phone</label>

					<div class="col-sm-8">
						{!! Form::text('phone', null,['class'=>'form-control', 'placeholder'=>'Phone Number', 'id'=>'phone', 'data-mask'=>'phone']) !!}
					</div>
				</div>		
			</div>
			<div class="col-md-4">
				<div class="form group">
					<label for="address" class="col-sm-4 control-label">Address</label>

					<div class="col-sm-8">
						{!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder'=>'Address', 'id'=>'address']) !!}
					</div>
				</div>		
			</div>
		</div>
<br>



	<div class="row">

		<button type="submit" id="submit" class="btn btn-success pull-right"><i class="fa fa-refresh"></i></button>

	</div>	
		{!! Form::close() !!}
	</div>

</div>
		
	<a href="{{action('PersonsController@ajaxGetState')}}" id="get_state" hidden></a>
	<a href="{{action('PersonsController@ajaxGetcity')}}" id="get_city" hidden></a>

@endsection

@section('js')
	
	<script>

		$(function() {
	   		$( "#birthdate" ).datepicker({
		        changeMonth: true,
		        changeYear: true, 
		        showOtherMonths: true,
		        selectOtherMonths: true,
		        dateFormat: "yy/mm/dd",
		        yearRange: "1900:2016"
		    });
	 	});

	</script>


@endsection