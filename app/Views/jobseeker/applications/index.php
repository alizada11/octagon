<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <h2 class="mb-4"><?= lang('Global.my_job_applications') ?></h2>



 <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
   <thead class="thead-dark">
    <tr>
     <th><?= lang('Global.id') ?></th>
     <th><?= lang('Global.category') ?></th>
     <th><?= lang('Global.agency') ?></th>
     <th><?= lang('Global.submitted_date') ?></th>
     <th><?= lang('Global.status') ?></th>
     <th><?= lang('Global.actions') ?></th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($applications as $app): ?>
     <tr>
      <td><?= esc($app['id']) ?></td>
      <td><?= esc($app['category']) ?></td>
      <td><?= esc($app['agency_name'] ?? 'N/A') ?></td>
      <td><?= esc($app['submitted_date']) ?></td>
      <td>
       <span class="badge bg-<?= $app['status'] === 'approved' ? 'success' : ($app['status'] === 'rejected' ? 'danger' : 'warning') ?>">
        <?= lang('Global.status_labels.' . $app['status']) ?>
       </span>
      </td>

      <td>

       <form action="<?= site_url('jobseeker/applications/delete/' . $app['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this application?');">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-sm btn-danger"><?= lang('Global.delete') ?></button>
       </form>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>

 <!-- Pagination -->
 <div class="mt-4">
  <?= $pager->links('default', 'bootstrap_full') ?>

 </div>
</div>

<?= view('jobseeker/layout/footer.php') ?>