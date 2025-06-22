<!DOCTYPE html>
<html lang="<?=sess()->get('lang')?>">
  <head>
  <title><?= $this->renderSection('title') ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="<?= lang('app.keywords') ?>">
    <meta name="description" content="<?= lang('app.description') ?>">
    <meta name="author" content="<?= lang('app.author') ?>">
    <link rel="shortcut icon" href="<?=base_url('favicon.ico')?>" type="image/x-icon">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="<?=base_url('assets/css/swiper-bundle.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="<?=base_url('assets/css/styles.css')?>" rel="stylesheet">
    
    <link rel="stylesheet" href="<?=base_url('assets/css/other_bootstrap.min.css')?>">

    <link href="<?=base_url('assets/css/ostyles.css')?>" rel="stylesheet">
    
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://kit.fontawesome.com/8f755494e9.js" crossorigin="anonymous"></script>


    </head>
  <body>

  <header id="header" class="header d-flex align-items-center sticked">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?=base_url()?>" class="logo d-flex align-items-center w3-margin-left" onclick="loadding()">
      <img src="<?=base_url('loadimg/img/logo.png')?>" alt="Tawseel Logo">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li onclick="loadding();"><a href="<?=base_url()?>"> <?=lang('app.home')?> </a></li>
         
          <li class="dropdown"><a href="#" class=""><span><?=lang('app.activity')?></span> <i class="bi dropdown-indicator bi-chevron-down"></i></a>
            <ul>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('eCommerce')?>"><?=lang('app.eCommerce')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('logistics')?>"><?=lang('app.logistics')?></a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#" class=""><span><?=lang('app.business')?></span> <i class="bi dropdown-indicator bi-chevron-down"></i></a>
            <ul class="">
            <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="https://store.tawseelonline.om"><?=lang('app.store')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="https://souq.tawseelonline.om"><?=lang('app.souq')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="https://c2c.tawseelonline.om"><?=lang('app.tawseel')?></a></li>
            </ul>
          </li>

          <li>
                <a 
        <?php 
        if (!session()->get('logged_in')) 
        {
            echo "href=".base_url('login')." onclick='loadding();'";
        } 
        elseif(is_location())
        {
            echo "href='https://product.tawseelonline.om/home/" . 
                 enc(session()->get('user_id') ?? '') . "/" .
                 "onclick='loadding()'";
        }
        else
        {
            echo "href='#' data-toggle='modal' data-target='#locationModal' ";
        } 
        ?> 
        >
        <?= lang('app.device') ?>
    </a>
            </li>
          <li><a href="#" onclick="alert('Under Development...')" class=""><?=lang('app.blogs')?></a></li>
          <li><a href="<?=base_url('contact')?>" onclick="loadding();"><?=lang('app.contact')?></a></li>
          <li><a href="<?=base_url('about')?>" onclick="loadding();"><?=lang('app.about')?></a></li>

          <?php
          if(sess()->get('logged_in'))
          {?>
            <li class="dropdown"><a href="#" class=""><i class="fas fa-user-circle	w3-xlarge"></i> <i class="bi dropdown-indicator bi-chevron-down"></i></a>
            <ul>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('dashboard')?>"><?=lang('app.dashboard')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('change/password')?>"><?=lang('app.change_password')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('myprofile')?>"><?=lang('app.profile')?></a></li>
              <li onclick="loadding();"><a class="dropdown-item w3-text-blue" href="<?=base_url('logout')?>"><?=lang('app.logout')?></a></li>
            </ul>
          </li>
          <?php
          }
          else
          {?>
            <li><a href="<?=base_url('login')?>" onclick="loadding()" class=""><?=lang('app.login2')?></a></li>
          <?php
          }?>

        </ul>
      </nav>
      
      <a href="tel:<?=lang('app.phone')?>" class="bi bi-telephone-inbound-fill w3-large w3-hover-text-blue"> </a>
      <a href="https://wa.me/<?=lang('app.phone')?>" class="bi bi-whatsapp w3-large w3-hover-text-green"> </a>
      <button id="darkmode-button"><i class="bi bi-moon-fill"></i></button>
    
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      
    </div>
  </header>

  <section>
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


  <?= $this->renderSection('content') ?>
