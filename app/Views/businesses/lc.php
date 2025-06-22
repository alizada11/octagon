<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h4 mb-0"><?= lang('app.lc') ?></h2>
        </div>
        <div class="card-body">
            <form role="form" id="myForm" action="<?= base_url('businesses/update/lc/' . $record['id']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <!-- CR Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.cr_number') ?></label>
                        <input name="lc_cr_number" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.cr_number_title') ?>"
                            value="<?= htmlspecialchars($record['lc_cr_number'] ?? '') ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- Governorate -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.governorate') ?></label>
                        <input name="lc_governorate" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.governorate_title') ?>"
                            value="<?= htmlspecialchars($record['lc_governorate'] ?? '') ?>">
                    </div>

                    <!-- Rent Contract Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.rent_contract_no') ?></label>
                        <input name="lc_rent_contract_no" maxlength="200" type="text" class="form-control"
                            placeholder="<?= lang('app.rent_contract_no_title') ?>"
                            value="<?= htmlspecialchars($record['lc_rent_contract_no'] ?? '') ?>">
                    </div>

                    <!-- State -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.state') ?></label>
                        <input name="lc_state" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.state_title') ?>"
                            value="<?= htmlspecialchars($record['lc_state'] ?? '') ?>">
                    </div>

                    <!-- Area -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.area') ?></label>
                        <input name="lc_area" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.area_title') ?>"
                            value="<?= htmlspecialchars($record['lc_area'] ?? '') ?>">
                    </div>

                    <!-- POA Code -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.poa_code') ?></label>
                        <input name="lc_poa_code" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.poa_code_title') ?>"
                            value="<?= htmlspecialchars($record['lc_poa_code'] ?? '') ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- License Type -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.license_type') ?></label>
                        <input name="lc_license_type" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.license_type_title') ?>"
                            value="<?= htmlspecialchars($record['lc_license_type'] ?? '') ?>">
                    </div>

                    <!-- License Name -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.license_name') ?></label>
                        <input name="lc_license_name" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.license_name_title') ?>"
                            value="<?= htmlspecialchars($record['lc_license_name'] ?? '') ?>">
                    </div>

                    <!-- License Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.license_number') ?></label>
                        <input name="lc_license_number" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.license_number_title') ?>"
                            value="<?= htmlspecialchars($record['lc_license_number'] ?? '') ?>">
                    </div>

                    <!-- Expire Date -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.expire_date') ?></label>
                        <input name="lc_expire_date" type="date" required class="form-control"
                            value="<?= htmlspecialchars($record['lc_expire_date'] ?? '') ?>">
                    </div>

                    <!-- Activities Code -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.activities_code') ?></label>
                        <input name="lc_activities_code" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.activities_code_title') ?>"
                            value="<?= htmlspecialchars($record['lc_activities_code'] ?? '') ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- Activities Description -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.activities_description') ?></label>
                        <input name="lc_activities_description" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.activities_description_title') ?>"
                            value="<?= htmlspecialchars($record['lc_activities_description'] ?? '') ?>">
                    </div>

                    <!-- Document Upload -->
                    <div class="col-md-12">
                        <label class="form-label"><?= lang('app.lc') ?></label>
                        <input name="lc_document" type="file" class="form-control">
                        <?php if (isset($record['lc_document']) && !empty($record['lc_document'])): ?>
                            <input type="hidden" name="old_lc_document" value="<?= htmlspecialchars($record['lc_document']) ?>">
                            <div class="mt-2">
                                <small class="text-muted"><?= lang('app.current_file') ?>:
                                    <a href="<?= base_url('viewFile/' . $record['lc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                        <?= htmlspecialchars(basename($record['lc_document'])) ?>
                                    </a>
                                </small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Buttons Section -->
                <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                    <a href="<?= base_url('admin/users/b_details/' . $record['pid']) ?>" class="btn btn-outline-primary text-gray">
                        <i class="bi bi-arrow-left me-2"></i><?= lang('app.back') ?>
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <?= lang('app.update') ?><i class="bi bi-check2 ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<?= view('admin/layout/footer.php') ?>