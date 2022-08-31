<?php
namespace App\Models;
use CodeIgniter\Model;

class EntrepriseModel extends Model{
  protected $table = 'entreprise';
  protected $primaryKey = 'idEntreprise';
  protected $allowedFields = [
      'nom',
  ];

}
?>