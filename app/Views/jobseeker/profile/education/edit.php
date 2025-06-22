<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">

 <h2><?= lang('Global.edit') ?> <?= lang('Global.education') ?></h2>
 <form method="post" action="<?= site_url("jobseeker/profile/education/update/{$education['id']}") ?>">
  <?= csrf_field() ?>
  <div class="mb-3">
   <label><?= lang('Global.institution') ?></label>
   <input type="text" name="institution" value="<?= esc($education['institution']) ?>" class="form-control" required>
  </div>
  <div class="mb-3">
   <label><?= lang('Global.degree') ?></label>
   <input type="text" name="degree" value="<?= esc($education['degree']) ?>" class="form-control" required>
  </div>
  <div class="mb-3">
   <label><?= lang('Global.field_of_study') ?></label>
   <input type="text" name="field_of_study" value="<?= esc($education['field_of_study']) ?>" class="form-control">
  </div>
  <div class="mb-3">
   <label><?= lang('Global.start_year') ?></label>
   <input type="text" name="start_year" value="<?= esc($education['start_year']) ?>" class="form-control">
  </div>
  <div class="mb-3">
   <label><?= lang('Global.end_year') ?></label>
   <input type="text" name="end_year" value="<?= esc($education['end_year']) ?>" class="form-control">
  </div>
  <button type="submit" class="btn btn-success"><?= lang('Global.save') ?></button>
 </form>
</div>

<?= view('jobseeker/layout/footer.php') ?>