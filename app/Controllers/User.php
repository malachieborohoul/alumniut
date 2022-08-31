<?php

namespace App\Controllers;

use App\Models\AccueilModel;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\EntrepriseModel;

use function PHPUnit\Framework\isEmpty;

class User extends BaseController
{

    public $userModel;
    public $adminModel;
    public $entrepriseModel;
    public $accueilModel;
    public $validation;
    public $email;

    public $session;
    public function __construct()
    {
        helper('form');
        helper('Form_helper');

        $this->userModel = new UserModel();
        $this->adminModel = new AdminModel();
        $this->entrepriseModel = new EntrepriseModel();
        $this->accueilModel = new AccueilModel();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();
		$this->email = \Config\Services::email();

    }

    public function index()
    {
        $data = [];
        $data['userdata'] = null;
        if(!session()->has('loggedUser'))
        {
            return redirect()->to('/renvoiLogin');
        }
        $idUsers = session()->get('loggedUser');

        $data['userdata'] = $this->userModel->getLoggedInUserData($idUsers);
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['apropos'] = $this->adminModel->getApropos();
        $data['slider'] = $this->adminModel->getSlider();

 

        

       








        return view('accueilview', $data);
    }

    public function profile()
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();


        return view('profile_view', $data);
    }

    public function logout()
    {
        session()->remove('loggedUser');
        session()->destroy();
        return redirect()->to(base_url() . '/public/login');
    }


    public function editPassword()
    {
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));

        $this->validate([
            'oldpassword' => [
                'rules' => 'required|is_unique[users.password]',
                'errors' => [
                    'required' => 'Veuillez remplir le champs',
                    'matches[users.password]' => 'Ancien mot de passe incorrect',
                ],
            ],
            'newpassword' => [
                'rules' => 'required|min_length[6]|max_length[10]',
                'errors' => [
                    'required' => 'Veuillez remplir le champs',
                    'min_length' => 'Minimum 6 caractères',
                    'max_length' => 'Pas au déla de 10 caractères'
                ],
            ],
            'cnewpassword' => [
                'rules' => 'required|matches[newpassword]',
                'errors' => [
                    'required' => 'Veuillez remplir le champs',
                    'matches' => "Mot de passe incompatible",
                ],
            ],
        ]);

        if ($this->validation->run() == FALSE) {
            $errors = $this->validation->getErrors();
            echo json_encode(['error' => $errors]);
        } else {
            $oldpassword = $this->request->getVar('oldpassword');

            $newpassword = password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT);

            if (password_verify($oldpassword, $data['userdata']->password)) {
                if ($this->userModel->editPassword(session()->get('loggedUser'), $newpassword)) {
                    echo json_encode(['code' => 1, 'msg' => 'Votre mot de passe a été modifié avec succès']);
                } else {
                    echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                }
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Ancien mot de passe incorrect...']);
            }
        }
    }
    /**
     * Modifie la photo de profile
     *
     * @return void
     */
    public function editPhotoProfile()
    {

        $this->validate([
            'photo' =>
            [
                'rules' => 'uploaded[photo]|is_image[photo]',
                'errors' => [
                    'uploaded' => 'Veuillez choisir une image',
                    'is_image' => 'Veuillez choisir une image valide'
                ],
            ],
        ]);
        if ($this->validation->run() == FALSE) {
            $errors = $this->validation->getErrors();
            echo json_encode(['error' => $errors]);
        } else {
            $oldPath = $this->request->getVar('path');
            $file = $this->request->getFile('photo');
            if ($file->isValid() && !$file->hasMoved()) {
                if ($file->move(FCPATH . 'importer/profiles', $file->getRandomName())) {
                    $path = base_url() . "/importer/profiles/" . $file->getName();
                    if ($this->userModel->updatePhotoProfile(session()->get('loggedUser'), $path)) {
                        if ($this->userModel->updatePhotoProfile(session()->get('loggedUser'), $path)==0) {
                            echo json_encode(['code' => 1, 'msg' => 'Image importée avec succès']);

                        }else
                        {
                            $uri = new \CodeIgniter\HTTP\URI($oldPath);
                            unlink(FCPATH . $uri->getSegment(3) . '/' . $uri->getSegment(4) . '/' . $uri->getSegment(5));
                             echo json_encode(['code' => 1, 'msg' => 'Image importée avec succès']);
                        }
                        

                    } else {
                        echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                    }
                } else {
                    echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                }
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
            }

        }
    }
    
    public function addCV()
    {

        $this->validate([
            'cv' =>
            [
                'rules' => 'uploaded[cv]|ext_in[cv,pdf]',
                'errors' => [
                    'uploaded' => 'Veuillez ajouter votre cv',
                    'ext_in' => 'Cv doit être en pdf'
                ],
            ],
        ]);
        if ($this->validation->run() == FALSE) {
            $errors = $this->validation->getErrors();
            echo json_encode(['error' => $errors]);
        } else {
            // $oldPath = $this->request->getVar('pathCV');
            // $file = $this->request->getFile('cv');
            // if ($file->isValid() && !$file->hasMoved()) {
            //     if ($file->move(FCPATH . 'importer/cv', $file->getRandomName())) {
            //         $path = base_url() . "/importer/cv/" . $file->getName();
            //         if ($this->userModel->addCV(session()->get('loggedUser'), $path)) {
            //             $uri = new \CodeIgniter\HTTP\URI($oldPath);
            //             unlink(FCPATH . $uri->getSegment(3) . '/' . $uri->getSegment(4) . '/' . $uri->getSegment(5));

            //             echo json_encode(['code' => 1, 'msg' => 'CV ajiuté avec succès']);
            //         } else {
            //             echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
            //         }
            //     } else {
            //         echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
            //     }
            // } else {
            //     echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
            // }

            $oldPath = $this->request->getVar('path');
            $file = $this->request->getFile('cv');
            if ($file->isValid() && !$file->hasMoved()) {
                if ($file->move(FCPATH . 'importer/cv', $file->getRandomName())) {
                    $path = base_url() . "/importer/cv/" . $file->getName();
                    if ($this->userModel->addCV(session()->get('loggedUser'), $path)) {
                        if ($this->userModel->addCV(session()->get('loggedUser'), $path)==0) {
                            echo json_encode(['code' => 1, 'msg' => 'CV importé avec succès']);

                        }else
                        {
                            $uri = new \CodeIgniter\HTTP\URI($oldPath);
                            unlink(FCPATH . $uri->getSegment(3) . '/' . $uri->getSegment(4) . '/' . $uri->getSegment(5));
                             echo json_encode(['code' => 1, 'msg' => 'CV importée avec succès']);
                        }
                        

                    } else {
                        echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                    }
                } else {
                    echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                }
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
            }
        }
    }

    public function addAttache()
    {

        $this->validate([
            'attache' =>
            [
                'rules' => 'uploaded[attache]|ext_in[attache,pdf]',
                'errors' => [
                    'uploaded' => 'Veuillez ajouter un fichier attaché',
                    'ext_in' => 'Le fichier doit être en pdf'
                ],
            ],
        ]);
        if ($this->validation->run() == FALSE) {
            $errors = $this->validation->getErrors();
            echo json_encode(['error' => $errors]);
        } else {
            $oldPath = $this->request->getVar('pathCV');
            $file = $this->request->getFile('cv');
            if ($file->isValid() && !$file->hasMoved()) {
                if ($file->move(FCPATH . 'importer/cv', $file->getRandomName())) {
                    $path = base_url() . "/public/importer/cv/" . $file->getName();
                    if ($this->userModel->addCV(session()->get('loggedUser'), $path)) {
                        $uri = new \CodeIgniter\HTTP\URI($oldPath);
                        unlink(FCPATH . $uri->getSegment(3) . '/' . $uri->getSegment(4) . '/' . $uri->getSegment(5));

                        echo json_encode(['code' => 1, 'msg' => 'Fi ajiuté avec succès']);
                    } else {
                        echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                    }
                } else {
                    echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                }
            } else {
                echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
            }
        }
    }
    /**
     * Affiche la page de modification de profile
     *
     * @return void
     */
    public function editProfile()
    {

        $data = [];
        if(!session()->has('loggedUser'))
        {
            return redirect()->to('/renvoiLogin');
        }
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();
        $data['users'] = $this->accueilModel->getAllUsers(); //Récupère 4 users
        $data['promo'] = $this->userModel->getPromoDUTAll();
        $data['promoLI'] = $this->userModel->getPromoLIAll();
        $data['situation'] = $this->userModel->getSituationAll();
        $data['entreprise'] = $this->userModel->getEntrepriseAll();
        $data['dut'] = $this->userModel->getDUTAll();
        $data['licence'] = $this->userModel->getLicenceAll();
        // unlink(FCPATH."importer/profiles/1630504349_d425cfe2b315c863d8f5.jpeg");






        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        // $rules=[
        //     'nom'=>[
        //         'rules'=>'required',
        //         'errors'=>[
        //             'required'=> 'Veuillez remplir ce champs'
        //         ],
        //     ],

        //     'telephone'=>[
        //         'rules'=>'required',
        //         'errors'=>[
        //             'required'=> 'Veuillez remplir ce champs'
        //         ],
        //     ],
        //     'anneeEntree'=>[
        //         'rules'=>'required',
        //         'errors'=>[
        //             'required'=> 'Veuillez remplir ce champs'
        //         ],
        //     ],

        //     'situation'=>[
        //         'rules'=>'required',
        //         'errors'=>[
        //             'required'=> 'Veuillez remplir ce champs'
        //         ],
        //     ],

        //     'ville'=>[
        //         'rules'=>'required',
        //         'errors'=>[
        //             'required'=> 'Veuillez remplir ce champs'
        //         ],
        //     ],

        // ];

        // if($this->request->getMethod()=='post')
        // {
        //     $dat=[
        //         'nom'=>$this->request->getVar('nom'),
        //         'telephone'=>$this->request->getVar('telephone'),
        //         'anneeEntree'=>$this->request->getVar('anneeEntree'),
        //         'dut'=>$this->request->getVar('dut'),
        //         'anneeDUT'=>$this->request->getVar('anneeDUT'),
        //         'situation'=>$this->request->getVar('situation'),
        //         'entreprise'=>$this->request->getVar('entreprise'),
        //         'poste'=>$this->request->getVar('poste'),
        //         'ville'=>$this->request->getVar('ville'),
        //         'attente'=>$this->request->getVar('attente'),
        //         'apporter'=>$this->request->getVar('apporter'),
        //     ];
        //     if($this->validate($rules))
        //     {
        //         if($this->userModel->editProfile(session()->get('loggedUser'), $dat))
        //        {



        //            session()->setTempdata('success','Informations actualisées', 3);
        //          
        //        }
        //        else
        //        {
        //             session()->setTempdata('error','Informations non actualisées', 3);
        //            redirect()->to(base_url(). '/public/user/editProfile');

        //        }

        //     }
        //     else
        //     {
        //         $data['validation']=$this->validator;
        //     }
        // }



        return view('edit_profile_view', $data);
    }

    public function entreprise()
    {
        $entre = $this->entrepriseModel;
        $data = [
            'nom' => $this->request->getPost('nom')
        ];

        $entre->save($data);
        $data = ['status' => 'Entreprise inserée'];
        return $this->response->setJSON($data);
    }


    /**
     * Elle permet à  l'alumni de faire une offre d'emploi, de stage, etc
     * Mais l'offre ne sera pas du coup publiée, ul faudrait que 
     * l'administrateur l'active d'abord
     *
     * @return void
     */
    public function offre()
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();


        return view('offre_view', $data);
    }

    public function ajouterOffre()
    {


        $idUsers = session()->get('loggedUser');

        $this->validate([
            'titre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'nomEntreprise' => [
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

            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],


        ]);

        if ($this->validation->run() == FALSE) {
            $errors = $this->validation->getErrors();
            echo json_encode(['error' => $errors]);
        } else {


            $dat = [
                'titre' => $this->request->getVar('titre'),
                'nomEntreprise' => $this->request->getVar('nomEntreprise'),
                'dateDebut' => $this->request->getVar('dateDebut'),
                'dateFin' => $this->request->getVar('dateFin'),
                'adresseEntreprise' => $this->request->getVar('adresseEntreprise'),
                'telephoneEntreprise' => $this->request->getVar('telephoneEntreprise'),
                'emailEntreprise' => $this->request->getVar('emailEntreprise'),
                'salaire' => $this->request->getVar('salaire'),
                'exigence' => $this->request->getVar('exigence'),
                'description' => $this->request->getVar('description'),
                'lien' => $this->request->getVar('lien'),
                'idUsers' => $idUsers,
            ];

            $file = $this->request->getFile('attache');
            if(isEmpty($file))
            {
                if ($this->userModel->insertOffre($dat)) {
                    echo json_encode(['code' => 1, 'msg' => 'Offre ajoutée, Elle sera publiée après vérification de l"administrateur']);
                } else {
                    echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                }
            }else
            {
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->move(FCPATH . 'attache', $file->getRandomName())) {
                        $path = base_url() . "/attache/" . $file->getName();
    
                        $dat['attache'] = $path;
    
                        if ($this->userModel->insertOffre($dat)) {
                                echo json_encode(['code' => 1, 'msg' => 'Offre ajoutée, Elle sera publiée après vérification de l"administrateur']);
                        } else {
                            echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                        }
                    } else {
                        echo json_encode(['code' => 0, 'msg' => 'Une erreur est survenue...']);
                    }
                }

            }

      

           
        }
    }

    /**
     * Permet a un userd 'ajouter un évènement qui devra d'abord être activé par l'admin
     *
     * @return void
     */
    public function evenement()
    {
       

        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
       

        return view('evenement_view', $data);


        
    }

    public function ajouterEvent()
    {


        $idUsers = session()->get('loggedUser');

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
            echo json_encode(['error' => $errors]);
        } else {

            $dat = [
                'titre' => $this->request->getVar('titre', ),
                'lieu' => $this->request->getVar('lieu', ),
                'dateDebut' => $this->request->getVar('dateDebut', ),
                'dateFin' => $this->request->getVar('dateFin', ),
                'heureDebut' => $this->request->getVar('heureDebut', ),
                'heureFin' => $this->request->getVar('heureFin', ),
                'description' => $this->request->getVar('description', ),
                'idUsers' => session()->get('loggedUser'),
            ];
            $file = $this->request->getFile('banniere');

            if ($file->isValid() && !$file->hasMoved()) {
                if ($file->move(FCPATH . 'evenement', $file->getRandomName())) {
                    $path =  base_url() ."/evenement/" . $file->getName();

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

    public function insertOffre()
    {
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
        ];

        if ($this->userModel->insertOffre($dat)) {
            $data = ['status' => "Offre ajoutée, Elle sera publiée après vérification de l'administrateur"];
            return $this->response->setJSON($data);
        } else {
            $data = ['status' => "Erreur, Offre non ajoutée"];
            return $this->response->setJSON($data);
        }
    }

    public function loadEntreprise()
    {
        $data['entreprise'] = $this->userModel->getEntrepriseDataAll();
        return $this->response->setJSON($data);
    }


    public function trouverOffre()
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['offre'] = $this->userModel->getAllOffre();
        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        return view('trouverOffre_view', $data);
    }

    public function faq()
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        return view('faq_view', $data);
    }
    /**
     * Affiche tous les évènements qui ont été activés
     *
     * @return void
     */
    public function voirEvenement()
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();
        if(!session()->has('loggedUser'))
        {
            return redirect()->to(base_url().'/renvoiLogin');
        }


        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        return view('voirEvenement_view', $data);
    }
    /**
     * Renvoie à une page qui affiche tous les membres de la plateforme
     *
     * @return void
     */
    public function voirMembre()
    {
        if(!session()->has('loggedUser'))
        {
            return redirect()->to(base_url().'/renvoiLogin');
        }
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();
        $data['users'] = $this->accueilModel->getAllUsers(); //Récupère 4 users


        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        return view('voirMembre_view', $data);
    }

 /**
     * Voir tous les membres ayant obtenu en telle année le DUT et diplome DUT
     *
     * @param [type] $id
     * @param [type] $idD
     * @return void
     */
    public function voirMembreObtentionFiliereDUT($id, $idD)
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();
        $data['users'] = $this->accueilModel->getAllUsers(); //Récupère 4 users
        $data['idObtentionDUT'] = $id;
        $data['idFiliereDUT'] = $idD;


        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        return view('voirMembreObtentionFiliereDUT_view', $data);
    }

    /**
     * Voir tous les membres appartenant à une certaine promotion et diplome LICENCE
     *
     * @param [type] $id
     * @param [type] $idD
     * @return void
     */
    public function voirMembreObtentionFiliereLicence($id, $idD)
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();
        $data['users'] = $this->accueilModel->getAllUsers(); //Récupère 4 users
        $data['idObtentionLI'] = $id;
        $data['idFiliereLI'] = $idD;


        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        return view('voirMembreObtentionFiliereLicence_view', $data);
    }



    /**
     * Voir le profile d'un membre en particulier avec tous les détails
     *
     * @return void
     */
    public function voirProfileMembre($id='')
    {
        if(!session()->has('loggedUser'))
        {
            return redirect()->to(base_url().'/renvoiLogin');
        }
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();
        $data['users'] = $this->accueilModel->getAllUsers(); //Récupère 4 users
        if(!empty($id) )
        {

            if($this->userModel->verifierIdMembre($id))
            {
                $data['idLoggedUser'] = session()->get('loggedUser');
                $data['idProfile'] = $id;
        
                $data['userprofile'] = $this->userModel->getUserProfile($id);
        
        
        
        
        
                return view('voirProfileMembre_view', $data);

            }
            else
            {
                
                session()->set('error', 'Une erreur est survenue...');
                return view('errors/erreur_view', $data);
    
            }
           
        }
        else
        {
            
            session()->set('error', 'Une erreur est survenue...');
            return view('errors/erreur_view', $data);

        }



       
    }

    /** 
     * Voir la liste des articles d'un blog
     */
    public function voirBlog()
    {
        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();

        // print_r($this->userModel->getAllOffre());

        $idUsers = session()->get('loggedUser');


        return view('voirBlog_view', $data);
    }

    public function voirBlogDetail($id='')
    {
        if(!session()->has('loggedUser'))
        {
            return redirect()->to(base_url().'/renvoiLogin');
        }
        $data = [];
            $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
            $data['infosite'] = $this->adminModel->getInfoSite();
            $data['faq'] = $this->userModel->getAllFaqs();
            $data['events'] = $this->accueilModel->getAllEvents();
       
        if(!empty($id) && isset($id))
        {
            
    
            // print_r($this->userModel->getAllOffre());
    
            $data['id']=$id;
            return view('voirBlogDetail_view', $data);

           

        }
        else
        {
            
            session()->set('error', 'Une erreur est survenue...');
            return view('errors/erreur_view', $data);

        }


    }

    public function getEventParId()
    {
        $eventId = $this->request->getPost('eventId');

        $data['event'] = $this->userModel->getEventParId($eventId);;
        return $this->response->setJSON($data);
    }

    public function getAllGalerie()
    {
        $data['galerie'] = $this->userModel->getAllGalerie();
        return $this->response->setJSON($data);
    }
    /**
     * Récupère un nombre limité d'users et les affiche dans la page 
     * Membres ceci avec un système de pagination compte tenu du nombre
     * qu'il peut y avoir
     * 
     *
     * @return void
     */
    public function getAllUsersLimit()
    {
        $limit = 8;
        $total_data = $this->adminModel->totalRowsUsers(); //Nombre total de données
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
            'users' => $this->userModel->getAllUsersLimit($limit, $debut),
        ];
        echo json_encode($data);
    }

    /** Récupérer un nombre limité d'offres puis les afficher en tenant compte
     * de la pagnation
     */
    public function getAllOffresLimit()
    {
        $limit = 4;
        $total_data = $this->adminModel->totalRowsOffresActifs(); //Nombre total de données
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
            'offres' => $this->userModel->getAllOffresLimit($limit, $debut),
        ];
        echo json_encode($data);
    }

    /** Récupérer un nombre limité d'évènement */
    public function getAllEventsLimit()
    {
        $limit = 6;
        $total_data = $this->adminModel->totalRowsEventsActifs(); //Nombre total de données
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
            'events' => $this->userModel->getAllEventsLimit($limit, $debut),
        ];
        echo json_encode($data);
    }

    /** Récupérer un nombre limité de blogs */
    public function getAllBlogsLimit()
    {
        $limit = 6;
        $total_data = $this->adminModel->totalRowsBlogsActifs(); //Nombre total de données
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
            'blogs' => $this->userModel->getAllBlogsLimit($limit, $debut),
        ];
        echo json_encode($data);
    }

    /**
     * Filtre Tous les membres ayant obtenu le DUT en telle année ainsi que la filière
     *
     * @return void
     */
    public function getAllUsersLimitObtentionFiliereDUT()
    {
        $limit = 6;
        $idObtentionDUT = $this->request->getPost('id');
        $idFiliereDUT = $this->request->getPost('idF');

        $total_data = $this->userModel->totalRowsUsersObtentionDUT($idObtentionDUT); //Nombre total de données
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
            'users' => $this->userModel->getAllUsersLimitObtentionFiliereDUT($limit, $debut, $idObtentionDUT, $idFiliereDUT),
        ];
        echo json_encode($data);
    }

    /**
     * Filtre Tous les membres appartenant $ une promotion et ayant un diplome Licence 
     *
     * @return void
     */
    public function getAllUsersLimitObtentionFiliereLI()
    {
        $limit = 6;
        $idObtentionLI = $this->request->getPost('id');
        $idFiliereLI = $this->request->getPost('idD');

        $total_data = $this->userModel->totalRowsUsersObtentionLI($idObtentionLI); //Nombre total de données
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
            'users' => $this->userModel->getAllUsersLimitObtentionFiliereLI($limit, $debut, $idObtentionLI, $idFiliereLI),
        ];
        echo json_encode($data);
    }

  


    /**
     * Recherche les memebres en fonction  du nom saisi
     *
     * @return void
     */
    public function rechercherUsers()
    {
        $query = $this->request->getPost('query');

        $data['users'] = $this->adminModel->fetchData($query);
        return $this->response->setJSON($data);
    }
   
    /**
     * Recherche un user à partir de l'année d'obtention du DUT
     *
     * @return void
     */
    public function rechercherUsersObtentionFiliereDUT()
    {
        $query = $this->request->getPost('query');
        $id = $this->request->getPost('id');

        $data['users'] = $this->userModel->fetchDataObtentionFiliereDUT($query, $id);
        return $this->response->setJSON($data);
    }


    /**
     * Recherche un user à partir de l'année d'obtention de la Licence
     *
     * @return void
     */
    public function rechercherUsersObtentionFiliereLI()
    {
        $query = $this->request->getPost('query');
        $id = $this->request->getPost('id');

        $data['users'] = $this->userModel->fetchDataObtentionFiliereLI($query, $id);
        return $this->response->setJSON($data);
    }
    

    /**
     * Recupérer la photo de la personne actuellement connectée
     *
     * @return void
     */
    public function getLoggedInUserPhoto()
    {
        $idUsers = session()->get('loggedUser');

        $data['userphoto'] = $this->userModel->getLoggedInUserData($idUsers);
        echo json_encode($data);
    }

    /**
     * Recupérer le CV de la personne actuellement connectée
     *
     * @return void
     */
    public function getLoggedInUserCV()
    {
        $idUsers = session()->get('loggedUser');

        $data['userCV'] = $this->userModel->getLoggedInUserData($idUsers);
        echo json_encode($data);
    }

    public function getLoggedInUserData()
    {
        $idUsers = session()->get('loggedUser');

        $data['userdata'] = $this->userModel->getLoggedInUserData($idUsers);
        $data['promo'] = $this->userModel->getPromoDUTAll();
        $data['promoLI'] = $this->userModel->getPromoLIAll();
        $data['situation'] = $this->userModel->getSituationAll();
        $data['entreprise'] = $this->userModel->getEntrepriseAll();
        $data['dut'] = $this->userModel->getDUTAll();
        $data['licence'] = $this->userModel->getLicenceAll();
        echo json_encode($data);
    }



    /**
     * Modifie les information personnel du memebre connecté
     *
     * @return void
     */
    public function editPersonnel()
    {


        $idUsers = session()->get('loggedUser');


        $this->validate([
            'nom' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],
            'genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'dateNaiss' => [
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
                'nom' => $this->request->getVar('nom'),
                'genre' => $this->request->getVar('genre'),
                'dateNaiss' => $this->request->getVar('dateNaiss'),
            ];

            if ($this->userModel->editPersonnel(session()->get('loggedUser'), $dat)) {
                echo json_encode(['code' => 1, 'msg' => 'La modification a été effectuée avec succès']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'une erreur est survenue...']);
            }
        }
    }

    /**
     * Modifie les informations du compte du membre 
     *
     * @return void
     */
    public function editCompte()
    {


        $idUsers = session()->get('loggedUser');


        $this->validate([
            'adresse' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'telephone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],
            'facebook' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'twitter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'linkedln' => [
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
                'adresse' => $this->request->getVar('adresse'),
                'telephone' => $this->request->getVar('telephone'),
                'facebook' => $this->request->getVar('facebook'),
                'twitter' => $this->request->getVar('twitter'),
                'linkedln' => $this->request->getVar('linkedln'),
            ];

            if ($this->userModel->editCompte(session()->get('loggedUser'), $dat)) {
                echo json_encode(['code' => 1, 'msg' => 'La modification a été effectuée avec succès']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'une erreur est survenue...']);
            }
        }
    }

    /**
     * Modifie les informations concernant les études
     *
     * @return void
     */
    public function editEtude()
    {


        $idUsers = session()->get('loggedUser');


        $this->validate([
            'promotionDUT' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'dut' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],
            'promotionLicence' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'licence' => [
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
                'promotionDUT' => $this->request->getVar('promotionDUT'),
                'dut' => $this->request->getVar('dut'),
                'promotionLicence' => $this->request->getVar('promotionLicence'),
                'licence' => $this->request->getVar('licence'),
            ];

            if ($this->userModel->editEtude(session()->get('loggedUser'), $dat)) {
                echo json_encode(['code' => 1, 'msg' => 'La modification a été effectuée avec succès']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'une erreur est survenue...']);
            }
        }
    }

    public function editProfessionnel()
    {


        $idUsers = session()->get('loggedUser');


        $this->validate([
            'situation' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez remplir ce champs'
                ],
            ],

            'entreprise' => [
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
                'situation' => $this->request->getVar('situation'),
                'entreprise' => $this->request->getVar('entreprise'),
                'poste' => $this->request->getVar('poste'),
            ];

            if ($this->userModel->editProfessionnel(session()->get('loggedUser'), $dat)) {
                echo json_encode(['code' => 1, 'msg' => 'La modification a été effectuée avec succès']);
            } else {
                echo json_encode(['code' => 0, 'msg' => 'une erreur est survenue...']);
            }
        }
    }

    /**
     * Masquer et démasquer la visibilité du numéro de téléphone
     *
     * @return void
     */
    public function vuTelephone()
    {
        $idUsers = session()->get('loggedUser');

        $result = $this->userModel->getLoggedInUserData($idUsers);
        if ($result->vuTel == 1) {
            $this->userModel->demasquerTel($idUsers);
        } else if ($result->vuTel == 0) {
            $this->userModel->masquerTel($idUsers);
        }
    }

    /**
     * Masquer et démasquer la visibilité de la dte de naissance
     *
     * @return void
     */
    public function vuDateNaiss()
    {
        $idUsers = session()->get('loggedUser');

        $result = $this->userModel->getLoggedInUserData($idUsers);
        if ($result->vuDn == 1) {
            $this->userModel->demasquerDn($idUsers);
        } else if ($result->vuDn == 0) {
            $this->userModel->masquerDn($idUsers);
        }
    }


    /**
     * Suivre un profile
     *
     * @return void
     */
    public function suivre()
    {
        $idAbon = session()->get('loggedUser');
        $dat = [
            'idAbon' => $idAbon,
            'idMem' => $this->request->getPost('idM')

        ];


        if ($this->userModel->suivre($dat)) {
            echo json_encode(['msg' => 'Vous avez commencé à suivre..']);
        }
    }

    /**
     * Vérifier si le compte connecté suit le profile en cours
     *
     * @return boolean
     */
    public function isSuivre()
    {
        $id = $this->request->getPost('id');
        if ($this->userModel->isSuivre($id, session()->get('loggedUser'))) {
            echo json_encode(['isSuivre' => 1]);
        } else {
            echo json_encode(['isSuivre' => 0]);
        }
    }
    /**
     * Lorsqu'un compte veut cesser  
     *
     * @return void
     */
    public function desabonne()
    {
        $idAbon = session()->get('loggedUser');

        $idAbon = $idAbon;
        $idMem = $this->request->getPost('idM');



        if ($this->userModel->deabonne($idAbon, $idMem)) {
            echo json_encode(['msg' => 'Vous ne suivez ..']);
        }
    }

    /**
     * Nombre d'abonné et d'abonnement
     *
     * @return void
     */
    public function nombreAbonneSuivre()
    {
        $id = $this->request->getPost('id');
        $data['abonne'] = $this->userModel->nombreAbonne($id);
        $data['abonnement'] = $this->userModel->nombreSuivre($id);

        echo json_encode($data);
    }

    /**
     * Récupérer toutes les suivies faites à l'égard du membre actuellement
     * connecté
     *
     * @return void
     */
    public function getNotifSuivre()
    {
        $id = $this->request->getPost('id');
        $this->userModel->getNotifSuivre(session()->get('loggedUser'));
        $data['nombreNotif'] = $this->userModel->getNotifSuivreNombre(session()->get('loggedUser'));
        $data['notif'] = $this->userModel->getNotifSuivre(session()->get('loggedUser'));
        $data['notifEvents'] = $this->userModel->getNotifEvent(session()->get('loggedUser'));
        echo json_encode($data);
    }

    /**
     * Si le membre clique sur la notification, elle sera considérée comme
     * vu et par conséquent ne sera plus visible dans la barre de notification
     *
     * @return void
     */
    public function vuNotifSuivre()
    {
        $id = $this->request->getPost('id');

        $data['notif'] = $this->userModel->vuNotifSuivre($id);
        echo json_encode($data);
    }


    /**
     * Recuperer toutes les filières du parcours DUT
     *
     * @return void
     */
    public function getAllFiliereObtentionDUT()
    {

        $data['dut'] = $this->userModel->getAllFiliereDUT();
        $data['obtention'] = $this->userModel->getAllAnneeObtentionDUT();
        echo json_encode($data);
    }

    /**
     * Recuperer toutes les filières du parcours Licence
     *
     * @return void
     */
    public function getAllFiliereObtentionLicence()
    {

        $data['licence'] = $this->userModel->getAllFiliereLicence();
        $data['obtention'] = $this->userModel->getAllAnneeObtentionLicence();

        echo json_encode($data);
    }

    /**
     * Filtrer les membres par rapport au parcours DUT
     *
     * @return void
     */
    public function filtrerMembreDUT()
    {
        $filiereF=$this->request->getPost('filiereF');
        $obtentionF=$this->request->getPost('obtentionF');
        session()->set('filiereF',$filiereF);
        session()->set('obtentionF',$obtentionF);

        $limit = 6;
        $total_data = $this->userModel->totalRowsFiltreMembreDUT($filiereF,$obtentionF); //Nombre total des membres filtres par DUT filiere et annee obtention diplome
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
            'filtreDUT' => $this->userModel->filtrerMembreDUT($limit, $debut,$filiereF,$obtentionF),
        ];
        echo json_encode($data);

           
    }

    
    /**
     * Filtrer les membres parcours Licence
     *
     * @return void
     */
    public function filtrerMembreLicence()
    {
        $filiereF=$this->request->getPost('filiereF');
        $obtentionF=$this->request->getPost('obtentionF');
        session()->set('filiereF',$filiereF);
        session()->set('obtentionF',$obtentionF);

        $limit = 6;
        $total_data = $this->userModel->totalRowsFiltreMembreLicence($filiereF,$obtentionF); //Nombre total des membres filtres par DUT filiere et annee obtention diplome
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
            'filtreLicence' => $this->userModel->filtrerMembreLicence($limit, $debut,$filiereF,$obtentionF),
        ];
        echo json_encode($data);

           
    }
}
