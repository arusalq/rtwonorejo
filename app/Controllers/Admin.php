<?php

namespace App\Controllers;

use App\Models\ModelSurats;
use CodeIgniter\Session\Session;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Endog;
use Myth\Auth\Entities\User;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Models\UserModel;
use App\Models\ModelWarga;
use App\Models\PengumumanModel;
use Myth\Auth\Commands\Publish;

use function PHPSTORM_META\type;

class Admin extends BaseController
{

  protected $auth;

  /**
   * @var AuthConfig
   */
  protected $config;

  /**
   * @var Session
   */
  protected $session;

  protected $ModelWarga;
  protected $ModelSurat;
  protected $ModelPengumuman;
  public function __construct()
  {
    $this->session = service('session');

    $this->config = config('Auth');
    $this->auth = service('authentication');

    $this->ModelWarga = new ModelWarga();
    $this->ModelSurat = new ModelSurats();
    $this->ModelSurat = new ModelSurats();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $db      = \Config\Database::connect();
    $data['users'] = $db->table('tb_warga')->countAll();
    $data['suratMasuk'] = $db->table('tb_surat')->where('type', 0)->countAllResults();
    $data['suratKeluar'] = $db->table('tb_surat')->where('type', 1)->countAllResults();

    return view('users_layout/admin/dashboard', $data);
  }

  public function suratMasuk()
  {

    // type 0 = surat masuk
    // type 1 = surat keluar
    $data['title'] = 'Surat Masuk';
    $data['surats'] = $this->ModelSurat->where('type', 0)->orderBy('id', 'desc')->findAll();

    return view('users_layout/admin/surat_masuk', $data);
  }

  public function suratKeluar()
  {
    $data['title'] = 'Surat Keluar';
    $db      = \Config\Database::connect();
    // $builder = $db->table('tb_surat')->where('type', 1)->orderBy('id', 'desc');
    // $query = $builder->get();

    // $data['surats'] = $query->getResult();
    $data['surats'] = $this->ModelSurat->where('type', 1)->orderBy('id', 'desc')->findAll();

    return view('users_layout/admin/surat_keluar', $data);
  }

  public function allUsers()
  {
    $data['title'] = 'Daftar Warga';
    $data['users'] = $this->ModelWarga->orderBy('id', 'desc')->findAll();
    // dd($data);

    return view('users_layout/admin/users', $data);
  }

  public function attemptUser()
  {

    if ($this->request->getPost('delete') == 1) {
      $this->ModelWarga->delete($this->request->getPost('id'));
      session()->setFlashdata('pesanEdit', 'berhasil menghapus data warga ! ');
      return redirect()->back()->withInput();
    }

    $data = [
      'nik' => $this->request->getPost('nik'),
      'kk' => $this->request->getPost('kk'),
      'alamat' => $this->request->getPost('alamat'),
      'namaLengkap' => $this->request->getPost('namaLengkap')
    ];

    if ($this->request->getPost('id') == null) {
      session()->setFlashdata('pesanEdit', 'berhasil tambah data warga ! ');
    } else {
      $data['id'] = $this->request->getPost('id');
      session()->setFlashdata('pesanEdit', 'berhasil edit data warga ! ');
    }

    $this->ModelWarga->save($data);

    return redirect()->back()->withInput();
  }

  public function attemptSurat()
  {

    if ($this->request->getPost('delete') == 1) {
      $this->ModelSurat->delete($this->request->getPost('id'));
      session()->setFlashdata('pesan', 'Data surat berhasil dihapus !');
      return redirect()->back()->withInput();
    }

    $data = [
      'type' => $this->request->getPost('type'),
      'no_surat' => $this->request->getPost('noSurat'),
      'perihal' => $this->request->getPost('perihal'),
      'asal' => $this->request->getPost('asal'),
      'tgl' => $this->request->getPost('tgl'),
    ];

    if ($this->request->getPost('id') == null) {
      session()->setFlashdata('pesan', 'Data surat berhasil ditambahkan !');
    } else {
      $data['id'] = $this->request->getPost('id');
      session()->setFlashdata('pesan', 'Data surat berhasil diedit !');
    }

    // dd($data);
    $this->ModelSurat->save($data);
    return redirect()->back()->withInput();
    // $this->ModelSurat->;
  }

  public function exportWarga()
  {
    $modelWarga = new ModelWarga;
    $dataWarga = $modelWarga->findAll();

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'No')
      ->setCellValue('B1', 'Nama')
      ->setCellValue('C1', 'Nomor KK')
      ->setCellValue('D1', 'NIK')
      ->setCellValue('E1', 'Alamat');

    $kolom = 2;
    $baris = 1;

