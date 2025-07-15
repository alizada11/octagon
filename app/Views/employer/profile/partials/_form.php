<?php
$profile = $profile ?? null;
?>

<div class="row g-3 mb-3">
 <div class="col-md-6">
  <label for="full_name" class="form-label">Full Name</label>
  <input type="text" name="full_name" class="form-control" value="<?= old('full_name', $profile['full_name'] ?? '') ?>" required>
 </div>

 <div class="col-md-6">
  <?php if (account_type() == 'agency') { ?>
   <label for="dob" class="form-label">Registeration Date</label>
  <?php } else { ?><label for="dob" class="form-label">Date of Birth</label>
  <?php } ?>
  <input type="date" name="dob" class="form-control" value="<?= old('dob', $profile['dob'] ?? '') ?>" required>
 </div>
 <?php if (account_type() != 'agency') { ?>
  <div class="col-md-6">
   <label for="gender" class="form-label">Gender</label>
   <select name="gender" class="form-control" required>
    <option value="">--Select--</option>
    <option value="male" <?= old('gender', $profile['gender'] ?? '') === 'male' ? 'selected' : '' ?>>Male</option>
    <option value="female" <?= old('gender', $profile['gender'] ?? '') === 'female' ? 'selected' : '' ?>>Female</option>
   </select>
  </div>

  <div class="col-md-6">
   <label for="marital_status" class="form-label">Marital Status</label>
   <select name="marital_status" class="form-control" required>
    <option value="">--Select--</option>
    <option value="single" <?= old('marital_status', $profile['marital_status'] ?? '') === 'single' ? 'selected' : '' ?>>Single</option>
    <option value="married" <?= old('marital_status', $profile['marital_status'] ?? '') === 'married' ? 'selected' : '' ?>>Married</option>
    <option value="divorced" <?= old('marital_status', $profile['marital_status'] ?? '') === 'divorced)' ? 'selected' : '' ?>>Divorced</option>
   </select>
  </div>

  <div class="col-md-6">
   <label for="nationality" class="form-label">Nationality</label>

   <?php $nationalities =  include dirname(__DIR__, 3) . '/partials/nationalities.php';
   $selectedNationality = $profile['nationality'] ?? '';
   ?>

   <select name="nationality" class="form-select">
    <option value="">Select your nationality</option>
    <?php foreach ($nationalities as $nat): ?>
     <option value="<?= esc($nat) ?>" <?= $nat === $selectedNationality ? 'selected' : '' ?>>
      <?= esc($nat) ?>
     </option>
    <?php endforeach; ?>
   </select>

  </div>
 <?php } ?>
 <div class="col-md-6">
  <label for="address" class="form-label">Address</label>
  <input type="text" name="address" class="form-control" value="<?= old('address', $profile['address'] ?? '') ?>">
 </div>

 <div class="col-md-6">
  <label for="phone" class="form-label">Phone</label>
  <input type="text" name="phone" class="form-control" value="<?= old('phone', $profile['phone'] ?? '') ?>">
 </div>
 <?php if ($profile['nationality'] == 'Omani' && role_type() == 'employer'): ?>
  <div class="col-md-6">
   <div class="form-group">
    <label for="id_cart_number" class="form-label">ID Number</label>
    <input type="text" name="id_cart_number" class="form-control" value="<?= esc($profile['id_cart_number']) ?>">
   </div>
  </div>
  <div class="col-md-6">
   <div class="form-group">
    <label for="id_cart_front" class="form-label">Upload ID Front</label>
    <input type="file" name="id_cart_front" class="form-control">
    <?php if (!empty($profile['id_cart_front'])): ?>
     <img src="<?= base_url('uploads/documents/' . $profile['id_cart_front']) ?>" class="img-thumbnail mt-2" width="100">
    <?php endif; ?>
   </div>
  </div>
  <div class="col-md-6">

   <div class="form-group">
    <label for="id_cart_back" class="form-label">Upload ID Back</label>
    <input type="file" name="id_cart_back" class="form-control">
    <?php if (!empty($profile['id_cart_back'])): ?>
     <img src="<?= base_url('uploads/documents/' . $profile['id_cart_back']) ?>" class="img-thumbnail mt-2" width="90">
    <?php endif; ?>
   </div>
  </div>
 <?php endif; ?>
 <div class="col-md-6">
  <?php if (account_type() != 'agency') { ?>
   <label for="photo" class="form-label">Photo</label>
  <?php } else { ?>
   <label for="photo" class="form-label">Registeration Document</label>
  <?php } ?>
  <input type="file" name="photo" class="form-control">
  <?php if (!empty($profile['photo'])): ?>
   <img src="<?= base_url('uploads/employers/' . $profile['photo']) ?>" class="img-thumbnail mt-2" width="100">
  <?php endif ?>
 </div>

 <div class="col-md-6">
  <?php if (account_type() != 'agency') { ?>
   <label for="photo" class="form-label">CV File</label>
  <?php } else { ?>
   <label for="photo" class="form-label">Registeration Cerfiticate</label>
  <?php } ?>
  <div class="d-flex">
   <input type="file" name="cv_file" class="form-control">
   <?php if (!empty($profile['cv_file'])): ?>
    <a href="<?= base_url('uploads/cvs/' . $profile['cv_file']) ?>" class="btn btn-sm btn-info mt-2" target="_blank">View </a>
   <?php endif ?>
  </div>
 </div>
</div>