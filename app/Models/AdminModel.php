<?php
namespace App\Models;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Model;

class AdminModel extends Model{
  public $db;
  public function __construct()
  {
    $this->db=\Config\Database::connect();
  }
  public function getAdminData($id)
  {
        $builder= $this->db->table('users');
        $builder->where('idUsers', $id);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
  }

  

  
  public function getInfoSite()
  {
      $this->db=\Config\Database::connect();
      $builder=$this->db->table('infosite');
      $result= $builder->get();
     if(count($result->getResultArray())==1)
     {
         return $result->getRowObject();
     }
     else{
         return false;
     }
  }

  public function getAllRubrique()
  {
    $this->db=\Config\Database::connect();
       
    $builder=$this->db->table('rubrique');
    $result= $builder->get();
   if(count($result->getResultArray())==1)
   {
       return $result->getRowObject();
   }
   else{
       return false;
   }
  }

  
  public function getOffreParId($id)
  {
      $this->db=\Config\Database::connect();
      $builder=$this->db->table('offre');
      $builder->where('idOffre', $id);
      $result= $builder->get();
    
         return $result->getRowArray();
    
  }

  public function getUserParId($id)
  {
      $this->db=\Config\Database::connect();
      $builder=$this->db->table('users');
      $builder->where('idUsers', $id);
      $result= $builder->get();
    
         return $result->getRowArray();
    
  }

  public function getEventParId($id)
  {
      $this->db=\Config\Database::connect();
      $builder=$this->db->table('evenement');
      $builder->where('id', $id);
      $result= $builder->get();
    
         return $result->getRowArray();
    
  }
 
 

