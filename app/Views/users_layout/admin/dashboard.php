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
  <div class="col-md-6 col-lg-6 col-xl-3">
    <section class="panel panel-featured-left panel-featured-primary">
      <div class="panel-body">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-primary">
              <i class="fa fa-envelope"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Surat Masuk</h4>
              <div class="info">
                <strong class="amount"><?= $suratMasuk ?></strong>
              </div>
            </div>
            <div class="summary-footer">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="col-md-6 col-lg-6 col-xl-3">
    <section class="panel panel-featured-left panel-featured-secondary">
      <div class="panel-body">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-secondary">
              <i class="fa fa-envelope-o"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Surat Keluar</h4>
              <div class="info">
                <strong class="amount"><?= $suratKeluar ?></strong>
              </div>
            </div>
            <div class="summary-footer">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="col-md-6 col-lg-6 col-xl-3">
    <section class="panel panel-featured-left panel-featured-quartenary">
      <div class="panel-body">
        <div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
            <div class="summary-icon bg-quartenary">
              <i class="fa fa-user"></i>
            </div>
          </div>
          <div class="widget-summary-col">
            <div class="summary">
              <h4 class="title">Total Warga</h4>
              <div class="info">
                <strong class="amount"><?= $users ?></strong>
              </div>
            </div>
            <div class="summary-footer">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</div>
<!-- end: page -->

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