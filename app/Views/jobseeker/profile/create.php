<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h3><?= lang('Global.create_jobseeker_profile') ?></h3>
  <form action="<?= base_url('jobseeker/profile/store') ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field() ?>

   <?= view('jobseeker/profile/partials/_form.php') ?>

   <button type="submit" class="btn btn-success"><?= lang('Global.save') ?></button>
  </form>
 </div>
</div>
<?= view('jobseeker/layout/footer.php') ?>