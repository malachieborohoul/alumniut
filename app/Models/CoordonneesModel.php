<?php
namespace App\Models;
use CodeIgniter\Model;

class CoordonneesModel extends Model{
  protected $table = 'coordonnees';
  protected $primaryKey = 'idEntreprise';
  protected $allowedFields = [
      'telephone',
      'adresse',
  ];

}
?>