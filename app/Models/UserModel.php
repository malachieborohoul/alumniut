<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
  
   public function getLoggedInUserData($idUsers)
   {
       $this->db=\Config\Database::connect();
       $builder=$this->db->table('users');
       $builder->where('idUsers', $idUsers);
       $builder->join('promotionDUT', 'promotionDUT.idPDUT=users.promotionDUT');
       $builder->join('promotionLicence', 'promotionLicence.idPLI=users.promotionLicence');
       $builder->join('situation', 'situation.idS=users.situation');
       $builder->join('entreprise', 'entreprise.idE=users.entreprise');
       $builder->join('dut', 'dut.idDUT=users.dut');
       $builder->join('licence', 'licence.idLI=users.licence');
       $result= $builder->get();
      if(count($result->getResultArray())==1)
      {
          return $result->getRowObject();
      }
      else{
          return false;
      }
   }


  public function getPromoData($data)
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM promotion WHERE idPromotion='.$data);
    $result=$query->getRowArray();
    return $result;
  }
  public function getPromoDUTAll()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM promotionDUT ');
    $result=$query->getResultArray();
    return $result;
  }

  public function getPromoLIAll()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM promotionLicence ');
    $result=$query->getResultArray();
    return $result;
  }
  public function getSituationAll()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM situation WHERE idS > 0 ');
    $result=$query->getResultArray();
    return $result;
  }


  public function getEntrepriseAll()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM entreprise WHERE idE > 0  ORDER BY idE DESC');
    $result=$query->getResultArray();
    return $result;
  }

  public function getDUTAll()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM dut');
    $result=$query->getResultArray();
    return $result;
  }
  public function getLicenceAll()
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM licence');
    $result=$query->getResultArray();
    return $result;
  }

  public function getEntrepriseData($data)
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT * FROM entreprise WHERE idEntreprise='.$data);
    $result=$query->getRowArray();
    return $result;
  }

  public function ajouterEntreprise($cdata)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('entreprise');
    $builder->insert($cdata);
    if($this->db->affectedRows()==1)
    {
        return true;
    }
    else
    {
        return false;
    }

  }

  public function getIdPromo($id)
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT promotion FROM users WHERE idUsers='.$id);
    $result=$query->getRow();
    return $result;

  }

  public function getIdEntre($id)
  {
    $this->db=\Config\Database::connect();
    $query=$this->db->query('SELECT entreprise FROM users WHERE idUsers='.$id);
    $result=$query->getRowObject();
    return $result;

  }

  public function editProfile($idUsers, $data)
  {
      $this->db=\Config\Database::connect();
      $builder=$this->db->table('users');
      $builder->where('idUsers', $idUsers);
      $builder->update($data);
      if($this->db->affectedRows()==1)
      {
        return true;
      }
      else{
        return false;
      }
  }

  public function editPassword($idUsers, $pass)
  {
      $this->db=\Config\Database::connect();
      $builder=$this->db->table('users');
      $builder->where('idUsers', $idUsers);
      $builder->update(['password'=>$pass]);
      if($this->db->affectedRows()==1)
      {
        return true;
      }
      else{
        return false;
      }
  }

  public function updatePhotoProfile($id, $path)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers',$id);
    $builder->update(['photo'=>$path]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else{
      return false;
    }
    
  }

  public function addCV($id, $path)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers',$id);
    $builder->update(['cv'=>$path]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else{
      return false;
    }
    
  }

  public function insertOffre($data)
  {
    $builder=$this->db->table('offre');
    $builder->insert($data);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else{
      return false;
    }
  }


  public function getAllOffre()
  {
    $builder=$this->db->table('offre');
    $builder->select('offre.idOffre,offre.titre, offre.salaire,offre.nomEntreprise, offre.dateDebut,offre.dateFin, offre.description,offre.exigence, users.nom, offre.statut');
    $builder->join('users','offre.idUsers=users.idUsers');
    $builder->where('offre.statut', 'actif');
    $result=$builder->get();
    return $result->getResultArray();
    
  }

  public function getAllFaqs()
  {
    $builder=$this->db->table('faq');
    $builder->orderBy('idFaq', 'DESC');
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function saveUsers($data)
  {
    $builder=$this->db->table('users');
    $builder->insert($data);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else{
      return false;
    }
  }

  public function getEventParID($id)
  {
    $builder=$this->db->table('evenement');
    $builder->select('evenement.id,evenement.banniere,evenement.titre, evenement.lieu, evenement.dateDebut, evenement.dateFin, evenement.heureDebut, evenement.heureFin, evenement.description,evenement.statut ,users.nom ');
    $builder->join('users','evenement.idUsers=users.idUsers');
    $builder->where('evenement.id',$id);
    $result=$builder->get();
    return $result->getRowArray();

  }

  public function getAllGalerie()
  {
    $builder=$this->db->table('galerie');
    $builder->where('statut', 'actif' );
    $builder->orderBy('id', 'DESC');
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllUsersLimit($limit, $debut)
  {
    $builder=$this->db->table('users');
    $builder->where('statut', 'actif' );
 
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');
    $builder->limit($limit, $debut);
    $builder->orderBy('idUsers', 'ASC');
    $result=$builder->get();
    return $result->getResultArray();
  }


  public function getAllOffresLimit($limit, $debut)
  {
    $builder=$this->db->table('offre');
    $builder->where('offre.statut', 'actif' );

 
    $builder->join('users', 'users.idUsers=offre.idUsers');

    $builder->limit($limit, $debut);
    $builder->orderBy('idOffre', 'DESC');
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllEventsLimit($limit, $debut)
  {
    $builder=$this->db->table('evenement');
    $builder->where('evenement.statut', 'actif' );

 
    $builder->join('users', 'users.idUsers=evenement.idUsers');

    $builder->limit($limit, $debut);
    $builder->orderBy('id', 'DESC');
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllBlogsLimit($limit, $debut)
  {
    $builder=$this->db->table('blog');
    $builder->where('blog.statut', 'actif' );

 
    $builder->join('users', 'users.idUsers=blog.idUsers');

    $builder->limit($limit, $debut);
    $builder->orderBy('id', 'DESC');
    $result=$builder->get();
    return $result->getResultArray();
  }


  public function getAllUsersLimitObtentionFiliereDUT($limit, $debut, $id, $idD)
  {
    $builder=$this->db->table('users');
    $builder->where('obtentionDUT', $id );
    $builder->where('dut', $idD);
 
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');
    $builder->limit($limit, $debut);
    $builder->orderBy('idUsers', 'ASC');
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllUsersLimitObtentionFiliereLI($limit, $debut, $id, $idD)
  {
    $builder=$this->db->table('users');
    $builder->where('obtentionLicence', $id );
    $builder->where('licence', $idD);
 
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');
    $builder->limit($limit, $debut);
    $builder->orderBy('idUsers', 'ASC');
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getUserProfile($id)
  {
    $builder=$this->db->table('users');
    
    $builder->where('idUsers', $id );
    $builder->join('promotionDUT', 'promotionDUT.idPDUT=users.promotionDUT');
    $builder->join('obtentionDUT', 'obtentionDUT.idODUT=users.obtentionDUT');
    $builder->join('promotionLicence', 'promotionLicence.idPLI=users.promotionLicence');
    $builder->join('obtentionLicence', 'obtentionLicence.idOL=users.obtentionLicence');
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');
    
   
    $result=$builder->get();
    return $result->getRowArray();
  }

  public function rechercherUsers($query)
  {
    $builder=$this->db->table('users');
  
      $builder->join('situation', 'situation.idS=users.situation');

      $builder->join('promotionDUT', 'promotionDUT.idPDUT=users.promotionDUT');
      $builder->join('promotionDUT', 'promotionDUT.idPDUT=users.promotionDUT');
      $builder->join('promotionLicence', 'promotionLicence.idPLI=users.promotionLicence');


      $builder->join('entreprise', 'entreprise.idE=users.entreprise');
      $builder->join('dut', 'dut.idDUT=users.dut');
      $builder->join('licence', 'licence.idLI=users.licence');
      $builder->like('nom', $query);


      $result=$builder->get();
      return $result->getResultArray();
  
  }

  public function editPersonnel($id, $data)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    
     $builder->update($data);
     if($this->db->affectedRows()==1)
      {
        return true;
      }
      else{
        return false;
      }
  
  }

  public function editCompte($id, $data)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    
     $builder->update($data);
     if($this->db->affectedRows()==1)
      {
        return true;
      }
      else{
        return false;
      }
  
  }

  public function editEtude($id, $data)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    
     $builder->update($data);
     if($this->db->affectedRows()==1)
      {
        return true;
      }
      else{
        return false;
      }
  
  }

  public function editProfessionnel($id, $data)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    
     $builder->update($data);
     if($this->db->affectedRows()==1)
      {
        return true;
      }
      else{
        return false;
      }
  
  }

  public function demasquerTel($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['vuTel'=>0]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function demasquerDn($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['vuDn'=>0]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function masquerTel($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['vuTel'=>1]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function masquerDn($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers', $id);
    $builder->update(['vuDn'=>1]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function totalRowsUsersObtentionDUT($id)
  {
    $builder=$this->db->table('users');
    $builder->where('obtentionDUT', $id);
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsUsersObtentionLI($id)
  {
    $builder=$this->db->table('users');
    $builder->where('obtentionLicence', $id);
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function fetchDataObtentionFiliereDUT($query, $id)
  {
    $builder=$this->db->table('users');
  
      $builder->like('nom', $query);
      $builder->orLike('email',$query);
      $builder->orLike('statut',$query);
      
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');


      $result=$builder->get();
      return $result->getResultArray();
  
  }


  public function fetchDataObtentionFiliereLI($query, $id)
  {
    $builder=$this->db->table('users');
  
      $builder->like('nom', $query);
      $builder->orLike('email',$query);
      $builder->orLike('statut',$query);
      
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');


      $result=$builder->get();
      return $result->getResultArray();
  
  }

  public function suivre($data)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
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

  public function isSuivre($idM, $idA)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->where('idMem', $idM);
    $builder->where('idAbon', $idA);
    $result=$builder->get();
    if(count($result->getResultArray())==1)
    {
        return true;
    }
    else
    {
        return false;
    }

  }

  
  public function deabonne($idAbon, $idMem)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->where('idMem', $idMem);
    $builder->where('idAbon', $idAbon);
    $builder->delete();
    if($this->db->affectedRows()==1)
    {
        return true;
    }
    else
    {
        return false;
    }

  }

  public function nombreAbonne($id)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->where('idMem', $id);
    $result=$builder->get();
    return count($result->getResultArray());
  }

  public function nombreSuivre($id)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->where('idAbon', $id);
    $result=$builder->get();
    return count($result->getResultArray());
  }


  public function getNotifSuivre($id)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->join('users', 'suivre.idAbon=users.idUsers');
    $builder->where('vuSuivre', 0);

    $builder->where('idMem', $id);
    
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getNotifEvent($id)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->join('evenement', 'suivre.idMem=evenement.idUsers');
    $builder->where('vuSuivre', 0);

    $builder->where('idAbon', $id);
    
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getNotifSuivreNombre($id)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->where('idMem', $id);
    $builder->where('vuSuivre', 0);
    $result=$builder->get();
    return count($result->getResultArray());
  }


  public function vuNotifSuivre($id)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->where('idSuivre', $id);
    $result=$builder->update(['vuSuivre'=>1]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }else
    {
      return false;
    }
    
  }


  public function getAbonnement($id)
  {     
    $this->db=\Config\Database::connect();
    $builder=$this->db->table('suivre');
    $builder->where('idMem', $id);
    $builder->join('users', 'users.idUsers=suivre.idAbon');
    $builder->select('email');
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function verifierIdMembre($id)
  {
    $builder=$this->db->table('users');
    $builder->where('idUsers',$id);
    $result=$builder->get();
   if(count($result->getResultArray())==1)
   {
    return true;
   }else
   {
     return false;
   }

  }

  public function getAllFiliereDUT()
  {
    $builder=$this->db->table('dut');
    $builder->where('idDUT >',0);

    
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllAnneeObtentionDUT()
  {
    $builder=$this->db->table('obtentionDUT');
    $builder->where('idODUT >',0);
    $result=$builder->get();
    return $result->getResultArray();
  }



  public function getAllFiliereLicence()
  {
    $builder=$this->db->table('licence');
    $builder->where('idLI >',0);
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function getAllAnneeObtentionLicence()
  {
    $builder=$this->db->table('obtentionLicence');
    $builder->where('idOL >',0);
    $result=$builder->get();
    return $result->getResultArray();
  }

  public function filtrerMembreDUT($limit,$debut,$fil,$obt)
  {
    $builder=$this->db->table('users');
  
      $builder->where('dut', $fil);
      $builder->where('obtentionDUT',$obt);
      
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');
    $builder->limit($limit, $debut);



      $result=$builder->get();
      return $result->getResultArray();
  
  }

  public function filtrerMembreLicence($limit,$debut,$fil,$obt)
  {
    $builder=$this->db->table('users');
  
      $builder->where('licence', $fil);
      $builder->where('obtentionLicence',$obt);
      
    $builder->join('situation', 'situation.idS=users.situation');
    $builder->join('entreprise', 'entreprise.idE=users.entreprise');
    $builder->join('dut', 'dut.idDUT=users.dut');
    $builder->join('licence', 'licence.idLI=users.licence');
    $builder->limit($limit, $debut);



      $result=$builder->get();
      return $result->getResultArray();
  
  }


  public function totalRowsFiltreMembreDUT($fil, $obt)
  {
    $builder=$this->db->table('users');
    $builder->where('dut', $fil);
    $builder->where('obtentionDUT',$obt);
    $result=$builder->get();
   return count($result->getResultArray());
  }

  public function totalRowsFiltreMembreLicence($fil, $obt)
  {
    $builder=$this->db->table('users');
    $builder->where('licence', $fil);
    $builder->where('obtentionLicence',$obt);
    $result=$builder->get();
   return count($result->getResultArray());
  }




  



}
?>