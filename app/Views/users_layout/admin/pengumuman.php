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

        <h2 class="panel-title">Pengumuman</h2>
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
                Tambah Pengumuman <i class="fa fa-plus"></i>
              </a>
            </div>
          </div>
        </div>
        <table class="table table-bordered table-striped mb-none" id="datatable-editable">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Tanggal Dibuat</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pengumumans as $pengumuman) : ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $pengumuman->judul; ?></td>
              <td><?= $pengumuman->deskripsi; ?></td>
              <td>
                <?php $datestamp = strtotime($pengumuman->tgl);
                  echo date('d/m/Y', strtotime('+1 day', $datestamp));
                  ?>
              </td>
              <!-- <td><img src="<?= base_url() ?>/pict_pengumuman/<?= $pengumuman->gambar ?>" alt=""></td> -->
              <td>
                <a class="image-popup-no-margins" href="<?= base_url() ?>/pict_pengumuman/<?= $pengumuman->gambar ?>">
                  <img class="img-responsive" src="<?= base_url() ?>/pict_pengumuman/<?= $pengumuman->gambar ?>"
                    width="75">
                </a>
              </td>
              <td class="actions panel-body">

                <a class="modal-with-move-anim" data-target="#modalEdit" id="tombolEdit" href="#modalEdit"
                  data-id="<?= $pengumuman->id; ?>" data-judul="<?= $pengumuman->judul ?>"
                  data-deskripsi="<?= $pengumuman->deskripsi ?>" data-img="<?= $pengumuman->gambar ?>">
                  <i class="fa fa-pencil"></i>
                </a>

                <form action="delete-pengumuman" method="post" class="button-inline">
                  <?= csrf_field() ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="<?= $pengumuman->id ?>">
                  <input type="hidden" name="delete" value="1">
                  <button type="submit" class="on-default remove-row"
                    onclick="return confirm('Hapus pengumuman ini.?')"><i class="fa fa-trash-o"></i>
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
      <h2 class="panel-title">Edit Pengumuman</h2>
    </header>
    <div class="panel-body">
      <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="edit-pengumuman"
        enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="id" id="editId">
        <div class="form-group mt-lg">
          <label class="col-sm-2 control-label">Judul</label>
          <div class="col-sm-9">
            <input type="text" name="judul" class="form-control" id="editJudul" required />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="deskripsi" rows="3" id="editDeskripsi"
              data-plugin-maxlength></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Upload Gambar</label>
          <div class="col-md-9">
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="input-append">
                <div class="uneditable-input">
                  <i class="fa fa-file fileupload-exists"></i>
                  <span class="fileupload-preview"></span>
                </div>
                <span class="btn btn-default btn-file">
                  <span class="fileupload-exists">Change</span>
                  <span class="fileupload-new">Select file</span>
                  <input type="file" name="gambar" />
                </span>
                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-md-6">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="default" name="default">
                Gunakan gambar default
              </label>
            </div>
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
      <h2 class="panel-title">Tambah Pengumuman</h2>
    </header>
    <div class="panel-body">
      <?= view('Myth\Auth\Views\_message_block') ?>
      <form id="demo-form" class="form-horizontal mb-lg" action="add-pengumuman" method="post"
        enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="tgl" value="<?= date('Y-m-d') ?>">
        <div class="form-group mt-lg">
          <label class="col-sm-2 control-label">Judul</label>
          <div class="col-sm-9">
            <input type="text" name="judul" autocomplete="off"
              class="form-control <?php if (session()->getFlashdata('errorJudul')) : ?>is-invalid<?php endif ?>"
              value="" required autofocus>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea class="form-control" name="deskripsi" rows="3" id="editDeskripsi"
              data-plugin-maxlength></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2 control-label">Upload Gambar</label>
          <div class="col-md-9">
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="input-append">
                <div class="uneditable-input">
                  <i class="fa fa-file fileupload-exists"></i>
                  <span class="fileupload-preview"></span>
                </div>
                <span class="btn btn-default btn-file">
                  <span class="fileupload-exists">Change</span>
                  <span class="fileupload-new">Select file</span>
                  <input type="file" name="gambar" />
                </span>
                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
              </div>
            </div>
          </div>
        </div>
        <small>*kosongkan gambar untuk menggunakan gambar default</small>

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
<script src="<?= base_url(); ?>/assets/javascripts/tables/examples.datatables.editable.ruangan.js"> </script>
<script src="<?= base_url(); ?>/assets/javascripts/ui-elements/examples.lightbox.js"></script>

<script>
$(document).on('click', '#tombolEdit', function() {
  let id = $(this).data('id');
  let judul = $(this).data('judul');
  let deskripsi = $(this).data('deskripsi');

  $('.panel-body #editId').val(id);
  $('.panel-body #editJudul').val(judul);
  $('.panel-body #editDeskripsi').html(deskripsi);
});
</script>

<?= $this->endSection(); ?>