    foreach ($dataWarga as $warga) {

      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $baris)
        ->setCellValue('B' . $kolom, $warga->namaLengkap)
        ->setCellValue('C' . $kolom, $warga->kk)
        ->setCellValue('D' . $kolom, $warga->nik)
        ->setCellValue('E' . $kolom, $warga->alamat);

      $kolom++;
      $baris++;
    }

    $writer = new Endog($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="DaftarWarga.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
  public function exportSurat()
  {
    $modelSurat = new ModelSurats();
    if ($this->request->getPost('type') == 2) {
      $dataSurat = $modelSurat->where('type', 0)
        ->findAll();
    } elseif ($this->request->getPost('type') == 3) {
      $dataSurat = $modelSurat->where('type', 1)
        ->findAll();
    } else {
      $dataSurat = $modelSurat->findAll();
    }

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'No')
      ->setCellValue('B1', 'No Surat')
      ->setCellValue('C1', 'Perihal')
      ->setCellValue('D1', 'Tanggal')
      ->setCellValue('E1', 'Asal / Tujuan')
      ->setCellValue('F1', 'Jenis Surat');

    $kolom = 2;
    $baris = 1;

    foreach ($dataSurat as $surat) {

      if ($surat->type == 0) {
        $jenisSurat = 'Surat Masuk';
      } else {
        $jenisSurat = 'Surat Keluar';
      }
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $baris)
        ->setCellValue('B' . $kolom, $surat->no_surat)
        ->setCellValue('C' . $kolom, $surat->perihal)
        ->setCellValue('D' . $kolom, $surat->tgl)
        ->setCellValue('E' . $kolom, $surat->asal)
        ->setCellValue('F' . $kolom, $jenisSurat);

      $kolom++;
      $baris++;
    }

    $writer = new Endog($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="DaftarWarga.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }

  public function pengumuman()
  {
    $modelPengumuman = new PengumumanModel();
    $data = [
      'title' => 'Pengumuman',
      'pengumumans' => $modelPengumuman->orderBy('id', 'desc')->findAll(),
    ];
    return view('users_layout/admin/pengumuman', $data);
  }

  public function attemptPengumuman()
  {
    $modelPengumuman = new PengumumanModel();

    if ($this->request->getPost('delete') == 1) {
      if ($modelPengumuman->find($this->request->getPost('id'))->gambar != 'default.png') {
        unlink('pict_pengumuman/' . $modelPengumuman->find($this->request->getPost('id'))->gambar);
      }
      $modelPengumuman->delete($this->request->getPost('id'));
      session()->setFlashdata('pesanEdit', 'berhasil menghapus pengumuman ! ');
      return redirect()->back()->withInput();
    }


    $data = [
      'judul' => $this->request->getPost('judul'),
      'deskripsi' => $this->request->getPost('deskripsi'),
    ];

    if ($this->request->getPost('id') == null) {
      if ($this->request->getFile('gambar')->getName() != '') {
        $gambar = $this->request->getFile('gambar');
        $namafile = $gambar->getRandomName();
        $gambar->move('pict_pengumuman/', $namafile);
        $data['gambar'] = $namafile;
      } else {
        $data['gambar'] = 'default.png';
      }
      $data['tgl'] = $this->request->getPost('tgl');

      session()->setFlashdata('pesanEdit', 'berhasil tambah pengumuman ! ');
    } else {
      $data['id'] = $this->request->getPost('id');
      if ($this->request->getPost('default') == 'default') {
        $namafile = 'default.png';
      } elseif ($this->request->getFile('gambar')->getName() == '') {
        $namafile = $modelPengumuman->find($this->request->getPost('id'))->gambar;
      } elseif ($modelPengumuman->find($this->request->getPost('id'))->gambar != 'default.png') {
        unlink('pict_pengumuman/' . $modelPengumuman->find($this->request->getPost('id'))->gambar);
        $gambar = $this->request->getFile('gambar');
        $namafile = $gambar->getRandomName();
        $gambar->move('pict_pengumuman/', $namafile);
      } elseif ($modelPengumuman->find($this->request->getPost('id'))->gambar == 'default.png') {
        $namafile = 'default.png';
        // if ($this->request->getFile('gambar')->getName() != '') {
        //   $gambar = $this->request->getFile('gambar');
        //   $namafile = $gambar->getRandomName();
        //   $gambar->move('pict_pengumuman/', $namafile);
        //   $data['gambar'] = $namafile;
        // } else {
        //   $data['gambar'] = 'default.png';
        // }
      }
      $data['gambar'] = $namafile;
      session()->setFlashdata('pesanEdit', 'berhasil edit pengumuman ! ');
    }

    // dd($data);

    $modelPengumuman->save($data);

    return redirect()->back()->withInput();
  }
}