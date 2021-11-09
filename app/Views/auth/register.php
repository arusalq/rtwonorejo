<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('title'); ?>
<title>Register | RT WONOREJO</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="panel-title-sign mt-xl text-right">
  <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i><?= lang('Auth.register') ?></h2>
</div>
<div class="panel-body">
  <?= view('Myth\Auth\Views\_message_block') ?>
  <form action="<?= route_to('register') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group mb-lg">
      <label><?= lang('Auth.username') ?></label>
      <input name="username" required="" autofocus="" value="<?= old('username') ?>" type="text"
        class="form-control input-lg <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>">
    </div>

    <div class="form-group mb-lg">
      <label><?= lang('Auth.email') ?></label>
      <input name="email" required="" value="<?= old('email') ?>" type="email"
        class="form-control input-lg <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>">
      <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
    </div>

    <div class="form-group mb-none">
      <div class="row">
        <div class="col-sm-6 mb-lg">
          <label><?= lang('Auth.password') ?></label>
          <input name="password" required="" autocomplete="off" type="password"
            class="form-control input-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>">
        </div>
        <div class="col-sm-6 mb-lg">
          <label><?= lang('Auth.repeatPassword') ?></label>
          <input name="pass_confirm" required="" autocomplete="off" type="password"
            class="form-control input-lg <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>">
        </div>
      </div>
    </div>

    <div class="form-group mb-lg my-3">
      <button type="submit" class="btn btn-primary hidden-xs btn-block lh-lg"><?= lang('Auth.register') ?></button>
      <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
    </div>

    <!-- <div class="row">
      <div class="col-sm-8">
        <div class="checkbox-custom checkbox-default">
          <input id="AgreeTerms" name="agreeterms" type="checkbox" />
          <label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
        </div>
      </div>
      <div class="col-sm-4 text-right">
        <button type="submit" class="btn btn-primary hidden-xs"></button>
        <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
      </div>
    </div> -->

    <!-- <span class="mt-lg mb-lg line-thru text-center text-uppercase">
      <span>or</span>
    </span> -->

    <!-- <div class="mb-xs text-center">
      <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
      <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
    </div> -->

    <p class="text-center"><?= lang('Auth.alreadyRegistered') ?> <a
        href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a>

  </form>
</div>

<?= $this->endSection(); ?>