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
          <form action="<?= base_url('apply/apply') ?>" method="post">

            <div class="mb-3">
              <label class="mb-2" for="category">Select the category</label>
              <?php
              if ($seg_name == 'Viar') {
                include('layout/viar_service_select.php');
              } elseif ($seg_name == 'Shams') {
                include('layout/shumus_service_select.php');
              }
              ?>
            </div>
            <!-- Country dropdown -->
            <div class="mb-3">
              <label for="country"><?= $locale === 'ar' ? 'اختر الدولة' : 'Select your country' ?></label>
              <select name="country_id" class="form-control" required>
                <option value=""><?= $locale === 'ar' ? 'يرجى اختيار الدولة' : 'Please select a country' ?></option>
                <?php foreach ($countries as $country): ?>
                  <option value="<?= $country['id'] ?>">
                    <?= $locale === 'ar' ? $country['country_name_ar'] : $country['country_name_en'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Agency select (initially hidden) -->
            <div class="mb-3" id="agency-wrapper" style="display:none;">
              <label for="agency-select"><?= $locale === 'ar' ? 'اختر الوكالة' : 'Select Agency' ?></label>
              <select name="agency_id" class="form-control" id="agency-select" required></select>
            </div>

            <!-- Message for no agency -->
            <div class="text-danger mb-3" id="no-agency-message" style="font-weight: bold;"></div>


            <button type="submit" class="btn btn-alert w-100 text-white ">
              <?php $role = session()->get('role');

              if ($role === 'jobseeker'):
              ?>
                <?= $locale === 'ar' ? 'يتقدم' : 'Apply' ?>
              <?php elseif ($role === 'employer'): ?>
                <?= $locale === 'ar' ? 'التوظیف' : 'Hire' ?>
              <?php endif; ?>
            </button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const countrySelect = document.querySelector('select[name="country_id"]');
    const agencySelectWrapper = document.getElementById("agency-wrapper");
    const agencySelect = document.getElementById("agency-select");
    const noAgencyMsg = document.getElementById("no-agency-message");
    const lang = '<?= $locale ?>'; // either 'ar' or 'en'

    // ✅ Set the name attribute dynamically
    agencySelect.setAttribute("name", "agency_id");

    countrySelect.addEventListener("change", function() {
      const countryId = this.value;

      agencySelect.innerHTML = "";
      agencySelectWrapper.style.display = "none";
      noAgencyMsg.textContent = "";

      if (!countryId) return;

      fetch(`<?= base_url("get-agencies") ?>/${countryId}`)
        .then(response => response.json())
        .then(data => {
          if (data.length === 0) {
            noAgencyMsg.textContent = lang === 'ar' ?
              'لا توجد وكالة في هذا البلد' :
              'No agency in this country';
            return;
          }

          agencySelectWrapper.style.display = "block";

          const defaultOption = document.createElement("option");
          defaultOption.value = "";
          defaultOption.textContent = lang === 'ar' ?
            'يرجى اختيار الوكالة' :
            'Please select an agency';
          agencySelect.appendChild(defaultOption);

          data.forEach(agency => {
            const option = document.createElement("option");
            option.value = agency.id;
            option.textContent = agency.name + " - " + agency.address;
            agencySelect.appendChild(option);
          });
        })
        .catch(error => {
          noAgencyMsg.textContent = lang === 'ar' ?
            'حدث خطأ أثناء تحميل الوكالات' :
            'Error loading agencies';
        });
    });
  });
</script>


<?= $this->endSection() ?>