<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="mb-0">Employer Requests Management</h4>

 </div>

 <?php if (!empty($requests)): ?>
  <div class="table-responsive">
   <table class="table table-hover table-bordered">
    <thead class="table-light">
     <tr>
      <th width="5%">ID</th>
      <th width="20%">Employer</th>
      <th width="20%">Service</th>
      <th width="25%">Jobseeker</th>
      <th width="15%">Agency approval</th>
      <th width="15%">Status</th>
      <th width="15%">Actions</th>
     </tr>
    </thead>
    <tbody>
     <?php foreach ($requests as $r): ?>
      <tr>
       <td><?= $r['id'] ?></td>
       <?php if (!empty($r['applicant_name'])): ?>
        <td>
         <a href="<?= site_url('admin/jobseeker/profile/' . $r['employer_id']) ?>" class="text-decoration-none">
          <div class="d-flex align-items-center">
           <div class="avatar-sm me-2 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
            <?= substr($r['applicant_name'], 0, 1) ?>
           </div>
           <span class="fw-semibold"><?= esc($r['applicant_name']) ?></span>
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
          <a href="<?= site_url('admin/jobseeker/profile/' . $r['jobseeker_id']) ?>" class="text-decoration-none me-2">
           <?= user_full_name($r['jobseeker_id']); ?>
          </a>
          <?php if (!$r['agency_id']): ?>
           <!-- Assign Button triggers modal -->
           <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#assignModal<?= $r['id'] ?>">
            Assign Agency
           </button>
          <?php else: ?>
           <span class="text-success">Assigned(<small><a href="<?= base_url('/admin/agencies/edit/' . $r['agency_id']) ?>"><?= agency_name($r['agency_id']) ?></a></small>)</span>
          <?php endif; ?>
         </div>
        <?php else: ?>
         <span class="text-muted">N/A</span>
        <?php endif; ?>
       </td>
       <td><?= $r['agency_approval'] == null ? 'Pending' : '' ?>
        <?= $r['agency_approval'] === '1' ? '<span class="text-success">Approved</span>' : '' ?>
        <?= $r['agency_approval'] === '0' ? '<span class="text-danger">Rejected</span>' : '' ?>
       </td>
       <td>
        <form method="post" action="<?= base_url('admin/employer-requests/update-status/' . $r['id']) ?>">
         <?= csrf_field() ?>
         <select name="status" onchange="this.form.submit()" class="form-select form-select-sm status-select" data-id="<?= $r['id'] ?>">
          <option value="pending" <?= $r['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
          <option value="reviewed" <?= $r['status'] === 'reviewed' ? 'selected' : '' ?>>Reviewed</option>
          <option value="approved" <?= $r['status'] === 'approved' ? 'selected' : '' ?>>Approved</option>
          <option value="rejected" <?= $r['status'] === 'rejected' ? 'selected' : '' ?>>Rejected</option>
         </select>
        </form>
       </td>
       <td>
        <div class="d-flex">
         <a href="<?= base_url('admin/employer-requests/delete/' . $r['id']) ?>"
          class="btn btn-danger me-2"
          onclick="return confirm('Are you sure you want to delete this request?')">
          Delete
         </a>

        </div>
       </td>
      </tr>
      <!-- Modal -->
      <div class="modal fade" id="assignModal<?= $r['id'] ?>" tabindex="-1" aria-hidden="true">
       <div class="modal-dialog">
        <form method="post" action="<?= site_url('admin/employer-request/assign-agency') ?>">
         <input type="hidden" name="request_id" value="<?= $r['id'] ?>">
         <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title">Assign Agency</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
           <div class="mb-3">
            <label>Select Agency</label>
            <select name="agency_id" class="form-select agency-select" required>

             <option value="">-- Select Agency --</option>
             <?php foreach ($agencies as $a): ?>
              <option value="<?= $a['id'] ?>"><?= esc($a['name']) ?> (<?= esc(country_name($a['country_id'])) ?>)</option>
             <?php endforeach; ?>
            </select>
           </div>
          </div>
          <div class="modal-footer">
           <button class="btn btn-success" type="submit">Assign</button>
          </div>
         </div>
        </form>
       </div>
      </div>
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

<?= view('admin/layout/footer.php') ?>

<!-- Add this to your CSS or in a style tag -->
<style>
 .avatar-sm {
  width: 30px;
  height: 30px;
  font-size: 14px;
 }

 .status-select {
  cursor: pointer;
  transition: all 0.3s;
 }

 .status-select:hover {
  box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.25);
 }

 .status-select option[value="pending"] {
  background-color: #fff3cd;
 }

 .status-select option[value="reviewed"] {
  background-color: #cfe2ff;
 }

 .status-select option[value="approved"] {
  background-color: #d1e7dd;
 }

 .status-select option[value="rejected"] {
  background-color: #f8d7da;
 }

 .table-hover tbody tr:hover {
  background-color: #f8f9fa;
 }

 .badge {
  padding: 0.35em 0.65em;
  font-size: 0.75em;
  font-weight: 500;
 }
</style>

<!-- Add this JavaScript for enhanced functionality -->
<script>
 document.addEventListener('DOMContentLoaded', function() {
  // Search functionality
  const searchInput = document.getElementById('searchInput');
  if (searchInput) {
   searchInput.addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
     const text = row.textContent.toLowerCase();
     row.style.display = text.includes(filter) ? '' : 'none';
    });
   });
  }

  // Status change visual feedback
  const statusSelects = document.querySelectorAll('.status-select');
  statusSelects.forEach(select => {
   select.addEventListener('change', function() {
    const form = this.closest('form');
    const originalValue = this.dataset.original;

    // Add visual feedback
    this.style.backgroundColor = this.value === 'approved' ? '#d1e7dd' :
     this.value === 'rejected' ? '#f8d7da' :
     this.value === 'reviewed' ? '#cfe2ff' : '#fff3cd';

    // You could add an AJAX call here instead of form submission
    // form.submit();
   });

   // Set initial color based on value
   const initialColor = select.value === 'approved' ? '#d1e7dd' :
    select.value === 'rejected' ? '#f8d7da' :
    select.value === 'reviewed' ? '#cfe2ff' : '#fff3cd';
   select.style.backgroundColor = initialColor;
  });
 });
</script>