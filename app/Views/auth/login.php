<?= $this->extend('auth/layout/auth_layout') ?>
<?= $this->section('content') ?>


<h3 class="text-center mb-3"><?= lang('Auth.title') ?></h3>

<?php if (session('error')): ?>
 <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<form method="post" action="<?= base_url('login') ?>">
 <?= csrf_field() ?>
 <div class="mb-3">
  <label class="form-label"><?= lang('Auth.email') ?></label>
  <input type="email" name="email" class="form-control" required />
 </div>

 <div class="mb-3">
  <label class="form-label"><?= lang('Auth.password') ?></label>
  <input type="password" name="password" class="form-control" required />
 </div>

 <button class="btn  w-100"><?= lang('Auth.login') ?></button>

 <div class="d-flex justify-content-between align-items-center">
  <p class="mt-3 text-center"><a href="<?= base_url('register') ?>" class="auth-links"><?= lang('Auth.back_to_register') ?></a></p>
</form>


<?= $this->endSection() ?>