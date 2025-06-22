<?= $this->extend('auth/layout/auth_layout') ?>
<?= $this->section('content') ?>
<h4 class="text-center mb-4"><?= lang('Auth.forgot_title') ?></h4>

<form method="post" action="<?= base_url('forgot') ?>">
 <?= csrf_field() ?>

 <div class="mb-3">
  <label><?= lang('Auth.email') ?></label>
  <input type="email" name="email" class="form-control" required>
 </div>

 <button class="btn  w-100"><?= lang('Auth.send_reset_link') ?></button>

 <p class="mt-3 text-center "><a href="<?= base_url('login') ?>" class="auth-links"><?= lang('Auth.back_to_login') ?></a></p>
</form>
<?= $this->endSection() ?>