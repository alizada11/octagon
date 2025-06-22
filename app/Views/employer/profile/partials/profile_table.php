<div class="container mt-4">

 <div class="container  bg-white p-2 ">
  <h4 class="text-center fw-bold mb-4">
   APPLICATION FOR EMPLOYMENT<br>
   <small class="text-muted">استماره طلب عمل</small>
  </h4>

  <?php if (!empty($profile)): ?>
   <div class="row mb-4">
    <div class="col-md-4 d-flex flex-column align-items-center">
     <?php if (!empty($profile['photo'])): ?>
      <img src="<?= base_url('uploads/employers/' . $profile['photo']) ?>" alt="Photo" class="img-thumbnail mb-2" style="width: 200px;">
     <?php else: ?>
      <div class="bg-light border p-5">No Photo</div>
     <?php endif; ?>

     <?php if (!empty($profile['cv_file'])): ?>
      <a style="width: fit-content;" href="<?= base_url('uploads/cvs/' . $profile['cv_file']) ?>" target="_blank" class="btn btn-outline-primary btn-sm mt-2">View CV</a>
     <?php endif; ?>
    </div>
    <div class="col-md-8">
     <table class="table table-bordered text-center">
      <tr>
       <th style="width: 40%;">Full Name</th>
       <td><?= esc($profile['full_name']) ?></td>
       <th style="width: 40%;">الاسم</th>
      </tr>
      <tr>
       <th>Date of Birth</th>
       <td><?= esc($profile['dob']) ?></td>
       <th>تاريخ الميلاد</th>
      </tr>
      <tr>
       <th>Gender</th>
       <td><?= esc($profile['gender']) ?></td>
       <th>جنس</th>
      </tr>
      <tr>
       <th>Marital Status</th>
       <td><?= esc($profile['marital_status']) ?></td>
       <th>الحالة الاجتماعية</th>
      </tr>
      <tr>
       <th>Nationality</th>
       <td><?= esc($profile['nationality']) ?></td>
       <th>جنسية</th>
      </tr>
      <tr>
       <th>Address</th>
       <td><?= esc($profile['address']) ?></td>
       <th>عنوان</th>
      </tr>
      <tr>
       <th>Phone</th>
       <td><?= esc($profile['phone']) ?></td>
       <th>هاتف</th>
      </tr>
     </table>
    </div>
   </div>



   <div class="text-center mt-4">
    <a href="<?= site_url('employer/profile/edit/' . $profile['id']) ?>" class="btn btn-primary px-5">Edit Profile</a>
   </div>

  <?php else: ?>
   <div class="alert alert-info text-center">No profile found.</div>
   <div class="text-center mt-3">
    <a href="<?= site_url('employer/profile/create') ?>" class="btn btn-success px-4">Create Profile</a>
   </div>
  <?php endif; ?>
 </div>

</div>