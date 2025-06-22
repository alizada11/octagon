<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <h2><?= lang('Global.add_language') ?></h2>
 <form method="post" action="<?= site_url('jobseeker/profile/languages/store') ?>">
  <?= csrf_field() ?>
  <div class="mb-3">
   <label><?= lang('Global.language') ?></label>
   <input type="text" name="language" class="form-control" required>
  </div>
  <div class="mb-3">
   <label><?= lang('Global.proficiency') ?></label>
   <select name="proficiency" class="form-control" required>
    <option value="">-- <?= lang('Global.select') ?> --</option>
    <?php foreach (lang('Global.proficiency_levels') as $key => $label): ?>
     <option value="<?= esc($key) ?>">
      <?= esc($label) ?>
     </option>
    <?php endforeach; ?>

   </select>
  </div>
  <button type="submit" class="btn btn-success"><?= lang('Global.save') ?></button>
 </form>

</div>
<?= view('jobseeker/layout/footer.php') ?>