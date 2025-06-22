<?php if (!empty($experiences)): ?>
 <table class="table table-bordered table-striped">
  <thead>
   <tr>
    <th><?= lang('Global.company') ?></th>
    <th><?= lang('Global.job_title') ?></th>
    <th><?= lang('Global.from') ?></th>
    <th><?= lang('Global.to') ?></th>
    <th><?= lang('Global.description') ?></th>
    <th><?= lang('Global.actions') ?></th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($experiences as $item): ?>
    <tr>
     <td><?= esc($item['company_name']) ?></td>
     <td><?= esc($item['job_title']) ?></td>
     <td><?= esc($item['start_date']) ?></td>
     <td><?= esc($item['end_date']) ?></td>
     <td><?= esc($item['description']) ?></td>
     <td>
      <a href="<?= site_url('jobseeker/profile/experience/edit/' . $item['id']) ?>" class="btn btn-sm btn-warning">
       <p><?= lang('Global.edit') ?></p>
      </a>
      <a href="<?= site_url('jobseeker/profile/experience/delete/' . $item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
       <p><?= lang('Global.delete') ?></p>
      </a>
     </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>
<?php else: ?>
 <p><?= lang('Global.no_editeries_found') ?></p>
<?php endif; ?>