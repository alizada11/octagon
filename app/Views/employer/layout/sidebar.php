<?php $uri = service('uri'); ?>
<div class="col-md-2 bg-dark text-white sidebar p-3">
 <ul class="nav flex-column">
  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('employer/dashboard') ?>">
    <?= lang('Nav.dashboard') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'profile') ? 'active' : '' ?>" href="<?= base_url('employer/profile') ?>">
    <?= lang('Dashboard.profile') ?>
   </a>
  </li>
  <?php
  if (account_type() == 'company') {
  ?>
   <li class="nav-item">
    <a class="nav-link text-white <?= ($uri->getSegment(2) == 'business') ? 'active' : '' ?>" href="<?= base_url('employer/business/details') ?>">
     Business Info
    </a>
   </li>
  <?php
  }

  ?>
  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'requests') ? 'active' : '' ?>" href="<?= base_url('employer/requests') ?>">
    <?= lang('Dashboard.my_applications') ?>
   </a>
  </li>
 </ul>
</div>