<?php
namespace App\Models;
use CodeIgniter\Model;

class RegisterModel extends Model{
  
   public function saveUsers($data)
   {
       $this->db=\Config\Database::connect();
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

   public function verifierUniid($data)
   {
       $builder=$this->db->table('users');
       $builder->select('created_at, statut');
       $builder->where('uniid', $data);
       $result=$builder->get();
       
       if(count($result->getResultArray())==1)
        {
            return $result->getRowObject();
        }
        else{
            return false;
        }
   }

   public function deleteRecord($data)
   {
       $builder=$this->db->table('users');
       $builder->where('uniid', $data);
       $builder->delete();
       
      
   }

   public function insertObjectif($data, $uniid)
   {
       $builder=$this->db->table('users');
       $builder->where('uniid', $uniid);
       $builder->update(['objectif'=>$data]);
       if($this->db->affectedRows()==1)
       {
           return true;
       }
       else
       {
           return false;
       }
       
   }

   public function insertPassword($data, $uniid)
   {
       $builder=$this->db->table('users');
       $builder->where('uniid', $uniid);
       $builder->update(['password'=>$data]);
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
}
?>