<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetailsModel extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public $table = 'user_details';

    public function rules($id=0)
    {
    	$rules = [
    		'email'	=>	['required', 'unique:users,email,'.$id ],
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