    public function editInfos($id,$data)
    {
          $builder= $this->db->table('infosite');
          $builder->where('idInfo', $id);
          $builder->update($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
    }

    public function editRubrique($id,$data)
    {
          $builder= $this->db->table('rubrique');
          $builder->where('id', $id);
          $builder->update($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
    }


    
   public function getApropos()
   {
       $this->db=\Config\Database::connect();
       
       $builder=$this->db->table('apropos');
       $result= $builder->get();
      if(count($result->getResultArray())==1)
      {
          return $result->getRowObject();
      }
      else{
          return false;
      }
   }

   public function getSlider()
   {
       $this->db=\Config\Database::connect();
       
       $builder=$this->db->table('slider');
       $result= $builder->get();
      if(count($result->getResultArray())==1)
      {
          return $result->getRowObject();
      }
      else{
          return false;
      }
   }

   public function getEvenement()
   {
       $this->db=\Config\Database::connect();
       
       $builder=$this->db->table('evenement');
       $result= $builder->get();
      if(count($result->getResultArray())==1)
      {
          return $result->getRowObject();
      }
      else{
          return false;
      }
   }
    public function addApropos($data)
    {
          $builder= $this->db->table('apropos');
         $result= $builder->get();

          if(count($result->getResultArray())==1)
          {
              return true;
          }
          else
          {
              $builder->insert($data);
              return false;
          }
              
         
    }

    public function editApropos($id,$data)
    {
          $builder= $this->db->table('apropos');
          $builder->where('id', $id);
          $builder->update($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
              
         
    }

    public function editSlider($id,$data)
    {
          $builder= $this->db->table('slider');
          $builder->where('idSlider', $id);
          $builder->update($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
              
         
    }
    public function addEvenement($data)
    {
          $builder= $this->db->table('evenement');
          $builder->insert($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
              
         
    }

    public function addBlog($data)
    {
          $builder= $this->db->table('blog');
          $builder->insert($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
              
         
    }

    public function addGalerie($data)
    {
          $builder= $this->db->table('galerie');
          $builder->insert($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
              
         
    }
   
    public function addReseau($data)
    {
          $builder= $this->db->table('reseau');
         $result= $builder->get();
          if(count($result->getResultArray())==1)
          {
              return true;
          }
          else
          {
              $builder->insert($data);
              return false;
          }
    }

    public function editReseau($id,$data)
    {
          $builder= $this->db->table('reseau');
          $builder->where('id', $id);
          $builder->update($data);
          if($this->db->affectedRows()==1)
          {
              return true;
          }
          else
          {
              return false;
          }
    }

    

  

  public function getAllUsers($limit, $debut)
  {
    $builder=$this->db->table('users');
    $builder->orderBy('idUsers', 'DESC');
    $builder->limit($limit,$debut);
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllFaqs($limit, $debut)
  {
    $builder=$this->db->table('faq');
    $builder->orderBy('idFaq', 'DESC');
    $builder->limit($limit, $debut);
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllEvents($limit, $debut)
  {
    $builder=$this->db->table('evenement');
    $builder->select('evenement.id,evenement.banniere,evenement.titre, evenement.lieu, evenement.dateDebut, evenement.dateFin, evenement.heureDebut, evenement.heureFin, evenement.description,evenement.statut ,users.nom, users.idUsers ');
    $builder->join('users','evenement.idUsers=users.idUsers');
    $builder->orderBy('id', 'DESC');
    $builder->limit($limit, $debut);

    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllGalerie($limit, $debut)
  {
    $builder=$this->db->table('galerie');
    $builder->orderBy('id', 'DESC');
    $builder->limit($limit, $debut);
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllBlog($limit, $debut)
  {
    $builder=$this->db->table('blog');
    $builder->join('users','blog.idUsers=users.idUsers');
    $builder->orderBy('id', 'DESC');
    $builder->limit($limit, $debut);
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllEnseignants()
  {
    $builder=$this->db->table('enseignant');
    $result=$builder->get();
    return $result->getResultArray();
  }





  public function getUser($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $result=$builder->get();
    return $result->getRowArray();
  }

  public function getFaq($id)
  {
    $builder=$this->db->table('faq');
    $builder->where('idFaq', $id);
    $result=$builder->get();
    return $result->getRowArray();
  }

  public function getStatut($id)
  {
        $builder= $this->db->table('users');
        $builder->where('idUsers', $id);
        $builder->select('statut');
        $result=$builder->get();
       
       return $result->getRow();
  }

  public function getEventStatut($id)
  {
        $builder= $this->db->table('evenement');
        $builder->where('id', $id);
        $builder->select('statut');
        $result=$builder->get();
       
       return $result->getRow();
  }

  public function getGalerieStatut($id)
  {
        $builder= $this->db->table('galerie');
        $builder->where('id', $id);
        $builder->select('statut');
        $result=$builder->get();
       
       return $result->getRow();
  }


  public function getStatutOffre($id)
  {
        $builder= $this->db->table('offre');
        $builder->where('idOffre', $id);
        $builder->select('statut');
        $result=$builder->get();
       
       return $result->getRow();
  }
   

  public function deactiverStatut($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['statut'=>'inactif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function deactiverEventStatut($id)
  {
    $builder=$this->db->table('evenement');
    $builder->where('id', $id);
    $builder->update(['statut'=>'inactif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function deactiverStatutOffre($id)
  {
    $builder=$this->db->table('offre');
    $builder->where('idOffre', $id);
    $builder->update(['statut'=>'inactif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function deactiverGalerieStatut($id)
  {
    $builder=$this->db->table('galerie');
    $builder->where('id', $id);
    $builder->update(['statut'=>'inactif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function activerStatut($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['statut'=>'actif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function activerEventStatut($id)
  {
    $builder=$this->db->table('evenement');
    $builder->where('id', $id);
    $builder->update(['statut'=>'actif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function activerStatutOffre($id)
  {
    $builder=$this->db->table('offre');
    $builder->where('idOffre', $id);
    $builder->update(['statut'=>'actif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function activerGalerieStatut($id)
  {
    $builder=$this->db->table('galerie');
    $builder->where('id', $id);
    $builder->update(['statut'=>'actif']);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  
  public function getRole($id)
  {
        $builder= $this->db->table('users');
        $builder->where('idUsers', $id);
        $builder->select('idRole');
        $result=$builder->get();
       
       return $result->getRow();
  }

  public function updateToAdmin($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['idRole'=>2]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function updateFaq($id, $data)
  {
    $builder=$this->db->table('faq');
    $builder->where('idFaq', $id);
    $builder->update($data);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function updateToUser($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['idRole'=>1]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  
  public function fetchData($query)
  {
    $builder=$this->db->table('users');
  
      $builder->like('nom', $query);
      $builder->orLike('email',$query);
      $builder->orLike('statut',$query);

      $builder->join('promotionDUT', 'promotionDUT.idPDUT=users.promotionDUT');
      $builder->join('obtentionDUT', 'obtentionDUT.idODUT=users.obtentionDUT');
      $builder->join('promotionLicence', 'promotionLicence.idPLI=users.promotionLicence');
      $builder->join('obtentionLicence', 'obtentionLicence.idOL=users.obtentionLicence');
      $builder->join('situation', 'situation.idS=users.situation');
      $builder->join('entreprise', 'entreprise.idE=users.entreprise');
      $builder->join('dut', 'dut.idDUT=users.dut');
      $builder->join('licence', 'licence.idLI=users.licence');

      $result=$builder->get();
      return $result->getResultArray();
  
  }

  public function fetchDataEvents($query)
  {
    $builder=$this->db->table('evenement');
      $builder->join('users', 'users.idUsers=evenement.idUsers');
      $builder->like('nom', $query);
      $builder->orLike('titre',$query);
      $builder->orLike('evenement.statut',$query);

      $result=$builder->get();
      return $result->getResultArray();
  
  }

  public function fetchDataBlog($query)
  {
    $builder=$this->db->table('blog');
      $builder->like('titre', $query);
      $builder->orLike('description',$query);

      $result=$builder->get();
      return $result->getResultArray();
  
  }

  public function fetchFaqData($query)
  {
    $builder=$this->db->table('faq');
  
      $builder->like('question', $query);

      $result=$builder->get();
      return $result->getResultArray();
  
  }

  public function fetchOffreData($query)
  {
    $builder=$this->db->table('offre');
    $builder->select('*');
    $builder->join('users','offre.idUsers=users.idUsers');
    $builder->like('titre', $query);
    $builder->orlike('users.nom', $query);
    $builder->orlike('offre.statut', $query);
    $result=$builder->get();
    return $result->getResultArray();
  
  }



  public function addAnnonces($data)
  {
    $builder=$this->db->table('annonces');
  
      $builder->insert($data);

      if($this->db->affectedRows()==1)
      {
        return true;
      }
      else
      {
        return false;
      }
  
  }

  public function getOffre()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM offre WHERE vu=0 ORDER BY idOffre DESC');
    $result=$query->getResultArray();
    if($result)
    {
    return $result;

    }
    else
    {
      return false;
    }
  }

  public function getVuUser()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM users WHERE vu=0 ORDER BY idUsers DESC');
    $result=$query->getResultArray();
    if($result)
    {
    return $result;

    }
    else
    {
      return false;
    }
  }

  public function getVuEvent()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM evenement WHERE vu=0 ORDER BY id DESC');
    $result=$query->getResultArray();
    if($result)
    {
    return $result;

    }
    else
    {
      return false;
    }
  }

  
  public function getAllOffre($limit, $debut)
  {
    $builder=$this->db->table('offre');
    $builder->select('offre.idOffre,offre.titre, offre.salaire,offre.nomEntreprise, offre.dateDebut,offre.dateFin, offre.description, users.nom,users.idUsers, offre.statut, offre.attache,offre.lien');
    $builder->join('users','offre.idUsers=users.idUsers');
    $builder->limit($limit, $debut);
    $builder->orderBy('idOffre', 'DESC');
    $result=$builder->get();
    return $result->getResultArray();
    
  }

  public function editVu($id)
  {
    $builder=$this->db->table('offre');
    $builder->where('idOffre', $id);
    $builder->update(['vu'=>1]);

      if($this->db->affectedRows()==1)
      {
        return true;
      }
      else
      {
        return false;
      }
  
  }

  public function editVuUser($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['vu'=>1]);

      if($this->db->affectedRows()==1)
      {
        return true;
      }
      else
      {
        return false;
      }
  
  }

  public function editVuEvent($id)
  {
    $builder=$this->db->table('evenement');
    $builder->where('id', $id);
    $builder->update(['vu'=>1]);

      if($this->db->affectedRows()==1)
      {
        return true;
      }
      else
      {
        return false;
      }
  
  }

  public function totalOffre()
  {
    $builder=$this->db->table('offre');
    $builder->where('vu', 0);
    $result=$builder->get();
    return count($result->getResultArray());
  }

  public function totalUser()
  {
    $builder=$this->db->table('users');
    $builder->where('vu', 0);
    $result=$builder->get();
    return count($result->getResultArray());
  }

  public function totalEvent()
  {
    $builder=$this->db->table('evenement');
    $builder->where('vu', 0);
    $result=$builder->get();
    return count($result->getResultArray());
  }


  public function deleteOffre($id)
  {
    $builder=$this->db->table('offre');
    $builder->where('idOffre', $id);
    $builder->delete();
  }

  public function deleteUser($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->delete();
  }

  public function deleteEvent($id)
  {
    $builder=$this->db->table('evenement');
    $builder->where('id', $id);
    $builder->delete();
  }

  public function deleteBlog($id)
  {
    $builder=$this->db->table('blog');
    $builder->where('id', $id);
    $builder->delete();
  }

  public function deleteGalerie($id)
  {
    $builder=$this->db->table('galerie');
    $builder->where('id', $id);
    $builder->delete();
  }

  public function deleteFaq($id)
  {
    $builder=$this->db->table('faq');
    $builder->where('idFaq', $id);
    $builder->delete();
  }


  public function insertUser($data)
  {
    $builder=$this->db->table('users');
    $builder->insert($data);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  
  public function insertEntreprise($data)
  {
    $builder=$this->db->table('entreprise');
    $builder->insert($data);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  
  public function insertFaq($data)
  {
    $builder=$this->db->table('faq');
    $builder->insert($data);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }


  public function totalRows()
  {
    $builder=$this->db->table('enseignant');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function getEns($limit, $debut)
  {
    $builder=$this->db->table('enseignant');
    $builder->limit($limit,$debut);
    $result=$builder->get();
       
    return $result->getResultArray();
  }


  
  public function totalRowsUsers()
  {
    $builder=$this->db->table('users');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  
  public function totalRowsOffres()
  {
    $builder=$this->db->table('offre');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsOffresActifs()
  {
    $builder=$this->db->table('offre');
    $builder->where('statut','actif');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsEventsActifs()
  {
    $builder=$this->db->table('evenement');
    $builder->where('statut','actif');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  
  public function totalRowsBlogsActifs()
  {
    $builder=$this->db->table('blog');
    $builder->where('statut','actif');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsFaqs()
  {
    $builder=$this->db->table('faq');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsBlog()
  {
    $builder=$this->db->table('blog');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsGalerie()
  {
    $builder=$this->db->table('galerie');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsEvents()
  {
    $builder=$this->db->table('evenement');
    $result=$builder->get();
   return count($result->getResultArray());
  }

  // public function getDernierEventActive()
  // {
  //   $builder=$this->db->table('evenement');
  //   $result=$builder->get();
       
  //   return $result->getResultArray();
  // }

  public function importerExcel($data)
    {
          $builder= $this->db->table('users');
        
             $result= $builder->insert($data);
              if($this->db->affectedRows()==1)
              {
                return true;
              }else
              {
                return false;
              }
              
         
    }

    public function addPromotionDUT($data)
    {
            $builder= $this->db->table('promotionDUT');
            $builder->where('annee', $data);
            $result=$builder->get();
            if(count($result->getResultArray())==1)
            {
              return false;
            }
            else
            {
              $builder->insert(['annee'=>$data]);

            }
    }

    public function addOptentionDUT($data)
    {
            $builder= $this->db->table('obtentionDUT');
            $builder->where('anneeODUT', $data);
            $result=$builder->get();
            if(count($result->getResultArray())==1)
            {
              return false;
            }
            else
            {
              $builder->insert(['anneeODUT'=>$data]);

            }
    }

    public function addPromotionLicence($data)
    {
            $builder= $this->db->table('promotionLicence');
            $builder->where('anneePL', $data);
            $result=$builder->get();
            if(count($result->getResultArray())==1)
            {
              return false;
            }
            else
            {
              $builder->insert(['anneePL'=>$data]);

            }
    }

    public function addOptentionLicence($data)
    {
            $builder= $this->db->table('obtentionLicence');
            $builder->where('anneeOL', $data);
            $result=$builder->get();
            if(count($result->getResultArray())==1)
            {
              return false;
            }
            else
            {
              $builder->insert(['anneeOL'=>$data]);

            }
    }

    public function returnIdPromotionDUT($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('promotionDUT');    
        $builder->where('annee', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
       
    }

    public function returnIdPromotionLicence($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('promotionLicence');    
        $builder->where('anneePL', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
       
    }


    public function returnIdFiliereDUT($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('dut');    
        $builder->where('nomDUT', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
       
    }

    public function returnIdFiliereLicence($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('licence');    
        $builder->where('nomLI', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
      
       
    }


    
    public function returnIdDernierDiplome($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('dernierDiplome');    
        $builder->where('nom', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
       
    }


    public function returnIdSituation($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('situation');    
        $builder->where('nomS', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
       
    }

    public function returnIdObtentionDUT($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('obtentionDUT');    
        $builder->where('anneeODUT', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
    }

    public function returnIdObtentionLicence($data)
    {
        $this->db=\Config\Database::connect();
        $builder=$this->db->table('obtentionLicence');    
        $builder->where('anneeOL', $data);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRow();
        }
    }







}
?>