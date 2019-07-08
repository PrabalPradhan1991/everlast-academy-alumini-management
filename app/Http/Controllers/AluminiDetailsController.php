<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AluminiDetailsController extends Controller
{
    public function getAluminiRegister()
    {
    	return view('alumini.register');
    }

    public function postAluminiRegister()
    {
    	$input = request()->all();

    	$rules = [
    		'email'	=>	['required', 'unique:alumini_details,email' ],
    		'password'	=>	['required', 'min:6'],
    		'name'	=>	['required', 'alpha'],
    		'batch'	=>	['required'],
    		'message'	=>	['required'],
    		'related_industry'	=>	['required'],
    		'position'	=>	['required'],
    		'gender'	=>	['required', 'in:Male,Female,Other']
    	];

    	$validator = \Validator::make($input, $rules);

    	if($validator->fails())
    	{	
    		\Session::flash('error-msg', 'There are some validation errors');
    		return redirect()->back()
    						->with('errors', $validator->errors())
    						->withInput();
    	}

    	\App\AluminiDetailsModel::create([
    		'email'	=>	$input['email'],
    		'password'	=>	bcrypt($input['password']),
    		'name'	=> $input['name'],
    		'batch'	=>	$input['batch'],
    		'message'	=>	$input['message'],
    		'related_industry'	=>	$input['related_industry'],
    		'position'	=>	$input['position'],
    		'gender'	=>	$input['gender']
    	]);

    	\Session::flash('success-msg', 'You have successfully registered');

    	return redirect()->back();
    }

    public function getAluminiView()
    {
        $alumini_details_table = (new \App\AluminiDetailsModel)->getTable();
        $data = \DB::table($alumini_details_table)
                    ->where('is_verified', 'yes')
                    ->orderBy('name', 'ASC')
                    ->paginate(20);

        return view('alumini-view')
                ->with('data', $data);
    }

}
