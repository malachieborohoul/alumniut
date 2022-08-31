<?php

namespace App\Controllers;

use App\Models\AccueilModel;
use App\Models\AdminModel;
use App\Models\EnseignantModel;
use App\Models\UserModel;
use App\Models\EntrepriseModel;


use function PHPUnit\Framework\isEmpty;

class Adm extends BaseController
{
	public $userModel;
	public $accueilModel;
	public $entrepriseModel;
	public $adminModel;
	public $enseignantModel;
	public $validation;
	public $pager;

	public $email;
	public $currTime;
	public function __construct()
	{
		helper('form');
		helper('Form_helper');

		$this->userModel = new UserModel();
		$this->adminModel = new AdminModel;
		$this->accueilModel = new AccueilModel();

		$this->enseignantModel = new EnseignantModel;
		$this->entrepriseModel = new EntrepriseModel();
		$this->validation = \Config\Services::validation();
		$this->pager = \Config\Services::pager();
		$this->email = \Config\Services::email();

		// $this->currTime=now();



	}
	public function index()
	{
		$data['titre'] = 'Tableau de bord';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['totalmembre'] = $this->accueilModel->countAllMembre(); //Compte tous les membres pour les statistiques
		$data['totaltravailleur'] = $this->accueilModel->countAllTravailleur(); //Compte tous les travaileurs pour les statistiques
		$data['totalchomeur'] = $this->accueilModel->countAllChomeur(); //Compte tous les chomeurs pour les statistiques


		$debutDUT = 1993;
		$debutLicence = 2009;
		$actuelleAnnee = date('Y');
		/**
		 * A chaque fois que l'administrateur accède au Panel administratif
		 * ca actualise en ajoutant les années de la promotion et l'optention DUT depuis le debut jusqu'à lannée actuelle
		 */
		for ($i = $debutDUT; $i <= $actuelleAnnee; $i++) {
			$this->adminModel->addPromotionDUT($i);
			$this->adminModel->addOptentionDUT($i);
		}


		/**
		 * A chaque fois que l'administrateur accède au Panel administratif
		 * ca actualise en ajoutant les années de la promotion et optention de la Licence depuis le debut jusqu'à lannée actuelle
		 */
		for ($i = $debutLicence; $i <= $actuelleAnnee; $i++) {
			$this->adminModel->addPromotionLicence($i);
			$this->adminModel->addOptentionLicence($i);
		}





		if (!session()->has('loggedUser')) {
			return redirect()->to('/');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/');
			}
		}
		return view('admin/dashboard', $data);
	}

	public function users()
	{
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));

		$data['titre'] = 'Utilisateurs';

		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}

		return view('admin/users/table', $data);
	}

	public function faq()
	{
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));

		$data['titre'] = 'Faq';

		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}

		return view('admin/faq_view', $data);
	}


	/**
	 * Elle permet de modifier toutes les informations de la plateformes telles que
	 * l'adresse, le logo, l'email, etc
	 *
	 * @return void
	 */
	public function editInfos()
	{
		$data['titre'] = 'Infos Plateforme';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['infosite'] = $this->adminModel->getInfoSite();
		$id = $this->adminModel->getInfoSite();
		if (!session()->has('loggedUser')) {
			return redirect()->to(base_url() . '/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to(base_url() . '/login');
			}
		}

		$rules = [
			'telephone' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'adresse' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'logo' => [
				'rules' => 'max_size[logo, 10000]|uploaded[logo]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],

		];

		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$dat = [
					'telephone' => $this->request->getVar('telephone'),
					'adresse' => $this->request->getVar('adresse', ),
				];
				$file = $this->request->getFile('logo');
				if ($file->isValid() && !$file->hasMoved()) {
					if ($file->move(FCPATH . 'logo', $file->getRandomName())) {
						$path = base_url() . "/logo/" . $file->getName();
						$dat['logo'] = $path;
						if ($this->adminModel->editInfos($id->idInfo, $dat)) {
							session()->setTempdata('success', 'Infos Plateforme modifiés', 3);
?>
							<script>
								window.location = '/admin-editInfos';
							</script>
						<?php

						} else {
							session()->setTempdata('error', "Erreur de modification", 3);
						?>
							<script>
								window.location = '/admin-editInfos';
							</script>
						<?php

						}
					} else {
						session()->setTempdata('error', 'Error de déplacement', 3);
						return redirect()->to(current_url());
					}
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}


		return view('admin/parametres/editInfos', $data);
	}

	public function editRubrique()
	{
		$id = $this->adminModel->getAllRubrique();

		$this->validate([
			'titre1' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'description1' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'titre2' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'description2' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'titre3' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'description3' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],


			'titre4' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'description4' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],





		]);


		if ($this->validation->run() == FALSE) {
			$errors = $this->validation->getErrors();
			echo json_encode(['code' => 0, 'error' => $errors]);
		} else {
			$dat = [
				'titre1' => $this->request->getVar('titre1', ),
				'description1' => $this->request->getVar('description1', ),
				'titre2' => $this->request->getVar('titre2', ),
				'description2' => $this->request->getVar('description2', ),
				'titre3' => $this->request->getVar('titre3', ),
				'description3' => $this->request->getVar('description3', ),
				'titre4' => $this->request->getVar('titre4', ),
				'description4' => $this->request->getVar('description4', ),
			];

			if ($this->adminModel->editRubrique($id->id, $dat)) {
				echo json_encode(['code' => 1, 'msg' => 'Rubrique modifiée']);
			} else {
				echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue']);
			}
		}
	}


	/**
	 * Elle permet de modifier les informations
	 * Apropos de la plateforme stockées dans la
	 * base de données
	 *
	 * @return void
	 */
	public function editApropos()
	{
		$data['titre'] = 'A propos de nous';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['apropos'] = $this->adminModel->getApropos();
		$id = $this->adminModel->getApropos();
		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}
		$rules = [
			'titre' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'photo' => [
				'rules' => 'uploaded[photo]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],

			'banniere' => [
				'rules' => 'uploaded[banniere]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],

		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$dat = [
					'titre' => $this->request->getVar('titre', ),
					'description' => $this->request->getVar('description', ),
				];
				$file = $this->request->getFile('photo');
				$file1 = $this->request->getFile('banniere');

				if ($file->isValid() && !$file->hasMoved() && $file1->isValid() && !$file1->hasMoved()) {
					if ($file->move(FCPATH . 'importer/apropos', $file->getRandomName()) && $file1->move(FCPATH . 'importer/apropos', $file1->getRandomName())) {
						$path = base_url() . "/public/importer/apropos/" . $file->getName();
						$path1 = base_url() . "/public/importer/apropos/" . $file1->getName();
						$dat['photo'] = $path;
						$dat['banniere'] = $path1;
						if ($this->adminModel->editApropos($id->id, $dat)) {
							session()->setTempdata('success', 'A propos modifié', 3);
						?>
							<script>
								window.location = '/adm/editApropos';
							</script>
						<?php

						} else {
							session()->setTempdata('error', "Une erreur est survenue", 3);
						?>
							<script>
								window.location = '/adm/editApropos';
							</script>
						<?php

						}
					} else {
						session()->setTempdata('error', 'une erreur est survenue', 3);
						return redirect()->to(current_url());
					}
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}


		return view('admin/parametres/editApropos_view', $data);
	}

	/**
	 * Modifie les images du slide ainsi que ce qui est écrit
	 *
	 * @return void
	 */
	public function editSlider()
	{
		$data['titre'] = 'Slider';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['slider'] = $this->adminModel->getSlider();
		$id = $this->adminModel->getSlider();

		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}
		$rules = [
			'banniere' => [
				'rules' => 'uploaded[banniere]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],
			'textGras1' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'textNormal1' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'image2' => [
				'rules' => 'uploaded[image2]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],
			'textGras2' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'textNormal2' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'image3' => [
				'rules' => 'uploaded[image3]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],
			'textGras3' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'textNormal3' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],





		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$dat = [
					'textGras1' => $this->request->getVar('textGras1', ),
					'textNormal1' => $this->request->getVar('textNormal1', ),
					'textGras2' => $this->request->getVar('textGras2', ),
					'textNormal2' => $this->request->getVar('textNormal2', ),
					'textGras3' => $this->request->getVar('textGras3', ),
					'textNormal3' => $this->request->getVar('textNormal3', ),
				];
				$file = $this->request->getFile('banniere');
				$file2 = $this->request->getFile('image2');
				$file3 = $this->request->getFile('image3');
				if ($file->isValid() && !$file->hasMoved() && $file2->isValid() && !$file2->hasMoved() && $file3->isValid() && !$file3->hasMoved()) {
					if ($file->move(FCPATH . 'slider', $file->getRandomName()) && $file2->move(FCPATH . 'slider', $file2->getRandomName()) && $file3->move(FCPATH . 'slider', $file3->getRandomName())) {
						$path1 = "/slider/" . $file->getName();
						$path2 = "/slider/" . $file2->getName();
						$path3 = "/slider/" . $file3->getName();
						$dat['banniere'] = $path1;
						$dat['image2'] = $path2;
						$dat['image3'] = $path3;
						if ($this->adminModel->editSlider($id->idSlider, $dat)) {
							session()->setTempdata('success', 'Slider modifié', 3);
						?>
							<script>
								window.location = '/adm/editSlider';
							</script>
						<?php

						} else {
							session()->setTempdata('error', "Erreur de modification", 3);
						?>
							<script>
								window.location = '/editSlider';
							</script>
						<?php

						}
					} else {
						session()->setTempdata('error', 'Error de déplacement', 3);
						return redirect()->to(current_url());
					}
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}


		return view('admin/parametres/editSlider_view', $data);
	}
	/**
	 * Gère les évènements
	 *
	 * @return void
	 */
	public function addEvenement()
	{
		$data['titre'] = 'Ajouter un évènement';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['evenement'] = $this->adminModel->getEvenement();
		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}
		$this->validate([

			'titre' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'lieu' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'dateDebut' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'dateFin' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'heureDebut' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'heureFin' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'banniere' => [
				'rules' => 'uploaded[banniere]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],
			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],



		]);


		if ($this->validation->run() == FALSE) {
			$errors = $this->validation->getErrors();
			echo json_encode(['code' => 0, 'error' => $errors]);
		} else {
			$dat = [
				'titre' => $this->request->getVar('titre', ),
				'lieu' => $this->request->getVar('lieu', ),
				'dateDebut' => $this->request->getVar('dateDebut', ),
				'dateFin' => $this->request->getVar('dateFin', ),
				'heureDebut' => $this->request->getVar('heureDebut', ),
				'heureFin' => $this->request->getVar('heureFin', ),
				'description' => $this->request->getVar('description', ),
				'statut' => 'actif',
				'vu' => 1,
				'idUsers' => session()->get('loggedUser'),
			];
			$file = $this->request->getFile('banniere');

			if ($file->isValid() && !$file->hasMoved()) {
				if ($file->move(FCPATH . 'importer/evenement', $file->getRandomName())) {
					$path = base_url() . "/importer/evenement/" . $file->getName();

					$dat['banniere'] = $path;

					if ($this->adminModel->addEvenement($dat)) {
						echo json_encode(['code' => 1, 'msg' => 'Evènement ajouté']);
					} else {
						echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
					}
				} else {
					echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
				}
			}
		}
	}




	public function addBlog()
	{
		$data['titre'] = 'Ajouter un blog';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['evenement'] = $this->adminModel->getEvenement();
		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}
		$this->validate([

			'titre' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],


			'banniere' => [
				'rules' => 'uploaded[banniere]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],
			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],



		]);

		if ($this->validation->run() == FALSE) {
			$errors = $this->validation->getErrors();
			echo json_encode(['code' => 0, 'error' => $errors]);
		} else {
			$uniid = substr(str_shuffle('0123456789'), 0, 7);

			$dat = [
				'titre' => $this->request->getVar('titre', ),
				'description' => $this->request->getVar('description', ),
				'idUsers' => session()->get('loggedUser'),
				'statut' => 'actif',
				'uniidblog' => $uniid
			];
			$file = $this->request->getFile('banniere');

			if ($file->isValid() && !$file->hasMoved()) {
				if ($file->move(FCPATH . 'importer/blog', $file->getRandomName())) {
					$path = base_url() . "/importer/blog/" . $file->getName();

					$dat['banniere'] = $path;

					if ($this->adminModel->addBlog($dat)) {
						echo json_encode(['code' => 1, 'msg' => 'Blog ajouté']);
					} else {
						echo json_encode(['code' => 0, 'msg' => 'Erreur d"ajout']);
					}
				} else {
					echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue']);
				}
			}
		}
	}


	public function blog()
	{
		$data['titre'] = 'Blog';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['evenement'] = $this->adminModel->getEvenement();
		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}
		$rules = [

			'titre' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'lieu' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'dateDebut' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'dateFin' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'heureDebut' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'heureFin' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],

			'banniere' => [
				'rules' => 'uploaded[banniere]',
				'errors' => [

					'ext_in' => 'Seules les extentions png, jpg et jpeg sont valides',
					'uploaded' => 'Veuillez choisir une image'
				],
			],
			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Veuillez remplir ce champs'
				],
			],



		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$dat = [
					'titre' => $this->request->getVar('titre', ),
					'lieu' => $this->request->getVar('lieu', ),
					'dateDebut' => $this->request->getVar('dateDebut', ),
					'dateFin' => $this->request->getVar('dateFin', ),
					'heureDebut' => $this->request->getVar('heureDebut', ),
					'heureFin' => $this->request->getVar('heureFin', ),
					'description' => $this->request->getVar('description', ),
					'statut' => 'actif',
					'vu' => 1,
					'idUsers' => session()->get('loggedUser'),
				];
				$file = $this->request->getFile('banniere');

				if ($file->isValid() && !$file->hasMoved()) {
					if ($file->move(FCPATH . 'evenement', $file->getRandomName())) {
						$path = "/evenement/" . $file->getName();

						$dat['banniere'] = $path;

						if ($this->adminModel->addEvenement($dat)) {
							session()->setTempdata('success', 'Evènement ajouté', 3);
						?>
							<script>
								window.location = '/admin-addEvenement';
							</script>
						<?php

						} else {
							session()->setTempdata('error', "Erreur d'ajout", 3);
						?>
							<script>
								window.location = '/admin-addEvenement';
							</script>
<?php

						}
					} else {
						session()->setTempdata('error', 'Error de déplacement', 3);
						return redirect()->to(current_url());
					}
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}


		return view('admin/blog_view', $data);
	}

	public function addGaleriePhoto()
	{
		$data['titre'] = 'Ajouter photo(s)';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['evenement'] = $this->adminModel->getEvenement();
		if (!session()->has('loggedUser')) {
			return redirect()->to(base_url() . '/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to(base_url() . '/login');
			}
		}
		$this->validate([
			'photo' => [
				'rules' => 'uploaded[photo]|is_image[photo]',
				'errors' => [

					'is_image' => 'Veuillez choisir uniquement les images',
					'uploaded' => 'Veuillez choisir une image'
				],
			],
		]);

		if ($this->validation->run() == FALSE) {
			$errors = $this->validation->getErrors();
			echo json_encode(['code' => 0, 'error' => $errors]);
		} else {

			$files = $this->request->getFiles();

			foreach ($files['photo'] as $img) {
				if ($img->isValid() && !$img->hasMoved()) {
					if ($img->move(FCPATH . 'importer/galerie', $img->getRandomName())) {
						$path = base_url() . "/importer/galerie/" . $img->getName();
						$dat['photo'] = $path;
					}
					if ($this->adminModel->addGalerie($dat)) {
						$code = 1;
						$msg = 'Photo(s) ajoutée(s)';
					} else {
						$code = 0;
						$msg = 'Une erreur est survenue...';
					}
				} else {
					$code = 0;
					$msg = 'Une erreur est survenue...';

					echo json_encode(['code' => 0, 'msg' => 'Une erreur est rurvenue...']);
				}
			}
			echo json_encode(['code' => $code, 'msg' => $msg]);
		}
	}


	public function evenement()
	{
		$data['titre'] = 'Evènements';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['evenement'] = $this->adminModel->getEvenement();

		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}



		return view('admin/evenement_view', $data);
	}

	public function rubrique()
	{
		$data['titre'] = 'Rubrique';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));




		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}






		return view('admin/rubrique_view', $data);
	}

	public function galerie()
	{
		$data['titre'] = 'Galérie';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		$data['evenement'] = $this->adminModel->getEvenement();

		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}



		return view('admin/galerie_view', $data);
	}







	public function profile()
	{
		$data = [];
		$data['admindata'] = $this->adminModel->getAdminData(session()->get('loggedAdmin'));

		return view('admin/profile_view', $data);
	}

	public function logout()
	{
		session()->remove('loggedAdmin');
		session()->destroy();
		return redirect()->to(base_url() . '/login');
	}


	/**
	 * Elle permet de modifier le statut de l'utilisateur
	 * Si le statut de l'utilisateur est déactiver, il
	 * ne pourra pas acceéder à la plateforme
	 * Donc par conséquent si le statut est actif
	 * elle le déactive et vice verca
	 *
	 * @return void
	 */
	public function updateStatut()
	{
		$userId = $this->request->getPost('userId');
		$statut = $this->adminModel->getStatut($userId);


		$stat = $statut->statut;;
		if ($stat == 'actif') {
			$this->adminModel->deactiverStatut($userId);
		} else {
			$this->adminModel->activerStatut($userId);
		}
	}

	/**
	 * Modifie le statut des évènements
	 * Quand un membre publie un évènement, il ,n'est pas directement publié
	 * L'administration devra exercé un contrôle avant de l'activer pour qu'il soit
	 * rendu public, au moment de l'activation, Un mail sera envoyé à tous ses abonnés
	 * qu'un nouvel évènement ait été publié venant du membre qu'ils suivent
	 *
	 * @return void
	 */
	public function updateEventStatut()
	{
		$eventId = $this->request->getPost('eventId');
		$statut = $this->adminModel->getEventStatut($eventId);
		$userdata = $this->userModel->getLoggedInUserData($this->request->getPost('userId'));


		$stat = $statut->statut;;
		if ($stat == 'actif') {
			$this->adminModel->deactiverEventStatut($eventId);
		} else {

			if ($this->adminModel->activerEventStatut($eventId)) {
				$abon = $this->userModel->getAbonnement($this->request->getPost('userId'));
				foreach ($abon as $abon) {
					$to = $abon['email'];
					$subject = "Evènement";
					$message = "Un évènement a été publié par le membre " . $userdata->nom;

					$this->email->setTo($to);
					$this->email->setFrom('bsm@gmail.com', 'ALUMNI IUT');
					$this->email->setSubject($subject);
					$this->email->setMessage($message);

					if ($this->email->send()) {
					} else {
					}
				}
			}
		}
	}

	public function updateGalerieStatut()
	{
		$galerieId = $this->request->getPost('galerieId');
		$statut = $this->adminModel->getGalerieStatut($galerieId);

		$stat = $statut->statut;;
		if ($stat == 'actif') {
			$this->adminModel->deactiverGalerieStatut($galerieId);
		} else {
			$this->adminModel->activerGalerieStatut($galerieId);
		}
	}

	public function updateFaq()
	{
		$idFaq = $this->request->getPost('idFaq');
		$dat = [
			'question' => $this->request->getPost('question'),
			'reponse' => $this->request->getPost('reponse'),
		];
		$this->adminModel->updateFaq($idFaq, $dat);
	}


	/**
	 * Quand une offre est publiée par un membre, elle n'est pas du coup rendue
	 * Il faudrait que l'administrateur l'active. Cette fonction permet d'activer
	 * et de désactiver le statut
	 * Au moment de l'activation un mail est envoyé aux abonné du membres qui a publié
	 * l'offre en question
	 *
	 * @return void
	 */
	public function updateStatutOffre()
	{
		$offreId = $this->request->getPost('offreId');
		$statut = $this->adminModel->getStatutOffre($offreId);
		$userdata = $this->userModel->getLoggedInUserData($this->request->getPost('userId'));


		$stat = $statut->statut;;
		if ($stat == 'actif') {
			$this->adminModel->deactiverStatutOffre($offreId);
		} else {
			if ($this->adminModel->activerStatutOffre($offreId)) {
				$abon = $this->userModel->getAbonnement($this->request->getPost('userId'));
				foreach ($abon as $abon) {
					$to = $abon['email'];
					$subject = "Appel d'offres";
					$message = "Une offre a été publiée par le membre " . $userdata->nom .
						"<a href='" . base_url() . "/public/Accueil' target='_blank'>Cliquer ici</a>";

					$this->email->setTo($to);
					$this->email->setFrom('bsm@gmail.com', 'ALUMNI IUT');
					$this->email->setSubject($subject);
					$this->email->setMessage($message);

					if ($this->email->send()) {
					} else {
					}
				}
			}
		}
	}
	/**
	 * Elle modifie le rôle d'un user soit en administrateur 
	 * soit en user simple
	 *
	 * @return void
	 */
	public function updateRole()
	{
		$userId = $this->request->getPost('userId');
		$role = $this->adminModel->getRole($userId);

		$rol = $role->idRole;;
		if ($rol == 1) {
			$this->adminModel->updateToAdmin($userId);
		} else {
			$this->adminModel->updateToUser($userId);
		}
	}
	/**
	 * Récupère tous les users 
	 *
	 * @return void
	 */
	public function getAllUsers()
	{
		// $data['users'] =$this->adminModel->getAllUsers();

		$limit = 6;
		$total_data = $this->adminModel->totalRowsUsers();
		$total_pages = ceil($total_data / $limit);




		if ($this->request->getPost('page')) {
			$page = $this->request->getPost('page');
		} else {
			$page = 1;
		}
		$debut = ($page - 1) * $limit;


		$data = [
			'pages' => $total_pages,
			'total_data' => $total_data,
			'users' => $this->adminModel->getAllUsers($limit, $debut),
		];


		echo json_encode($data);
	}

	public function getAllFaqs()
	{
		$limit = 6;
		$total_data = $this->adminModel->totalRowsFaqs(); //Nombre total de données
		$total_pages = ceil($total_data / $limit);




		if ($this->request->getPost('page')) {
			$page = $this->request->getPost('page');
		} else {
			$page = 1;
		}
		$debut = ($page - 1) * $limit;


		$data = [
			'pages' => $total_pages,
			'total_data' => $total_data,
			'faqs' => $this->adminModel->getAllFaqs($limit, $debut),
		];


		echo json_encode($data);
	}

	public function getAllEvents()
	{
		$limit = 3;
		$total_data = $this->adminModel->totalRowsEvents(); //Nombre total de données
		$total_pages = ceil($total_data / $limit);




		if ($this->request->getPost('page')) {
			$page = $this->request->getPost('page');
		} else {
			$page = 1;
		}
		$debut = ($page - 1) * $limit;


		$data = [
			'pages' => $total_pages,
			'total_data' => $total_data,
			'events' => $this->adminModel->getAllEvents($limit, $debut),
		];


		echo json_encode($data);
	}

	public function getAllBlog()
	{
		$limit = 2;
		$total_data = $this->adminModel->totalRowsBlog(); //Nombre total de données
		$total_pages = ceil($total_data / $limit);




		if ($this->request->getPost('page')) {
			$page = $this->request->getPost('page');
		} else {
			$page = 1;
		}
		$debut = ($page - 1) * $limit;


		$data = [
			'pages' => $total_pages,
			'total_data' => $total_data,
			'blog' => $this->adminModel->getAllBlog($limit, $debut),
		];


		echo json_encode($data);
	}

	public function getAllGalerie()
	{

		$limit = 3;
		$total_data = $this->adminModel->totalRowsGalerie(); //Nombre total de données
		$total_pages = ceil($total_data / $limit);




		if ($this->request->getPost('page')) {
			$page = $this->request->getPost('page');
		} else {
			$page = 1;
		}
		$debut = ($page - 1) * $limit;


		$data = [
			'pages' => $total_pages,
			'total_data' => $total_data,
			'galerie' => $this->adminModel->getAllGalerie($limit, $debut),
		];


		echo json_encode($data);
	}

	public function getAllRubrique()
	{
		$data['rubrique'] = $this->adminModel->getAllRubrique();
		return $this->response->setJSON($data);
	}


	/**
	 * Récupère un user à partir de son identifiant
	 *
	 * @return void
	 */
	public function getUser()
	{
		$userId = $this->request->getPost('userId');
		$data['users'] = $this->adminModel->getUser($userId);
		return $this->response->setJSON($data);
	}

	public function getFaq()
	{
		$faqId = $this->request->getPost('faqId');
		$data['faqs'] = $this->adminModel->getFaq($faqId);
		return $this->response->setJSON($data);
	}
	/**
	 * Effectue une recherche par nom, email et statut 
	 * en fonction du mot saisi dans la barre de recherche
	 * 
	 * @return void
	 */
	public function fetchData()
	{
		$query = $this->request->getPost('query');

		$data['users'] = $this->adminModel->fetchData($query);
		return $this->response->setJSON($data);
	}

	public function fetchDataEvents()
	{
		$query = $this->request->getPost('query');

		$data['events'] = $this->adminModel->fetchDataEvents($query);
		return $this->response->setJSON($data);
	}

	public function fetchDataBlog()
	{
		$query = $this->request->getPost('query');

		$data['blog'] = $this->adminModel->fetchDataBlog($query);
		return $this->response->setJSON($data);
	}


	public function fetchFaqData()
	{
		$query = $this->request->getPost('query');

		$data['faqs'] = $this->adminModel->fetchFaqData($query);
		return $this->response->setJSON($data);
	}

	public function fetchOffreData()
	{
		$query = $this->request->getPost('query');

		$data['offre'] = $this->adminModel->fetchOffreData($query);
		return $this->response->setJSON($data);
	}




	public function offre()
	{
		$data = [];
		$data['titre'] = 'Offres';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));

		if (!session()->has('loggedUser')) {
			return redirect()->to('/login');
		} else {
			if (session()->has('loggedUserRole') != '2') {
				return redirect()->to('/login');
			}
		}


		return view('admin/offre_view', $data);
	}

	/**
	 * Récupère toutes les offres  dont vu=0
	 * i.e toutes les offres qui n'ont pas été 
	 * vu par l'administrateur
	 *
	 * @return void
	 */
	public function loadOffre()
	{
		$data['offre'] = $this->adminModel->getOffre();
		return $this->response->setJSON($data);
	}
	/**Récupère tous les users dont vu=0
	 * 
	 */
	public function loadUser()
	{
		$data['user'] = $this->adminModel->getVuUser();
		return $this->response->setJSON($data);
	}
	/**
	 * Récupère tous les évènements dont vu=0
	 *
	 * @return void
	 */
	public function loadEvent()
	{
		$data['event'] = $this->adminModel->getVuEvent();
		return $this->response->setJSON($data);
	}

	public function getAllOffre()
	{
		$limit = 6;
		$total_data = $this->adminModel->totalRowsOffres();
		$total_pages = ceil($total_data / $limit);




		if ($this->request->getPost('page')) {
			$page = $this->request->getPost('page');
		} else {
			$page = 1;
		}
		$debut = ($page - 1) * $limit;


		$data = [
			'pages' => $total_pages,
			'total_data' => $total_data,
			'offre' => $this->adminModel->getAllOffre($limit, $debut),
		];


		echo json_encode($data);
	}

	/**
	 * Modifie vu à 1 pour signifier que l'administrateur 
	 * a vu l'offre. Pour cela, il faudrait qu'il appuie
	 * sur le bouton vu pour déclencher la procédure 
	 *
	 * @return void
	 */
	public function editVu()
	{
		$offreId = $this->request->getPost('offreId');
		if ($this->adminModel->editVu($offreId)) {

			$data['offreParId'] = $this->adminModel->getOffreParId($offreId);;
			return $this->response->setJSON($data);
		} else {
			$data = ['status' => 'NONNN'];
			return $this->response->setJSON($data);
		}
	}

	public function editVuUser()
	{
		$userVuId = $this->request->getPost('userVuId');
		if ($this->adminModel->editVuUser($userVuId)) {

			$data['userParId'] = $this->adminModel->getUserParId($userVuId);;
			return $this->response->setJSON($data);
		} else {
			$data = ['status' => 'NONNN'];
			return $this->response->setJSON($data);
		}
	}

	public function editVuEvent()
	{
		$eventVuId = $this->request->getPost('eventVuId');
		if ($this->adminModel->editVuEvent($eventVuId)) {

			$data['eventVuId'] = $this->adminModel->getEventParId($eventVuId);;
			return $this->response->setJSON($data);
		} else {
			$data = ['status' => 'NONNN'];
			return $this->response->setJSON($data);
		}
	}

	/**
	 * Récupère le nombre d'offres de users et d'évènements qui n'nont pas été vu par l'admin
	 *
	 * @return void
	 */
	public function totalOffreUserEvent()
	{
		$data['offreuserevent'] = $this->adminModel->totalOffre() + $this->adminModel->totalUser() + $this->adminModel->totalEvent();

		return $this->response->setJSON($data);
	}


	/**
	 * Supprime une offre à partir de son id
	 *
	 * @return void
	 */
	public function deleteOffre()
	{
		$offreId = $this->request->getPost('offreId');
		$this->adminModel->deleteOffre($offreId);
	}

	/**
	 * Supprime un user à partir de son id
	 *
	 * @return void
	 */
	public function deleteUser()
	{
		$userId = $this->request->getPost('userId');
		$this->adminModel->deleteUser($userId);
	}

	public function deleteEvent()
	{
		$ceventId = $this->request->getPost('ceventId');
		$this->adminModel->deleteEvent($ceventId);
	}

	public function deleteBlog()
	{
		$cblogId = $this->request->getPost('cblogId');
		$this->adminModel->deleteBlog($cblogId);
	}

	public function deleteGalerie()
	{
		$cgalerieId = $this->request->getPost('cgalerieId');
		$this->adminModel->deleteGalerie($cgalerieId);
	}

	public function deleteFaq()
	{
		$userId = $this->request->getPost('userId');
		$this->adminModel->deleteFaq($userId);
	}

	/**
	 * Ajoute un user par l'admin
	 *
	 * @return void
	 */
	public function insertUser()
	{
		$this->validate([
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

			'role' => [
				'rules' => 'required',
				'errors' => [
					'required' => "SVP Veuillez choisir le role",

				],
			],
		]);

		if ($this->validation->run() == FALSE) {
			$errors = $this->validation->getErrors();
			$data = [
				'code' => 0,
				'error' => $errors,
			];
			echo json_encode($data);
		} else {
			$dat = [
				'email' => $this->request->getVar('email'),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'idRole' => $this->request->getVar('role'),
				'statut' => 'actif',
				'vu' => 1
			];
			if ($this->adminModel->insertUser($dat)) {
				$data = ['code' => 1, 'msg' => 'Utilisateur inséré'];
				echo json_encode($data);
			} else {
				$data = ['code' => 0, 'msg' => 'Une erreur est survenue'];
				echo json_encode($data);
			}
		}
	}

	/**
	 * Ajoute un user par l'admin
	 *
	 * @return void
	 */
	public function insertEntreprise()
	{
		$this->validate([
			'nomE' => [
				'rules' => 'required',
				'errors' => [
					'required' => "SVP Veuillez remplir le champ",

				],
			],

		]);

		if ($this->validation->run() == FALSE) {
			$errors = $this->validation->getErrors();
			$data = [
				'code' => 0,
				'error' => $errors,
			];
			echo json_encode($data);
		} else {
			$dat = [
				'nomE' => $this->request->getVar('nomE'),

			];
			if ($this->adminModel->insertEntreprise($dat)) {
				$data = ['code' => 1, 'msg' => 'Entreprise insérée. VEUILLEZ RAFRAICHIRA PAGE'];
				echo json_encode($data);
			} else {
				$data = ['code' => 0, 'msg' => 'Une erreur est survenue'];
				echo json_encode($data);
			}
		}
	}

	/**
	 * Permet l'ajout d'une offre par l'administrateur
	 *
	 * @return void
	 */
	public function insertOffre()
	{
		$this->validate([
			'titre' => [
				'rules' => 'required',
				'errors' => [
					'required' => "Veuillez remplir le champ",

				],
			],

			'nomEntreprise' => [
				'rules' => 'required',
				'errors' => [
					'required' => "Veuillez remplir le champ",

				],
			],

			'dateDebut' => [
				'rules' => 'required',
				'errors' => [
					'required' => "Veuillez remplir le champ",

				],
			],

			'dateFin' => [
				'rules' => 'required',
				'errors' => [
					'required' => "Veuillez remplir le champ",

				],
			],

			'description' => [
				'rules' => 'required',
				'errors' => [
					'required' => "Veuillez remplir le champ",

				],
			],

		]);

		if ($this->validation->run() == FALSE) {
			$errors = $this->validation->getErrors();
			$data = [
				'code' => 0,
				'error' => $errors,
			];
			echo json_encode($data);
		} else {
			$idUsers = session()->get('loggedUser');

			$dat = [
				'titre' => $this->request->getPost('titre'),
				'nomEntreprise' => $this->request->getPost('nomEntreprise'),
				'adresseEntreprise' => $this->request->getPost('adresseEntreprise'),
				'emailEntreprise' => $this->request->getPost('emailEntreprise'),
				'telephoneEntreprise' => $this->request->getPost('telephoneEntreprise'),
				'description' => $this->request->getPost('description'),
				'salaire' => $this->request->getPost('salaire'),
				'exigence' => $this->request->getPost('exigence'),
				'dateDebut' => $this->request->getPost('dateDebut'),
				'dateFin' => $this->request->getPost('dateFin'),

				'idUsers' => $idUsers,
				'vu' => 1
			];
			if ($this->userModel->insertOffre($dat)) {
				$data = ['code' => 1, 'msg' => 'Offre ajouté'];
				echo json_encode($data);
			} else {
				$data = ['code' => 0, 'msg' => 'Une erreur est survenue'];
				echo json_encode($data);
			}
		}
	}

	public function insertFaq()
	{
		$dat = [
			'question' => $this->request->getPost('question'),
			'reponse' => $this->request->getPost('reponse'),

		];
		if ($this->adminModel->insertFaq($dat)) {
			$data = ['status' => 'Faq inséré'];
			return $this->response->setJSON($data);
		} else {
			$data = ['status' => 'Erreur, Faq non inséré'];
			return $this->response->setJSON($data);
		}
	}

	public function enseignant()
	{
		$data['titre'] = 'Enseignant';
		$data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));




		return view('admin/enseignant_view', $data);
	}



	public function getEns()
	{
		$limit = 10;
		$total_data = $this->adminModel->totalRows();
		$total_pages = ceil($total_data / $limit);




		if ($this->request->getPost('page')) {
			$page = $this->request->getPost('page');
		} else {
			$page = 1;
		}
		$debut = ($page - 1) * $limit;


		$data = [
			'pages' => $total_pages,
			'ens' => $this->adminModel->getEns($limit, $debut),
		];



		echo json_encode($data);
	}



	public function getDernierEventActive()
	{

		$data['dernier'] = $this->adminModel->getDernierEventActive();
	}
	/**
	 * Importer les membres depuis un fichier Excel
	 *
	 * @return void
	 */
	public function importerExcel()
	{
		if ($this->request->getMethod() == 'post') {
			$file = $this->request->getFile('file');
			$ext = $file->getClientExtension();
			if ($ext == "xls") {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $render->load($file);
			$sheet = $spreadsheet->getActiveSheet()->toArray();
			foreach ($sheet as $key => $data) {
				if ($key == 0) {
					continue;
				}


				/**	Filière DUT */
				if (empty($data['11'])) {
					$data['11'] = "null";
				}
				/**
				 * Filière licence
				 */
				if (empty($data['14'])) {
					$data['14'] = "null";
				}

				/**
				 * Situation actuelle
				 */
				if (empty($data['18'])) {
					$data['18'] = "null";
				}

				/**
				 * Année obtention DUT
				 */
				if (empty($data["12"])) {
					$data['12'] = 0;
				}

				if (empty($data["15"])) {
					$data['15'] = 0;
				}



				// || $this->adminModel->returnIdFiliereLicence($data['14'])
				// 	|| $this->adminModel->returnIdDernierDiplome($data['16'])
				// 	|| $this->adminModel->returnIdSituation($data['18'])



				if ($this->adminModel->returnIdFiliereDUT($data['11'])) {
					if ($this->adminModel->returnIdFiliereLicence($data['14'])) {
						if ($this->adminModel->returnIdSituation($data['18'])) {
							if ($this->adminModel->returnIdObtentionDUT($data['12'])) {
								if ($this->adminModel->returnIdObtentionLicence($data['15'])) {
									$idDUT = $this->adminModel->returnIdFiliereDUT($data['11']); //Retourne l'id de la filiere du DUT
									$idLI = $this->adminModel->returnIdFiliereLicence($data['14']);
									$idS = $this->adminModel->returnIdSituation($data['18']);
									$idODUT = $this->adminModel->returnIdObtentionDUT($data['12']);
									$idOL = $this->adminModel->returnIdObtentionLicence($data['15']);
									//Convertion date excel 
									$dateNaiss = $data['5'];
									$newDate = date("Y-m-d", strtotime($dateNaiss));
									$dat = [
										// 'photo'=>$data['1'],
										'nom' => $data['2'],
										'prenom' => $data['3'],
										'genre' => $data['4'],
										'dateNaiss' => $newDate,
										'lieuNaiss' => $data['6'],
										'dut' => $idDUT->idDUT,
										'licence' => $idLI->idLI,
										'dernierDiplome' => $data['16'],
										'situation' => $idS->idS,
										'poste' => $data['21'],
										'telephone' => $data['22'],
										'email' => $data['23'],
										'attente' => $data['24'],
										'apporter' => $data['25'],
										'obtentionDUT' => $idODUT->idODUT,
										'obtentionLicence' => $idOL->idOL,
										'vu' => 1,
										'statut' => 'actif'
									];
									if ($this->adminModel->importerExcel($dat)) {
										//Envoyer un mail à tous ceux qui sont importés
										$to = $dat['email'];
										$subject = "Invitation";
										$message = "Bonjour " . $dat['nom'] . ' ' . $dat['prenom'] . "</p>
												<p>Vous êtes invités commencez l'aventure sur la plateforme ALUMNI</p>
												<p>Cet accès à notre site vous permet notamment de :</p>
												<p>- mettre à jour vos coordonnées personnelles et professionnelles en ligne,</p>
												<p>- déposer vos offres d'emploi et de stage,</p>
												<p>- suivre les actualités des membres,</p>
												<p>- accéder aux offres d'emploi ,</p>
												<p>- déposer votre CV pour être visible auprès des partenaires,</p>
												<p>- vous inscrire aux évènements. </p>
												<p>- Veuillez cliquer sur le lien pour acceder à la plateforme</p>
						
												<a href='" . base_url() . "/public/user/accueil' target='_blank'>Activez-maintenant</a>";

										//$this->email->setTo($to);
										//$this->email->setFrom('bsm@gmail.com', 'ALUMNI IUT');
										//$this->email->setSubject($subject);
										//$this->email->setMessage($message);

										//if ($this->email->send()) {
										//} else {
										//}
										$code = 1;
									} else {
										$code = 0;
									}
								}
							}
						}
					}
				}
			}

			if ($code = 1) {


				return redirect()->to('/adm/users');
				session()->set('success', 'Fichier a été importé');
			} else {
				return redirect()->to('/adm/users');

				session()->set('error', 'Une erreur est survenue...');
			}
		}
	}

	public function supprimerTout(){
		$this->validate([
			'checked_value'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>"Aucune case n'a été cochée"
				]
			]
		]);

		if($this->validation->run()==FALSE){
			$errors=$this->validation->getErrors();
			echo json_encode(['code'=>0,'error'=>"Aucune case n'a été cochée"]);
		}else
		{
			$checked_value=$this->request->getVar('checked_value');
			foreach($checked_value as $cv){
				$this->adminModel->deleteFaq($cv);
			}
			echo json_encode(['code'=>1,'msg'=>'Faq supprimé']);


		}
	}
}
