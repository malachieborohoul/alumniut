<?php
namespace App\Models;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Model;

class EnseignantModel extends Model{
  public $db;
    protected $table      = 'enseignant';
 
    protected $allowedFields = ['nom'];

    protected $useTimestamps = true;
    
  // public function __construct()
  // {
  //   $this->db=\Config\Database::connect();
  // }
 
}
?>