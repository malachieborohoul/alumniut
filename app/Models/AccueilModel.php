<?php
namespace App\Models;
use CodeIgniter\Model;

class AccueilModel extends Model{
  
   public function verifyEmail($email)
   {
       $this->db=\Config\Database::connect();
       $builder=$this->db->table('users');
       $builder->select('idUsers,nom, password, statut, role, photo');
       $builder->where('email', $email);
       $result= $builder->get();
      if(count($result->getResultArray())==1)
      {
          return $result->getRowArray();
      }
      else{
          return false;
      }
   }

   public function getAllEvents()
   {
     $builder=$this->db->table('evenement');
     $builder->select('evenement.id,evenement.banniere,evenement.titre, evenement.lieu, evenement.dateDebut, evenement.dateFin, evenement.heureDebut, evenement.heureFin, evenement.description,evenement.statut ,users.nom ');
     $builder->join('users','evenement.idUsers=users.idUsers');
     $builder->orderBy('id', 'DESC');
     $builder->where('evenement.statut','actif');
     $builder->limit(4);
     $result=$builder->get();
     return $result->getResultArray();
   }

   public function getAllUsers()
   {
     $builder=$this->db->table('users');
     $builder->join('situation','situation.idS=users.situation');
     $builder->orderBy('idUsers', 'ASC');
     $builder->limit(4);
     $result=$builder->get();
     return $result->getResultArray();
   }

   public function countAllMembre()
   {
     $builder=$this->db->table('users');
     $builder->where('statut', 'actif');
     $result=$builder->get();
     return count($result->getResultArray());
   }

   public function countAllTravailleur()
   {
     $builder=$this->db->table('users');
     $builder->where('situation >', 2);
     $result=$builder->get();
     return count($result->getResultArray());
   }
   
   public function countAllChomeur()
   {
     $builder=$this->db->table('users');
     $builder->where('situation >', 0);
     $builder->where('situation <', 3);
     $result=$builder->get();
     return count($result->getResultArray());
   }

   public function getAllBlogs()
   {
     $builder=$this->db->table('blog');
     $builder->join('users','blog.idUsers=users.idUsers');
     $builder->orderBy('id', 'DESC');
     $builder->limit(3);
     $result=$builder->get();
     return $result->getResultArray();
   }


   public function getAllGalerie()
   {
     $builder=$this->db->table('galerie');
     $builder->orderBy('id', 'DESC');
     $builder->limit(4);
     $result=$builder->get();
     return $result->getResultArray();
   }
 

   



}
?>