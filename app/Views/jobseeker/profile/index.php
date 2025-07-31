<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 mb-4 p-4">
 <div class="container mt-4">
  <!-- Header Section with Profile Completion Indicator -->
  <div class="d-flex justify-content-between align-items-center mb-4">
   <div>
    <h2 class="mb-1"><?= lang('Global.my_profile') ?></h2>
    <p class="text-muted"><?= lang('Global.manage_your_profile_information') ?></p>
   </div>
   <?php
   // Set progress bar class based on score
   $barClass = 'bg-danger';
   if ($completion_score >= 80) {
    $barClass = 'bg-success';
   } elseif ($completion_score >= 50) {
    $barClass = 'bg-warning';
   }
   ?>

   <div class="profile-completion">
    <div class="progress" style="height: 8px; width: 150px;">
     <div class="progress-bar <?= $barClass ?>" role="progressbar"
      style="width: <?= $completion_score ?>%;"
      aria-valuenow="<?= $completion_score ?>" aria-valuemin="0" aria-valuemax="100">
     </div>
    </div>
    <small class="text-muted"><?= $completion_score ?><?= lang('Global.profile_compelete') ?></small>
   </div>


  </div>

  <!-- Main Profile Card -->
  <div class="card shadow-sm mb-4">
   <div class="card-body">
    <?= view('jobseeker/profile/partials/profile_table', ['profile' => $profile ?? []]) ?>
   </div>
  </div>

  <!-- Profile Sections Tabs -->
  <div class="card shadow-sm">
   <div class="card-header bg-white border-bottom-0">
    <ul class="nav nav-tabs card-header-tabs" id="profileTab" role="tablist">
     <li class="nav-item" role="presentation">
      <button class="nav-link active d-flex align-items-center" id="passport-tab" data-bs-toggle="tab" data-bs-target="#passports" type="button" role="tab">
       <i class="bi bi-passport me-2"></i><?= lang('Global.passport_info') ?>
      </button>
     </li>
     <li class="nav-item" role="presentation">
      <button class="nav-link d-flex align-items-center" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">
       <i class="bi bi-mortarboard me-2"></i><?= lang('Global.education') ?>
      </button>
     </li>
     <li class="nav-item" role="presentation">
      <button class="nav-link d-flex align-items-center" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab">
       <i class="bi bi-briefcase me-2"></i><?= lang('Dashboard.experiences') ?>
      </button>
     </li>
     <li class="nav-item" role="presentation">
      <button class="nav-link d-flex align-items-center" id="languages-tab" data-bs-toggle="tab" data-bs-target="#languages" type="button" role="tab">
       <i class="bi bi-translate me-2"></i><?= lang('Dashboard.language_skill') ?>
      </button>
     </li>
     <li class="nav-item" role="presentation">
      <button class="nav-link d-flex align-items-center" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab">
       <i class="bi bi-tools me-2"></i><?= lang('Dashboard.skills') ?>
      </button>
     </li>
    </ul>
   </div>

   <div class="card-body pt-4">
    <div class="tab-content" id="profileTabContent">
     <!-- Passport -->
     <div class="tab-pane fade active show" id="passports" role="tabpanel">
      <div class="d-flex justify-content-between align-items-center mb-3">
       <h5 class="card-title mb-0"><?= lang('Global.passport_info') ?></h5>
       <a href="<?= site_url('jobseeker/profile/passport') ?>" class="btn btn-sm btn-primary">
        <i class="bi bi-pencil-square me-1"></i><?= lang('Global.edit') ?>
       </a>
      </div>
      <?= view('jobseeker/profile/partials/passport_table', ['passports' => $passports ?? []]) ?>
     </div>

     <!-- Education -->
     <div class="tab-pane fade" id="education" role="tabpanel">
      <div class="d-flex justify-content-between align-items-center mb-3">
       <h5 class="card-title mb-0"><?= lang('Global.education') ?></h5>
       <a href="<?= site_url('jobseeker/profile/education/') ?>" class="btn btn-sm btn-primary">
        <i class="bi bi-eye me-1"></i><?= lang('Global.view_all') ?>
       </a>
      </div>
      <?= view('jobseeker/profile/partials/education_table', ['educations' => $educations ?? []]) ?>
     </div>

     <!-- Experience -->
     <div class="tab-pane fade" id="experience" role="tabpanel">
      <div class="d-flex justify-content-between align-items-center mb-3">
       <h5 class="card-title mb-0"><?= lang('Dashboard.experiences') ?></h5>
       <a href="<?= site_url('jobseeker/profile/experience') ?>" class="btn btn-sm btn-primary">
        <i class="bi bi-eye me-1"></i><?= lang('Global.view_all') ?>
       </a>
      </div>
      <?= view('jobseeker/profile/partials/experience_table', ['experiences' => $experiences ?? []]) ?>
     </div>

     <!-- Languages -->
     <div class="tab-pane fade" id="languages" role="tabpanel">
      <div class="d-flex justify-content-between align-items-center mb-3">
       <h5 class="card-title mb-0"><?= lang('Dashboard.language_skill') ?></h5>
       <a href="<?= site_url('jobseeker/profile/languages') ?>" class="btn btn-sm btn-primary">
        <i class="bi bi-eye me-1"></i><?= lang('Global.view_all') ?>
       </a>
      </div>
      <?= view('jobseeker/profile/partials/language_table', ['languages' => $languages ?? []]) ?>
     </div>

     <!-- Skills -->
     <div class="tab-pane fade" id="skills" role="tabpanel">
      <div class="d-flex justify-content-between align-items-center mb-3">
       <h5 class="card-title mb-0"><?= lang('Dashboard.skills') ?></h5>
       <a href="<?= site_url('jobseeker/profile/skills') ?>" class="btn btn-sm btn-primary">
        <i class="bi bi-eye me-1"></i><?= lang('Global.view_all') ?>
       </a>
      </div>
      <?= view('jobseeker/profile/partials/skill_table', ['skills' => $skills ?? []]) ?>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>

<?= view('jobseeker/layout/footer.php') ?>