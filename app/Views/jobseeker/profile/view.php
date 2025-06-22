<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h2 class="mb-4">My Profilesssssss</h2>

  <ul class="nav nav-tabs" id="profileTab" role="tablist">
   <li class="nav-item" role="presentation">
    <button class="nav-link active" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab">Education</button>
   </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab">Experience</button>
   </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link" id="languages-tab" data-bs-toggle="tab" data-bs-target="#languages" type="button" role="tab">Languages</button>
   </li>
   <li class="nav-item" role="presentation">
    <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab">Skills</button>
   </li>
  </ul>

  <div class="tab-content pt-3" id="profileTabContent">

   <!-- Education -->
   <div class="tab-pane fade show active" id="education" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/education/create') ?>" class="btn btn-sm btn-primary">Add Education</a>
    </div>
    <?= view('jobseeker/profile/partials/education_table', ['educations' => $educations ?? []]) ?>
   </div>

   <!-- Experience -->
   <div class="tab-pane fade" id="experience" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/experience/create') ?>" class="btn btn-sm btn-primary">Add Experience</a>
    </div>
    <?= view('jobseeker/profile/partials/experience_table', ['experiences' => $experiences ?? []]) ?>
   </div>

   <!-- Languages -->
   <div class="tab-pane fade" id="languages" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/languages/create') ?>" class="btn btn-sm btn-primary">Add Language</a>
    </div>
    <?= view('jobseeker/profile/partials/language_table', ['languages' => $languages ?? []]) ?>
   </div>

   <!-- Skills -->
   <div class="tab-pane fade" id="skills" role="tabpanel">
    <div class="d-flex justify-content-end mb-2">
     <a href="<?= site_url('jobseeker/profile/skills/create') ?>" class="btn btn-sm btn-primary">Add Skill</a>
    </div>
    <?= view('jobseeker/profile/partials/skill_table', ['skills' => $skills ?? []]) ?>
   </div>

  </div>
 </div>
</div>
<?= view('jobseeker/layout/footer.php') ?>