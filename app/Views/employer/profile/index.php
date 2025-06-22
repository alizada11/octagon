 <?= view('employer/layout/header.php') ?>
 <?= view('employer/layout/sidebar.php') ?>

 <div class="col-md-10 mb-4 p-4">
  <div class="container mt-4">
   <h2 class="mb-4">My Profile</h2>

   <?= view('employer/profile/partials/profile_table', ['profile' => $profile ?? []]) ?>


  </div>
 </div>
 <?= view('employer/layout/footer.php') ?>