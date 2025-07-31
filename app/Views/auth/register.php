<?= $this->extend('auth/layout/auth_layout') ?>
<?= $this->section('content') ?>

<?php $locale = service('request')->getLocale(); ?>
<h4 class="text-center mb-4"><?= lang('Auth.register_title') ?></h4>

<form method="post" action="<?= base_url('register') ?>">
  <?= csrf_field() ?>

  <?php if (isset($validation)): ?>
    <div class="alert alert-danger">
      <?= $validation->listErrors(); ?>
    </div>
  <?php endif; ?>

  <div class="row">
    <!-- Full Name -->
    <div class="col-md-6 mb-3">
      <label><?= lang('Auth.full_name') ?></label>
      <input type="text" name="full_name" class="form-control" value="<?= set_value('full_name') ?>">
      <?php if (isset($validation)): ?>
        <small class="text-danger"><?= $validation->getError('full_name') ?></small>
      <?php endif; ?>
    </div>

    <!-- Email -->
    <div class="col-md-6 mb-3">
      <label><?= lang('Auth.email') ?></label>
      <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>">
      <?php if (isset($validation)): ?>
        <small class="text-danger"><?= $validation->getError('email') ?></small>
      <?php endif; ?>
    </div>

    <!-- Password -->
    <div class="col-md-6 mb-3">
      <label><?= lang('Auth.password') ?></label>
      <input type="password" name="password" class="form-control">
      <?php if (isset($validation)): ?>
        <small class="text-danger"><?= $validation->getError('password') ?></small>
      <?php endif; ?>
    </div>

    <!-- Confirm Password -->
    <div class="col-md-6 mb-3">
      <label><?= lang('Auth.confirm_password') ?></label>
      <input type="password" name="confirm_password" class="form-control">
      <?php if (isset($validation)): ?>
        <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
      <?php endif; ?>
    </div>

    <!-- Role -->
    <div class="col-md-6 mb-3">
      <label><?= lang('Auth.role') ?></label>
      <select name="role" class="form-control">
        <option value=""><?= lang('Auth.select_role') ?></option>
        <option value="employer" <?= set_select('role', 'employer') ?>><?= lang('Auth.employer') ?></option>
        <option value="jobseeker" <?= set_select('role', 'jobseeker') ?>><?= lang('Auth.jobseeker') ?></option>
        <option value="agency" <?= set_select('role', 'agency') ?>><?= lang('Auth.agency') ?></option>
      </select>
      <?php if (isset($validation)): ?>
        <small class="text-danger"><?= $validation->getError('role') ?></small>
      <?php endif; ?>
    </div>

    <!-- Employer Type -->
    <div class="col-md-6 mb-3" id="employerTypeWrapper" style="display: none;">
      <label><?= lang('Auth.employer_type') ?></label>
      <select name="account_type" class="form-control">
        <option value="personal" <?= set_select('account_type', 'personal') ?>><?= lang('Auth.personal_employer') ?></option>
        <option value="company" <?= set_select('account_type', 'company') ?>><?= lang('Auth.company_employer') ?></option>
      </select>
      <?php if (isset($validation)): ?>
        <small class="text-danger"><?= $validation->getError('account_type') ?></small>
      <?php endif; ?>
    </div>

    <!-- Country Selection (hidden by default) -->
    <div class="col-md-6 mb-3" id="countryWrapper" style="display: none;">
      <label class="form-label"><?= lang('Auth.country') ?></label>
      <select name="countries" id="countrySelect" class="form-select">
        <option value=""><?= lang('Auth.select_country'); ?></option>
        <?php foreach ($countries as $country): ?>
          <option value="<?= esc($country['id']) ?>">
            <?= esc($locale == 'en' ? $country['country_name_en'] : $country['country_name_ar']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <!-- <div class="col-md-6 mb-3" id="agencyWrapper" style="display: none;">
      <label class="form-label"><?= lang('Auth.select_agency') ?></label>
      <select name="agency_id" id="agencySelect" class="form-select">
        <option selected value=""><?= lang('Auth.select_agency') ?></option>
    
      </select>
    </div> -->
    <!-- Available for Work -->
    <div class="col-md-12 mb-3" id="availableForWorkWrapper" style="display: none;">
      <label class="form-label"><?= lang('Auth.interested_areas') ?></label>
      <select name="available_for_work[]" class="form-select select2-tags" multiple="multiple" data-placeholder="<?= lang('Auth.select_or_search') ?>">
        <?php
        $selected = old('available_for_work') ?? [];
        foreach ($services as $field):

          $value = $field['id'];
          $label = $locale == 'en' ? $field['title_en'] : $field['title_ar'];
        ?>
          <option value="<?= esc($value) ?>" <?= in_array($value, $selected) ? 'selected' : '' ?>>
            <?= esc($label) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>


  </div>

  <button type="submit" id="register_btn" class="btn btn-primary w-100"><?= lang('Auth.register') ?></button>
  <div class="d-flex justify-content-between align-items-center">
    <p class="mt-3 text-center"><a href="<?= base_url('login') ?>" class="auth-links"><?= lang('Auth.back_to_login') ?></a></p>
</form>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.querySelector('select[name="role"]');
    const availableWrapper = document.getElementById('availableForWorkWrapper');
    const employerTypeWrapper = document.getElementById('employerTypeWrapper');
    const countryWrapper = document.getElementById('countryWrapper');
    const agencyWrapper = document.getElementById('agencyWrapper');
    const countrySelect = document.getElementById('countrySelect');

    function toggleFields() {
      const role = roleSelect.value;
      const country = countrySelect.value;

      // Toggle based on role
      availableWrapper.style.display = (role === 'jobseeker') ? 'block' : 'none';
      employerTypeWrapper.style.display = (role === 'employer') ? 'block' : 'none';
      countryWrapper.style.display = (role === 'jobseeker') ? 'block' : 'none';

      // Only show agencyWrapper if role is jobseeker and country is selected
      agencyWrapper.style.display = (role === 'jobseeker' && country) ? 'block' : 'none';
    }

    // Listen to role changes
    roleSelect.addEventListener('change', toggleFields);
    countrySelect.addEventListener('change', toggleFields); // Refresh agency visibility if country is selected after

    toggleFields(); // Initialize on page load
  });
