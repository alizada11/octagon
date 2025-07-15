<?php $uri = service('uri'); ?>
<div class="col-md-2 bg-dark text-white sidebar p-3">
 <ul class="nav flex-column">
  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(1) == 'jobseeker' && $uri->getSegment(2) == '') ? 'active' : '' ?>" href="<?= base_url('agency/dashboard') ?>">
    <?= lang('Nav.dashboard') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'profile') ? 'active' : '' ?>" href="<?= base_url('agency/edit') ?>">
    <?= lang('Dashboard.profile') ?>
   </a>
  </li>

 </ul>
</div>