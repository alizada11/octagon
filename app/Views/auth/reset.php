<?= $this->extend('auth/layout/auth_layout') ?>
<?= $this->section('content') ?>
<h4 class="text-center mb-4"><?= lang('Auth.reset_title') ?></h4>

<form method="post" action="<?= base_url('reset/' . $token) ?>">
 <?= csrf_field() ?>

 <div class="mb-3">
  <label><?= lang('Auth.new_password') ?></label>
  <input type="password" name="password" class="form-control" required>
 </div>

 <div class="mb-3">
  <label><?= lang('Auth.confirm_password') ?></label>
  <input type="password" name="confirm_password" class="form-control" required>
 </div>

 <button class="btn btn-success w-100"><?= lang('Auth.reset_password') ?></button>
</form>
<?= $this->endSection() ?>