<?= $this->extend('frontend/layout/main') ?>

<?= $this->section('content') ?>

<?php $locale = service('request')->getLocale(); ?>
<section class="py-5 viar-hero position-relative text-center" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <!-- Image -->
        <div data-aos="fade-up" data-aos-delay="0">
          <img src="<?= base_url('images/shumus.png') ?>" alt="Viar Logo" class="img-fluid mb-4" width="138" height="93">
        </div>

        <!-- Heading 1 -->
        <div data-aos="fade-up" data-aos-delay="100">
          <h2 class="heading mb-2">
            Application Page
          </h2>
        </div>

        <!-- Heading 2 -->
        <div data-aos="fade-up" data-aos-delay="200">
          <h4 class="sub-heading mb-3">
            Apply and get hired/hire!
          </h4>
        </div>

      </div>
    </div>
  </div>
</section>
<section class="py-5">
  <div class="container">

    <div class="row align-items-center">
      <div class="col-lg-6">
        <!-- Heading 1 -->
        <h4 class="heading mb-4">
          Appllication form to be hired or hire!
          </h3>

          <!-- Heading 2 -->
          <p> Octagon offers job opportunities in marketing, client services, and digital strategy.
          </p>
          <p> Applications typically involve submitting a resume and completing interviews. Roles are listed on their careers page across various global locations.
          </p>
          <p>
            Octagon also runs a Trainee Program for recent graduates, providing hands-on experience in real projects to help launch their careers.
          </p>
      </div>
      <div class="col-lg-6">

        <!-- RIGHT COLUMN: Contact Form -->
        <div class="col-md-12 rounded shadow-lg px-4 py-4" id="apply">
          <h5 class="mb-4">Application Form</h5>
          <form action="<?= base_url('employer/request') ?>" method="post">

            <div class="mb-3">
              <label class="mb-2" for="category">Select the category</label>
              <?php
              if ($seg_name == 'Viar') {
              ?>
                <select name="service_category" class="form-control" required>
                  <?php foreach ($viar_services as $viar): ?>
                    <option value="<?= $viar['title'] ?>">
                      <?= $viar['title'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              <?php
              } elseif ($seg_name == 'Shams') {
              ?>
                <select name="service_category" class="form-control" required>
                  <?php foreach ($shumus_services as $shams): ?>
                    <option value="<?= $shams['title'] ?>">
                      <?= $shams['title'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              <?php
              }
              ?>
            </div>



            <button type="submit" class="btn btn-alert w-100 text-white ">
              <?= $locale === 'ar' ? 'طلب' : 'Request' ?>
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>



<?= $this->endSection() ?>