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

    public function getSuccessRegister()
    {
        return view('success');
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

    public function getLogin()
    {
        return view('alumini.login');
    }

    public function postLogin()
    {
        $input = request()->all();

        try
        {
            $record = \App\AluminiDetailsModel::where('email', $input['email'])->firstOrFail();
        }
        catch(\Exception $e)
        {
            \Session::flash('error-msg', 'Email not found');
            return redirect()->back();   
        }

        if(\Hash::check($input['password'], $record->password))
        {
            \Session::flash('success-msg', 'You have successfully logged In');
            \Session::put('alumini_id', $record->id);
            return redirect()->route('alumini-edit-get');
        }
        else
        {
            \Session::flash('error-msg', 'Email and password do not match');
            return redirect()->back();   
        }
    }

    public function postLogout()
    {
        \Session::forget('alumini_id');
        \Session::flash('success-msg', 'You have successfully logged out');
        return redirect()->route('alumini-login-get');
    }

    public function getAluminiEdit()
    {
        $alumini_id = \Session::get('alumini_id');
        $data = \App\AluminiDetailsModel::where('id', $alumini_id)->firstOrFail();

        return view('alumini.edit')
                ->with('data', $data);
    }

    public function postAluminiEdit()
    {
        $alumini_id = \Session::get('alumini_id');
        $data = \App\AluminiDetailsModel::where('id', $alumini_id)->firstOrFail();
        $input = request()->all();

        $rules = [
            'email' =>  ['required', 'unique:alumini_details,email,'.$alumini_id ],
            'name'  =>  ['required', 'alpha'],
            'batch' =>  ['required'],
            'message'   =>  ['required'],
            'related_industry'  =>  ['required'],
            'position'  =>  ['required'],
            'gender'    =>  ['required', 'in:Male,Female,Other']
        ];

        $validator = \Validator::make($input, $rules);

        if($validator->fails())
        {   
            \Session::flash('error-msg', 'There are some validation errors');
            return redirect()->back()
                            ->with('errors', $validator->errors())
                            ->withInput();
        }

        $data->email = $input['email'];
        $data->name = $input['name'];
        $data->batch = $input['batch'];
        $data->message = $input['message'];
        $data->related_industry = $input['related_industry'];
        $data->position = $input['position'];
        $data->gender = $input['gender'];

        $data->save();

        \Session::flash('success-msg', 'Details successfully updated');
        return redirect()->back();
    }

}
