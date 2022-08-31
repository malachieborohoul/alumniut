<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\RegisterModel;

class Register extends BaseController
{
	public $registerModel;
	public $session;
	public $email;
	public $adminModel;
	public $validation;
	public function __construct()
	{
		helper('form');
		helper('date');
		helper('Form_helper');
		$this->registerModel = new RegisterModel();
		$this->session = \Config\Services::session();
		$this->email = \Config\Services::email();
		$this->adminModel = new AdminModel();
		$this->validation=\Config\Services::validation();
	}
	public function index()
	{
		$data = [];
		$data['validation'] = null;
		$data['infosite'] = $this->adminModel->getInfoSite();

		$rules = [
			'nom' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'SVP Veuillez saisir le Nom et Prénom ',
				],
			],


			'matricule' => [
				'rules' => 'required|exact_length[8]',
				'errors' => [
					'required' => "SVP Veuillez saisir le matricule ",
					'exact_length' => 'Exactement 8 caractères'
				],
			],




			'email' => [
				'rules' => 'required|is_unique[users.email]|valid_email',
				'errors' => [
					'required' => "SVP Veuillez saisir l'email",
					'is_unique' => 'Email déja utilisé',
					'valid_email' => 'Email non valide'
				],
			],
			'password' => [
				'rules' => 'required|min_length[6]|max_length[10]',
				'errors' => [
					'required' => "SVP Veuillez saisir le password",
					'min_length' => 'Minimum 6 caractères',
					'max_length' => 'Pas au déla de 10 caractères'
				],
			],
			'cpassword' => 'required|matches[password]',

		];
		if ($this->request->getMethod() == 'post') {
			$userdata = [
				'nom' => $this->request->getVar('nom', ),
				'matricule' => $this->request->getVar('matricule', ),

				'email' => $this->request->getVar('email', FILTER_SANITIZE_EMAIL),

				'password' => password_hash($this->request->getVar('password', ), PASSWORD_DEFAULT),

			];
			if ($this->validate($rules)) {


				$to = 'bsmlancer@gmail.com';
				$subject = "Activation d'un compte";
				$message = "Merci d'activer mon compte: " . $this->request->getVar('nom', );

				$this->email->setTo($to);
				$this->email->setFrom($this->request->getVar('email', ), $this->request->getVar('nom', ));
				$this->email->setSubject($subject);
				$this->email->setMessage($message);

				if ($this->email->send()) {
					$status = $this->registerModel->saveUsers($userdata);
					if ($status) {
						$this->session->setTempdata('success', 'Inscription reussi. Vérifier', 3);

						return redirect()->to(base_url() . '/public/register');
					} else {
						$this->session->setTempdata('error', 'Inscription échouée', 3);
						return redirect()->to(base_url() . '/public/register');
					}
				} else {
					$this->session->setTempdata('error', 'Mail non envoyé', 3);
					return redirect()->to(base_url() . '/public/register');
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}
		return view('register/register_view', $data);
	}



	public function addUser()
	{
		$validation = \Config\Services::validation();
		$this->validate([

			'nom' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nom est requis ',

				]
			],
			'prenom' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Prenom est requis ',

				]
			],
			'email' => [
				'rules' => 'required|is_unique[users.email]|valid_email',
				'errors' => [
					'required' => 'Adresse email est requise ',
					'is_unique' => 'Adresse email déja utilisée',
					'valid_email' => 'Adresse email invalide'
				]
			]
		]);
		if ($validation->run() == FALSE) {
			$errors = $validation->getErrors();

			echo json_encode(['code' => 0, 'error' => $errors]);
		} else {
			$recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));

			$userIp = $this->request->getIPAddress();

			$secret = '6LebJVkcAAAAAJxvWbfq3w276O5hl_ZYjXUDvA8n';

			$credential = array(
				'secret' => $secret,
				'response' => $this->request->getVar('g-recaptcha-response')
			);

			$verify = curl_init();
			curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($verify, CURLOPT_POST, true);
			curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
			curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($verify);

			$status = json_decode($response, true);
			if ($status['success']) {
				// $this->userModel->add($data);
				// echo json_encode(['code'=>1, 'msg'=>'Yes']);
				$uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
				$userdata = [
					'nom' => $this->request->getVar('nom', ),
					'prenom' => $this->request->getVar('prenom', ),

					'email' => $this->request->getVar('email', ),
					'uniid' => $uniid,
					

				];


				$to = $this->request->getVar('email', );
				$subject = "Activation d'un compte";
				$message = "Bonjour " . $this->request->getVar('nom', ) .' '. $this->request->getVar('prenom', ) . "</p>
						<p>Cet accès à notre site vous permet notamment de :</p>
						<p>- mettre à jour vos coordonnées personnelles et professionnelles en ligne,</p>
						<p>- déposer vos offres d'emploi et de stage,</p>
						<p>- suivre les actualités des membres,</p>
						<p>- accéder aux offres d'emploi ,</p>
						<p>- déposer votre CV pour être visible auprès des partenaires,</p>
						<p>- vous inscrire aux évènements. </p>
						<p>- Veuillez cliquer sur le lien Activez-maintenant pour activer votre compte (Valable 48h)</p>

						<a href='" . base_url() . "/verifierCompte/" . $uniid . "' target='_blank'>Activez-maintenant</a>";

				$this->email->setTo($to);
				$this->email->setFrom('bsm@gmail.com', 'ALUMNI IUT');
				$this->email->setSubject($subject);
				$this->email->setMessage($message);

				if ($this->email->send()) {
					$status = $this->registerModel->saveUsers($userdata);
					if ($status) {
						echo json_encode(['code' => 1, 'msg' => "Inscription reussie. Veuillez vérifier votre adresse email, un mail vous été envoyé "]);
					} else {
						echo json_encode(['code' => 0, 'msg' => "Une Erreur est survenue"]);
					}
				} else {
					echo json_encode(['code' => 0, 'msg' => "OUPS!"]);
				}
			} else {
				echo json_encode(['code' => 0, 'msg' => "Une Erreur"]);
			}
		}
	}

	public function verifierCompte($uniid)
	{
		$data['uniid']=$uniid;
		$data['infosite']=$this->adminModel->getInfoSite();////Récupère toutes les infos du site
		 $data['apropos']=$this->adminModel->getApropos();//Récupère toutes les infos de Apropos
		 $data['slider']=$this->adminModel->getSlider();//Récupère toutes les infos du slider

		
		if(!empty($uniid))
		{
			$userdata=$this->registerModel->verifierUniid($uniid);
			if($userdata)
			{
				if($this->verifierTempsExpiration($userdata->created_at))
				{
					 session()->set("error", "Délai de validité du lien expiré. Veuillez reprendre le processus");
					 $this->registerModel->deleteRecord($uniid);
					return view('errors/erreur_view');

					 


				}
				else
				{
					return view('register/verifierCompte_view', $data);

					 print_r ('Yes');



				}

				$currTime=now('Africa/Douala');
				 print_r($currTime);
				 echo '\n';

				$regTime=$userdata->created_at;

				$regtime=strtotime($regTime);
				 print_r($regtime);
				 echo '\n';

				  
				 print_r((int)$currTime-(int)$regtime);



			}
		}else
		{
			echo 'Erreur';
		}

	}

	public function verifierTempsExpiration($regTime)
	{
		
				$currTime=now('Africa/Douala');//Temps courent
				$regtime=strtotime($regTime);
				$diffTime=(int)$currTime-(int)$regtime;
				if($diffTime > 172800)
				{
					return true;
				}else
				{
					return false;


				}
		
	}

	public function activerCompte()
	{
		
			$this->validate(
				[
				
					'objectif'=>[
						'rules'=>'required',
						'errors'=>[
							'required'=> 'Veuillez remplir ce champs'
						],
					],
				],
			);

		if($this->validation->run()==FALSE)
		{
			$errors=$this->validation->getErrors();
			echo json_encode(['error'=>$errors]);
		}else
		{
				$objectif=$this->request->getVar('objectif');
				$uniid=$this->request->getVar('uniid');
				if($this->registerModel->insertObjectif($objectif, $uniid))
				{
					$pass=substr(str_shuffle('"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?"'),0,8);
					
					$this->registerModel->insertPassword(password_hash($pass,PASSWORD_DEFAULT), $uniid);
					echo json_encode(['code'=>1,'msg'=>$pass]);
				}
				else
				{
					echo json_encode(['code'=>0,'msg'=>'Une erreur est survenue']);

				}
		}

		
	}


	
}
