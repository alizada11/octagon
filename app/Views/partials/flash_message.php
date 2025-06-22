<?php if (session()->getFlashdata('error')): ?>
 <div style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%); z-index: 1050; min-width: 300px;">
  <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
   <?= session()->getFlashdata('error') ?>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 </div>
<?php endif; ?>

<?php if (session()->getFlashdata('message')): ?>
 <div style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%); z-index: 1050; min-width: 300px;">
  <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
   <?= session()->getFlashdata('message') ?>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
 <div style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%); z-index: 1050; min-width: 300px;">
  <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
   <?= session()->getFlashdata('success') ?>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 </div>
<?php endif; ?>