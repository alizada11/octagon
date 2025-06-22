<?php if (!empty($skills)): ?>
 <table class="table table-bordered table-striped">
  <thead>
   <tr>
    <th><?= lang('Global.skill') ?></th>
    <th><?= lang('Global.level') ?></th>
    <th><?= lang('Global.actions') ?></th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($skills as $item): ?>
    <tr>
     <td><?= esc($item['skill_name']) ?></td>
     <td><?= lang('Global.skill_levels.' . $item['level']) ?></td>
     <td>
      <a href="<?= site_url('jobseeker/profile/skills/edit/' . $item['id']) ?>" class="btn btn-sm btn-warning"><?= lang('Global.edit') ?></a>
      <a href="<?= site_url('jobseeker/profile/skills/delete/' . $item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><?= lang('Global.delete') ?></a>
     </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>
<?php else: ?>
 <p><?= lang('Global.no_editeries_found') ?></p>
<?php endif; ?>