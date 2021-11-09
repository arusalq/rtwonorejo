<?= $this->extend('users_layout/templates/index'); ?>

<?= $this->section('cssplus'); ?>
<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/custom/css/style.css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/select2/select2.css" />
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
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/pnotify/pnotify.custom.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
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
  <section class="panel panel-featured panel-featured-warning">
    <header class="panel-heading">
      <div class="panel-actions">
        <a href="#" class="fa fa-caret-down"></a>
      </div>

      <h2 class="panel-title">Menunggu Persetujuan</h2>
    </header>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped mb-none" id="datatable-editable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Rapat</th>
              <th>Tanggal Rapat</th>
              <th>Ruangan</th>
              <th>Jumlah<br>Peserta</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($rapats as $rapat) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $rapat->namarapat; ?></td>
              <td><?= $rapat->tglrapat; ?></td>
              <td><?= $rapat->ruangan; ?></td>
              <td>
                <?php $jml_anggota = 0; ?>
                <?php foreach ($anggotas as $anggota) : ?>
                <?php if ($anggota->rapatid == $rapat->rapatid) : ?>
                <?php $jml_anggota++ ?>
                <?php endif; ?>
                <?php endforeach; ?>
                <?= $jml_anggota; ?>
              </td>
              <td>
                <form action="/admin/accept/<?= $rapat->rapatid; ?>" method="POST" class="d-inline">
                  <?= csrf_field(); ?>
                  <a class="modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-sm btn-warning"
                    href="#modalDetail<?= $rapat->rapatid; ?>">Detail</a>
                  <input type="hidden" name="notulen" value="<?= $rapat->idnotulen; ?>">
                  <button type="submit" class="mb-xs mt-xs mr-xs btn btn-sm btn-success">Setujui</button>
                </form>
                <a class="modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-sm btn-danger"
                  href="#modalTolak<?= $rapat->rapatid; ?>">Tolak</a>
                <div id="modalTolak<?= $rapat->rapatid; ?>"
                  class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                  <section class="panel">
                    <header class="panel-heading">
                      <h2 class="panel-title">Tolak Rapat</h2>
                    </header>
                    <div class="panel-body">
                      <form action="/admin/tolak/<?= $rapat->rapatid; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <div class="form-group mt-lg">
                          <label class="col-sm-2 control-label">Pesan : </label>
                          <div class="col-sm-9">
                            <input type="hidden" name="_method" value="DELETE">
                            <textarea class="form-control" name="alasan" rows="3"
                              placeholder="Isi alasan anda menolak pada pengaju rapat. Jika perlu."></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 text-right">
                            <button type="submit" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Tolak</button>
                            <button class="btn btn-default modal-dismiss">Tutup</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </section>
                </div>
                <div id="modalTolak<?= $rapat->rapatid; ?>"
                  class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                  <form action="/admin/tolak/<?= $rapat->rapatid; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="text">
                    <button type="submit" class="mb-xs mt-xs mr-xs btn btn-sm btn-danger">Tolak</button>
                  </form>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
