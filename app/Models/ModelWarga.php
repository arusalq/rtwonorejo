<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWarga extends Model
{
  protected $table      = 'tb_warga';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['nik', 'kk', 'alamat', 'namaLengkap'];

  // protected $useTimestamps = false;
  // protected $createdField  = 'created_at';
  // protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = true;
}