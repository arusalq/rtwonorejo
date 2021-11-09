<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('title'); ?>
<title>Masuk | RT WONOREJO</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="panel-title-sign mt-xl text-right">
  <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Masuk</h2>
</div>
<div class="panel-body">
  <?= view('Myth\Auth\Views\_message_block') ?>
  <form action="<?= route_to('login') ?>" method="post">
    <?= csrf_field() ?>
    <?php if ($config->validFields === ['email']) : ?>
    <div class="form-group mb-lg">
      <label><?= lang('Auth.email') ?></label>
      <div class="input-group input-group-icon">
        <input name="email" type="email"
          class="form-control input-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login"
          required="" autofocus="">
        <div class="invalid-feedback">
          <?= session('errors.login') ?>
        </div>
        <span class="input-group-addon">
          <span class="icon icon-lg">
            <i class="fa fa-user"></i>
          </span>
        </span>
      </div>
    </div>

    <?php else : ?>
    <div class="form-group mb-lg">
      <label><?= lang('Auth.emailOrUsername') ?></label>
      <div class="input-group input-group-icon">
        <input name="login" type="text"
          class="form-control input-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login"
          required="" autofocus="">
        <div class="invalid-feedback">
          <?= session('errors.login') ?>
        </div>
        <span class="input-group-addon">
          <span class="icon icon-lg">
            <i class="fa fa-user"></i>
          </span>
        </span>
      </div>
    </div>
    <?php endif; ?>

    <div class="form-group mb-2">
      <div class="clearfix">
        <label class="pull-left"><?= lang('Auth.password') ?></label>
      </div>
      <div class="input-group input-group-icon">
        <input name="password" type="password"
          class="form-control input-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" required="">
        <div class="invalid-feedback">
          <?= session('errors.password') ?>
        </div>
        <span class="input-group-addon">
          <span class="icon icon-lg">
            <i class="fa fa-lock"></i>
          </span>
        </span>
      </div>
    </div>

    <div class="form-group mb-lg">
      <?php if ($config->activeResetter) : ?>
      <a href="<?= route_to('forgot') ?>" class="pull-left mb-lg-4"><?= lang('Auth.forgotYourPassword') ?></a>
      <?php endif; ?>
    </div>

    <div class="form-group mb-lg">

      <?php if ($config->allowRemembering) : ?>
      <div class="checkbox-custom checkbox-default">
        <input type="checkbox" id="remember" name="remember" <?php if (old('remember')) : ?> checked <?php endif ?>>
        <label for="RememberMe">
          <?= lang('Auth.rememberMe') ?>
        </label>
      </div>
      <?php endif; ?>
    </div>

    <div class="form-group mb-lg">
      <button type="submit" class="btn btn-primary hidden-xs btn-block lh-lg">Masuk</button>
      <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Masuk</button>
    </div>

    <?php if ($config->allowRegistration) : ?>
    <p class="text-center">
      <a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
    </p>
    <?php endif; ?>

  </form>
</div>
<?= $this->endSection(); ?>