<?php

namespace App\Controllers;

use App\Models\AccueilModel;
use App\Models\AdminModel;
use App\Models\BlogModel;
use App\Models\UserModel;
use App\Models\EntrepriseModel;


class Blog extends BaseController
{

    public $userModel;
    public $adminModel;
    public $entrepriseModel;
    public $accueilModel;
    public $validation;
    public $email;
    public $blogModel;

    public $session;
    public function __construct()
    {
        helper('form');
        helper('Form_helper');

        $this->userModel = new UserModel();
        $this->blogModel = new BlogModel();
        $this->adminModel = new AdminModel();
        $this->entrepriseModel = new EntrepriseModel();
        $this->accueilModel = new AccueilModel();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();
		$this->email = \Config\Services::email();

    }

   

    /** 
     * Voir la liste des articles d'un blog
     */
    public function index()
    {
        if(!session()->has('loggedUser'))
        {
            return redirect()->to('/renvoiLogin');
        }

        $data = [];
        $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
        $data['infosite'] = $this->adminModel->getInfoSite();
        $data['faq'] = $this->userModel->getAllFaqs();
        $data['events'] = $this->accueilModel->getAllEvents();

        // print_r($this->userModel->getAllOffre());
       
        $idUsers = session()->get('loggedUser');


        return view('blog/voirBlog_view', $data);
    }

    /**
     * Voir un article en détail après avoir cliquer sur vue
     *
     * @param string $id
     * @return void
     */
    public function voirBlogDetail($id='')
    {
        if(!session()->has('loggedUser'))
        {
            return redirect()->to('/renvoiLogin');
        }
        $data = [];
            $data['userdata'] = $this->userModel->getLoggedInUserData(session()->get('loggedUser'));
            $data['infosite'] = $this->adminModel->getInfoSite();
            $data['faq'] = $this->userModel->getAllFaqs();
            $data['events'] = $this->accueilModel->getAllEvents();
       
        if(!empty($id) )
        {
            if($this->blogModel->verifierUniidBlog($id))
            {
                 // print_r($this->userModel->getAllOffre());
    
                $data['id']=$id;
           
                return view('blog/voirBlogDetail_view', $data);

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
     * Récuperer un article à partir de son id
     *
     * @return void
     */
    public function getBlogParId()
    {
        $id=$this->request->getPost('id');
        $data['blog']=$this->blogModel->getBlogParId($id);
        echo json_encode($data);

    }

    /**
     * Ajouter un commentaire
     *
     * @return void
     */
    public function commenter()
    {
        $this->validate([
            'message'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Vous devez remplir le champs',
                ],
            ],
        ]);

        if($this->validation->run()==FALSE)
        {
            $errors=$this->validation->getErrors();
            echo json_encode(['error'=>$errors]);
        }else
        {
            $dat=[
                'message'=>$this->request->getVar('message'),
                'idUsers'=>session()->get('loggedUser'),
                'idBlog'=>$this->request->getVar('idBlog')
            ];
            $idBlog=$this->request->getVar('idBlog');

            if($this->blogModel->ajouterCommentaire($dat))
            {
                /**
                 * Cela va nous permettre de classer les articles populaires en fonction des commentaires
                 */
                $nbrCom=$this->blogModel->getNombreAllComments($idBlog);
                $this->blogModel->incrementerNbrComment($nbrCom, $idBlog);
                echo json_encode(['code'=>1, 'msg'=>'Commentaire ajouté']);
            }
            else
            {
                echo json_encode(['code'=>0, 'msg'=>'Une erreur est survenue...']);
            }
        }
    }

    /**
     * Récupérer tous les commentaires
     *
     * @return void
     */
    public function getAllComments()
    {
        $id=$this->request->getPost('id');
        $commentId=$this->request->getPost('commentId');
        $data['comment']=$this->blogModel->getAllComments($id);
        $data['nombre']=$this->blogModel->getNombreAllComments($id);
        $data['reponse']=$this->blogModel->getAllReponseComments($commentId);
        // $this->blogModel->initialiserVuReponse();

        echo json_encode($data);

    }
    /**
     * Récupérer articles populaires
     *
     * @return void
     */
    public function getArticlePopulaire()
    {
        $data['populaire']=$this->blogModel->getArticlePopulaire();
        echo json_encode($data);
    }

    /** Le champs vuReponse de la table commentaire reçoit une valeur 1 
     * qui va permettre d'afficher les reponses correspondantes à un commentaire
    */
    public function afficherReponse()
    {
        if($this->blogModel->afficherReponse($this->request->getPost('commentId')))
        {
            echo json_encode(['msg'=>'Cool']);
        }
    }

    /**
     * Il envoie plutôt une valeur 0
     *
     * @return void
     */
    public function masquerReponse()
    {
        if($this->blogModel->masquerReponse($this->request->getPost('commentId')))
        {
            echo json_encode(['msg'=>'Cool']);
        }
    }

    public function publierReponse()
    {
        $dat=[
            'message'=>$this->request->getPost('reponse'),
            'idComment'=>$this->request->getPost('commentId'),
            'idUsers'=>session()->get('loggedUser')
        ];
        if($this->blogModel->publierReponse($dat))
        {
            $this->response->setJSON(['msg'=>'YESSS']);
        }
    }



    
   
}
