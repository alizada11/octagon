<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<?php

use CodeIgniter\Database\BaseUtils;

$locale = service('request')->getLocale(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap<?= $locale === 'ar' ? '.rtl' : '' ?>.min.css">
<link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- fonts -->
<link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">

<style>
 <?php
 $locale = service('request')->getLocale();
 $fontFamily = ($locale === 'ar') ? 'FFShamil' : 'Rubik';
 ?>body {
  font-family: '<?= $fontFamily ?>' !important;
  background-color: #FFF;
 }

 .sidebar {
  min-height: 100vh;
 }
</style>