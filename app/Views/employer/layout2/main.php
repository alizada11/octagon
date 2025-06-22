<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>" dir="<?= (service('request')->getLocale() === 'ar') ? 'rtl' : 'ltr' ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Octagon | <?= $page_name; ?></title>
  <?php require('header_links.php') ?>
</head>

<body>
  <!-- Navbar -->

  <?php require_once('nav.php'); ?>
  <!-- Page Content -->

  <?= $this->renderSection('content') ?>

  <!-- Footer -->
  <footer class="text-white footer ">
    <div class="container text-center">

      <!-- Logo -->
      <div class="mb-4">
        <a href="/">

          <img src="<?= base_url('images/logo.png') ?>" class="footer-logo" alt="Octagon Logo" style="width: 112px; height:135px">
        </a>
      </div>
      <hr>
      <!-- Social Links -->
      <div class="mb-4">
        <a href="#" class=""><i class="octa-icon fab fa-facebook-f"></i></a>
        <a href="#" class=""><i class="octa-icon fab fa-twitter"></i></a>
        <a href="#" class=""><i class="octa-icon fab fa-youtube"></i></a>
      </div>
      <hr>
      <div class="d-flex justify-content-between footer-nav-copyright">
        <!-- Copyright -->
        <div class=" copyright">
          <?= $locale === 'ar'
            ? '© جميع الحقوق محفوظة أوكتاجون 2025'
            : '© 2025 Octagon. All rights reserved.' ?>
        </div>
        <!-- Footer Nav -->
        <div class="mb-3 footer-nav">
          <a href="<?= base_url('/viar') ?>" class="text-white text-decoration-none mx-2"><?= $locale === 'ar' ? 'تعرف علی فیار' : 'About Viar' ?></a>
          |
          <a href="<?= base_url('/shumus') ?>" class="text-white text-decoration-none mx-2"><?= $locale === 'ar' ? 'تعرف علی شموس' : '
          About Shams' ?></a>
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

</body>

</html>