<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\LoginModel;
use App\Models\RegisterModel;

class Login extends BaseController
{
	public $loginModel;
	public $session;
	public $adminModel;
	public $validation;
	public function __construct()
	{
		helper('form');
		helper('Form_helper');
		$this->validation=\Config\Services::validation();
		$this->loginModel=new LoginModel();
		$this->adminModel=new AdminModel();
	}
	public function index()
	{
		$data=[];
		$data['validation']=null;
		$data['infosite']=$this->adminModel->getInfoSite();
		$this->validate([
			'email'=>[
				'rules'=> 'required',
				'errors'=>[
					'required'=>"Adresse email est requise",
				
				],
			],
			'password'=>[
				'rules'=> 'required',
				'errors'=>[
					'required'=>"Mot de passe est requis",
				],
			],
		]);

		if($this->validation->run() == FALSE)
		{
			$errors=$this->validation->getErrors();
			return json_encode(['code'=>0,'error'=>$errors]);
		}else
		{
		
				$email=$this->request->getVar('email', FILTER_SANITIZE_EMAIL);
				$password=$this->request->getVar('password');

				
				
				$status=$this->loginModel->verifyEmail($email);
				if($status)
				{
					if(password_verify($password, $status['password']))
					{
						if($status['statut'] == 'actif')
						{
							if($status['idRole']==1)
							{
								session()->set('loggedUser', $status['idUsers']);
								return json_encode(['code'=>1, 'msg'=>'Bienvenue Alumni']);
								// return redirect()->to(base_url().'/public/accueil');
							}
							else
							{
								session()->set('loggedUser', $status['idUsers']);
								session()->set('loggedUserRole', $status['idRole']);
								return json_encode(['code'=>1, 'msg'=>'Bienvenue Admin']);
								
								// return redirect()->to(base_url().'/public/accueil');
							}
						}
						else{
							return json_encode(['code'=>0, 'msg'=>'Compte déactivé. Veuillez contacter l"administrateur']);

							// session()->setTempdata('error', "Compte déactivé. Veuillez contacter l'administrateur", 3);
						}
					}
					else
					{
						return json_encode(['code'=>0, 'msg'=>'Mot de passe incorrect']);

						// session()->setTempdata('error', 'Mot de passe incorrect', 3);
					}
				}else
				{
					// session()->setTempdata('error', 'Email inconnu', 3);
					return json_encode(['code'=>0, 'msg'=>'Une erreur est survenue']);


				}
		
		}

		
		
	}		
}
