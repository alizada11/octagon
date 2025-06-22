<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <h4>Employer Requests</h4>

 <?php if (!empty($requests)): ?>
  <table class="table table-bordered">
   <thead>
    <tr>
     <th>ID</th>
     <th>Employer ID</th>
     <th>Service</th>
     <th>Country</th>
     <th>Status</th>
     <th>Actions</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($requests as $r): ?>
     <tr>
      <td><?= $r['id'] ?></td>
      <td><?= $r['applicant_name'] ?></td>
      <td><?= esc($r['service_category']) ?></td>
      <td>
       <?php
       $locale = service('request')->getLocale();

       echo ($locale === 'ar') ? $r['country_name_ar'] : $r['country_name_en'];
       ?>
      </td>
      <td>
       <form method="post" action="<?= base_url('admin/employer-requests/update-status/' . $r['id']) ?>">
        <?= csrf_field() ?>
        <select name="status" onchange="this.form.submit()" class="form-select">
         <option <?= $r['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
         <option <?= $r['status'] === 'reviewed' ? 'selected' : '' ?>>Reviewed</option>
         <option <?= $r['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
         <option <?= $r['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
        </select>
       </form>
      </td>
      <td>
       <a href="<?= base_url('admin/employer-requests/delete/' . $r['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this request?')">Delete</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 <?php else: ?>
  <div class="row justify-content-center">
   No request submited yet.
  </div>
 <?php endif; ?>
</div>

<?= view('admin/layout/footer.php') ?>