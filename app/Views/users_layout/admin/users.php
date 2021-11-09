<?= $this->extend('users_layout/templates/index'); ?>

<?= $this->section('cssplus'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/select2/select2.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/pnotify/pnotify.custom.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />


<!-- Theme CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/theme.css" />

<!-- Skin CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/skins/default.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/theme-custom.css">

<!-- Head Libs -->
<script src="<?= base_url(); ?>/assets/vendor/modernizr/modernizr.js"></script>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- start: page -->
<div class="row">
  <div class="col-lg">
    <section class="panel">
      <header class="panel-heading">
        <div class="panel-actions">
          <a href="#" class="fa fa-caret-down"></a>
        </div>

        <h2 class="panel-title">Daftar Warga</h2>
      </header>
      <div class="panel-body">
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesanEdit')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesanEdit'); ?>
        </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('import')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('import'); ?>
        </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-md">
              <a class="modal-with-move-anim btn btn-primary" href="#modalAdd">
                Add <i class="fa fa-plus"></i>
              </a>
              <a class="btn btn-success" href="export-warga">
                Cetak Data Warga <i class="fa fa-print"></i>
              </a>
            </div>
          </div>
        </div>
        <table class="table table-bordered table-striped mb-none" id="datatable-editable">
          <thead>
            <tr>
              <th>Nomor KK</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) : ?>
            <tr>
              <td><?= $user->kk; ?></td>
              <td><?= $user->nik; ?></td>
              <td><?= $user->namaLengkap; ?></td>
              <td><?= $user->alamat; ?></td>
              <td class="actions panel-body">

                <a class="modal-with-move-anim" data-target="#modalEdit" id="tombolEdit" href="#modalEdit"
                  data-id="<?= $user->id; ?>" data-email="<?= $user->email; ?>" data-kk="<?= $user->kk ?>"
                  data-nik="<?= $user->nik ?>" data-nama="<?= $user->namaLengkap ?>" data-alamat="<?= $user->alamat ?>">
                  <i class="fa fa-pencil"></i>
                </a>

                <form action="delete-user" method="post" class="button-inline">
                  <?= csrf_field() ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="<?= $user->id ?>">
                  <input type="hidden" name="delete" value="1">
                  <button type="submit" class="on-default remove-row" onclick="return confirm('Hapus user ini.?')"><i
                      class="fa fa-trash-o"></i>
                  </button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>
<!-- end: page -->

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<!-- start: modal -->
<!-- modal edit -->
<div id="modalEdit" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
  <section class="panel">
    <header class="panel-heading">
      <h2 class="panel-title">Edit Pengguna</h2>
    </header>
    <div class="panel-body">
      <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="edit-user">
        <?= csrf_field() ?>
        <input type="hidden" name="id" id="editId">
        <div class="form-group mt-lg">
          <label class="col-sm-2 control-label">Nama Lengkap</label>
          <div class="col-sm-9">
            <input type="text" name="namaLengkap" class="form-control" id="editNama" required />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">NIK</label>
          <div class="col-sm-9">
            <input type="text" name="nik" class="form-control" id="editNIK" required />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">KK</label>
          <div class="col-sm-9">
            <input type="text" name="kk" class="form-control" id="editKK" required />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-9">
            <input type="text" name="alamat" class="form-control" id="editAlamat" required />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary hidden-xs">Ubah</button>
            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Ubah</button>
            <button class="btn btn-default modal-dismiss">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>

<!-- modal add -->
<div id="modalAdd" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
  <section class="panel">
    <header class="panel-heading">
      <h2 class="panel-title">Tambah Warga</h2>
    </header>
    <div class="panel-body">
      <?= view('Myth\Auth\Views\_message_block') ?>
      <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="add-user" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="editid">
        <div class="form-group mt-lg">
          <label class="col-sm-2 control-label">Nama Lengkap</label>
          <div class="col-sm-9">
            <input type="text" name="namaLengkap" autocomplete="off"
              class="form-control <?php if (session()->getFlashdata('errorNama')) : ?>is-invalid<?php endif ?>" value=""
              required autofocus>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">NIK</label>
          <div class="col-sm-9">
            <input type="text" name="nik" autocomplete="off"
              class="form-control <?php if (session()->getFlashdata('errorNIK')) : ?>is-invalid<?php endif ?>" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">KK</label>
          <div class="col-sm-9">
            <input name="kk" required="" autocomplete="off" type="text"
              class="form-control <?php if (session()->getFlashdata('errorKK')) : ?>is-invalid<?php endif ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-9">
            <input name="alamat" required="" autocomplete="off" type="text"
              class="form-control <?php if (session()->getFlashdata('errorAlamat')) : ?>is-invalid<?php endif ?>">
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary hidden-xs">Tambah</button>
            <button class="btn btn-default modal-dismiss">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
<!-- end: modal -->

<?= $this->endSection(); ?>

<?= $this->section('jsplus'); ?>
<!-- Vendor -->
<script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?= base_url(); ?>/assets/vendor/select2/select2.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-autosize/jquery.autosize.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.init.js"></script>

<!-- Examples -->
<script src="<?= base_url(); ?>/assets/javascripts/ui-elements/examples.modals.js"></script>
<script src="<?= base_url(); ?>/assets/javascripts/tables/examples.datatables.editable.js"> </script>

<script>
$(document).on('click', '#tombolEdit', function() {
  let id = $(this).data('id');
  let nama = $(this).data('nama');
  let nik = $(this).data('nik');
  let kk = $(this).data('kk');
  let alamat = $(this).data('alamat');

  $('.panel-body #editId').val(id);
  $('.panel-body #editNama').val(nama);
  $('.panel-body #editNIK').val(nik);
  $('.panel-body #editKK').val(kk);
  $('.panel-body #editAlamat').val(alamat);
});
</script>

<?= $this->endSection(); ?>