<?php include('layout/header.php') ?>
<?php include('layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <h2 class="mb-4"><?= lang('Dashboard.employer_welcome') ?></h2>
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
     <a href="/employer/requests" class="text-white small d-flex align-items-center justify-content-between">
      View details
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Total Gallery Card -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-warning text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">My</p>
      <h2 class="mb-0 font-weight-bold"> Profile</h2>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-images fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/employer/profile" class="text-white small d-flex align-items-center justify-content-between">
      View details
      <i class="fas fa-arrow-right ms-2"></i>
     </a>
    </div>
   </div>
  </div>

  <!-- Change Password Card -->
  <div class="col-md-4">
   <div class="card card-hover bg-gradient-success text-white shadow-lg rounded-lg overflow-hidden border-0">
    <div class="card-body p-4 d-flex justify-content-between align-items-center">
     <div>
      <p class="text-uppercase small mb-1 opacity-75">Change</p>
      <h3 class="mb-0 font-weight-bold">Password</h3>
     </div>
     <div class="icon-wrapper bg-white bg-opacity-10 rounded-circle p-3">
      <i class="fas fa-key fa-2x text-white"></i>
     </div>
    </div>
    <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
     <a href="/employer/change-password"
      class="text-white small d-flex align-items-center justify-content-between">
      Change now
      <i class="fas fa-arrow-right ms-2"></i>
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