<!-- end: page -->

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<!-- modal detail -->
<?php foreach ($rapats as $rapat) : ?>
<?php if ($rapat->status == 0) : ?>
<div id="modalDetail<?= $rapat->rapatid; ?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
  <section class="panel">
    <header class="panel-heading">
      <h2 class="panel-title">Detail Rapat</h2>
    </header>
    <div class="panel-body">
      <div class="form-group mt-lg">
        <label class="col-sm-2 control-label">Pengaju Rapat</label>
        <div class="col-sm-9">
          <?php foreach ($pengajus as $pengaju) : ?>
          <?php if ($pengaju->rapatid == $rapat->rapatid) : ?>
          <input type="text" name="name" class="form-control" value="<?= $pengaju->pengaju; ?>" disabled />
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="form-group mt-lg">
        <label class="col-sm-2 control-label">Nama Rapat</label>
        <div class="col-sm-9">
          <input type="text" name="name" class="form-control" value="<?= $rapat->namarapat; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Deskripsi</label>
        <div class="col-sm-9">
          <textarea class="form-control" name="deskripsi" rows="3" data-plugin-maxlength maxlength="140"
            disabled><?= $rapat->deskripsirapat; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Rapat</label>
        <div class="col-sm-9">
          <input type="text" name="tgl_rapat" class="form-control" value="<?= $rapat->tglrapat; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Ruangan</label>
        <div class="col-sm-9">
          <input type="text" name="ruangan" class="form-control" value="<?= $rapat->ruangan; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Notulen</label>
        <div class="col-sm-9">
          <input type="text" name="notulen" class="form-control" value="<?= $rapat->notulen; ?>" disabled />
        </div>
      </div>
      <?php $dataanggota = array(); ?>
      <?php foreach ($anggotas as $anggota) : ?>
      <?php if ($anggota->rapatid == $rapat->rapatid) : ?>
      <?php $dataanggota[] = $anggota->anggota; ?>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Peserta : </label>
        <div class="col-sm-9">
          <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary" disabled>
            <?php for ($i = 0; $i < count($dataanggota); $i++) : ?>
            <option value="<?= $dataanggota[$i]; ?>"><?= $dataanggota[$i]; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <?php $dataperlengkapan = array(); ?>
      <?php foreach ($perlengkapans as $perlengkapan) : ?>
      <?php if ($perlengkapan->rapatid == $rapat->rapatid) : ?>
      <?php $dataperlengkapan[] = $perlengkapan->perlengkapan; ?>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Perlengkapan : </label>
        <div class="col-sm-9">
          <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary" disabled>
            <?php for ($i = 0; $i < count($dataperlengkapan); $i++) : ?>
            <option value="<?= $dataperlengkapan[$i]; ?>"><?= $dataperlengkapan[$i]; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right">
          <button class="btn btn-default modal-dismiss">Tutup</button>
        </div>
        </>
      </div>
  </section>
</div>
<?php endif; ?>
<?php if ($rapat->status == 1) : ?>
<div id="modalDetail<?= $rapat->rapatid; ?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
  <section class="panel">
    <header class="panel-heading">
      <h2 class="panel-title">Detail Rapat</h2>
    </header>
    <div class="panel-body">
      <div class="form-group mt-lg">
        <label class="col-sm-2 control-label">Pengaju Rapat</label>
        <div class="col-sm-9">
          <?php foreach ($pengajus as $pengaju) : ?>
          <?php if ($pengaju->rapatid == $rapat->rapatid) : ?>
          <input type="text" name="name" class="form-control" value="<?= $pengaju->pengaju; ?>" disabled />
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="form-group mt-lg">
        <label class="col-sm-2 control-label">Nama Rapat</label>
        <div class="col-sm-9">
          <input type="text" name="name" class="form-control" value="<?= $rapat->namarapat; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Deskripsi</label>
        <div class="col-sm-9">
          <textarea class="form-control" name="deskripsi" rows="3" data-plugin-maxlength maxlength="140"
            disabled><?= $rapat->deskripsirapat; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Rapat</label>
        <div class="col-sm-9">
          <input type="text" name="tgl_rapat" class="form-control" value="<?= $rapat->tglrapat; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Ruangan</label>
        <div class="col-sm-9">
          <input type="text" name="ruangan" class="form-control" value="<?= $rapat->ruangan; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Notulen</label>
        <div class="col-sm-9">
          <input type="text" name="notulen" class="form-control" value="<?= $rapat->notulen; ?>" disabled />
        </div>
      </div>
      <?php $dataanggota = array(); ?>
      <?php foreach ($anggotas as $anggota) : ?>
      <?php if ($anggota->rapatid == $rapat->rapatid) : ?>
      <?php $dataanggota[] = $anggota->anggota; ?>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Peserta : </label>
        <div class="col-sm-9">
          <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary" disabled>
            <?php for ($i = 0; $i < count($dataanggota); $i++) : ?>
            <option value="<?= $dataanggota[$i]; ?>"><?= $dataanggota[$i]; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <?php $dataperlengkapan = array(); ?>
      <?php foreach ($perlengkapans as $perlengkapan) : ?>
      <?php if ($perlengkapan->rapatid == $rapat->rapatid) : ?>
      <?php $dataperlengkapan[] = $perlengkapan->perlengkapan; ?>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Perlengkapan : </label>
        <div class="col-sm-9">
          <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary" disabled>
            <?php for ($i = 0; $i < count($dataperlengkapan); $i++) : ?>
            <option value="<?= $dataperlengkapan[$i]; ?>"><?= $dataperlengkapan[$i]; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right">
          <button class="btn btn-default modal-dismiss">Tutup</button>
        </div>
        </>
      </div>
  </section>
