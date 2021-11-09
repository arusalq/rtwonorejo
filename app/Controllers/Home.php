<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		return view('auth/login', $data);
	}

	public function reset_pass()
	{
		return view('auth/password-reset');
	}

	public function admin()
	{
		return view('users_layout/admin/index');
	}

	public function admin_users()
	{
		return view('users_layout/admin/users');
	}

	public function add_user()
	{
		return view('users_layout/admin/add_user');
	}
}