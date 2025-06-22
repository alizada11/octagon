<?php include('layout/header.php') ?>
<?php include('layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <h2><?= lang('Dashboard.welcome') ?></h2>
 <p><?= lang('Dashboard.description') ?></p>
 <div class="row g-4">
  <!-- Sliders Card -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-primary text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Sliders</p>
      <h2 class="mb-0 font-weight-bold"><?= $sliderCount ?></h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-sliders-h fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/sliders" class="text-white small d-flex align-items-center justify-content-between">
      View details
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- About Section -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-warning text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">About</p>
      <h2 class="mb-0 font-weight-bold">Section</h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-user fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/about" class="text-white small d-flex align-items-center justify-content-between">
      View details
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Goal Section -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-success text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Goal</p>
      <h3 class="mb-0 font-weight-bold">Section</h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-bullseye fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/goal" class="text-white small d-flex align-items-center justify-content-between">
      Change now
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Vision Section -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-info text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Vision</p>
      <h2 class="mb-0 font-weight-bold">Section</h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-eye fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/vision" class="text-white small d-flex align-items-center justify-content-between">
      View details
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Values Section -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-danger text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Values</p>
      <h3 class="mb-0 font-weight-bold">Section</h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-heart fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/values" class="text-white small d-flex align-items-center justify-content-between">
      View section
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Web Mail -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-secondary text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Go To</p>
      <h3 class="mb-0 font-weight-bold">Web Mail</h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-envelope fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="https://webmail.octagon.om" target="_blank" class="text-white small d-flex align-items-center justify-content-between">
      Manage emails
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Viar Page -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-dark text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Viar</p>
      <h2 class="mb-0 font-weight-bold">Page</h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-cubes fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/viar" class="text-white small d-flex align-items-center justify-content-between">
      View page
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Employer Requests -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-purple text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Employer</p>
      <h3 class="mb-0 font-weight-bold">Requests</h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-briefcase fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/employer-requests" class="text-white small d-flex align-items-center justify-content-between">
      Edit page
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Job Applications -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-teal text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Job</p>
      <h3 class="mb-0 font-weight-bold">Applications</h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-file-alt fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/admin/applications" class="text-white small d-flex align-items-center justify-content-between">
      View
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
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
<?= view('admin/layout/footer') ?>