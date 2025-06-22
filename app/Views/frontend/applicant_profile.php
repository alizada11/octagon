<?= $this->extend('frontend/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
 <h5 class="mb-4"><?= $profile['full_name'] ?? "Jobseeker profile" ?>'s Profile</h5>

 <div class="container mt-4">

  <div class="container  bg-white p-2 ">
   <h4 class="text-center  mb-4">
    APPLICATION FOR EMPLOYMENT<br>
    <small class="text-muted">استماره طلب عمل</small>
   </h4>

   <?php if (!empty($profile)): ?>
    <div class="row mb-4">
     <div class="col-md-4 d-flex flex-column align-items-center">
      <?php if (!empty($profile['photo'])): ?>
       <img src="<?= base_url('uploads/jobseekers/' . $profile['photo']) ?>" alt="Photo" class="img-thumbnail mb-2" style="width: 200px;">
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
        <td><?= esc($profile['full_name'] ?? 'N/A') ?></td>
        <th style="width: 40%;">الاسم</th>
       </tr>
       <tr>
        <th>Date of Birth</th>
        <td><?= esc($profile['dob'] ?? 'N/A') ?></td>
        <th>تاريخ الميلاد</th>
       </tr>

       <tr>
        <th>Phone</th>
        <td><?= esc($profile['phone'] ?? 'N/A') ?></td>
        <th>هاتف</th>
       </tr>
      </table>
     </div>
    </div>




   <?php else: ?>
    <div class="alert alert-info text-center">No profile found.</div>

   <?php endif; ?>
  </div>

 </div>
 <div class="">
  <h4>More Profile Info</h4>
  <!-- Education -->
  <?php if (!empty($profile)): ?>
   <div class="row mb-4">

    <div class="col-md-12">
     <table class="table table-bordered text-center">
      <tr>
       <th>Gender</th>
       <td><?= esc($profile['gender'] ?? 'N/A') ?></td>
       <th>جنس</th>
      </tr>
      <tr>
       <th>Marital Status</th>
       <td><?= esc($profile['marital_status'] ?? 'N/A') ?></td>
       <th>الحالة الاجتماعية</th>
      </tr>
      <tr>
       <th>Nationality</th>
       <td><?= esc($profile['nationality'] ?? 'N/A') ?></td>
       <th>جنسية</th>
      </tr>
      <tr>
       <th>Address</th>
       <td><?= esc($profile['address'] ?? 'N/A') ?></td>
       <th>عنوان</th>
      </tr>
      <tr>
       <th>Religion</th>
       <td><?= esc($profile['religion'] ?? 'N/A') ?></td>
       <th> دین</th>
      </tr>
      <tr>
       <th>No of Children</th>
       <td><?= esc($profile['no_of_children'] ?? 'N/A') ?></td>
       <th>عدد الأطفال</th>
      </tr>
      <tr>
       <th>Place of Birth</th>
       <td><?= esc($profile['place_of_birth'] ?? 'N/A') ?></td>
       <th> مكان الميلاد</th>
      </tr>
      <tr>
       <th>Living town</th>
       <td><?= esc($profile['living_town'] ?? 'N/A') ?></td>
       <th>مدينة حية</th>
      </tr>
      <tr>
       <th>Weight</th>
       <td><?= esc($profile['weight'] ?? 'N/A') ?></td>
       <th>وزن</th>
      </tr>
      <tr>
       <th>Height</th>
       <td><?= esc($profile['height'] ?? 'N/A') ?></td>
       <th>ارتفاع</th>
      </tr>
      <tr>
       <th>ژomplexion</th>
       <td><?= esc($profile['complexion'] ?? 'N/A') ?></td>
       <th>بشرة</th>
      </tr>
     </table>
    </div>
   </div>
  <?php endif; ?>
  <hr>
  <h4>Experiences</h4>
  <!-- Experience -->
  <?php if (!empty($experiences)): ?>
   <table class="table table-bordered ">
    <thead>
     <tr>
      <th>Company</th>
      <th>Job Title</th>
      <th>From</th>
      <th>To</th>
      <th>Description</th>
     </tr>
    </thead>
    <tbody>
     <?php foreach ($experiences as $item): ?>
      <tr>
       <td><?= esc($item['company_name']) ?></td>
       <td><?= esc($item['job_title']) ?></td>
       <td><?= esc($item['start_date']) ?></td>
       <td><?= esc($item['end_date']) ?></td>
       <td><?= esc($item['description']) ?></td>
      </tr>
     <?php endforeach; ?>
    </tbody>
   </table>
  <?php else: ?>
   <p>No experience entries found.</p>
  <?php endif; ?>
  <hr>
  <hr>
  <div class="">
   <h4>Education background</h4>
   <!-- Education -->
   <table class="table table-bordered">
    <thead>
     <tr>
      <th>Institution</th>
      <th>Degree</th>
      <th>Field of Study</th>
      <th>From</th>
      <th>To</th>
     </tr>
    </thead>
    <tbody>
     <?php foreach ($educations as $edu): ?>
      <tr>
       <td><?= esc($edu['institution']) ?></td>
       <td><?= esc($edu['degree']) ?></td>
       <td><?= esc($edu['field_of_study']) ?></td>
       <td><?= esc($edu['start_year']) ?></td>
       <td><?= esc($edu['end_year']) ?></td>

      </tr>
     <?php endforeach ?>
    </tbody>
   </table>
   <hr>
   <h4>Experiences</h4>
   <!-- Experience -->
   <?php if (!empty($experiences)): ?>
    <table class="table table-bordered ">
     <thead>
      <tr>
       <th>Company</th>
       <th>Job Title</th>
       <th>From</th>
       <th>To</th>
       <th>Description</th>
      </tr>
     </thead>
     <tbody>
      <?php foreach ($experiences as $item): ?>
       <tr>
        <td><?= esc($item['company_name']) ?></td>
        <td><?= esc($item['job_title']) ?></td>
        <td><?= esc($item['start_date']) ?></td>
        <td><?= esc($item['end_date']) ?></td>
        <td><?= esc($item['description']) ?></td>
       </tr>
      <?php endforeach; ?>
     </tbody>
    </table>
   <?php else: ?>
    <p>No experience entries found.</p>
   <?php endif; ?>
   <hr>
   <?php if (!empty($languages)): ?>
    <h4>Language</h4>
    <table class="table table-bordered ">
     <thead>
      <tr>
       <th>Language</th>
       <th>Proficiency</th>
      </tr>
     </thead>
     <tbody>
      <?php foreach ($languages as $item): ?>
       <tr>
        <td><?= esc($item['language']) ?></td>
        <td><?= esc($item['proficiency']) ?></td>
       </tr>
      <?php endforeach; ?>
     </tbody>
    </table>
   <?php else: ?>
    <p>No language entries found.</p>
   <?php endif; ?>

   <!-- Skills -->
   <hr>
   <h4>Skills</h4>
   <?php if (!empty($skills)): ?>
    <table class="table table-bordered ">
     <thead>
      <tr>
       <th>Skill</th>
       <th>Level</th>
      </tr>
     </thead>
     <tbody>
      <?php foreach ($skills as $item): ?>
       <tr>
        <td><?= esc($item['skill_name']) ?></td>
        <td><?= esc($item['level']) ?></td>
       </tr>
      <?php endforeach; ?>
     </tbody>
    </table>
   <?php else: ?>
    <p>No skill entries found.</p>
   <?php endif; ?>
   <hr>
   <h4>Passport Informations</h4>
   <!-- Passport -->

   <?php if (!empty($passports)): ?>
    <table class="table table-bordered ">
     <thead>
      <tr>
       <th>Passport Number</th>
       <th>PLace of Issue</th>
       <th>Date of Issue</th>
       <th>Date of Expiry</th>
      </tr>
     </thead>
     <tbody>
      <?php foreach ($passports as $item): ?>
       <tr>
        <td><?= esc($item['number']) ?></td>
        <td><?= esc($item['place_of_issue']) ?></td>
        <td><?= esc($item['date_of_issue']) ?></td>
        <td><?= esc($item['date_of_expiry']) ?></td>
       </tr>
      <?php endforeach; ?>
     </tbody>
    </table>
   <?php else: ?>
    <p>No Passport info found.</p>
   <?php endif; ?>

  </div>
 </div>
</div>



<?= $this->endSection() ?>