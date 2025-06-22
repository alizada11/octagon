<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <h3><?= lang('Global.edit') ?> <?= lang('Global.skill') ?></h3>
 <form action="<?= site_url("jobseeker/profile/skills/update/{$skill['id']}")  ?>" method="post">
  <?= csrf_field() ?>
  <div class="mb-3">
   <label class="form-label"><?= lang('Global.skill') ?></label>
   <input type="text" name="skill_name" class="form-control" value="<?= old('skill_name', $skill['skill_name'] ?? '') ?>" required>
  </div>
  <div class="mb-3">
   <label class="form-label"><?= lang('Global.level') ?></label>
   <select name="level" class="form-select" required>
    <option value="">-- <?= lang('Global.select') ?> --</option>
    <?php
    $selectedLevel = old('level', $skill['level'] ?? '');
    $levels = lang('Global.skill_levels');
    ?>

    <?php foreach ($levels as $value => $label): ?>
     <option value="<?= esc($value) ?>" <?= $selectedLevel == $value ? 'selected' : '' ?>>
      <?= esc($label) ?>
     </option>
    <?php endforeach; ?>
   </select>
  </div>
  <button type="submit" class="btn btn-success"><?= lang('Global.save') ?></button>
 </form>
</div>
<?= view('jobseeker/layout/footer.php') ?>