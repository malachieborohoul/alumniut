<?php

namespace App\Controllers;

use App\Models\AccueilModel;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\EntrepriseModel;

class Accueil extends BaseController
{
	public $userModel;
	public $entrepriseModel;
    public $adminModel;
    public $accueilModel;
	public $currTime;

	public function __construct()
	{
		helper('form');
		helper('Form_helper');
		helper('date');


		$this->userModel= new UserModel();
        $this->adminModel= new AdminModel;
		$this->entrepriseModel= new EntrepriseModel();
		$this->accueilModel= new AccueilModel();
		$this->currTime=now();

       

	}
	public function index()
	{
        $data=[];

        
       
        // $data['userdata']=null;
        // if(!session()->has('loggedUser'))
        // {
        //     return redirect()->to(base_url().'/public/login');
  
        // }
        $idUsers=session()->get('loggedUser');
      
       $data['userdata']=$this->userModel->getLoggedInUserData($idUsers);//Récupère toutes les infos du user
       $data['infosite']=$this->adminModel->getInfoSite();////Récupère toutes les infos du site
		$data['apropos']=$this->adminModel->getApropos();//Récupère toutes les infos de Apropos
        $data['slider']=$this->adminModel->getSlider();//Récupère toutes les infos du slider
        $data['events']=$this->accueilModel->getAllEvents();//Récupère 4 evènements
        $data['users']=$this->accueilModel->getAllUsers();//Récupère 4 users
        $data['blogs']=$this->accueilModel->getAllBlogs();//Récupère 4 blogs
        $data['photos']=$this->accueilModel->getAllGalerie();//Récupère 4 photos de la galerie
        $data['totalmembre']=$this->accueilModel->countAllMembre();//Compte tous les membres pour les statistiques
        $data['totaltravailleur']=$this->accueilModel->countAllTravailleur();//Compte tous les travaileurs pour les statistiques
        $data['totalchomeur']=$this->accueilModel->countAllChomeur();//Compte tous les chomeurs pour les statistiques
        $data['rubrique'] = $this->adminModel->getAllRubrique();
        

        // $limit=4;
        // $total_data=$this->adminModel->totalRowsGalerie();//Nombre total de données
        // $vague=$total_data/$limit;

        // for($i=0; $i<=$vague; $i++)
        // {
        //     $regTime=now();
        //     $diffTime=(int)$this->currTime-(int)$regTime;
        //     if(strtotime($diffTime) > 30)
        //     {
        //         $data['photos']=$this->adminModel->getAllGalerie($limit, $i);
        //         $this->currTime=now();
        //     }
        // }

        


        return view('accueilview', $data);
	}

    public function renvoiLogin()
	{
        $data=[];
     
        $idUsers=session()->get('loggedUser');
      
       $data['userdata']=$this->userModel->getLoggedInUserData($idUsers);//Récupère toutes les infos du user
       $data['infosite']=$this->adminModel->getInfoSite();////Récupère toutes les infos du site
		$data['apropos']=$this->adminModel->getApropos();//Récupère toutes les infos de Apropos
        $data['slider']=$this->adminModel->getSlider();//Récupère toutes les infos du slider
        $data['events']=$this->accueilModel->getAllEvents();//Récupère 4 evènements
        $data['users']=$this->accueilModel->getAllUsers();//Récupère 4 users
        $data['blogs']=$this->accueilModel->getAllBlogs();//Récupère 4 blogs
        $data['photos']=$this->accueilModel->getAllGalerie();//Récupère 4 photos de la galerie

     

        return view('renvoiLogin_view', $data);
	}
	public function logout()
    {
        session()->remove('loggedUser');
        session()->destroy();
        return redirect()->to('/');
    }

	public function profile()
	{
		$data=[];
        $data['userdata']=$this->userModel->getLoggedInUserData(session()->get('loggedUser'));

		return view('profile_view',$data);
	}

