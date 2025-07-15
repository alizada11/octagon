<?= view('agency/layout/header.php') ?>
<?= view('agency/layout/sidebar.php') ?>
<div class="col-md-10 mb-4">
 <div class="container ">
  <div class="card shadow-lg border-0 rounded-4">
   <div class="card-body">
    <h2 class="mb-4 text-primary">Step 2: Representative Information</h2>
    <form action="<?= site_url('agency/step2') ?>" method="post">
     <div class="row g-3">
      <div class="col-md-6">
       <label for="representative_name" class="form-label">Name</label>
       <input type="text" class="form-control" name="representative_name" id="representative_name" required>
      </div>
      <div class="col-md-6">
       <label for="representative_designation" class="form-label">Designation</label>
       <input type="text" class="form-control" name="representative_designation" id="representative_designation" required>
      </div>
      <div class="col-md-6">
       <label for="representative_phone" class="form-label">Phone</label>
       <input type="text" class="form-control" name="representative_phone" id="representative_phone" required>
      </div>
      <div class="col-md-6">
       <label for="representative_email" class="form-label">Email</label>
       <input type="email" class="form-control" name="representative_email" id="representative_email" required>
      </div>
     </div>
     <div class="mt-4 d-flex justify-content-between">
      <a href="<?= site_url('agency/step1') ?>" class="btn btn-secondary">Back</a>
      <button type="submit" class="btn btn-primary px-4">Next</button>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
<?= view('agency/layout/footer.php') ?>