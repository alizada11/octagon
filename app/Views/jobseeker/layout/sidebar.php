<?php $uri = service('uri'); ?>
<div class="col-md-2 bg-dark text-white sidebar p-3">
 <ul class="nav flex-column">
  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(1) == 'jobseeker' && $uri->getSegment(2) == '') ? 'active' : '' ?>" href="<?= base_url('jobseeker') ?>">
    <?= lang('Nav.jobseeker_dashboard') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'profile') ? 'active' : '' ?>" href="<?= base_url('jobseeker/profile') ?>">
    <?= lang('Dashboard.profile') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'applications') ? 'active' : '' ?>" href="<?= base_url('jobseeker/applications') ?>">
    <?= lang('Dashboard.my_applications') ?>
   </a>
  </li>
 </ul>
</div>