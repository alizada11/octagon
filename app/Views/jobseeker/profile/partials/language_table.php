<?php if (!empty($languages)): ?>
 <table class="table table-bordered table-striped">
  <thead>
   <tr>
    <th><?= lang('Global.language') ?></th>
    <th><?= lang('Global.proficiency') ?></th>
    <th><?= lang('Global.actions') ?></th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($languages as $item): ?>
    <tr>
     <td><?= esc($item['language']) ?></td>
     <td><?= lang('Global.proficiency_levels.' . $item['proficiency']) ?></td>

     <td>
      <a href="<?= site_url('jobseeker/profile/languages/edit/' . $item['id']) ?>" class="btn btn-sm btn-warning"><?= lang('Global.edit') ?></a>
      <a href="<?= site_url('jobseeker/profile/languages/delete/' . $item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><?= lang('Global.delete') ?></a>
     </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>
<?php else: ?>
 <p><?= lang('Global.no_editeries_found') ?></p>
<?php endif; ?>