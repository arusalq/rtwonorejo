<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?> | RT WONOREJO</title>
  <link rel="stylesheet" href="<?= base_url() ?>/assets/landpage/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/landpage/vendors/owl.carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/landpage/vendors/owl.carousel/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/landpage/vendors/aos/css/aos.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/landpage/vendors/jquery-flipster/css/jquery.flipster.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/landpage/css/style1.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
  <div id="mobile-menu-overlay"></div>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <!-- <a class="navbar-brand" href="#"><img src="images/logo.svg" alt="Marshmallow"></a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
          <a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
        </div>
        <ul class="navbar-nav ml-auto align-items-center">
          <li class="nav-item active">
            <a class="nav-link" href="landingpage">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <?php if (logged_in()) : ?>
          <li class="nav-item">
            <a class="nav-link btn btn-success" href="admin">Admin</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link btn btn-success" href="login">Masuk</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-body-wrapper">
    <section id="home" class="home">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="main-banner" id="ban-peng">
              <div class="d-sm-flex justify-content-between">
                <div class="banner-title">
                  <h3 class="font-weight-bold text-info">Daftar Pengumuman
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <ul class="list-unstyled">
            <?php foreach ($pengumuman as $row) : ?>
            <li class="media">
              <img src="<?= base_url() ?>/pict_pengumuman/<?= $row->gambar ?>" class="mr-3" class="rounded"
                width="100px" alt="...">
              <div class="media-body">
                <h5 class="mt-0 mb-1"><?= $row->judul ?></h5>
                <p><?= $row->deskripsi ?></p>
                <small>
                  <?php $datestamp = strtotime($row->tgl);
                    echo date('d/m/Y', strtotime('+1 day', $datestamp));
                    ?>
                </small>
              </div>
            </li>
            <br>
            <hr>
            <br>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </section>
  </div>
  <footer class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <address>
              <p>RT 6, RW 8, Kelurahan Wonorejo</p>
              <p class="mb-4">Kecamatan Rungkut, Kota Surabaya</p>
              <div class="d-flex align-items-center">
                <p class="mr-4 mb-0">+3 123 456 789</p>
                <a href="mailto:info@yourmail.com" class="footer-link">info@yourmail.com</a>
              </div>
              <div class="d-flex align-items-center">
                <p class="mr-4 mb-0">+1 222 345 342</p>
                <a href="mailto:Marshmallow@yourmail.com" class="footer-link">Marshmallow@yourmail.com</a>
              </div>
            </address>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="<?= base_url() ?>/assets/landpage/vendors/base/vendor.bundle.base.js"></script>
  <script src="<?= base_url() ?>/assets/landpage/vendors/owl.carousel/js/owl.carousel.js"></script>
  <script src="<?= base_url() ?>/assets/landpage/vendors/aos/js/aos.js"></script>
  <script src="<?= base_url() ?>/assets/landpage/vendors/jquery-flipster/js/jquery.flipster.min.js"></script>
  <script src="<?= base_url() ?>/assets/landpage/js/template.js"></script>
</body>

</html>