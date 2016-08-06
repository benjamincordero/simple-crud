<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = ['firstname','lastname','dni','age',
    					   'sex','birthdate','email','phone','country',
    					   'state','city','address'];

    public $timestamps = true;
}