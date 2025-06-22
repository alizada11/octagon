<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 mb-4 p-4">
 <div class="container mt-4">
  <h2 class="mb-4"><?= lang('Global.my_profile') ?></h2>

  <?= view('jobseeker/profile/partials/profile_table', ['profile' => $profile ?? []]) ?>
  <ul class="nav nav-tabs" id="profileTab" role="tablist">

   <li class="nav-item" role="presentation">
    <button class="nav-link active" id="passport-tab" data-bs-toggle="tab" data-bs-target="#passports" type="button" role="tab"><?= lang('Global.passport_info') ?></button>
   </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link " id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab"><?= lang('Global.education') ?></button>
   </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab"><?= lang('Dashboard.experiences') ?></button>
   </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link" id="languages-tab" data-bs-toggle="tab" data-bs-target="#languages" type="button" role="tab"><?= lang('Dashboard.language_skill') ?></button>
   </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab"><?= lang('Dashboard.skills') ?></button>
   </li>
  </ul>

  <div class="tab-content pt-3" id="profileTabContent">

   <!-- Education -->
   <div class="tab-pane fade  " id="education" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/education/') ?>" class="btn btn-sm btn-primary"><?= lang('Global.view_all') ?></a>
    </div>
    <?= view('jobseeker/profile/partials/education_table', ['educations' => $educations ?? []]) ?>
   </div>

   <!-- Experience -->
   <div class="tab-pane fade" id="experience" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/experience') ?>" class="btn btn-sm btn-primary"><?= lang('Global.view_all') ?></a>
    </div>
    <?= view('jobseeker/profile/partials/experience_table', ['experiences' => $experiences ?? []]) ?>
   </div>

   <!-- Languages -->
   <div class="tab-pane fade" id="languages" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/languages') ?>" class="btn btn-sm btn-primary"><?= lang('Global.view_all') ?></a>
    </div>
    <?= view('jobseeker/profile/partials/language_table', ['languages' => $languages ?? []]) ?>
   </div>

   <!-- Skills -->
   <div class="tab-pane fade" id="skills" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/skills') ?>" class="btn btn-sm btn-primary"><?= lang('Global.view_all') ?></a>
    </div>
    <?= view('jobseeker/profile/partials/skill_table', ['skills' => $skills ?? []]) ?>
   </div>
   <!-- Passport -->
   <div class="tab-pane fade active show" id="passports" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/passport') ?>" class="btn btn-sm btn-primary"><?= lang('Global.edit') ?> </a>
    </div>
    <?= view('jobseeker/profile/partials/passport_table', ['passports' => $passports ?? []]) ?>
   </div>

  </div>
 </div>
</div>
<?= view('jobseeker/layout/footer.php') ?>