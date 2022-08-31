<?php

namespace App\Controllers;

use App\Models\UserModel;

class Contact extends BaseController
{
	public $userModel;
	public function __construct()
	{
		$this->userModel= new UserModel();
	}
	public function index()
	{
		return view('contact_view');
	}
}
