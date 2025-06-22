<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h3><?= lang('Global.edit') ?> <?= lang('Global.language') ?></h3>
  <form method="post" action="<?= site_url("jobseeker/profile/languages/update/{$language['id']}") ?>">
   <?= csrf_field() ?>
   <div class="mb-3">
    <label class="form-label"><?= lang('Global.language') ?></label>
    <input type="text" name="language" class="form-control" value="<?= old('language', $language['language'] ?? '') ?>" required>
   </div>
   <div class="mb-3">
    <label class="form-label"><?= lang('Global.proficiency') ?></label>
    <select name="proficiency" class="form-select" required>
     <option value="">-- <?= lang('Global.select') ?> --</option>
     <?php foreach (lang('Global.proficiency_levels') as $key => $label): ?>
      <option value="<?= esc($key) ?>" <?= $language['proficiency'] == $key ? 'selected' : '' ?>>
       <?= esc($label) ?>
      </option>
     <?php endforeach; ?>

    </select>
   </div>
   <button type="submit" class="btn btn-success"><?= lang('Global.save') ?></button>
  </form>
 </div>
</div>
<?= view('jobseeker/layout/footer.php') ?>