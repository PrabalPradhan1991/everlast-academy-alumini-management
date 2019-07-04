<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AluminiDetailsModel extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $table = 'alumini_details';

    public function rules($id=0)
    {
    	$rules = [
    		'email'	=>	['required', 'unique:alumini_details,email,'.$id ],
    		'password'	=>	['required', 'min:6'],
    		'name'	=>	['required', 'alpha'],
    		'batch'	=>	['required'],
    		'message'	=>	['required'],
    		'related_industry'	=>	['required'],
    		'position'	=>	['required'],
    		'gender'	=>	['required', 'in:Male,Female,Other']
    	];
    	
    	return $rules;	
    }
    
}
