<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">

 <h2><?= lang('Global.add_experience') ?></h2>
 <form method="post" action="<?= site_url('jobseeker/profile/experience/store') ?>">
  <?= csrf_field() ?>
  <div class="mb-3">
   <label><?= lang('Global.job_title') ?></label>
   <input type="text" name="job_title" class="form-control" required>
  </div>
  <div class="mb-3">
   <label><?= lang('Global.company') ?></label>
   <input type="text" name="company_name" class="form-control" required>
  </div>
  <div class="mb-3">
   <label><?= lang('Global.start_year') ?></label>
   <input type="date" name="start_date" class="form-control">
  </div>
  <div class="mb-3">
   <label><?= lang('Global.end_year') ?></label>
   <input type="date" name="end_date" class="form-control">
  </div>
  <div class="mb-3">
   <label><?= lang('Global.description') ?></label>
   <textarea name="description" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-success"><?= lang('Global.save') ?></button>
 </form>
</div>

<?= view('jobseeker/layout/footer.php') ?>