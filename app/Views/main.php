<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>" dir="<?= (service('request')->getLocale() === 'ar') ? 'rtl' : 'ltr' ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon for regular browsers -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <title> Octagon | <?= $page_name; ?></title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link href="<?= base_url('css/swiper-bundle.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('css/other_bootstrap.min.css') ?>">

  <link href="<?= base_url('css/ostyles.css') ?>" rel="stylesheet">

  <!-- <link href="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.css" rel="stylesheet"> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <?php require('frontend/layout/header_links.php') ?>


  <script src="https://kit.fontawesome.com/8f755494e9.js" crossorigin="anonymous"></script>

</head>

<body>
  <!-- Loader -->
  <div id="preloader">
    <div class="loader-container">
      <div class="loader"></div>
    </div>
  </div>
  <!-- Navbar -->
  <?= view('partials/flash_message') ?>
  <div class="errors row">
    <?php if (session()->getFlashdata('success') || session()->getFlashdata('errors') || session()->getFlashdata('error')): ?>
      <div class="container mt-5" id="alert">
        <br>
        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= esc(session()->getFlashdata('success')) ?>
            <button type="button" class="w3-button w3-padding-small w3-text-red w3-right" onclick="$('#alert').remove();" aria-label="Close">&times;</button>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
              <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
              <?php endforeach; ?>
            </ul>
            <button type="button" class="w3-button w3-padding-small w3-text-red w3-right" onclick="$('#alert').remove();" aria-label="Close">&times;</button>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
              <li><?= esc(session()->getFlashdata('error')) ?></li>
            </ul>
            <button type="button" class="w3-button w3-padding-small w3-text-red w3-right" onclick="$('#alert').remove();" aria-label="Close">&times;</button>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php require_once('frontend/layout/nav.php'); ?>

  <?= $this->renderSection('content') ?>

  <!-- contact form -->
  <?php
  if ($page_name === 'Viar' || $page_name === 'Shams' || $page_name === 'Home' || $page_name === 'Contact Us'):
    require('contact_form.php');
  endif;
  ?>
  <!-- Footer -->
  <?php

  use App\Models\SettingsModel;

  $settings = (new SettingsModel())->getSettingsByType('footer');
  $footer = [];
  foreach ($settings as $row) {
    $footer[$row['key']] = $row['value'];
  } ?>
  <footer class="text-white footer ">
    <div class="container text-center">

      <!-- Logo -->
      <div class="mb-4">
        <a href="/">

          <img src="<?= base_url('uploads/' . ($footer['footer_logo'] ?? 'images/logo.png')) ?>" class="footer-logo" alt="Octagon Logo" style="width: 112px; height:135px">
        </a>
      </div>
      <hr>
      <!-- Social Links -->
      <div class="mb-4">
        <a href="<?= esc($footer['facebook'] ?? '#') ?>" class=""><i class="octa-icon fab fa-facebook-f"></i></a>
        <a href="<?= esc($footer['twitter'] ?? '#') ?>" class=""><i class="octa-icon fab fa-twitter"></i></a>
        <a href="<?= esc($footer['youtube'] ?? '#') ?>" class=""><i class="octa-icon fab fa-youtube"></i></a>
      </div>
      <hr>
      <div class="d-flex justify-content-between footer-nav-copyright">
        <!-- Copyright -->
        <div class=" copyright">
          <?= $locale === 'ar' ? esc($footer['copyright_ar'] ?? '') : esc($footer['copyright_en'] ?? '') ?>
        </div>
        <!-- Footer Nav -->
        <div class="mb-3 footer-nav">
          <a href="<?= esc($footer['footer_link_1_url'] ?? '#') ?>" class="text-white text-decoration-none mx-2">
            <?= lang($footer['footer_link_1_text'] ?? '') ?>
          </a>
          |
          <a href="<?= esc($footer['footer_link_2_url'] ?? '#') ?>" class="text-white text-decoration-none mx-2">
            <?= lang($footer['footer_link_2_text'] ?? '') ?>
          </a>
        </div>

      </div>
    </div>
  </footer>

  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <script>
    const swiper = new Swiper(".mySwiper", {
      loop: true,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      on: {
        slideChangeTransitionEnd: function() {
          // Remove "show" from all fade-up elements
          document.querySelectorAll('.fade-up').forEach(el => {
            el.classList.remove('show');
          });

          // Add "show" only to current slide's elements
          const activeSlide = document.querySelector('.swiper-slide-active');
          activeSlide.querySelectorAll('.fade-up').forEach(el => {
            setTimeout(() => {
              el.classList.add('show');
            }, 100); // Small delay for smoother effect
          });
        }
      }
    });

    // Initial animation on load
    window.addEventListener('load', () => {
      const activeSlide = document.querySelector('.swiper-slide-active');
      activeSlide.querySelectorAll('.fade-up').forEach(el => {
        setTimeout(() => {
          el.classList.add('show');
        }, 100);
      });
    });
  </script>
  <script>
    AOS.init({
      duration: 2000,
      once: true
    });
  </script>

  <script>
    const menuToggle = document.getElementById("menuToggle");
    const customMenu = document.getElementById("customMenu");
    const closeMenu = document.getElementById("closeMenu");

    menuToggle.addEventListener("click", () => {
      customMenu.classList.add("show");
      document.body.style.overflow = 'hidden'; // Optional: prevent scroll
    });

    closeMenu.addEventListener("click", () => {
      customMenu.classList.remove("show");
      document.body.style.overflow = ''; // Reset scroll
    });
  </script>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const counters = document.querySelectorAll(".counter-up");

      const options = {
        threshold: 0.6
      };

      const animateCounter = (el) => {
        const target = +el.getAttribute("data-count");
        let count = 0;
        const duration = 2000; // 2 seconds
        const step = Math.ceil(target / (duration / 16)); // ~60 FPS

        const updateCounter = () => {
          count += step;
          if (count < target) {
            el.textContent = '+' + count;
            requestAnimationFrame(updateCounter);
          } else {
            el.textContent = '+' + target;
          }
        };
        updateCounter();
      };

      const observer = new IntersectionObserver(function(entries, obs) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            obs.unobserve(entry.target); // Animate only once
          }
        });
      }, options);

      counters.forEach(counter => {
        observer.observe(counter);
      });
    });
  </script>
  <!-- Loader Script -->
  <script>
    // Wait for window load
    window.addEventListener('load', function() {
      var preloader = document.getElementById('preloader');
      // Add fade-out class
      preloader.classList.add('fade-out');
      // Remove preloader after animation completes
      setTimeout(function() {
        preloader.style.display = 'none';
      }, 500);
    });

    // Fallback in case load event doesn't fire
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        var preloader = document.getElementById('preloader');
        if (preloader) {
          preloader.classList.add('fade-out');
          setTimeout(function() {
            preloader.style.display = 'none';
          }, 500);
        }
      }, 3000); // Maximum 3 seconds wait time
    });
  </script>

  <style>
    /* Add fade-out animation */
    #preloader.fade-out {
      opacity: 0;
      transition: opacity 0.5s ease-out;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const loadingModal = document.getElementById('target');
      const minDisplayTime = 2000; // 2 seconds minimum display time
      let pageLoadStart = Date.now();

      // Always hide modal first in case it was persisted
      loadingModal.style.display = 'none';

      // Show modal when page starts loading
      loadingModal.style.display = 'block';
      pageLoadStart = Date.now();

      // Calculate remaining time to meet minimum display duration
      function hideModal() {
        const elapsed = Date.now() - pageLoadStart;
        const remaining = Math.max(0, minDisplayTime - elapsed);

        setTimeout(function() {
          loadingModal.style.display = 'none';
        }, remaining);
      }

      // Hide modal when page is loaded (with minimum display time)
      window.addEventListener('load', hideModal);

      // Special handling for back/forward navigation
      window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
          loadingModal.style.display = 'none';
        } else {
          // For fresh loads via back/forward, show for minimum time
          loadingModal.style.display = 'block';
          pageLoadStart = Date.now();
          setTimeout(hideModal, minDisplayTime);
        }
      });

      // Error handling
      window.addEventListener('error', hideModal);
    });
  </script>
</body>

</html>