<?php

namespace App\Controllers;

use App\Models\ModelSurats;
use CodeIgniter\Session\Session;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Endog;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Models\UserModel;
use App\Models\ModelWarga;
use App\Models\PengumumanModel;
use Myth\Auth\Commands\Publish;

use function PHPSTORM_META\type;

class User extends BaseController
{
  protected $ModelWarga;
  // protected $ModelSurat;
  protected $ModelPengumuman;
  public function __construct()
  {
    $this->ModelPengumuman = new PengumumanModel();
    // $this->ModelWarga = new ModelSurats();
    // $this->ModelSurat = new ModelSurats();
  }
  public function landingpage()
  {
    $db      = \Config\Database::connect();
    $data = [
      'pengumuman' => $this->ModelPengumuman->findAll(),
      'title' => 'LandingPage',
      'warga' => $db->table('tb_warga')->countAll(),

    ];
    return view('users_layout/user/landingpage', $data);
  }

  public function pengumumanList()
  {
    $data = [
      'title' => 'Daftar Pengumuman',
      'pengumuman' => $this->ModelPengumuman->orderBy('id', 'asc')->findAll(),
    ];
    return view('users_layout/user/pengumuman-list', $data);
  }

  public function redirect()
  {
    if (in_groups('admin')) {
      return redirect()->to('/admin');
    } else {
      return redirect()->to('/user');
    }
  }

  public function user_guide()
  {
    $data = [
      'title' => 'User Guide',
      'title' => 'User Guide',
    ];
    return view('users_layout/user/user_guide', $data);
  }
}