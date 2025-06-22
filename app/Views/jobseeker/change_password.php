<?php include('layout/header.php') ?>
<?php include('layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-5">
  <h3><?= lang('Global.change_password') ?></h3>



  <?php if (isset($validation)): ?>
   <div class="alert alert-danger">
    <?= $validation->listErrors() ?>
   </div>
  <?php endif; ?>

  <form action="<?= base_url('jobseeker/change-password') ?>" method="post">
   <?= csrf_field() ?>
   <div class="mb-3">
    <label for="old_password"><?= lang('Global.old_password') ?></label>
    <input type="password" name="old_password" class="form-control" required>
   </div>
   <div class="mb-3">
    <label for="new_password"><?= lang('Global.new_password') ?></label>
    <input type="password" name="new_password" class="form-control" required>
   </div>
   <div class="mb-3">
    <label for="confirm_password"><?= lang('Global.confirm_new_password') ?></label>
    <input type="password" name="confirm_password" class="form-control" required>
   </div>
   <button type="submit" class="btn btn-primary"><?= lang('Global.update_password') ?></button>
  </form>
 </div>

 <?php include('layout/footer.php') ?>