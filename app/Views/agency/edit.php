<?= view('agency/layout/header.php') ?>
<?= view('agency/layout/sidebar.php') ?>

<div class="col-md-10 mb-4 p-4">
 <div class="container">
  <div class="card shadow-sm rounded-4">
   <div class="card-body">
    <h2 class="mb-4 text-primary">Agency Profile</h2>

    <?php if (session()->getFlashdata('success')): ?>
     <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <ul class="nav nav-tabs mb-4" id="agencyTab" role="tablist">
     <li class="nav-item" role="presentation">
      <button class="nav-link active" id="core-tab" data-bs-toggle="tab" data-bs-target="#core" type="button" role="tab">Core Info</button>
     </li>
     <li class="nav-item" role="presentation">
      <button class="nav-link" id="rep-tab" data-bs-toggle="tab" data-bs-target="#rep" type="button" role="tab">Representative</button>
     </li>
     <li class="nav-item" role="presentation">
      <button class="nav-link" id="legal-tab" data-bs-toggle="tab" data-bs-target="#legal" type="button" role="tab">Legal Docs</button>
     </li>
    </ul>

    <div class="tab-content" id="agencyTabContent">
     <!-- Core Info Tab -->
     <div class="tab-pane fade show active" id="core" role="tabpanel">
      <form action="<?= site_url('agency/updateStep1') ?>" method="post">
       <div class="row g-3">
        <div class="col-md-6">
         <label class="form-label">Agency Name</label>
         <input type="text" class="form-control" name="name" value="<?= esc($agency['name'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">License Number</label>
         <input type="text" class="form-control" name="license_number" value="<?= esc($agency['license_number'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">License Expiry</label>
         <input type="date" class="form-control" name="license_expiry" value="<?= esc($agency['license_expiry'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">Country</label>
         <select name="country_id" class="form-select">
          <?php foreach ($countries as $country): ?>
           <option value="<?= $country['id'] ?>" <?= $agency['country_id'] == $country['id'] ? 'selected' : '' ?>>
            <?= esc($country['country_name_' . session('lang')]) ?>

           </option>
          <?php endforeach; ?>
         </select>
        </div>
        <div class="col-md-6">
         <label class="form-label">City</label>
         <input type="text" class="form-control" name="city" value="<?= esc($agency['city'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">Address</label>
         <input type="text" class="form-control" name="address" value="<?= esc($agency['address'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">Phone</label>
         <input type="text" class="form-control" name="phone" value="<?= esc($agency['phone'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">Email</label>
         <input type="email" class="form-control" name="email" value="<?= esc($agency['email'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">Website</label>
         <input type="url" class="form-control" name="website" value="<?= esc($agency['website'] ?? '') ?>">
        </div>
       </div>
       <div class="mt-4">
        <button class="btn btn-primary">Update Core Info</button>
       </div>
      </form>
     </div>

     <!-- Representative Tab -->
     <div class="tab-pane fade" id="rep" role="tabpanel">
      <form action="<?= site_url('agency/updateStep2') ?>" method="post">
       <div class="row g-3">
        <div class="col-md-6">
         <label class="form-label">Representative Name</label>
         <input type="text" class="form-control" name="representative_name" value="<?= esc($agency['representative_name'] ?? '') ?>">
        </div>
        <div class="col-md-6">
         <label class="form-label">Representative Phone</label>
         <input type="text" class="form-control" name="representative_phone" value="<?= esc($agency['representative_phone'] ?? '') ?>">
        </div>

       </div>
       <div class="mt-4">
        <button class="btn btn-primary">Update Representative</button>
       </div>
      </form>
     </div>

     <!-- Legal Documents Tab -->
     <div class="tab-pane fade" id="legal" role="tabpanel">
      <form action="<?= site_url('agency/updateStep3') ?>" method="post" enctype="multipart/form-data">
       <div class="row g-3">
        <a href="<?= base_url('uploads/agencies/' . $agency['license_file']); ?>" target="_blank">
         <img style="height: 120px; width:120px; object-fit:contain;" src="<?= base_url('uploads/agencies/' . $agency['license_file']); ?>" alt="License File">
        </a>
        <div class="col-md-4">
         <label class="form-label">Registration Certificate</label>
         <input type="file" class="form-control" name="license_file">
        </div>

       </div>
       <div class="mt-4">
        <button class="btn btn-primary">Upload Documents</button>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
 <?= view('agency/layout/footer.php') ?>