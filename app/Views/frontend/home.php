<?= $this->extend('frontend/layout/main') ?>

<?= $this->section('content') ?>
<?php $locale = service('request')->getLocale(); ?>
<section>
  <div class="swiper mySwiper" dir="<?= $locale === 'ar' ? 'rtl' : 'ltr' ?>">
    <div class="swiper-wrapper">
      <?php foreach ($slides as $slide): ?>
        <div class="swiper-slide" style="background-image: url('<?= base_url('uploads/sliders/' . $slide['image']) ?>')">
          <div class="content d-flex h-100 align-items-center justify-content-center text-center text-white">
            <div>
              <h2 class="heading mb-3 fade-up"><?= $slide['title'] ?></h2>
              <p class="lead fade-up"><?= $slide['description'] ?></p>
              <a href="<?= base_url($slide['button_link']) ?>" class="btn btn-light mt-3 fade-up"><?= $slide['button_text'] ?></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>
<!-- about section -->
<section class="about" id="about">
  <div class="container">
    <div class="row align-items-center flex-row-reverse ">

      <!-- Image -->
      <div class="col-md-6 mb-4 mb-md-0 text-center">
        <img src="<?= $about['image']; ?>" data-aos="fade" class="img-fluid rounded" alt="About Image">
      </div>

      <!-- Text -->
      <div class="col-md-6">
        <h3 class=" heading mb-3"><?= $about['title']; ?></h3>
        <div class="d-flex">
          <div class="zigzag-divider my-3"></div>
          <div class="zigzag-divider my-3"></div>

        </div>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">
          <?= $about['content']; ?>
        </p>
      </div>

    </div>
  </div>
</section>

<section class="py-5 goal" id="goal">
  <div class="container">
    <div class="row flex-row-reverse align-items-center <?= service('request')->getLocale() === 'ar' ? 'flex-row-reverse' : '' ?> text-white">


      <!-- Text -->
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <h3 class="heading mb-3">
          <?= $goal['heading'] ?>
        </h3>
        <div class="zigzag-divider my-3"></div>

        <h2 class="sub-heading">
          <?= $goal['subheading'] ?>

        </h2>

        <p class="lead">
          <?= $goal['description'] ?>
        </p>
      </div>
      <!-- Image -->
      <div class="col-md-6 mb-4 mb-md-0 text-center" data-aos="fade">
        <img src="<?= base_url('uploads/goals/' . $goal['image']) ?>" class="img-fluid rounded" alt="Goal Image">
      </div>

    </div>
  </div>
</section>
<!-- Our vision section -->
<section class=" vision" id="vision">
  <div class="container">
    <div class="row align-items-center <?= service('request')->getLocale() === 'ar' ? 'flex-row-reverse' : '' ?>">

      <!-- Image -->
      <div class="col-md-6 mb-4 mb-md-0 text-center" data-aos="fade">
        <img src="<?= base_url('uploads/vision/' . $vision['image']) ?>" class="img-fluid rounded" alt="Vision Image">
      </div>

      <!-- Text -->
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
        <h3 class="heading mb-3">
          <?= $vision['heading'] ?>
        </h3>
        <div class="zigzag-divider my-3"></div>

        <h4 class="sub-heading">

          <?= $vision['sub_heading'] ?>
        </h4>
        <p class="lead ">
          <?= $vision['description'] ?>
        </p>
      </div>

    </div>
  </div>
</section>
<!-- our value section -->
<section class="py-5 value" id="stats-values">
  <div class="octa-shape octa-shape-top" data-negative="true">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
      <path class="octa-shape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
    </svg>
  </div>
  <div class="octa-shape octa-shape-bottom" data-negative="false">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
      <path class="octa-shape-fill" d="M1000,4.3V0H0v4.3C0.9,23.1,126.7,99.2,500,100S1000,22.7,1000,4.3z"></path>
    </svg>
  </div>
  <div class="container text-white">

    <!-- 1. COUNTERS -->
    <div class="row text-center counters mb-5">
      <?php
      $counters = [
        ['value' => 100, 'label_ar' => 'الرقم', 'label_en' => 'Number'],
        ['value' => 100, 'label_ar' => 'الرقم', 'label_en' => 'Number'],
        ['value' => 100, 'label_ar' => 'الرقم', 'label_en' => 'Number'],
        ['value' => 100, 'label_ar' => 'الرقم', 'label_en' => 'Number'],
      ];
      $locale = service('request')->getLocale();
      $delay = 0;
      foreach ($counters as $counter): ?>

        <div class="col-6 col-sm-6 col-md-3 mb-4" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
          <div class="counter">
            <h2 class="number counter-up" data-count="<?= $counter['value'] ?>">+</h2>
            <p class="title"><?= $counter['label_' . $locale] ?></p>
          </div>
        </div>

      <?php $delay += 150;
      endforeach; ?>
    </div>
    <section class="values">

      <!-- 2. SECTION TITLE -->
      <div class="text-center mb-5" data-aos="fade-up">
        <h3 class="title">
          <?= ($locale === 'ar') ? 'قيمنا' : 'Our Values' ?>
        </h3>
        <div class="zigzag-divider mx-auto my-3"></div>

        <div class="elementor-element elementor-element-7c2ab83 elementor-widget-divider--separator-type-pattern elementor-widget-divider--no-spacing elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="7c2ab83" data-element_type="widget" data-widget_type="divider.default">
          <div class="elementor-widget-container">
            <div class="elementor-divider" style="--divider-pattern-url: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid meet' overflow='visible' height='100%' viewBox='0 0 120 26' fill='black' stroke='none'%3E%3Cpolygon points='0,14.4 0,21 11.5,12.4 21.3,20 30.4,11.1 40.3,20 51,12.4 60.6,20 69.6,11.1 79.3,20 90.1,12.4 99.6,20 109.7,11.1 120,21 120,14.4 109.7,5 99.6,13 90.1,5 79.3,14.5 71,5.7 60.6,12.4 51,5 40.3,14.5 31.1,5 21.3,13 11.5,5 	'/%3E%3C/svg%3E&quot;);">
              <span class="elementor-divider-separator">
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- 3. VALUE CARDS -->
      <div class="row text-center value-cards">
        <?php

        $delay = 0;

        foreach ($values as $value): ?>
          <div class=" col-sm-12 col-lg-3 col-md-3 mb-4 d-flex" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
            <div class="c-card  text-start h-100">
              <div class="octa-icon-box-icon">
                <span class="octa-icon">
                  <i class="fas fa-star"></i>
              </div>
              <h5 class="heading "><?= $value['title'] ?></h5>
              <p class="lead"><?= $value['description'] ?></p>
            </div>
          </div>
        <?php $delay += 150;
        endforeach; ?>
      </div>
    </section>

  </div>
</section>
<section class="py-5 cta text-center text-white" id="cta">
  <div class="container" style="background-color: #4A0A25;border-radius: 15px;" data-aos="fade-up">
    <h4 class="title">
      <?= lang('Main.our_services') ?>
    </h4>
    <h4 class="sub-title">
      <?= lang('Main.our_services_desc') ?>
    </h4>

    <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
      <a href="/viar" class="btn btn-outline-light px-4">
        <?= lang('Main.view_viar_service') ?>
      </a>
      <a href="/shumus" class="btn btn-warning px-4 text-dark">
        <?= lang('Main.view_shams_service') ?>
      </a>
    </div>
  </div>
</section>


<?= $this->endSection() ?>