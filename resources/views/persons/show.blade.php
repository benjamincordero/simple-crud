@extends('welcome')

@section('title', $person->firstname." ".$person->lastname)
@section('main')
	<div class="panel panel-info ">
		<div class="panel-heading text-center">
			<b>{{$person->firstname." ".$person->lastname}}</b>
		</div>

		<table class="table table-bordered text-center">
			<tr>
				<td><b>First Name: </b>{{$person->firstname}} </td>
				<td><b>Last Name:</b> {{$person->lastname}}</td>
				<td><b>ID: </b>{{$person->dni}}</td>
			</tr>
			<tr>
				<td><b>Age: </b>{{$person->age}}</td>
				<td><b>Birdthdate: </b>{{$person->birthdate}}</td>
				<td><b>Sex: </b>{{$person->sex}}</td>
			</tr>
			<tr>
				<td><b>Country: </b>{{$country[0]->name}}</td>
				<td><b>State: </b>{{$state[0]->name}}</td>
				<td><b>City: </b>

					@if($city != null)
						{{$city[0]->name}}
					@elseif($city == null)
						{{"Other"}}
					@endif
				</td>
			</tr>
			<tr>
				<td><b>Phone: </b>{{$person->phone}}</td>
				<td><b>Email: </b>{{$person->email}}</td>
				<td><b>Address: </b>{{$person->address}}</td>
			</tr>
		</table>

		<div class="panel-footer">
			
			<a href="{{action('PersonsController@index')}}" class="btn btn-sm btn-primary"><i class="fa fa-home"></i> Home</a>
			<a href="{{action('PersonsController@edit',$person->id)}} " class="btn btn-sm btn-success pull-right"><i class="fa fa-wrench"></i> Edit</a>
		</div>
	</div>



@endsection