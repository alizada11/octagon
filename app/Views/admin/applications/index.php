<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
  <h2 class="mb-4">Job Applications</h2>



  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Category</th>
          <th>Agency</th>
          <th>User ID</th>
          <th>Submitted Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($applications as $app): ?>
          <tr>
            <td><?= esc($app['id']) ?></td>
            <td><?= esc($app['category']) ?></td>
            <td><?= esc($app['agency_name'] ?? 'N/A') ?></td>
            <td>
              <?php
              if (!empty($app['applicant_name'])): ?>
                <a href="<?= site_url('admin/jobseeker/profile/' . $app['user_id']) ?>"><?= esc($app['applicant_name']) ?></a>
            </td>
          <?php else: ?>
            Profile Not completed<br>Or user does not exist
          <?php endif; ?>
          <td><?= esc($app['submitted_date']) ?></td>
          <td><span class="badge bg-<?= $app['status'] == 'approved' ? 'success' : ($app['status'] == 'rejected' ? 'danger' : 'warning') ?>"><?= ucfirst(esc($app['status'])) ?></span></td>
          <td>
            <form action="<?= site_url('admin/applications/update-status/' . $app['id']) ?>" method="post" class="d-inline">
              <?= csrf_field() ?>
              <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                <?php foreach (['pending', 'reviewed', 'approved', 'rejected'] as $status): ?>
                  <option value="<?= $status ?>" <?= $app['status'] == $status ? 'selected' : '' ?>><?= ucfirst($status) ?></option>
                <?php endforeach; ?>
              </select>
            </form>

            <form action="<?= site_url('admin/applications/delete/' . $app['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this application?');">
              <?= csrf_field() ?>
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

<?= view('admin/layout/footer.php') ?>