<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
  protected $table      = 'tb_pengumuman';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['judul', 'deskripsi', 'tgl', 'gambar'];

  // protected $useTimestamps = false;
  // protected $createdField  = 'created_at';
  // protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = true;
}