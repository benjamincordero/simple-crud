<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonsRequest extends Request{
    
    public function authorize(){
        return true;
    }

    public function rules(){

        switch ($this->method()) {
            case 'POST':
                return [
                    'firstname'=>'required',
                    'lastname'=>'required',
                    'dni'=>'required|numeric|unique:persons',
                    'age'=>'required|numeric',
                    'sex'=>'required',
                    'birthdate'=>'required',
                    'country'=>'required',
                    'state'=>'required'
                ];
                break;

            case 'PUT':
                return [

                ];
                break;
            
            default:
                return [];
                break;
        }
    }

    public function messages(){
        return [
            'firstname.required'=>'The First Name field is required.',
            'lastname.required'=>'The Last Name field is required.',
            'dni.required'=>'The ID field is required.',
            'dni.numeric'=>'The ID field must be a number.',
            'dni.unique'=>'The ID already been taken.',
            'age.required'=>'The Age field is required.',
            'age.numeric'=>'The Age field must be a number.',
            'sex.required'=>'The Sex field is required.',
            'birthdate.required'=>'The Birthdate field is required.',
            'country.required'=>'The Country field is required.',
            'state.required'=>'The State field is required.'
        ];
    }
}
