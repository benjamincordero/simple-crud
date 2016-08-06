<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

use App\Http\Requests;
use App\Http\Requests\PersonsRequest;

use App\Person;

class PersonsController extends Controller{
	
	protected function index(){
		
		$persons = Person::orderBy('id', 'DESC')->paginate(10);
		
		return view('persons.index', ['persons'=>$persons]);
	}

	protected function show($id){

		$person = Person::find($id);

		$country = DB::table('countries')->where('id', $person->country)->get();

		$state = DB::table('states')->where('id', $person->state)->get();

		$city = DB::table('cities')->where('id', $person->city)->get();

		return view('persons.show', ['person'=>$person, 'country'=>$country, 'state'=>$state, 'city'=>$city]);
	}


	protected function create(PersonsRequest $request){

		$countries = DB::table('countries')->lists('name','id');

		$states = DB::table('states')->lists('name','id');
		$cities = DB::table('cities')->lists('name', 'id');

		if($request->isMethod('post')){
			$person = new Person($request->all());

			$person->save();

			return redirect()->action('PersonsController@index')->with('success', $person->firstname." ".$person->lastname.' Was Registered Successfully');
		}

		return view('persons.create', ['countries'=>$countries,'states'=>$states, 'cities'=>$cities]);
	}

	protected function edit(Request $request, $id){
		$countries = DB::table('countries')->lists('name','id');

		$person = Person::find($id);

		if ($request->isMethod('PUT')) {
			$person->update($request->all());

			return redirect()->action('PersonsController@index')->with('success', $request->firstname." ".$request->lastname.' Was Updated Successfully');
		}

		$states = DB::table('states')->where('country_id', $person->country)->lists('name','id');
		$cities = DB::table('cities')->where('state_id', $person->state)->lists('name', 'id');

		return view('persons.edit', ['person'=>$person, 'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
	}

	protected function delete(Request $request){
		$person = Person::find($request->id);

		$person->delete();

		return response()->json(['person'=>$person->firstname." ".$person->lastname, 'mensaje'=>'Has Been Deleted Successfully!']);
	}

	protected function ajaxPagination(){
		
		$persons = Person::orderBy('id', 'DESC')->paginate(10);

		return view('persons.elements.personstable', ['persons'=>$persons])->render();
	}

	protected function ajaxGetState(Request $request){

		$states = DB::table('states')->where('country_id', $request->country)->lists('name', 'id');

		return response()->json($states);
	}

	protected function ajaxGetcity(Request $request){

		$cities = DB::table('cities')->where('state_id', $request->state)->lists('name', 'id');

		return response()->json($cities);
	}	

}