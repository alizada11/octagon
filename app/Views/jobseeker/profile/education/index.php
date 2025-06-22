<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="d-flex justify-content-between">

  <h2><?= lang('Global.education') ?></h2>
  <a href="<?= site_url('jobseeker/profile/education/create') ?>" class="btn btn-primary mb-3"><?= lang('Global.add_education') ?></a>
 </div>
 <table class="table table-bordered">
  <thead>
   <tr>
    <th><?= lang('Global.institution') ?></th>
    <th><?= lang('Global.degree') ?></th>
    <th><?= lang('Global.field_of_study') ?></th>
    <th><?= lang('Global.from') ?></th>
    <th><?= lang('Global.to') ?></th>
    <th><?= lang('Global.actions') ?></th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($educations as $edu): ?>
    <tr>
     <td><?= esc($edu['institution']) ?></td>
     <td><?= esc($edu['degree']) ?></td>
     <td><?= esc($edu['field_of_study']) ?></td>
     <td><?= esc($edu['start_year']) ?></td>
     <td><?= esc($edu['end_year']) ?></td>
     <td>
      <a href="<?= site_url("jobseeker/profile/education/edit/{$edu['id']}") ?>" class="btn btn-sm btn-warning"><?= lang('Global.edit') ?></a>
      <form action="<?= site_url("jobseeker/profile/education/delete/{$edu['id']}") ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure?');">
       <?= csrf_field() ?>
       <button type="submit" class="btn btn-sm btn-danger"><?= lang('Global.delete') ?></button>
      </form>
     </td>
    </tr>
   <?php endforeach ?>
  </tbody>
 </table>
</div>

<?= view('jobseeker/layout/footer.php') ?>