<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>
<div class="col-md-10 my-3">

 <div class="container mt-4">
  <h3><?= lang('Global.edit_jobseeker_profile') ?></h3>
  <form action="<?= base_url('jobseeker/profile/update/' . $profile['id']) ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field() ?>
   <!-- <input type="hidden" name="_method" value="PUT"> -->

   <?= view('jobseeker/profile/partials/_form', ['profile' => $profile]) ?>

   <button type="submit" class="btn btn-primary"><?= lang('Global.save') ?></button>
  </form>
 </div>
</div>
<?= view('jobseeker/layout/footer.php') ?>