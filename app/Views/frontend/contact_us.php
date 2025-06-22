<?= $this->extend('frontend/layout/main') ?>

<?= $this->section('content') ?>
<?php $locale = service('request')->getLocale(); ?>
<section class="py-5 contact-us-hero position-relative text-center" style="background-color: #f8f9fa;">
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-lg-6">


    <!-- Heading 1 -->
    <div data-aos="fade-up" data-aos-delay="100">
     <h2 class="heading mb-2">
      <?= lang('Nav.contact_us') ?>
     </h2>
    </div>



   </div>
  </div>
 </div>
</section>
<?= $this->endSection() ?>