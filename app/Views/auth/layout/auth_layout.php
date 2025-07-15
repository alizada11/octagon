<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>" dir="<?= (service('request')->getLocale() === 'ar') ? 'rtl' : 'ltr' ?>">

<head>
 <meta charset="UTF-8">
 <title><?= $title ?? 'Authentication' ?></title>

 <!-- Bootstrap 5 CSS -->
 <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
 <!-- Select 2 -->
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

 <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>">
 <link rel="stylesheet" href="<?= base_url('css/auth-style.css') ?>">
</head>
<?php
$locale = service('request')->getLocale();
$fontFamily = ($locale === 'ar') ? 'FFShamil' : 'Rubik';
?>
<style>
 body {
  font-family: '<?= $fontFamily ?>', sans-serif !important;
 }
</style>

<body class=" d-flex align-items-center">

 <div class="container-fluid auth-forms p-0" style="background-image: url('<?= base_url('images/slider1.jpg') ?>'); background-size: cover; background-position: center;">
  <div class="row justify-content-center align-items-center" style="min-height: 100vh; background-color: rgba(71, 0, 31, 0.77); margin: 0;">
   <div class="col-12 col-sm-11 col-md-8 col-lg-5 col-xl-4 px-3">
    <div class="card shadow-lg w-100">

     <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success m-3">
       <?= session()->getFlashdata('success') ?>
      </div>
     <?php endif; ?>

     <?php if (session()->getFlashdata('validation')): ?>
      <div class="alert alert-danger m-3">
       <?= session()->getFlashdata('validation') ?>
      </div>
     <?php endif; ?>

     <div class="card-body p-md-4">
      <?= $this->renderSection('content') ?>

      <div><a class="link" href="/">Back to Website</a></div>
      <div class="language-switcher">
       <i class="fas fa-globe"></i>
       <?php if (session('lang') == 'en'): ?>
        <a class="link" href="<?= base_url('lang/ar') ?>">AR</a>
       <?php elseif (session('lang') == 'ar'): ?>
        <a class="link" href="<?= base_url('lang/en') ?>">EN</a>
       <?php endif; ?>
      </div>
     </div>
    </div>

   </div>
  </div>
 </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- if not already included -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <script>
  $(document).ready(function() {
   $('.select2-tags').select2({
    tags: true, // allows adding new items
    width: '100%',
    tokenSeparators: [',']
   });
  });
 </script>
 <script>
  document.addEventListener('DOMContentLoaded', function() {
   const roleSelect = document.querySelector('select[name="role"]');
   const employerTypeWrapper = document.getElementById('employerTypeWrapper');

   function toggleEmployerType() {
    if (roleSelect.value === 'employer') {
     employerTypeWrapper.style.display = 'block';
    } else {
     employerTypeWrapper.style.display = 'none';
    }
   }

   // On load (in case of validation errors and repopulated values)
   toggleEmployerType();

   // On change
   roleSelect.addEventListener('change', toggleEmployerType);
  });
 </script>

</body>

</html>