</script>

<script>
  const selectAgencyText = "<?= lang('Auth.select_agency') ?>";
  const noAgenciesText = "<?= lang('Auth.no_agencies_found') ?>";
  const errorText = "<?= lang('Auth.error_fetching_agencies') ?>";

  document.addEventListener('DOMContentLoaded', function() {

    const countrySelect = document.getElementById('countrySelect');
    const agencyWrapper = document.getElementById('agencyWrapper');
    const submitBtn = document.getElementById('register_btn');
    const agencySelect = document.getElementById('agencySelect');

    countrySelect.addEventListener('change', function() {
      const countryId = this.value;

      agencySelect.innerHTML = `<option value="">Loading...</option>`;
      agencyWrapper.style.display = 'none';

      if (!countryId) return;

      fetch(`<?= base_url('get-agencies-by-country') ?>/${countryId}`)
        .then(response => response.json())
        .then(data => {
          agencySelect.innerHTML = ''; // Clear

          if (data.length > 0) {
            agencyWrapper.style.display = 'block';
            agencySelect.innerHTML = `<option value="">${selectAgencyText}</option>`;

            data.forEach(function(agency) {
              const option = document.createElement('option');
              option.value = agency.id;
              option.textContent = agency.name;
              agencySelect.appendChild(option);
            });
          } else {
            agencySelect.innerHTML = `<option value="">${noAgenciesText}</option>`;

            agencyWrapper.style.display = 'block';
          }
        })
        .catch(error => {
          console.error('Error fetching agencies:', error);
          agencySelect.innerHTML = `<option value="">${errorText}</option>`;
          agencyWrapper.style.display = 'block';
        });
    });
  });
</script>


<?= $this->endSection() ?>