<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function getLogin()
	{
		return view('admin.login');
	}

	public function postLogin()
	{
		$input = request()->all();

		if(\Auth::attempt(['email'	=>	$input['email'], 'password'	=>	$input['password']]))
		{
			return redirect()->route('admin-alumini-list-get');
		}
		else
		{
			\Session::flash('error-msg', 'Invalid Username and password');
			return redirect()->back();
		}
	}

	public function getAdminAluminiList()
	{
		$alumini_table = (new \App\UserDetailsModel)->getTable();
		$data = \DB::table($alumini_table)
					->orderBy('name', 'ASC')
					->paginate(20);

		return view('admin.alumini-list')
				->with('data', $data);
	}

	public function postPublishUnpublishAlumini($alumini_id, $status)
	{
		$data = \App\UserDetailsModel::where('id', $alumini_id)->firstOrFail();

		if($status == $data->is_verified)
		{
			\Session::flash('error-msg', 'Status of alumini already changed to '.$data->is_verified);
		}
		else
		{
			$data->is_verified = $status;
			$data->save();
			\Session::flash('success-msg', 'Status of alumini successfully changed to'.$status);
		}

		return redirect()->back();
	}

	public function postLogout()
	{
		\Auth::logout();
		\Session::flash('success-msg', 'You have successfully logged out');
		return redirect()->route('admin-login-get')	;
	}
}