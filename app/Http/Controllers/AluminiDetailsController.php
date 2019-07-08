<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AluminiDetailsController extends Controller
{
    public function getAluminiView()
    {
        $alumini_details_table = (new \App\UserDetailsModel)->getTable();
        $user_table = (new \App\User)->getTable();

        $data = \DB::table($alumini_details_table)
                    ->join($user_table, $user_table.'.id', '=', $alumini_details_table.'.user_id')
                    ->where('is_verified', 'yes')
                    ->orderBy('name', 'ASC')
                    ->select($user_table.'.email', $alumini_details_table.'.*')
                    ->paginate(20);

        return view('alumini-view')
                ->with('data', $data);
    }

    public function getAluminiLogin()
    {
        return view('alumini-login');
    }

    public function postAluminiLogin()
    {
        $input = request()->all();

        if(\Auth::attempt(['email' => $input['email'], 'password' => $input['password']]))
        {
            \Session::flash('success-msg', 'You have successfully logged in.');
            return redirect()->route('alumini-edit-get');
        }
        else
        {
            \Session::flash('error-msg', 'Invalid credentials');
            return redirect()->back();
        }
    }

    public function getAluminiEdit()
    {
        echo \Session::get('alumini_id');
    }

    public function getAluminiRegister()
    {
    	return view('alumini-register');
    }

    public function postAluminiRegister()
    {
    	$input = request()->all();

    	$rules = [
    		'email'	=>	['required', 'unique:users,email' ],
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

    	$record = \App\User::create([
            'email'  => $input['email'],
            'password'  =>  bcrypt('password'),
            'group_id'  =>  ALUMINI
        ]);

        \App\UserDetailsModel::create([
    		//'email'	=>	$input['email'],
    		//'password'	=>	bcrypt($input['password']),
    		'name'	=> $input['name'],
    		'batch'	=>	$input['batch'],
    		'message'	=>	$input['message'],
    		'related_industry'	=>	$input['related_industry'],
    		'position'	=>	$input['position'],
    		'gender'	=>	$input['gender'],
            'user_id'   =>  $record->id
    	]);

    	\Session::flash('success-msg', 'You have successfully registered');

    	return redirect()->back();
    }

}
