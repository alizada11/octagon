<?php if (!empty($passports)): ?>
 <table class="table table-bordered table-striped">
  <thead>
   <tr>
    <th><?= lang('Global.passport_number') ?></th>
    <th><?= lang('Global.place_of_issue') ?></th>
    <th><?= lang('Global.date_of_issue') ?></th>
    <th><?= lang('Global.date_of_expiry') ?></th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($passports as $item): ?>
    <tr>
     <td><?= esc($item['number']) ?></td>
     <td><?= esc($item['place_of_issue']) ?></td>
     <td><?= esc($item['date_of_issue']) ?></td>
     <td><?= esc($item['date_of_expiry']) ?></td>
     <td>
      <a href="<?= site_url('jobseeker/profile/passport/edit') ?>" class="btn btn-sm btn-warning"><?= lang('Global.edit') ?></a>
      <a href="<?= site_url('jobseeker/profile/passport/delete/' . $item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><?= lang('Global.delete') ?></a>
     </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>
<?php else: ?>
 <p><?= lang('Global.no_editeries_found') ?></p>
<?php endif; ?>