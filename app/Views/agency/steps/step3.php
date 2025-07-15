<?= view('agency/layout/header.php') ?>
<?= view('agency/layout/sidebar.php') ?>
<div class="col-md-10 mb-4">
 <div class="container ">
  <div class="card shadow-lg border-0 rounded-4">
   <div class="card-body">
    <h2 class="mb-4 text-primary">Step 3: Legal & Compliance</h2>
    <form action="<?= site_url('agency/step3') ?>" method="post" enctype="multipart/form-data">
     <a href="<?= base_url('uploads/agencies/' . $agency['license_file']); ?>" target="_blank">
      <img style="height: 120px; width:120px; object-fit:contain;" src="<?= base_url('uploads/agencies/' . $agency['license_file']); ?>" alt="License File">
     </a>
     <div class="mb-4">
      <label for="license_file" class="form-label">Upload Business License Document (PDF/Image)</label>
      <input type="file" class="form-control" name="license_file" id="license_file" accept=".pdf,.jpg,.jpeg,.png" required>
     </div>
     <div class="d-flex justify-content-between">
      <a href="<?= site_url('agency/step2') ?>" class="btn btn-secondary">Back</a>
      <button type="submit" class="btn btn-success px-4">Submit</button>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
<?= view('agency/layout/footer.php') ?>