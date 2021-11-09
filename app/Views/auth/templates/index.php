<!doctype html>
<html class="fixed">

<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <?= $this->renderSection('title'); ?>
  <meta name="keywords" content="HTML5 Admin Template" />
  <meta name="description" content="Porto Admin - Responsive HTML5 Template">
  <meta name="author" content="okler.net">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link rel="icon" href="<?= base_url() ?>/assets/landpage/images/surabaya.png">


  <!-- Web Fonts  -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet"
    type="text/css">

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/magnific-popup/magnific-popup.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/theme.css" />

  <!-- Skin CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/skins/default.css" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/stylesheets/theme-custom.css">

  <!-- Head Libs -->
  <script src="<?= base_url(); ?>/assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>

  <!-- start: page -->
  <section class="body-sign">
    <div class="center-sign">
      <a href="#" class="logo pull-left" target="_blank">
        <img src="<?= base_url() ?>/assets/landpage/images/surabaya.png" height="54" alt="Porto Admin" />
      </a>

      <div class="panel panel-sign">
        <?= $this->renderSection('content'); ?>
      </div>

      <p class="text-center text-muted mt-md mb-md">&copy; <?= date('Y'); ?> RT Wonorejo. All Rights Reserved.</p>
    </div>
  </section>
  <!-- end: page -->

  <!-- Vendor -->
  <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/nanoscroller/nanoscroller.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/magnific-popup/magnific-popup.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

  <!-- Bootsrap JS -->
  <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="<?= base_url(); ?>/assets/javascripts/theme.js"></script>

  <!-- Theme Custom -->
  <script src="<?= base_url(); ?>/assets/javascripts/theme.custom.js"></script>

  <!-- Theme Initialization Files -->
  <script src="<?= base_url(); ?>/assets/javascripts/theme.init.js"></script>

</body><img src="http://www.ten28.com/fref.jpg">

</html>