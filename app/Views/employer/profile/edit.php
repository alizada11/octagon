<?= view('employer/layout/header.php') ?>
<?= view('employer/layout/sidebar.php') ?>
<div class="col-md-10 my-3">

 <div class="container mt-4">
  <h3>Edit <?= account_type() ?> Employer Profile </h3>
  <form action="<?= base_url('employer/profile/update/' . $profile['id']) ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field() ?>
   <!-- <input type="hidden" name="_method" value="PUT"> -->

   <?= view('employer/profile/partials/_form', ['profile' => $profile]) ?>

   <button type="submit" class="btn btn-primary">Update</button>
  </form>
 </div>
</div>
<?= view('employer/layout/footer.php') ?>