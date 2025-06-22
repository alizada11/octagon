<?= $this->extend('frontend/layout/main') ?>

<?= $this->section('content') ?>
<?php $locale = service('request')->getLocale(); ?>
<section class="shumus-hero <?= session()->get('lang') == 'ar' ? 'arabic' : ''; ?>
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
                  <?= $hero['heading1']  ?>
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
      <div class="row align-items-center">

         <!-- LEFT COLUMN: Text -->
         <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <h2 class="title"><?= $about['heading'] ?></h2>

            <!-- Decorative Divider -->

            <div class="row my-3">
               <div class="zigzag-divider"></div>
               <div class="zigzag-divider" style="margin-left: -3px; margin-right:-3px;"></div>
            </div>
            <!-- <div class="zigzag-divider my-3"></div> -->

            <!-- Paragraph -->
            <p class="description" data-aos="fade-up" data-aos-delay="200">

               <?= $about['description'] ?>
            </p>
         </div>

         <!-- RIGHT COLUMN: Image -->
         <div class="col-md-6 text-center" data-aos="fade-in" data-aos-delay="100">
            <img src="<?= base_url($about['image']) ?>" class="" alt="About Shumus Image">
         </div>

      </div>
   </div>
</section>

<<section class="py-5" id="viar-services">
   <div class="container">
      <!-- Section Heading -->
      <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="200">
         <h2 class="title"><?= lang('Shumus.service_title') ?></h2>
         <div class="row justify-content-center my-3">
            <div class="zigzag-divider"></div>
            <div class="zigzag-divider" style="margin-left: -3px; margin-right: -3px;"></div>
         </div>
      </div>

      <!-- Service Cards -->
      <div class="row gy-4 justify-content-center" data-aos="fade-up" data-aos-delay="200">

         <!-- Individual Services -->
         <div class="col-md-6 col-lg-5">
            <a href="<?= base_url('shumus/services/individual') ?>" class="text-decoration-none">
               <div class="card h-100 shadow-lg border-0 rounded-4 p-4 text-center service-card bg-dark text-white">
                  <div class="mb-4">
                     <i class="fas fa-user fa-3x text-primary"></i>
                  </div>
                  <h3 class="mb-3">
                     <?= lang('Shumus.individual') ?>
                  </h3>
                  <p class="text-white-50">
                     <?= lang('Shumus.individual_desc') ?>
                  </p>
               </div>
            </a>
         </div>

         <!-- Corporate Services -->
         <div class="col-md-6 col-lg-5">
            <a href="<?= base_url('shumus/services/corporate') ?>" class="text-decoration-none">
               <div class="card h-100 shadow-lg border-0 rounded-4 p-4 text-center service-card bg-dark text-white">
                  <div class="mb-4">
                     <i class="fas fa-building fa-3x text-warning"></i>
                  </div>
                  <h3 class="mb-3"><?= lang('Shumus.corporate') ?></h3>
                  <p class="text-white-50">
                     <?= lang('Shumus.corporate_desc') ?>
                  </p>
               </div>
            </a>
         </div>

      </div>
   </div>
   </section>


   <?= $this->endSection() ?>