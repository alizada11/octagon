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
      <img src="<?= base_url('uploads/jobseekers/' . $profile['photo']) ?>" alt="Photo" class="img-thumbnail mb-2" style="width: 200px;">
     <?php else: ?>
      <div class="bg-light border p-5"><?= lang('Global.no_photo') ?></div>
     <?php endif; ?>

     <?php if (!empty($profile['cv_file'])): ?>
      <a style="width: fit-content;" href="<?= base_url('uploads/cvs/' . $profile['cv_file']) ?>" target="_blank" class="btn btn-outline-primary btn-sm mt-2"><?= lang('Global.view_cv') ?></a>
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
       <td><?= lang('Nationalitites.' . $profile['nationality']) ?></td>
       <th>جنسية</th>
      </tr>
      <tr>
       <th>Address</th>
       <td><?= esc($profile['address']) ?></td>
       <th>عنوان</th>
      </tr>
      <tr>
       <th>Phone</th>
       <td><?= esc($profile['country_code']) ?>&nbsp;<?= esc($profile['phone']) ?></td>
       <th>هاتف</th>
      </tr>
      <tr>
       <th>Religion</th>
       <td><?= lang('Religions.' . $profile['religion']) ?></td>
       <th> دین</th>
      </tr>
      <tr>
       <th>No of Children</th>
       <td><?= esc($profile['no_of_children']) ?></td>
       <th>عدد الأطفال</th>
      </tr>
      <tr>
       <th>Place of Birth</th>
       <td><?= esc($profile['place_of_birth']) ?></td>
       <th> مكان الميلاد</th>
      </tr>
      <tr>
       <th>Living town</th>
       <td><?= esc($profile['living_town']) ?></td>
       <th>مدينة حية</th>
      </tr>
      <tr>
       <th>Weight</th>
       <td><?= esc($profile['weight']) ?></td>
       <th>وزن</th>
      </tr>
      <tr>
       <th>Height</th>
       <td><?= esc($profile['height']) ?></td>
       <th>ارتفاع</th>
      </tr>
      <tr>
       <th>Complexion</th>
       <td><?= esc($profile['complexion']) ?></td>
       <th>بشرة</th>
      </tr>
     </table>
    </div>
   </div>



   <div class="text-center mt-4">
    <a href="<?= site_url('jobseeker/profile/edit/' . $profile['id']) ?>" class="btn btn-primary px-5"><?= lang('Global.edit_profile') ?></a>
   </div>

  <?php else: ?>
   <div class="alert alert-info text-center"><?= lang('Global.no_profile_found') ?></div>
   <div class="text-center mt-3">
    <a href="<?= site_url('jobseeker/profile/create') ?>" class="btn btn-success px-4"><?= lang('Global.create_profile') ?></a>
   </div>
  <?php endif; ?>
 </div>

</div>