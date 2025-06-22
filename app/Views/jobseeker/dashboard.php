<?php include('layout/header.php') ?>
<?php include('layout/sidebar.php') ?>
<?php $locale = service('request')->getLocale(); ?>

<div class="col-md-10 p-4">
 <h2 class="mb-4"><?= lang('Dashboard.jobseeker_welcome') ?></h2>
 <div class="row g-4">
  <!-- Hot Items Card -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-primary text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.requests') ?></p>
      <h2 class="mb-0 font-weight-bold"><?= $requestCount ?></h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-fire fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/applications" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.view_details') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>

  <!-- Total Gallery Card -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-warning text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.my') ?></p>
      <h2 class="mb-0 font-weight-bold"> <?= lang('Dashboard.profile') ?></h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-images fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/profile" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.view_details') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>

  <!-- Change Password Card -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-success text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.change') ?></p>
      <h3 class="mb-0 font-weight-bold"><?= lang('Dashboard.password') ?></h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-key fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/change-password"
      class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.change_now') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>
  <!-- Contact Page Card -->
  <div class="col-md-4 mb-4">
   <div class="card card-hover bg-gradient-teal text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.passport') ?></p>
      <h3 class="mb-0 font-weight-bold"><?= lang('Dashboard.info') ?></h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-address-book fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/profile/passport" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.view_details') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>
  <!-- Banner Card -->
  <div class="col-md-4 mb-4">
   <div class="card card-hover bg-gradient-info text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.my') ?></p>
      <h2 class="mb-0 font-weight-bold"><?= lang('Dashboard.education') ?></h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-image fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/profile/education" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.view_details') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>

  <!-- Who We Are Card -->
  <div class="col-md-4 mb-4">
   <div class="card card-hover bg-gradient-danger text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.my') ?></p>
      <h3 class="mb-0 font-weight-bold"><?= lang('Dashboard.experiences') ?></h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-users fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/profile/experience" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.view_details') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>

  <!-- How It Works Card -->
  <div class="col-md-4 mb-4">
   <div class="card card-hover bg-gradient-secondary text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.my') ?> </p>
      <h3 class="mb-0 font-weight-bold"><?= lang('Dashboard.language_skill') ?> </h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-cogs fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/profile/languages" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.view_details') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>

  <!-- Testimonial Card -->
  <div class="col-md-4 mb-4">
   <div class="card card-hover bg-gradient-dark text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.my') ?> </p>
      <h2 class="mb-0 font-weight-bold"><?= lang('Dashboard.skills') ?></h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-quote-left fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/jobseeker/profile/skills" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.view_details') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>

  <!-- About Page Card -->
  <div class="col-md-4 mb-4">
   <div class="card card-hover bg-gradient-purple text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75"><?= lang('Dashboard.get') ?> </p>
      <h3 class="mb-0 font-weight-bold"><?= lang('Dashboard.logout') ?></h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-sign-out-alt me-1"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/logout" class="text-white small d-flex align-items-center justify-content-between">
      <?= lang('Dashboard.logout') ?>
      <i class="fas <?= ($locale === 'ar' ? 'fa-arrow-left me-2' : 'fa-arrow-right ms-2') ?>"></i>

     </a>
    </div>
   </div>
  </div>



  <style>
   /* Add these new gradient classes to your existing style */
   .bg-gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #5bc0de 100%);
   }

   .bg-gradient-danger {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
   }

   .bg-gradient-secondary {
    background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
   }

   .bg-gradient-dark {
    background: linear-gradient(135deg, #343a40 0%, #212529 100%);
   }

   .bg-gradient-purple {
    background: linear-gradient(135deg, #6f42c1 0%, #d63384 100%);
   }

   .bg-gradient-teal {
    background: linear-gradient(135deg, #20c997 0%, #0dcaf0 100%);
   }

   /* Your existing styles */
   .card-hover {
    transition: all 0.3s ease;
    transform: translateY(0);
   }

   .card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
   }

   .bg-gradient-primary {
    background: linear-gradient(135deg, #3f80ff 0%, #7b4fff 100%);
   }

   .bg-gradient-warning {
    background: linear-gradient(135deg, #ff9a44 0%, #ff6e68 100%);
   }

   .bg-gradient-success {
    background: linear-gradient(135deg, #47b881 0%, #2e9e6a 100%);
   }

   .icon-wrapper {
    transition: all 0.3s ease;
   }

   .card-hover:hover .icon-wrapper {
    transform: scale(1.1);
   }

   .rounded-lg {
    border-radius: 12px !important;
   }
  </style>
 </div>
</div>

<?php include('layout/footer.php') ?>