<!doctype html>
<html class="fixed">

<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <title><?= $title; ?> | Mamee</title>
  <meta name="keywords" content="HTML5 Admin Template" />
  <meta name="description" content="Porto Admin - Responsive HTML5 Template">
  <meta name="author" content="okler.net">

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

    <div class="inner-wrapper" id="inner-wrapper-absen">

      <section role="main" class="content-body" id="content-body-absen">

        <header class="page-header" id="pg-header">
          <h2><?= $title; ?></h2>

          <div class="right-wrapper pull-right">

          </div>
        </header>
        <!-- start: page -->
        <?= $this->renderSection('content'); ?>
        <!-- end: page -->

        <!-- Footer -->
        <footer class="small p-3 px-md-4 mt-auto">
          <div class="row justify-content-between">
            <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
              <ul class="list-dot list-inline mb-0">
                <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark"
                    href="#">FAQ</a></li>
                <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a></li>
                <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact us</a></li>
              </ul>
            </div>

            <div class="col-lg text-center mb-3 mb-lg-0">
              <ul class="list-inline mb-0">
                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-twitter-alt"></i></a></li>
                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-facebook"></i></a></li>
                <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-github"></i></a></li>
              </ul>
            </div>

            <div class="col-lg text-center text-lg-right">
              &copy; <?= date('Y'); ?> Mamee. All Rights Reserved.
            </div>
          </div>
        </footer>
        <!-- End Footer -->
    </div>

  </section>

  <?= $this->renderSection('modal'); ?>

  <!-- Js plus -->
  <?= $this->renderSection('jsplus'); ?>

  <!-- Custom JS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/custom/js/script.js">


</body>

</html>