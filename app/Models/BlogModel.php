<?php
namespace App\Models;
use CodeIgniter\Model;

class BlogModel extends Model{
  




  public function getBlogParId($id)
  {
    $builder=$this->db->table('blog');
    // $builder->join('users','blog.idUsers=users.idUsers');
    $builder->where('uniidblog',$id);
    $result=$builder->get();
    return $result->getRowArray();

  }

  public function getIdBlog($id)
  {
    $builder=$this->db->table('blog');
    $builder->select('id');
    // $builder->join('users','blog.idUsers=users.idUsers');
    $builder->where('uniidblog',$id);
    $result=$builder->get();
    return $result->getRowObject();

  }


  public function ajouterCommentaire($data)
  {
    $builder=$this->db->table('commentaire');
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

  public function getAllComments($id)
  {
    $builder=$this->db->table('commentaire');
    $builder->join('users','commentaire.idUsers=users.idUsers');
    $builder->where('idBlog',$id);
    $result=$builder->get();
    return $result->getResultArray();

  }

  public function getAllReponseComments($id)
  {
    $builder=$this->db->table('reponse');
    $builder->join('users','reponse.idUsers=users.idUsers');
    $builder->where('idComment',$id);
    $result=$builder->get();
    return $result->getResultArray();

  }

   public function getNombreAllComments($id)
  {
    $builder=$this->db->table('commentaire');
    $builder->join('users','commentaire.idUsers=users.idUsers');
    $builder->where('idBlog',$id);
    $result=$builder->get();
    return count($result->getResultArray());

  }

  
  public function getArticlePopulaire()
  {
    $builder=$this->db->table('blog');
    $builder->join('users','blog.idUsers=users.idUsers');
    $builder->orderBy('nbrComment', 'DESC');
    $builder->limit(3);
    $result=$builder->get();
    return $result->getResultArray();

  }

  
  public function incrementerNbrComment($data, $id)
  {
    $builder=$this->db->table('blog');
    $builder->where('uniidblog',$id);
    $builder->update(['nbrComment'=>$data]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }


  
  }

  public function verifierUniidBlog($id)
  {
    $builder=$this->db->table('blog');
    $builder->where('uniidblog',$id);
    $result=$builder->get();
   if(count($result->getResultArray())==1)
   {
    return true;
   }else
   {
     return false;
   }

  }

  public function afficherReponse($id)
  {
    $builder=$this->db->table('commentaire');
    $builder->where('idComment',$id);
    $builder->update(['vuReponse'=>1]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      false;
    }

  }

  public function masquerReponse($id)
  {
    $builder=$this->db->table('commentaire');
    $builder->where('idComment',$id);
    $builder->update(['vuReponse'=>0]);
    if($this->db->affectedRows()==1)
    {
      return true;
    }
    else
    {
      false;
    }

  }


  public function initialiserVuReponse()
  {
    $builder=$this->db->table('commentaire');
    $builder->update(['vuReponse'=>0]);

  }

  public function publierReponse($data)
  {
    $builder=$this->db->table('reponse');
    $builder->insert($data);

  }

 
}
?>