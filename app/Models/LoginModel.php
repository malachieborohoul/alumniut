<?php
namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model{
  
   public function verifyEmail($email)
   {
       $this->db=\Config\Database::connect();
       $builder=$this->db->table('users');
       $builder->select('idUsers,nom, password, statut, idRole, photo');
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
}
?>