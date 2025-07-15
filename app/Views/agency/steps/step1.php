<?= view('agency/layout/header.php') ?>
<?= view('agency/layout/sidebar.php') ?>

<div class="col-md-10 mb-4">
 <div class="container ">
  <div class="card shadow-lg border-0 rounded-4">
   <div class="card-body">
    <h2 class="mb-4 text-primary">Step 1: Core Agency Information</h2>
    <form action="<?= site_url('agency/step1') ?>" method="post">
     <div class="row g-3">
      <div class="col-md-6">
       <label for="name" class="form-label">Agency Name</label>
       <input type="text" class="form-control" name="name" id="name" required>
      </div>
      <div class="col-md-6">
       <label for="license_number" class="form-label">License Number</label>
       <input type="text" class="form-control" name="license_number" id="license_number" required>
      </div>
      <div class="col-md-6">
       <label for="license_expiry" class="form-label">License Expiry Date</label>
       <input type="date" class="form-control" name="license_expiry" id="license_expiry" required>
      </div>
      <div class="col-md-6">
       <label for="country_id" class="form-label">Country</label>
       <select name="country_id" id="country_id" class="form-select" required>
        <option value="">Select Country</option>
        <?php foreach ($countries as $country): ?>
         <option value="<?= $country['id'] ?>"><?= esc($country['country_name_en']) ?></option>
        <?php endforeach; ?>
       </select>
      </div>
      <div class="col-md-6">
       <label for="city" class="form-label">City</label>
       <input type="text" class="form-control" name="city" id="city" required>
      </div>
      <div class="col-md-6">
       <label for="address" class="form-label">Address</label>
       <input type="text" class="form-control" name="address" id="address" required>
      </div>
      <div class="col-md-6">
       <label for="phone" class="form-label">Phone</label>
       <input type="text" class="form-control" name="phone" id="phone" required>
      </div>
      <div class="col-md-6">
       <label for="email" class="form-label">Email</label>
       <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="col-md-6">
       <label for="website" class="form-label">Website</label>
       <input type="url" class="form-control" name="website" id="website">
      </div>
     </div>
     <div class="mt-4 d-flex justify-content-end">
      <button type="submit" class="btn btn-primary px-4">Next</button>
     </div>
    </form>
   </div>
  </div>
 </div>
 <?= view('agency/layout/footer.php') ?>