<?= $this->extend('frontend/layout/main') ?>
<?= $this->section('content') ?>
<?php $locale = service('request')->getLocale(); ?>

<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h4 class="custom-heading fw-bold mb-3"><?= lang('Global.find_jobseeker_in'); ?> <ins><?= $locale == 'en' ? $service['title_en'] : $service['title_ar'] ?>
        </ins></h4>
      <p class="lead text-muted"><?= lang('Global.corporate_subtitle') ?></p>
    </div>

    <div class="row gy-4">

      <?php
      if ($applicants):
        foreach ($applicants as $js): ?>
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
              <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center mb-3">
                  <div class="avatar avatar-lg me-3">
                    <?php if (isset($js['profile_image']) && $js['profile_image']): ?>
                      <img src="<?= base_url('uploads/' . esc($js['profile_image'])) ?>"
                        alt="<?= esc($js['full_name']) ?>"
                        class="rounded-circle img-thumbnail">
                    <?php else: ?>
                      <div class="avatar-placeholder custom-bg text-white rounded-circle d-flex align-items-center justify-content-center">
                        <?= substr(esc($js['full_name']), 0, 1) ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div>
                    <h5 class="mb-0 fw-bold"><?= esc($js['full_name']) ?></h5>
                    <small class="text-muted"><?= esc($js['nationality']) ?></small>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-phone-alt me-2 text-muted"></i>
                    <span><?= esc($js['country_code'] . $js['phone']) ?></span>
                  </div>
                  <div class="d-flex align-items-start mb-2">
                    <i class="fas fa-map-marker-alt me-2 mt-1 text-muted"></i>
                    <span><?= esc($js['address']) ?></span>
                  </div>
                </div>
                <div class="mt-auto pt-3">
                  <a href="<?= base_url('jobseeker/profile/' . $js['user_id']) ?>"
                    class="btn custom-btn w-100 d-flex align-items-center justify-content-center">
                    <?= lang('Global.view_full_profile') ?>
                    <?= $locale == 'en' ? '<i class="fas fa-chevron-right ms-2"></i>' : '<i class="fas fa-chevron-left ms-2"></i>' ?>

                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php

        endforeach;
      else:
        ?>
        <div class="text-center">
          <p><?= lang('Global.no_applicant_found') ?></p>
        </div>
      <?php endif; ?>
    </div>

    <div class="mt-5">
      <?= $pager->links('default', 'bootstrap_full') ?>
    </div>
  </div>
</section>

<style>
  .avatar-placeholder {
    width: 60px;
    height: 60px;
    font-size: 24px;
    font-weight: bold;
  }

  .hover-shadow {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
  }

  .card {
    border-radius: 12px;
    overflow: hidden;
  }

  .pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
  }

  .pagination .page-link {
    color: #0d6efd;
  }
</style>

<?= $this->endSection() ?>