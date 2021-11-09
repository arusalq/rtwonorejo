<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSurats extends Model
{
  protected $table      = 'tb_surat';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['no_surat', 'perihal', 'asal', 'tgl', 'type'];

  // protected $useTimestamps = false;
  // protected $createdField  = 'created_at';
  // protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = true;
}