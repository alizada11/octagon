<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">

 <div class="container mt-4">
  <div class="d-flex justify-content-between">

   <h3><?= lang('Global.experiences') ?></h3>
   <a href="<?= site_url('jobseeker/profile/experience/create') ?>" class="btn btn-primary mb-3"><?= lang('Global.add_experience') ?></a>
  </div>
  <table class="table table-bordered">
   <thead>
    <tr>
     <th><?= lang('Global.job_title') ?></th>
     <th><?= lang('Global.company') ?></th>
     <th><?= lang('Global.start_year') ?></th>
     <th><?= lang('Global.end_year') ?></th>
     <th><?= lang('Global.actions') ?></th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($experiences as $exp): ?>
     <tr>
      <td><?= esc($exp['job_title']) ?></td>
      <td><?= esc($exp['company_name']) ?></td>
      <td><?= esc($exp['start_date']) ?></td>
      <td><?= esc($exp['end_date']) ?></td>
      <td>
       <a href="<?= site_url('jobseeker/profile/experience/edit/' . $exp['id']) ?>" class="btn btn-sm btn-warning"><?= lang('Global.edit') ?></a>
       <form action="<?= site_url('jobseeker/profile/experience/delete/' . $exp['id']) ?>" method="post" style="display:inline;">
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