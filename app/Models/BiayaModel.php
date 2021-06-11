<?php 

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class BiayaModel extends Model 
{
  protected $table = 'biaya_ppi';
  protected $primaryKey = 'id_biaya';
  protected $allowedFields = ['biaya'];
}