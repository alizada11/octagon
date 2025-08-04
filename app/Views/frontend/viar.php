<?= $this->extend('frontend/layout/main') ?>

<?= $this->section('content') ?>
<?php $locale = service('request')->getLocale(); ?>
<section class=" viar-hero <?= session()->get('lang') == 'ar' ? 'arabic' : ''; ?>
 position-relative text-center" style="background-color: #f8f9fa;">
 <div class="container">
  <div class="row justify-content-left">
   <div class="col-lg-6">

    <!-- Image -->
    <div data-aos="fade-up" data-aos-delay="0">
     <img src="<?= base_url($hero['image']) ?>" alt="Viar Logo" class="img-fluid mb-4" width="300" height="200">
    </div>

    <!-- Heading 1 -->
    <!-- <div data-aos="fade-up" data-aos-delay="100">
     <h2 class="heading mb-2">
      <?= $hero['heading1'] ?>
     </h2>
    </div> -->

    <!-- Heading 2 -->
    <!-- <div data-aos="fade-up" data-aos-delay="200">
     <h2 class="sub-heading mb-3">
      <?= $hero['heading2'] ?>
     </h2>
    </div> -->

   </div>
  </div>
 </div>
</section>
<section class="py-5 company-profile bg-white" id="about-viar">
 <div class="container">
  <div class="row align-items-center ">

   <!-- LEFT COLUMN: Text -->
   <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
    <h2 class="title"><?= $about['heading1'] ?></h2>

    <!-- Decorative Divider -->

    <div class="row my-3">
     <div class="zigzag-divider"></div>
     <div class="zigzag-divider" style="margin-left: -3px; margin-right:-3px;"></div>
    </div>
    <!-- <div class="zigzag-divider my-3"></div> -->

    <!-- Paragraph -->
    <p class="description" data-aos="fade-up" data-aos-delay="200">

     <?= $about['description']; ?>
    </p>
   </div>

   <!-- RIGHT COLUMN: Image -->
   <div class="col-md-6 text-center" data-aos="fade-in" data-aos-delay="100">
    <img src="<?= base_url($about['image']) ?>" class="" alt="About Viar Image" width="500">
   </div>

  </div>
 </div>
</section>

<section class="py-5" id="viar-services">
 <div class="container">

  <!-- Section Heading -->
  <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="200">
   <h2 class="title "> <?= lang('Viar.service_title') ?></h2>
   <div class="row mx-auto my-3" style="justify-content: center;">
    <div class="zigzag-divider"></div>
    <div class="zigzag-divider" style="margin-left: -3px; margin-right:-3px;"></div>
   </div>
  </div>

  <!-- Service Cards -->
  <div class="row service-cards gy-4" data-aos="fade-up" data-aos-delay="200">

   <!-- Service Card -->

   <?php foreach ($services as $service): ?>
    <div class=" col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
     <div class=" s-card h-100 d-flex flex-column">
      <div class="mb-3  fs-3"><i class="octa-icon fas fa-star"></i></div>
      <h5 class="heading  mb-3"> <?= esc($service['title']) ?></h5>
      <ul class="list-unstyled text-start ">

       <?php foreach (json_decode($service['bullets']) as $bullet): ?>
        <li class="mb-2"><i class="fas fa-check-square  me-2"></i> <?= esc($bullet) ?></li>

       <?php endforeach; ?>
      </ul>
      <!-- <a href="<?= site_url('apply/viar') ?>" class="btn btn-sm mt-3">
       <?php

       $role = session()->get('role');

       if ($role === 'jobseeker'):
        echo lang('Shumus.apply');
       elseif ($role === 'employer'):
        echo lang('Shumus.hire');
       else:
        echo lang('Shumus.service_reservation');

       endif;
       ?>
      </a> -->
     </div>
    </div>
   <?php endforeach; ?>


  </div>
 </div>
 </div>
</section>

<?= $this->endSection() ?>