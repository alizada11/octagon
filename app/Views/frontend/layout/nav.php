<!-- Navbar -->
<!-- sticky-top -->
<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <!-- Logo -->
    <div class="logo">
      <a class="navbar-brand text-white fw-bold" href="/">
        <img src="<?= base_url('images/logo.png') ?>" alt="Logo" class="logo-img">
      </a>
    </div>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" id="menuToggle">
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 448 512">
        <path d="M12.83 352h262.34A12.82 12.82 0 0 0 288 339.17v-38.34A12.82 12.82 0 0 0 275.17 288H12.83A12.82 12.82 0 0 0 0 300.83v38.34A12.82 12.82 0 0 0 12.83 352zm0-256h262.34A12.82 12.82 0 0 0 288 83.17V44.83A12.82 12.82 0 0 0 275.17 32H12.83A12.82 12.82 0 0 0 0 44.83v38.34A12.82 12.82 0 0 0 12.83 96zM432 160H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0 256H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" />
      </svg>
    </button>
    <?php $current_url = current_url(); ?>
    <!-- mobile custom menu -->
    <div id="customMenu" class="custom-menu-overlay  flex-column ">
      <button class="btn-close  position-absolute top-0 end-0 m-4" id="closeMenu"></button>
      <div class="">
        <div class="logo">
          <a class="navbar-brand text-white fw-bold" href="/">
            <img src="<?= base_url('images/logo.png') ?>" alt="Logo" class="logo-img">
          </a>
        </div>
        <ul class="list-unstyled fs-3">
          <li><a class="nav-link <?= ($current_url == base_url('/')) ? 'active' : '' ?>" href="/"><?= lang('Nav.home') ?></a></li>
          <li><a class="nav-link <?= ($current_url == base_url('/viar')) ? 'active' : '' ?>" href="<?= base_url('/viar') ?>"><?= lang('Nav.viar') ?> </a></li>
          <li><a class="nav-link <?= ($current_url == base_url('/shumus')) ? 'active' : '' ?>" href="<?= base_url('/shumus') ?>"> <?= lang('Nav.shumus') ?></a></li>
          <li><a class="nav-link <?= ($current_url == base_url('/contact-us')) ? 'active' : '' ?>" href="<?= base_url('/contact-us') ?>"> <?= lang('Nav.contact_us') ?></a></li>
        </ul>
        <hr>
        <ul class="mobile-menu-list">
          <li class="contact-details">
            <a href="tel:+97143232880">

              <span>
                <svg aria-hidden="true" class="e-font-icon-svg e-fas-phone-alt" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                  <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path>
                </svg> </span>
              <span class="elementor-icon-list-text">92220241</span>
            </a>
          </li>
          <li class="contact-details">
            <a href="mailto:%20info@meatpoint.com">

              <span>
                <svg aria-hidden="true" class="e-font-icon-svg e-fas-mail-bulk" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                  <path d="M160 448c-25.6 0-51.2-22.4-64-32-64-44.8-83.2-60.8-96-70.4V480c0 17.67 14.33 32 32 32h256c17.67 0 32-14.33 32-32V345.6c-12.8 9.6-32 25.6-96 70.4-12.8 9.6-38.4 32-64 32zm128-192H32c-17.67 0-32 14.33-32 32v16c25.6 19.2 22.4 19.2 115.2 86.4 9.6 6.4 28.8 25.6 44.8 25.6s35.2-19.2 44.8-22.4c92.8-67.2 89.6-67.2 115.2-86.4V288c0-17.67-14.33-32-32-32zm256-96H224c-17.67 0-32 14.33-32 32v32h96c33.21 0 60.59 25.42 63.71 57.82l.29-.22V416h192c17.67 0 32-14.33 32-32V192c0-17.67-14.33-32-32-32zm-32 128h-64v-64h64v64zm-352-96c0-35.29 28.71-64 64-64h224V32c0-17.67-14.33-32-32-32H96C78.33 0 64 14.33 64 32v192h96v-32z"></path>
                </svg> </span>
              <span class="elementor-icon-list-text">info@octagon.com</span>
            </a>
          </li>
        </ul>
        <hr>
        <div class="social-icons mb-4 d-flex justify-content-center align-items-center">
          <a href="#" class=""><i class="octa-icon fab fa-facebook-f"></i></a>
          <a href="#" class=""><i class="octa-icon fab fa-twitter"></i></a>
          <a href="#" class=""><i class="octa-icon fab fa-youtube"></i></a>
        </div>
        <hr>
        <div class="language-switcher d-flex align-items-center">

          <i class="fas fa-globe"></i>

          <?php

          if (session('lang') == 'en'):
          ?>
            <a href="<?= base_url('lang/ar') ?>">AR</a>
          <?php elseif (session('lang') == 'ar'):

          ?>
            <a href="<?= base_url('lang/en') ?>">EN</a>
          <?php endif; ?>

        </div>

      </div>
    </div>


    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav text-center me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= ($current_url == base_url('/')) ? 'active' : '' ?>" href="/"><?= lang('Nav.home') ?></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= ($current_url == base_url('/viar') || $current_url == base_url('/shumus')) ? 'active' : '' ?>"
            href="#" id="mainActivityDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <?= lang('Nav.main_activity') ?>
          </a>

          <ul class="dropdown-menu custom-dropdown" aria-labelledby="mainActivityDropdown">
            <li>
              <a class="dropdown-item custom-dropdown-item <?= ($current_url == base_url('/viar')) ? 'active' : '' ?>"
                href="<?= base_url('/viar') ?>">
                <?= lang('Nav.viar') ?>
              </a>
            </li>
            <li>
              <a class="dropdown-item custom-dropdown-item <?= ($current_url == base_url('/shumus')) ? 'active' : '' ?>"
                href="<?= base_url('/shumus') ?>">
                <?= lang('Nav.shumus') ?>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($current_url == base_url('/contact-us')) ? 'active' : '' ?>" href="<?= base_url('/contact-us') ?>"> <?= lang('Nav.contact_us') ?></a>
        </li>

      </ul>

      <!-- language and login btn -->
      <div class="language-switcher d-flex align-items-center">
        <?php

        if (session('lang') == 'en'):
        ?>
          <i class="fas fa-globe"></i>
          <a href="<?= base_url('lang/ar') ?>">AR</a>
        <?php elseif (session('lang') == 'ar'):

        ?>
          <a href="<?= base_url('lang/en') ?>">EN</a>
          <i class="fas fa-globe"></i>
        <?php endif; ?>

      </div>
      <?php
      if (!session()->get('isLoggedIn')) { ?>
        <a style="text-decoration: none; color:white; display:flex; align-items:center;" href="/login">
          <i class="fas fa-sign-in me-2 text-white"></i> <?= lang('Nav.join_us') ?></a>
      <?php } else { ?>
        <a href="/login" class="link-white"><i class="fas fa-tachometer-alt ms-3 fa-lg"></i> <?= lang('Global.dashboard') ?></a>
      <?php } ?>

    </div>
  </div>
</nav>