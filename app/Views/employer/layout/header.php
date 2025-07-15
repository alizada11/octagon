<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>" dir="<?= (service('request')->getLocale() == 'ar') ? 'rtl' : 'ltr' ?>">


<head>
 <meta charset="UTF-8">
 <title>Employer Dashboard</title>

 <!-- Bootstrap 5 CSS -->
 <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
 <link rel="stylesheet" href="<?= base_url('css/employer-style.css') ?>">

 <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
 <style>
  <?php
  $locale = service('request')->getLocale();
  $fontFamily = ($locale === 'ar') ? 'FFShamil' : 'Rubik';
  ?>body {

   font-family: '<?= $fontFamily ?>', sans-serif;
  }

  .sidebar {
   min-height: 100vh;
  }
 </style>
</head>

<body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 justify-content-between">
  <a class="navbar-brand" href="/employer/dashboard"> <img src="<?= base_url('images/logo.png'); ?>" height="40px" width="35px" alt="logo" /> Octagon Employer Panel</a>
  <div class=" d-flex align-items-center gap-3">
   <a href="/"><i class="text-white fas fa-eye fa-md"></i></a>
   <!-- Language Switcher -->
   <div class="language-switcher">
    <i class="fas fa-globe"></i>

    <?php

    if (session('lang') == 'en'):
    ?>
     <a href="<?= base_url('lang/ar') ?>">AR</a>
    <?php elseif (session('lang') == 'ar'):

    ?>
     <a href="<?= base_url('lang/en') ?>">EN</a>
    <?php endif; ?>

   </div>

   <!-- Profile Dropdown -->
   <div class="dropdown">
    <?php
    $jobseekerImage = session('profile_img') ?? 'profile-default.png'; // fallback if not set
    ?>
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
     <img src="<?= base_url('uploads/employers/' . $jobseekerImage) ?>" alt="Profile" class="rounded-circle me-2" width="32" height="32">
     <span><?= session('full_name') ?? 'Employer' ?></span>
    </a>
    <?php $isRTL = service('request')->getLocale() === 'ar'; ?>
    <ul class="dropdown-menu <?= $isRTL ? '' : 'dropdown-menu-end' ?> text-small" aria-labelledby="profileDropdown">

     <li><a class="dropdown-item" href="/employer/profile"><i class="fas fa-user me-1"></i><?= lang('Dashboard.profile') ?? 'My Profile' ?></a></li>
     <li>
      <hr class="dropdown-divider">
     </li>
     <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-1"></i><?= lang('Dashboard.logout') ?></a></li>
    </ul>
   </div>
  </div>
 </nav>
 <div class="container-fluid">
  <div class="row">