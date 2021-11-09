<!doctype html>
<html class="fixed">

<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <title><?= $title; ?> | RT WONOREJO</title>
  <meta name="keywords" content="HTML5 Admin Template" />
  <meta name="description" content="Porto Admin - Responsive HTML5 Template">
  <meta name="author" content="okler.net">

  <link rel="icon" href="<?= base_url() ?>/assets/landpage/images/surabaya.png">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <!-- Web Fonts  -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet"
    type="text/css">

  <!-- Css plus -->
  <?= $this->renderSection('cssplus'); ?>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/custom/css/style.css">

</head>

<body>
  <section class="body">

    <?= $this->include('users_layout/templates/header'); ?>

    <div class="inner-wrapper">
      <?= $this->include('users_layout/templates/sidebar'); ?>

      <section role="main" class="content-body">
        <?= $this->include('users_layout/templates/pageHeader'); ?>

        <!-- start: page -->
        <?= $this->renderSection('content'); ?>
        <!-- end: page -->

        <?= $this->include('users_layout/templates/footer'); ?>
    </div>

  </section>

  <?= $this->renderSection('modal'); ?>

  <script>
  function reloadpage() {
    location.reload()
  }
  </script>
  <!-- Js plus -->
  <?= $this->renderSection('jsplus'); ?>

  <!-- Custom JS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/custom/js/script.js">


</body>

</html>