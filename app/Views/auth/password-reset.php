<?= $this->extend('auth/templates/index'); ?>
<?= $this->section('content'); ?>
<div class="panel panel-sign">
  <div class="panel-title-sign mt-xl text-right">
    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Recover Password</h2>
  </div>
  <div class="panel-body">
    <?= view('Myth\Auth\Views\_message_block') ?>
    <div class="alert alert-info">
      <p class="m-none text-semibold h6">Enter your e-mail below and we will send you reset instructions!</p>
    </div>

    <form method="POST" action="<?= route_to('forgot') ?>">
      <?= csrf_field() ?>
      <div class="form-group mb-none">
        <div class="input-group">
          <input name="email" type="email"
            class="form-control input-lg <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
            aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" />
          <span class="input-group-btn">
            <button class="btn btn-primary btn-lg" type="submit">Reset!</button>
          </span>
          <div class="invalid-feedback">
            <?= session('errors.email') ?>
          </div>
        </div>
      </div>

      <p class="text-center mt-lg">Remembered? <a href="<?= route_to('login') ?>">Sign In!</a>
    </form>
  </div>
</div>
<?= $this->endSection(); ?>