</section>
<!-- Footer -->
<footer id="footer" class="footer-section">
    <div class="container">
        <div class="footer-content pt-5 pb-5 w3-margin-left aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-text">
                            <p><?=lang('app.footer')?></p>
                        </div>
                        <div class="footer-social-icon">
                            <span><?=lang('app.contact_title')?></span>
                          <a href="https://www.facebook.com/tawseelsocial" target="_bank"><i class="bi bi-facebook"></i></a>
                          <a href="https://www.instagram.com/tawseel_online?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_bank"><i class="bi bi-instagram"></i></a>
                          <a href="https://x.com/tawseelonline" target="_bank"><i class="bi bi-twitter"></i></a>
                          <a href="https://www.youtube.com/@tawseelonline" target="_bank"><i class="bi bi-youtube"></i></a>
                          <a href="mailto:info@tawseelonline.om" target="_bank"><i class="bi bi-envelope"></i></a>            
                          <a href="tel:<?=lang('app.phone')?>" target="_bank"><i class="bi bi-phone"> </i> <?=lang('app.phone_view')?></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                      <div class="service-widget footer-widget">
                        <div class="footer-widget-heading">
                            <h3><?=lang('app.services')?></h3>
                          <div class="footer-text">
                              <p> <?=lang('app.b2b')?></p>
                              <p> <?=lang('app.b2c')?></p>
                              <p> <?=lang('app.c2c')?></p>
                              <p> <?=lang('app.b2b2c')?></p>
                            </div>
                       
							</div>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                      <div class="service-widget footer-widget">
                        <div class="footer-widget-heading">
                            <h3><?=lang('app.links')?></h3>
                        </div>
        <ul>
          <a href="<?=base_url()?>" class="w3-text-white"><?=lang('app.home')?></a>
          <br>
          <a href="<?=base_url('eCommerce')?>" class="w3-text-white"><?=lang('app.eCommerce')?></a>
          <br>
          <a href="<?=base_url('logistics')?>" class="w3-text-white"><?=lang('app.logistics')?></a>
          <br>
          <a href="https://store.tawseelonline.om" class="w3-text-white"><?=lang('app.store')?></a>
          <br>
          <a href="https://souq.tawseelonline.om" class="w3-text-white"><?=lang('app.souq')?></a>
          <br>
          <a href="https://c2c.tawseelonline.om" class="w3-text-white"><?=lang('app.tawseel')?></a>
          <br>
                  <a   class="w3-text-white" 
        <?php 
        if (!session()->get('logged_in')) 
        {
            echo "href=".base_url('login')." onclick='loadding();'";
        } 
        elseif(is_location())
        {
            echo "href='https://product.tawseelonline.om/home/" . 
                 enc(session()->get('user_id') ?? '') . "/" .
                 "onclick='loadding()'";
        }
        else
        {
            echo "href='#' data-toggle='modal' data-target='#locationModal' ";
        } 
        ?> 
        >
        <?= lang('app.device') ?>
    </a>
          <br>
          <a href="<?=base_url('blogs')?>" class="w3-text-white"><?=lang('app.blogs')?></a>
          <br>
          <a href="<?=base_url('contact')?>" class="w3-text-white"><?=lang('app.contact')?></a>
          <br>
          <a href="<?=base_url('about')?>" class="w3-text-white"><?=lang('app.about')?></a>
          

        </ul>
                      </div>
                  </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="contact-widget footer-widget">
                        <div class="footer-widget-heading">
                            <h3><?=lang('app.legal_information')?></h3>
                        </div>
                          <div class="footer-text">
                              <a href="<?=base_url('terms-conditions')?>" class="w3-text-white"><?=lang('app.terms_conditions')?></a>
                              <br>
                              <a href="<?=base_url('privacy-policy')?>" class="w3-text-white"><?=lang('app.privacy_policy')?></a>
                              <br>
                              <a href="<?=base_url('refund-cancellation')?>" class="w3-text-white"><?=lang('app.refund_policy')?></a>
                          </div>
                    </div>
                    <br>
                    
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3><?=lang('app.download_our_app')?></h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>
                              <?=lang('app.download_our_app_title')?>
                              <div class="app-buttons">
                                <a href="https://apps.apple.com/om/app/tawseelonline/id1511664020" target="_blank">
                                    <img src="https://store.tawseelonline.om/assets/custom/img/images/app_store.png" width="125px" alt="Download on the App Store">
                                </a>
                                <a href="https://play.google.com/store/apps/details?id=com.catseye.tawseel" target="_blank">
                                    <img src="https://store.tawseelonline.om/assets/custom/img/images/play_store.png" width="120px" alt="Get it on Google Play">
                                </a>
                            </div>
                          </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="text-center">
                    <div class="copyright-text">
                        <p><?=lang('app.copyright')?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </footer>
  <div id="target" class="w3-modal" style="z-index:1000"></div>
  <!-- End Footer -->
  <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/js/glightbox.min.js')?>"></script>
  <script src="<?=base_url('assets/js/swiper-bundle.min.js')?>"></script>
  <script src="<?=base_url('assets/js/purecounter_vanilla.js')?>"></script>
  <script src="<?=base_url('assets/js/validator.min.js')?>"></script>
  <script src="<?=base_url('assets/js/particles.min.js')?>"></script>
  <!--<script src="<?=base_url('assets/js/script.js')?>"></script>-->
  <script src="<?=base_url('assets/js/main.js')?>"></script>
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
        });
    </script>

  <script>
    $('#target').html("<div class='w3-display-middle loader-wrapper'><div class='loader'><div class='circle-one'></div><div class='circle-two'></div></div></div>").show();

    document.addEventListener("DOMContentLoaded", function() 
    {
        window.onload = function() 
        {
            $('#target').hide();
        };
    });

    function loadding()
    {
      $('#target').html("<div class='w3-display-middle loader-wrapper'><div class='loader'><div class='circle-one'></div><div class='circle-two'></div></div></div>").show();
    }
    </script>

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
  