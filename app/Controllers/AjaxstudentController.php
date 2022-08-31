<?php

namespace App\Controllers;
use App\Models\Ajaxstudent;

class AjaxstudentController extends BaseController
{
	public function index()
	{
		
        return view('ajaxstudent/index');
	}

    public function store()
	{
        $students = new Ajaxstudent;
        $data=[
            'name'=> $this->request->getPost('name'),
            'email'=> $this->request->getPost('email'),
            'phone'=> $this->request->getPost('phone'),
            'course'=> $this->request->getPost('course'),
        ];
        $students->save($data);
        $data = ['status' => 'Student inserted Succesfully'];
        return $this->response->setJSON($data);
	}
}
