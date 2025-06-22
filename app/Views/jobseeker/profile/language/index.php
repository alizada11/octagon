<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="d-flex justify-content-between">

  <h2><?= lang('Global.languages') ?></h2>
  <a href="<?= site_url('jobseeker/profile/languages/create') ?>" class="btn btn-primary mb-3"><?= lang('Global.add_language') ?></a>
 </div>
 <table class="table table-bordered">
  <thead>
   <tr>
    <th><?= lang('Global.language') ?></th>
    <th><?= lang('Global.proficiency') ?></th>
    <th><?= lang('Global.actions') ?></th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($languages as $lang): ?>
    <tr>
     <td><?= esc($lang['language']) ?></td>
     <td><?= lang('Global.proficiency_levels.' . $lang['proficiency']) ?> </td>
     <td>
      <a href="<?= site_url("jobseeker/profile/languages/edit/{$lang['id']}") ?>" class="btn btn-sm btn-warning"><?= lang('Global.edit') ?></a>
      <form action="<?= site_url("jobseeker/profile/languages/delete/{$lang['id']}") ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure?');">
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