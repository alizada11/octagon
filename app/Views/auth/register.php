<?= $this->extend('auth/layout/auth_layout') ?>
<?= $this->section('content') ?>

<h4 class="text-center mb-4"><?= lang('Auth.register_title') ?></h4>

<form method="post" action="<?= base_url('register') ?>">
  <?= csrf_field() ?>

  <?php if (isset($validation)): ?>
    <div class="alert alert-danger">
      <?= $validation->listErrors(); ?>
    </div>
  <?php endif; ?>

  <div class="mb-3">
    <label><?= lang('Auth.full_name') ?></label>
    <input type="full_name" name="full_name" class="form-control" value="<?= set_value('full_name') ?>">
    <?php if (isset($validation)): ?>
      <small class="text-danger"><?= $validation->getError('full_name') ?></small>
    <?php endif; ?>
  </div>
  <div class="mb-3">
    <label><?= lang('Auth.email') ?></label>
    <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>">
    <?php if (isset($validation)): ?>
      <small class="text-danger"><?= $validation->getError('email') ?></small>
    <?php endif; ?>
  </div>


  <div class="mb-3">
    <label><?= lang('Auth.password') ?></label>
    <input type="password" name="password" class="form-control">
    <?php if (isset($validation)): ?>
      <small class="text-danger"><?= $validation->getError('password') ?></small>
    <?php endif; ?>
  </div>

  <div class="mb-3">
    <label><?= lang('Auth.confirm_password') ?></label>
    <input type="password" name="confirm_password" class="form-control">
    <?php if (isset($validation)): ?>
      <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
    <?php endif; ?>
  </div>

  <!-- Role -->
  <div class="mb-3">
    <label><?= lang('Auth.role') ?></label>
    <select name="role" class="form-control">
      <option value=""><?= lang('Auth.select_role') ?></option>
      <option value="employer" <?= set_select('role', 'employer') ?>><?= lang('Auth.employer') ?></option>
      <option value="jobseeker" <?= set_select('role', 'jobseeker') ?>><?= lang('Auth.jobseeker') ?></option>
    </select>
    <?php if (isset($validation)): ?>
      <small class="text-danger"><?= $validation->getError('role') ?></small>
    <?php endif; ?>
  </div>
  <div class="mb-3" id="employerTypeWrapper" style="display: none;">
    <label><?= lang('Auth.employer_type') ?></label>
    <select name="account_type" class="form-control">
      <option value="personal" <?= set_select('account_type', 'personal') ?>><?= lang('Auth.personal_employer') ?></option>
      <option value="company" <?= set_select('account_type', 'company') ?>><?= lang('Auth.company_employer') ?></option>
      <option value="agency" <?= set_select('account_type', 'agency') ?>><?= lang('Auth.agency_employer') ?></option>
    </select>
    <?php if (isset($validation)): ?>
      <small class="text-danger"><?= $validation->getError('account_type') ?></small>
    <?php endif; ?>
  </div>
  <div class="mb-3" id="availableForWorkWrapper" style="display: none;">
    <label class="form-label"><?= lang('Auth.interested_areas') ?></label>
    <select name="available_for_work[]" class="form-select select2-tags" multiple="multiple" data-placeholder="<?= lang('Auth.select_or_search') ?>">
      <?php
      $selected = old('available_for_work') ?? []; // or from DB
      foreach ($services as $field):
        $value = $field['id']; // or $field->id if it's an object
        $label = $field['title']; // or $field->name
      ?>
        <option value="<?= esc($value) ?>" <?= in_array($value, $selected) ? 'selected' : '' ?>>
          <?= esc($label) ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>


  <button class="btn  w-100"><?= lang('Auth.register') ?></button>
  <div class="d-flex justify-content-between align-items-center">
    <p class="mt-3 text-center"><a href="<?= base_url('login') ?>" class="auth-links"><?= lang('Auth.back_to_login') ?></a></p>
</form>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const roleSelect = document.querySelector('select[name="role"]');
    const availableWrapper = document.getElementById('availableForWorkWrapper');
    const employerTypeWrapper = document.getElementById('employerTypeWrapper');

    function toggleFields() {
      const role = roleSelect.value;

      // Show jobseeker field options
      availableWrapper.style.display = (role === 'jobseeker') ? 'block' : 'none';

      // Show employer type dropdown
      employerTypeWrapper.style.display = (role === 'employer') ? 'block' : 'none';
    }

    roleSelect.addEventListener('change', toggleFields);
    toggleFields(); // run on page load in case of set_value()
  });
</script>

<?= $this->endSection() ?>