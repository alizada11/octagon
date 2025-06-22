<?php $profile = $profile ?? null; ?>

<div class="row g-3 mb-3">
  <div class="col-md-6">
    <label for="full_name" class="form-label"><?= lang('Global.full_name') ?></label>
    <input type="text" name="full_name" class="form-control" value="<?= old('full_name', $profile['full_name'] ?? '') ?>" required>
  </div>

  <div class="col-md-6">
    <label for="dob" class="form-label"><?= lang('Global.dob') ?></label>
    <input type="date" name="dob" class="form-control" value="<?= old('dob', $profile['dob'] ?? '') ?>" required>
  </div>

  <div class="col-md-6">
    <label for="gender" class="form-label"><?= lang('Global.gender') ?></label>
    <select name="gender" class="form-select" required>
      <option value=""><?= lang('Global.select_gender') ?></option>
      <option value="male" <?= old('gender', $profile['gender'] ?? '') === 'male' ? 'selected' : '' ?>><?= lang('Global.male') ?></option>
      <option value="female" <?= old('gender', $profile['gender'] ?? '') === 'female' ? 'selected' : '' ?>><?= lang('Global.female') ?></option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="marital_status" class="form-label"><?= lang('Global.marital_status') ?></label>
    <select name="marital_status" class="form-select" required>
      <option value=""><?= lang('Global.select_status') ?></option>
      <option value="single" <?= old('marital_status', $profile['marital_status'] ?? '') === 'single' ? 'selected' : '' ?>><?= lang('Global.single') ?></option>
      <option value="married" <?= old('marital_status', $profile['marital_status'] ?? '') === 'married' ? 'selected' : '' ?>><?= lang('Global.married') ?></option>
      <option value="divorced" <?= old('marital_status', $profile['marital_status'] ?? '') === 'divorced' ? 'selected' : '' ?>><?= lang('Global.divorced') ?></option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="nationality" class="form-label"><?= lang('Global.nationality') ?></label>
    <?php
    $nationalities = include dirname(__DIR__, 3) . '/partials/nationalities.php';
    $selectedNationality = $profile['nationality'] ?? '';
    ?>
    <select name="nationality" class="form-select">
      <option value=""><?= lang('Global.select_nationality') ?></option>
      <?php foreach ($nationalities as $nat): ?>
        <option value="<?= esc($nat) ?>" <?= $nat === $selectedNationality ? 'selected' : '' ?>> <?= lang('Nationalitites.' . $nat) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-6">
    <label for="religion" class="form-label"><?= lang('Global.religion') ?></label>
    <?php
    $religions = include dirname(__DIR__, 3) . '/partials/religions.php';
    $selectedReligion = old('religion', $profile['religion'] ?? '');
    ?>
    <select name="religion" class="form-select">
      <option value=""><?= lang('Global.select_religion') ?></option>
      <?php foreach ($religions as $religion): ?>
        <option value="<?= esc($religion) ?>" <?= $religion === $selectedReligion ? 'selected' : '' ?>><?= lang('Religions.' . $religion) ?></option>
      <?php endforeach; ?>
    </select>
  </div>


  <div class="col-md-6">
    <label for="place_of_birth" class="form-label"><?= lang('Global.place_of_birth') ?></label>
    <input type="text" name="place_of_birth" class="form-control" value="<?= old('place_of_birth', $profile['place_of_birth'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label for="living_town" class="form-label"><?= lang('Global.living_town') ?></label>
    <input type="text" name="living_town" class="form-control" value="<?= old('living_town', $profile['living_town'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label for="no_of_children" class="form-label"><?= lang('Global.no_of_children') ?></label>
    <input type="text" name="no_of_children" class="form-control" value="<?= old('no_of_children', $profile['no_of_children'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label for="weight" class="form-label"><?= lang('Global.weight') ?></label>
    <input type="text" name="weight" class="form-control" value="<?= old('weight', $profile['weight'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label for="height" class="form-label"><?= lang('Global.height') ?></label>
    <input type="text" name="height" class="form-control" value="<?= old('height', $profile['height'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label for="complexion" class="form-label"><?= lang('Global.complexion') ?></label>
    <select name="complexion" class="form-select" required>
      <option value=""><?= lang('Global.select_complexion') ?></option>
      <option value="fair" <?= old('complexion', $profile['complexion'] ?? '') === 'fair' ? 'selected' : '' ?>><?= lang('Global.fair') ?></option>
      <option value="medium" <?= old('complexion', $profile['complexion'] ?? '') === 'medium' ? 'selected' : '' ?>><?= lang('Global.medium') ?></option>
      <option value="olive" <?= old('complexion', $profile['complexion'] ?? '') === 'olive' ? 'selected' : '' ?>><?= lang('Global.olive') ?></option>
      <option value="dark" <?= old('complexion', $profile['complexion'] ?? '') === 'dark' ? 'selected' : '' ?>><?= lang('Global.dark') ?></option>
    </select>
  </div>

  <div class="col-md-6">
    <label for="address" class="form-label"><?= lang('Global.address') ?></label>
    <input type="text" name="address" class="form-control" value="<?= old('address', $profile['address'] ?? '') ?>">
  </div>

  <div class="col-md-6">
    <label for="phone" class="form-label"><?= lang('Global.phone') ?></label>
    <?php
    $countries = json_decode(file_get_contents(dirname(__DIR__, 3) . '/partials/countries-codes.json'), true);
    $selected = old('country_code', $profile['country_code'] ?? '+91');
    $phoneVal = old('phone', $profile['phone'] ?? '');
    ?>
    <div class="input-group">
      <select id="country_code" name="country_code" class="form-select" style="max-width: 100px;">
        <?php foreach ($countries as $ct): ?>
          <option value="<?= esc($ct['dial_code']) ?>" <?= $ct['dial_code'] === $selected ? 'selected' : '' ?>>
            <?= esc($ct['dial_code']) ?> <?= esc($ct['code']) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <input type="text" name="phone" id="phone_number" class="form-control" value="<?= esc($phoneVal) ?>">
    </div>
  </div>
  <?php if ($profile['nationality'] == 'Omani' && role_type() == 'jobseeker'): ?>
    <div class="col-md-6">
      <div class="form-group">
        <label for="id_cart_number" class="form-label">ID Number</label>
        <input type="text" name="id_cart_number" class="form-control" value="<?= esc($profile['id_cart_number']) ?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="id_car_front" class="form-label">Upload ID Front</label>
        <input type="file" name="id_cart_front" class="form-control">
        <?php if (!empty($profile['id_cart_front'])): ?>
          <img src="<?= base_url('uploads/documents/' . $profile['id_cart_front']) ?>" class="img-thumbnail mt-2" width="100">
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-6">

      <div class="form-group">
        <label for="id_cart_back" class="form-label">Upload ID Back</label>
        <input type="file" name="id_cart_back" class="form-control">
        <?php if (!empty($profile['id_cart_back'])): ?>
          <img src="<?= base_url('uploads/documents/' . $profile['id_cart_back']) ?>" class="img-thumbnail mt-2" width="90">
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="col-md-6">
    <label for="photo" class="form-label"><?= lang('Global.photo') ?></label>
    <input type="file" name="photo" class="form-control">
    <?php if (!empty($profile['photo'])): ?>
      <img src="<?= base_url('uploads/jobseekers/' . $profile['photo']) ?>" class="img-thumbnail mt-2" width="100">
    <?php endif ?>
  </div>

  <div class="col-md-6">
    <label for="cv_file" class="form-label"><?= lang('Global.cv_file') ?></label>
    <div class="d-flex">
      <input type="file" name="cv_file" class="form-control">
      <?php if (!empty($profile['cv_file'])): ?>
        <a href="<?= base_url('uploads/cvs/' . $profile['cv_file']) ?>" class="btn btn-sm btn-info mt-2" target="_blank"><?= lang('Global.view_cv') ?></a>
      <?php endif ?>
    </div>
  </div>
</div>