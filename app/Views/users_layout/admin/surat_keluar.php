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
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/dropzone/css/basic.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/dropzone/css/dropzone.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/summernote/summernote.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/summernote/summernote-bs3.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/codemirror/lib/codemirror.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/codemirror/theme/monokai.css" />

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

        <h2 class="panel-title">Surat Keluar</h2>
      </header>
      <div class="panel-body">
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('pesan'); ?>
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
                Tambah Surat <i class="fa fa-plus"></i>
              </a>
              <a class="modal-with-move-anim btn btn-success" href="#modalImport">
                Cetak Data Surat <i class="fa fa-print"></i>
              </a>

              <div id="modalImport" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                <form action="/admin/export-surat" method="post">
                  <?= csrf_field() ?>
                  <section class="panel">
                    <header class="panel-heading">
                      <h2 class="panel-title">Cetak Data Surat</h2>
                    </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-md-3 control-label" for="inputSuccess">Pilih Cetak : </label>
                        <div class="col-md-6">
                          <select class="form-control mb-md" name="type">
                            <option value="1">Semua</option>
                            <option value="2">Surat Masuk</option>
                            <option value="3">Surat Keluar</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 text-right" id="text-right">
                          <button type="submit" class="btn btn-success">Cetak</button>
                          <button class="btn btn-default modal-dismiss">Tutup</button>
                        </div>
                      </div>
                  </section>
                </form>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-bordered table-striped mb-none" id="datatable-editable">
          <thead>
            <tr>
              <th>Nomor Surat</th>
              <th>Perihal</th>
              <th>Tanggal</th>
              <th>Tujuan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($surats as $surat) : ?>
            <tr>
              <td><?= $surat->no_surat; ?></td>
              <td><?= $surat->perihal; ?></td>
              <td><?= $surat->tgl; ?></td>
              <td><?= $surat->asal; ?></td>
              <td class="actions panel-body">

                <a class="modal-with-move-anim" data-target="#modalEdit" id="tombolEdit" href="#modalEdit"
                  data-id="<?= $surat->id ?>" data-nosurat="<?= $surat->no_surat; ?>"
                  data-perihal="<?= $surat->perihal; ?>" data-tgl="<?= $surat->tgl; ?>"
                  data-asal="<?= $surat->asal; ?>">
                  <i class="fa fa-pencil"></i>
                </a>

                <form action="delete-surat" method="post" class="button-inline">
                  <?= csrf_field() ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="delete" value="1">
                  <input type="hidden" name="id" value="<?= $surat->id ?>">
                  <button type="submit" class="on-default remove-row" onclick="return confirm('Hapus surat ini.?')"><i
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
      <h2 class="panel-title">Edit Surat Keluar</h2>
    </header>
    <div class="panel-body">
      <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" method="POST" action="edit-surat">
        <?= csrf_field() ?>
        <input type="hidden" name="type" value="1">
        <input type="hidden" name="id" id="editId">
        <div class="form-group mt-lg">
          <label class="col-sm-2 control-label">Nomor Surat</label>
          <div class="col-sm-9">
            <input type="text" name="noSurat" class="form-control" id="editNoSurat" required autocomplete="off" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Perihal</label>
          <div class="col-sm-9">
            <input type="text" name="perihal" class="form-control" id="editPerihal" required autocomplete="off" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-9">
            <input id="editTgl" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____"
              class="form-control" name="tgl">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tujuan</label>
          <div class="col-sm-9">
            <input type="text" name="asal" class="form-control" id="editAsal" required autocomplete="off" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Ubah</button>
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
      <h2 class="panel-title">Tambah Surat Keluar</h2>
    </header>
    <div class="panel-body">
      <?= view('Myth\Auth\Views\_message_block') ?>
      <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate" action="add-surat" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="type" value="1">
        <div class="form-group mt-lg">
          <label class="col-sm-2 control-label">Nomor Surat</label>
          <div class="col-sm-9">
            <input type="text" name="noSurat" autocomplete="off"
              class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" value="" required
              autofocus>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Perihal</label>
          <div class="col-sm-9">
            <input type="text" name="perihal" autocomplete="off"
              class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-9">
            <input id="date" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____"
              class="form-control" name="tgl">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tujuan</label>
          <div class="col-sm-9">
            <input name="asal" required="" autocomplete="off" type="asal"
              class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>">
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Tambah</button>
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
<script src="<?= base_url(); ?>/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/fuelux/js/spinner.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/dropzone/dropzone.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-markdown/js/markdown.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/codemirror/lib/codemirror.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/codemirror/addon/selection/active-line.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/codemirror/mode/javascript/javascript.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/codemirror/mode/xml/xml.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/codemirror/mode/css/css.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/summernote/summernote.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/ios7-switch/ios7-switch.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.init.js"></script>

<!-- Examples -->
<script src="<?= base_url(); ?>/assets/javascripts/ui-elements/examples.modals.js"></script>
<script src="<?= base_url(); ?>/assets/javascripts/tables/examples.datatables.editable.js"> </script>
<script src="<?= base_url(); ?>/assets/javascripts/forms/examples.advanced.form.js" />
</script>


<script>
$(document).on('click', '#tombolEdit', function() {
  let id = $(this).data('id');
  let noSurat = $(this).data('nosurat');
  let perihal = $(this).data('perihal');
  let tgl = $(this).data('tgl');
  let asal = $(this).data('asal');

  $('.panel-body #editId').val(id);
  $('.panel-body #editNoSurat').val(noSurat);
  $('.panel-body #editPerihal').val(perihal);
  $('.panel-body #editTgl').val(tgl);
  $('.panel-body #editAsal').val(asal);
});
</script>

<?= $this->endSection(); ?>