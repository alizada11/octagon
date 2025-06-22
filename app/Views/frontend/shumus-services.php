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


<section class="py-5" id="viar-services">
   <div class="container">
      <!-- Section Heading -->
      <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="200">
         <h2 class="title "><?= lang('Shumus.service_corporate_title') ?></h2>
         <div class="row mx-auto my-3" style="justify-content: center;">
            <div class="zigzag-divider"></div>
            <div class="zigzag-divider" style="margin-left: -3px; margin-right:-3px;"></div>
         </div>
      </div>

      <!-- Service Cards -->
      <div class="row   shumus service-cards gy-4" data-aos="fade-up" data-aos-delay="200">
         <?php foreach ($services as $service): ?>

            <!-- Service Card -->
            <div class=" col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
               <div class=" s-card h-100 d-flex flex-column">
                  <div class="mb-3 service-icon fs-3"><img src="<?= base_url($service['icon']) ?>" alt=""></div>
                  <h3 class="heading  mb-3"><?= $service['title'] ?></h3>
               </div>
            </div>
         <?php endforeach; ?>


      </div>
   </div>
   </div>
</section>

<?= $this->endSection() ?>