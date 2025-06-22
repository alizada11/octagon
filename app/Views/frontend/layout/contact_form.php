<?php $locale = service('request')->getLocale(); ?>

<section class="py-5" id="contact">
 <div class="container">
  <div class="row flex-row-reverse align-items-center">

   <!-- LEFT COLUMN: Contact Info Cards -->
   <div class="col-md-6">
    <div class="row g-3 contact-details">
     <?php foreach ($contact_info as $contact): ?>

      <!-- Email -->
      <div class="col-12 col-md-6 col-lg-6 " data-aos="fade-up" data-aos-delay="0">
       <div class="bg-maroon text-white p-4 rounded-3 text-center h-100 shadow-sm">
        <div class="mb-2">
         <i class="<?= esc($contact['icon']) ?> octa-icon"></i>
        </div>
        <h6 class="heading mb-3"><?= $contact['title'] ?></h6>
        <p class="mb-0 sub-heading"><?= $contact['value'] ?></p>
       </div>
      </div>

     <?php endforeach; ?>


    </div>
   </div>

   <!-- RIGHT COLUMN: Contact Form -->
   <div class="col-md-6" <?= $locale === 'ar' ? 'data-aos="fade-left" ' : ' data-aos="fade-right"' ?>>
    <form action="<?= base_url('contact/submit') ?>" method="post">
     <div class="mb-3">
      <input type="text" name="name" class="form-control" placeholder="<?= $locale === 'ar' ? 'الاسم الكامل' : 'Full Name' ?>" required>
     </div>
     <div class="mb-3">
      <?php
      if ($page_name == 'Viar') {
       include('viar_service_select.php');
      } elseif ($page_name == 'Shams') {
       include('shumus_service_select.php');
      }
      ?>
     </div>
     <div class="mb-3">
      <input type="email" name="email" class="form-control" placeholder="<?= $locale === 'ar' ? 'البريد الإلكتروني' : 'Email' ?>" required>
     </div>
     <div class="mb-3">
      <input type="text" name="phone" class="form-control" placeholder="<?= $locale === 'ar' ? 'رقم الهاتف' : 'Phone Number' ?>" required>
     </div>
     <div class="mb-3">
      <textarea name="message" rows="4" class="form-control" placeholder="<?= $locale === 'ar' ? 'رسالتك' : 'Your Message' ?>" required></textarea>
     </div>
     <button type="submit" class="btn w-100 text-white ">
      <?= $locale === 'ar' ? 'إرسال' : 'Send' ?>
     </button>
    </form>
   </div>

  </div>
 </div>
</section>