	public function parametre()
	{
		$data=[];
        $data['userdata']=$this->userModel->getLoggedInUserData(session()->get('loggedUser'));
		//$idPromo= $this->userModel->getIdPromo(session()->get('loggedUser'));//Optenir l'ID de la promotion à partir de l'ID du USER
        
        //$data['pro']=$this->userModel->getPromoData($idPromo->promotion);//Chercher la valeur de la promotion à partir de l'ID de la promotion dans la table promotion 
        //$data['promo']=$this->userModel->getPromoDataAll();//Optenir toutes les promotions

        $data['entreprisedataall']=$this->userModel->getEntrepriseDataAll();//Optenir toutes les entreprises

        $idEntre=($this->userModel->getIdEntre(session()->get('loggedUser')));//Optenir l'ID de l'entreprise à partir de l'ID du USER
        $data['entreprise']=$this->userModel->getEntrepriseData($idEntre->entreprise);//Chercher la valeur de l'entreprise à partir de l'ID de la l'entrprise dans la table entreprise 
		$rules=[
            'nom'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],
            'genre'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],
            'telephone'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],
            'dateNaiss'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],

		];
     

        if($this->request->getMethod()=='post')
        {
            $data=[
                'nom'=>$this->request->getVar('nom'),
                'telephone'=>$this->request->getVar('telephone'),
            ];

            if($this->validate($rules))
            {
              
                print_r($data);
    
               if($this->userModel->editInfos(session()->get('loggedUser'), $data))
               {
                   session()->setTempdata('success','Informations actualisées', 3);
                   return redirect()->to(current_url());
               }
               else
               {
                    session()->setTempdata('error','Informations non actualisées', 3);
                    return redirect()->to(current_url());
               }
            }
            else
            {
                $data['validation']=$this->validator;
            }
            
        }


      


	

		return view('parametre_view',$data);
}

	public function editPassword()
	{
		$data=[];
        $data['userdata']=$this->userModel->getLoggedInUserData(session()->get('loggedUser'));

        $rules=[
            'oldpassword'=>[
                'rules'=>'required|is_unique[users.password]',
                'errors'=>[
                    'required'=>'Veuillez remplir le champs',
                    'matches[users.password]'=>'Ancien mot de passe incorrect',
                ],
            ],
            'newpassword'=>[
                'rules'=>'required|min_length[6]|max_length[10]',
                'errors'=>[
                    'required'=>'Veuillez remplir le champs',
                    'min_length'=>'Minimum 6 caractères',
					'max_length'=>'Pas au déla de 10 caractères'
                ],
            ],
            'cnewpassword'=>[
                'rules'=>'required|matches[newpassword]',
                'errors'=>[
                    'required'=>'Veuillez remplir le champs',
                    'matches'=>"Mot de passe incompatible",
                ],
            ],
        ];

        if($this->request->getMethod()=='post')
        {
            $oldpassword=$this->request->getVar('oldpassword');
            
            $newpassword=password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT);
            if($this->validate($rules))
            {
               if (password_verify($oldpassword, $data['userdata']->password))
               {
                   if ($this->userModel->editPassword(session()->get('loggedUser'), $newpassword))
                   {
                    session()->setTempdata('success', 'Mot de passe modifié avec succes', 3);
                    ?>
                     <script>
                             window.location= '<?=base_url()?>/public/accueil/editPassword';
                     </script>
                     <?php 
                   }
                   else
                   {
                        session()->setTempdata('error', "Mot de passe n'a pas été modifié", 3);
                        ?>
                        <script>
                                window.location= '<?=base_url()?>/public/accueil/editPassword';
                        </script>
                        <?php 
                   }
               }
               else
               {
                   session()->setTempdata('error', 'Ancien mot de passe incorrect', 3);
                   ?>
                    <script>
                            window.location= '<?=base_url()?>/public/accueil/editPassword';
                    </script>
                    <?php 
               }
            }
            else
            {
                $data['validation']=$this->validator;
            }
        }

		return view('edit_password_view',$data);
	}

	public function editAvatar()
	{
		$data=[];
        $data['userdata']=$this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $rules=[
            'avatar'=>
                [
                    'rules'=>'max_size[avatar,10000]',
                    'errors'=>[
                        'max_size'=>'Image tres volumineuse',
                        'ext_in'=>'Seules les extentions png, jpg et jpeg sont valides'
                    ],
                ],
        ];
        if($this->request->getMethod()=='post')
        {
            if($this->validate($rules))
            {
                $file=$this->request->getFile('avatar');
                if($file->isValid() && !$file->hasMoved() )
                {
                    if($file->move(FCPATH.'public/profiles', $file->getRandomName()))
                    {
                        $path=base_url()."/public/profiles/" .$file->getName();
                        if($this->userModel->updateAvatar(session()->get('loggedUser'), $path))
                        {     
                            session()->setTempdata('success', 'Image importée avec succès',3);
                            return redirect()->to(current_url());
                        }
                        else
                        {
                            session()->setTempdata('error', 'Image non importée',3);
                            return redirect()->to(current_url());

                        }
                    }
                    else
                    {
                        $this->session->setTempdata('error', 'Error de déplacement', 3);
                        return redirect()->to(current_url());

                    }
                }
                else
                {
                    session()->setTempdata('error', 'You havent uploaded', 3);
                    return redirect()->to(current_url());

                }
            }
            else{
                $data['validation']=$this->validator;
            }
        }
		return view('edit_avatar_view',$data);
	}

    public function editProfile()
    {
        $data=[];
        $data['userdata']=$this->userModel->getLoggedInUserData(session()->get('loggedUser'));

        $data['entreprisedataall']=$this->userModel->getEntrepriseDataAll();//Optenir toutes les entreprises

        $idEntre=($this->userModel->getIdEntre(session()->get('loggedUser')));//Optenir l'ID de l'entreprise à partir de l'ID du USER
        $data['entreprise']=$this->userModel->getEntrepriseData($idEntre->entreprise);//Chercher la valeur de l'entreprise à partir de l'ID de la l'entrprise dans la table entreprise 
		
        $rules=[
            'nom'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],
           
            'telephone'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],
            'anneeEntree'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],
            
            'situation'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],

            'ville'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Veuillez remplir ce champs'
                ],
            ],

		];

        if($this->request->getMethod()=='post')
        {
            $dat=[
                'nom'=>$this->request->getVar('nom'),
                'telephone'=>$this->request->getVar('telephone'),
                'anneeEntree'=>$this->request->getVar('anneeEntree'),
                'dut'=>$this->request->getVar('dut'),
                'anneeDUT'=>$this->request->getVar('anneeDUT'),
                'situation'=>$this->request->getVar('situation'),
                'entreprise'=>$this->request->getVar('entreprise'),
                'poste'=>$this->request->getVar('poste'),
                'ville'=>$this->request->getVar('ville'),
                'attente'=>$this->request->getVar('attente'),
                'apporter'=>$this->request->getVar('apporter'),
            ];
            if($this->validate($rules))
            {
                if($this->userModel->editProfile(session()->get('loggedUser'), $dat))
               {
                    


                   session()->setTempdata('success','Informations actualisées', 3);
                   ?>
                   <script>
                        window.location= '<?=base_url()?>/public/accueil/editProfile';
                   </script>
               <?php    
               }
               else
               {
                    session()->setTempdata('error','Informations non actualisées', 3);
                   redirect()->to(base_url(). '/public/accueil/editProfile');

               }
                
            }
            else
            {
                $data['validation']=$this->validator;
            }
        }
     

     
        return view('edit_profile_view', $data);
    }

    public function entreprise()
    {
      $entre=$this->entrepriseModel;
      $data=[
        'nom'=> $this->request->getPost('nom')
      ];

      $entre->save($data);
      $data=['status'=> 'Entreprise inserée'];
      return $this->response->setJSON($data);
    }
    public function apropos()
    {
        $data['infosite']=$this->adminModel->getInfoSite();
		$data['apropos']=$this->adminModel->getApropos();


      $entre=$this->entrepriseModel;
      return view('apropos_view', $data);
    }

    public function addUser()
    {
        $validation=\Config\Services::validation();
           $this->validate([

            'nom'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nom et prenom requis ',
                    
                ]
                ],
            'email'=>[
                'rules'=>'required|is_unique[users.email]|valid_email',
                'errors'=>[
                    'required'=>'Adresse email requis ',
                    'is_unique'=>'Adresse email déja utilisée',
                    'valid_email'=>'Adresse email invalide'
                ]
            ]
           ]);
           if($validation->run() == FALSE)
           {
               $errors=$validation->getErrors();

               echo json_encode(['code'=>0, 'error'=>$errors]);
           }
           else
           {
                
                    // $this->userModel->add($data);
                    // echo json_encode(['code'=>1, 'msg'=>'Yes']);
                    $userdata = [
                        'nom' => $this->request->getVar('nom', ),
        
                        'email' => $this->request->getVar('email', ),
        
                    ];
        
        
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
                                echo json_encode(['code'=>1,'msg'=>"Inscription reussi. Nous vous contacterons pour la suite"]);

        
                           
                            } else {
                                echo json_encode(['code'=>0,'msg'=>"Une Erreur est survenue"]);


                            }
                        } else {
                            echo json_encode(['code'=>0,'msg'=>"Une Erreur est survenue"]);

                        }
                
               
           }
}

    /**
     * Récupérer 4 évènements et afficher sur la page d'accueil
     *
     * @return void
     */
    public function getAllEvents()
	{
        $output='';
			$events=$this->accueilModel->getAllEvents();

            $output .='
            
            <div class="container-fluid px-4 ">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Nos</span> Evènements</h2>
                    <p>Les évènements listés ci-dessous sont ouverts à tous</p>
                </div>
            </div>
    
                <div class="row">
            ';

            foreach ($events as $ev)
            {
                $output .='
                    <div class="col-md-3 course ftco-animate ">
                        <div class="img" style="background-image: url(images/course-1.jpg);"></div>
                        <div class="text pt-4">
                            <p class="meta d-flex">
                                <span><i class="icon-user mr-2"></i>Mr. Khan</span>
                                <span><i class="icon-table mr-2"></i>10 seats</span>
                                <span><i class="icon-calendar mr-2"></i>4 Years</span>
                            </p>
                            <h3><a href="#">Electric Engineering</a></h3>
                            <p>Separated they live in. A small river named Duden flows by their place and supplies it with
                                the necessary regelialia. It is a paradisematic country</p>
                            <p><a href="#" class="btn btn-primary">Apply now</a></p>
                        </div>
                    </div>
                ';

            }
            $output .='
                </div>
            </div>
           
                
            ';

            

            $data['output']=$output;

		
	
		
		echo json_encode($data);

	}

    /**
     * Fonction qu'on appelle en cas d'erreurs
     *
     * @return void
     */
    public function error()
    {
        return view('errors/erreur_view');
    }

  
    
}
