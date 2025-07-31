<?php $uri = service('uri'); ?>
<div class="col-md-2 bg-dark text-white sidebar p-3">
 <ul class="nav flex-column">
  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(1) == 'dashboard' && $uri->getSegment(2) == '') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard') ?>">
    <?= lang('Nav.dashboard') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'sliders') ? 'active' : '' ?>" href="<?= base_url('/admin/sliders') ?>">
    <?= lang('Main.slider') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'about') ? 'active' : '' ?>" href="<?= base_url('/admin/about') ?>">
    <?= lang('Nav.about') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'goal') ? 'active' : '' ?>" href="<?= base_url('/admin/goal') ?>">
    <?= lang('Nav.goal') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'vision') ? 'active' : '' ?>" href="<?= base_url('/admin/vision') ?>">
    <?= lang('Nav.vision') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'values') ? 'active' : '' ?>" href="<?= base_url('/admin/values') ?>">
    <?= lang('Nav.values') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'contact-details') ? 'active' : '' ?>" href="<?= base_url('/admin/contact-details') ?>">
    <?= lang('Nav.contact') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'viar') ? 'active' : '' ?>" href="<?= base_url('/admin/viar') ?>">
    <?= lang('Nav.viar') ?>
   </a>
  </li>

  <li class="nav-item">
   <a href="#menuSubmenu" class="nav-link text-white <?= ($uri->getSegment(2) == 'shumus') ? 'active' : '' ?>" data-bs-toggle="collapse" aria-expanded="false">
    <?= lang('Nav.shumus') ?>
   </a>
  </li>
  <div class="collapse ps-3 <?= ($uri->getSegment(2) == 'shumus') ? 'show' : '' ?>" id="menuSubmenu">
   <a class="nav-link text-white <?= ($uri->getSegment(3) == 'hero') ? 'active' : '' ?>" href="<?= base_url('/admin/shumus/hero') ?>">
    <?= lang('Nav.hero') ?>
   </a>
   <a class="nav-link text-white <?= ($uri->getSegment(3) == 'services') ? 'active' : '' ?>" href="<?= base_url('/admin/shumus/services') ?>">
    <?= lang('Nav.services') ?>
   </a>
   <a class="nav-link text-white <?= ($uri->getSegment(3) == 'about') ? 'active' : '' ?>" href="<?= base_url('/admin/shumus/about') ?>">
    <?= lang('Nav.about') ?>
   </a>
  </div>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'agencies') ? 'active' : '' ?>" href="<?= base_url('/admin/agencies') ?>">
    <?= lang('Nav.agency') ?>
   </a>
  </li>

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'employer-requests') ? 'active' : '' ?>" href="<?= base_url('/admin/employer-requests') ?>">
    <?= lang('Nav.employer-requests') ?>
   </a>
  </li>

  <!-- <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'applications') ? 'active' : '' ?>" href="<?= base_url('/admin/applications') ?>">
    <?= lang('Nav.application') ?>
   </a>
  </li> -->

  <li class="nav-item">
   <a class="nav-link text-white <?= ($uri->getSegment(2) == 'users') ? 'active' : '' ?>" href="<?= base_url('/admin/users') ?>">
    Users
   </a>
  </li>

 </ul>
</div>