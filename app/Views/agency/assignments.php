<?php include('layout/header.php') ?>
<?php include('layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <h3 class="mb-4 "> Assignment Request to be Processed</h3>
 <?php if (!empty($assignments)): ?>
  <div class="table-responsive">
   <table class="table table-hover table-bordered">
    <thead class="table-light">
     <tr>
      <th width="5%">ID</th>
      <th width="20%">Employer</th>
      <th width="20%">Service</th>
      <th width="25%">Jobseeker</th>
      <th width="15%">Status</th>
     </tr>
    </thead>
    <tbody>
     <?php foreach ($assignments as $r): ?>
      <tr>
       <td><?= $r['id'] ?></td>
       <?php if (!empty($r['employer_id'])): ?>
        <td>
         <a href="<?= site_url('jobseeker/profile/' . $r['employer_id']) ?>" class="text-decoration-none">
          <div class="d-flex align-items-center">

           <span class="fw-semibold"><?= esc(user_full_name($r['employer_id'])) ?></span>
          </div>
         </a>
        </td>
       <?php else: ?>
        <td class="text-muted">N/A</td>
       <?php endif; ?>

       <td>
        <span><?= esc(interested_title($r['service_id'])); ?></span>
       </td>
       <td>
        <?php if (!empty(user_full_name($r['jobseeker_id']))): ?>
         <div class="d-flex align-items-center justify-content-between">
          <a href="<?= site_url('jobseeker/profile/' . $r['jobseeker_id']) ?>" class="text-decoration-none me-2">
           <?= user_full_name($r['jobseeker_id']); ?>
          </a>
         </div>

        <?php else: ?>
         <span class="text-muted">N/A</span>
        <?php endif; ?>
       </td>
       <td>
        <form method="post" action="<?= base_url('agency/employer-requests/update-status/' . $r['id']) ?>">
         <?= csrf_field() ?>
         <select name="status" onchange="this.form.submit()" class="form-select form-select-sm status-select" data-id="<?= $r['id'] ?>">
          <option value="1" <?= $r['agency_approval'] == null ? 'selected' : '' ?>>Pending</option>
          <option value="1" <?= $r['agency_approval'] === '1' ? 'selected' : '' ?>>Approved</option>
          <option value="0" <?= $r['agency_approval'] === '0' ? 'selected' : '' ?>>Rejected</option>
         </select>
        </form>

       </td>
      </tr>
      <!-- Modal -->

     <?php endforeach; ?>
    </tbody>
   </table>
  </div>

  <!-- Pagination -->

 <?php else: ?>
  <div class="text-center py-5">
   <div class="mb-3">
    <i class="fas fa-inbox fa-3x text-muted"></i>
   </div>
   <h5 class="text-muted">No requests submitted yet</h5>
   <p class="text-muted">When employers make requests, they will appear here</p>
  </div>
 <?php endif; ?>
</div>
</div>

<?php include('layout/footer.php') ?>