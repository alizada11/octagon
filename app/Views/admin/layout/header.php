<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>" dir="<?= (service('request')->getLocale() == 'ar') ? 'rtl' : 'ltr' ?>">


<head>
 <meta charset="UTF-8">
 <title>Admin Dashboard</title>

 <!-- Bootstrap 5 CSS -->
 <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
 <!-- fonts -->
 <link rel="stylesheet" href="<?= base_url('css/admin-style.css') ?>">
 <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">

 <link rel="stylesheet" href="<?= base_url('css/other_bootstrap.min.css') ?>">

 <link href="<?= base_url('css/ostyles.css') ?>" rel="stylesheet">
 <!-- Select2 CSS -->
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

 <!-- <link href="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.css" rel="stylesheet"> -->

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
 <?= view('partials/flash_message') ?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 justify-content-between">
  <a class="navbar-brand" href="<?= base_url("/"); ?>"><img src="<?= base_url('images/logo.png'); ?>" height="40px" width="35px" alt="logo" />Octagon </a>
  <div class=" d-flex gap-2 align-items-center justify-content-center">

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


   <a href="/logout" class="btn btn-outline-light btn-sm"><i class="fas fa-sign-out-alt me-1"></i><?= lang('Dashboard.logout') ?></a>
  </div>
 </nav>
 <div class="container-fluid">
  <div class="row">