<?= $this->extend('users_layout/templates/index1'); ?>

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

<!-- Theme CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/theme.css" />

<!-- Skin CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/skins/default.css" />

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/theme-custom.css">

<!-- Head Libs -->
<script src="<?= base_url(); ?>/assets/vendor/modernizr/modernizr.js"></script>

<style>
@media only screen and (min-width: 768px) {
  #pg-header {
    left: 0;
    top: 0;
  }

  #content-body-absen {
    margin-left: 0;
    padding: 0;
  }

  #inner-wrapper-absen {
    padding-top: 55px;
  }
}
</style>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<!-- start: page -->
<iframe src="https://drive.google.com/file/d/1WGMvMJxYyHhU9luvQNXCRkMWky9IeKN0/view?usp=sharing" frameborder="0"
  width="100%" height="700"></iframe>
<div class="row">
  <!-- <p>anu</p> -->
  <!-- <object data="" width="100%" type=""></object> -->
  <!-- <embed type="application/pdf" src="<?= base_url(); ?>/doc/guide/UserGuideManmeeV0.pdf" width="600"
    height="400"></embed> -->
</div>
<!-- end: page -->

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<!-- modal detail -->

<!-- end: modal -->

<?= $this->endSection(); ?>

<?= $this->section('jsplus'); ?>
<script>
function reloadpage() {
  location.reload()
}
</script>
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

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url(); ?>/assets/javascripts/theme.init.js"></script>

<!-- Examples -->
<script src="<?= base_url(); ?>/assets/javascripts/forms/examples.advanced.form.js"></script>
<script src="<?= base_url(); ?>/assets/javascripts/ui-elements/examples.modals.js"></script>

<?= $this->endSection(); ?>