</div>
<?php endif; ?>
<?php if ($rapat->status == 2) : ?>
<div id="modalDetail<?= $rapat->rapatid; ?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
  <section class="panel">
    <header class="panel-heading">
      <h2 class="panel-title">Detail Rapat</h2>
    </header>
    <div class="panel-body">
      <div class="form-group mt-lg">
        <label class="col-sm-2 control-label">Pengaju Rapat</label>
        <div class="col-sm-9">
          <?php foreach ($pengajus as $pengaju) : ?>
          <?php if ($pengaju->rapatid == $rapat->rapatid) : ?>
          <input type="text" name="name" class="form-control" value="<?= $pengaju->pengaju; ?>" disabled />
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="form-group mt-lg">
        <label class="col-sm-2 control-label">Nama Rapat</label>
        <div class="col-sm-9">
          <input type="text" name="name" class="form-control" value="<?= $rapat->namarapat; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Deskripsi</label>
        <div class="col-sm-9">
          <textarea class="form-control" name="deskripsi" rows="3" data-plugin-maxlength maxlength="140"
            disabled><?= $rapat->deskripsirapat; ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal Rapat</label>
        <div class="col-sm-9">
          <input type="text" name="tgl_rapat" class="form-control" value="<?= $rapat->tglrapat; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Ruangan</label>
        <div class="col-sm-9">
          <input type="text" name="ruangan" class="form-control" value="<?= $rapat->ruangan; ?>" disabled />
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Notulen</label>
        <div class="col-sm-9">
          <input type="text" name="notulen" class="form-control" value="<?= $rapat->notulen; ?>" disabled />
        </div>
      </div>
      <?php $dataanggota = array(); ?>
      <?php foreach ($anggotas as $anggota) : ?>
      <?php if ($anggota->rapatid == $rapat->rapatid) : ?>
      <?php $dataanggota[] = $anggota->anggota; ?>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Peserta : </label>
        <div class="col-sm-9">
          <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary" disabled>
            <?php for ($i = 0; $i < count($dataanggota); $i++) : ?>
            <option value="<?= $dataanggota[$i]; ?>"><?= $dataanggota[$i]; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <?php $dataperlengkapan = array(); ?>
      <?php foreach ($perlengkapans as $perlengkapan) : ?>
      <?php if ($perlengkapan->rapatid == $rapat->rapatid) : ?>
      <?php $dataperlengkapan[] = $perlengkapan->perlengkapan; ?>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="form-group">
        <label class="col-sm-2 control-label">Perlengkapan : </label>
        <div class="col-sm-9">
          <select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary" disabled>
            <?php for ($i = 0; $i < count($dataperlengkapan); $i++) : ?>
            <option value="<?= $dataperlengkapan[$i]; ?>"><?= $dataperlengkapan[$i]; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right">
          <button class="btn btn-default modal-dismiss">Tutup</button>
        </div>
        </>
      </div>
  </section>
</div>
<?php endif; ?>
<?php endforeach; ?>
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
<script src="<?= base_url(); ?>/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/select2/select2.js"></script>
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
<script src="<?= base_url(); ?>/assets/vendor/pnotify/pnotify.custom.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery-autosize/jquery.autosize.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.init.js"></script>

<!-- Examples -->
<script src="<?= base_url(); ?>/assets/javascripts/forms/examples.advanced.form.js"></script>
<script src="<?= base_url(); ?>/assets/javascripts/ui-elements/examples.modals.js"></script>
<script src="<?= base_url(); ?>/assets/javascripts/tables/examples.datatables.editable.ruangan.js"> </script>


<?= $this->endSection(); ?>