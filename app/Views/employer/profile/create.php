<?= view('employer/layout/header.php') ?>
<?= view('employer/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h3>Create Employer Profile</h3>
  <form action="<?= base_url('employer/profile/store') ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field() ?>

   <?= view('employer/profile/partials/_form.php') ?>

   <button type="submit" class="btn btn-success">Save</button>
  </form>
 </div>
</div>
<?= view('employer/layout/footer.php') ?>