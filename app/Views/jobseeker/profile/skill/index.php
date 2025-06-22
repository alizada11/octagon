<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="d-flex justify-content-between">

  <h3><?= lang('Global.skills') ?></h3>
  <a href="<?= site_url('jobseeker/profile/skills/create') ?>" class="btn btn-primary mb-3"><?= lang('Global.add') ?> <?= lang('Global.skill') ?></a>
 </div>
 <table class="table table-bordered">
  <thead>
   <tr>
    <th><?= lang('Global.skill') ?></th>
    <th><?= lang('Global.level') ?></th>
    <th><?= lang('Global.actions') ?></th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($skills as $skill): ?>
    <tr>
     <td><?= esc($skill['skill_name']) ?></td>
     <td><?= lang('Global.skill_levels.' . $skill['level']) ?>
     </td>
     <td>
      <a href="<?= site_url('jobseeker/profile/skills/edit/' . $skill['id']) ?>" class="btn btn-sm btn-warning"><?= lang('Global.edit') ?></a>
      <form action="<?= site_url('jobseeker/profile/skills/delete/' . $skill['id']) ?>" method="post" style="display:inline;">
       <?= csrf_field() ?>
       <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')"><?= lang('Global.delete') ?></button>
      </form>
     </td>
    </tr>
   <?php endforeach ?>
  </tbody>
 </table>

</div>
<?= view('jobseeker/layout/footer.php') ?>