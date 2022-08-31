<?php
namespace App\Models;
use CodeIgniter\Model;

class Ajaxstudent extends Model{
  protected $table = 'students';
  protected $primaryKey = 'id';
  protected $allowedFields = [
      'name',
      'email',
      'phone',
      'course',
  ];

}
?>