<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h4 mb-0"><?= lang('app.ta') ?></h2>
        </div>
        <div class="card-body">
            <form role="form" id="myForm" action="<?= base_url('businesses/update/ta/' . $record['id']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <!-- Governorate -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.governorate') ?></label>
                        <input name="ta_governorate" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.governorate_title') ?>"
                            value="<?= htmlspecialchars($record['ta_governorate'] ?? '') ?>">
                    </div>

                    <!-- Complex Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.complex_no') ?></label>
                        <input name="ta_complex_no" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.complex_no_title') ?>"
                            value="<?= htmlspecialchars($record['ta_complex_no'] ?? '') ?>">
                    </div>

                    <!-- State -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.state') ?></label>
                        <input name="ta_state" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.state_title') ?>"
                            value="<?= htmlspecialchars($record['ta_state'] ?? '') ?>">
                    </div>

                    <!-- Plot Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.plot_no') ?></label>
                        <input name="ta_plot_no" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.plot_no_title') ?>"
                            value="<?= htmlspecialchars($record['ta_plot_no'] ?? '') ?>">
                    </div>

                    <!-- Area -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.area') ?></label>
                        <input name="ta_area" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.area_title') ?>"
                            value="<?= htmlspecialchars($record['ta_area'] ?? '') ?>">
                    </div>

                    <!-- Building Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.building_no') ?></label>
                        <input name="ta_building_no" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.building_no_title') ?>"
                            value="<?= htmlspecialchars($record['ta_building_no'] ?? '') ?>">
                    </div>

                    <!-- Street Name/Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.street_name_no') ?></label>
                        <input name="ta_street_name_no" maxlength="200" type="text" class="form-control"
                            placeholder="<?= lang('app.street_name_no_title') ?>"
                            value="<?= htmlspecialchars($record['ta_street_name_no'] ?? '') ?>">
                    </div>

                    <!-- Flat/Shop Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.flat_shop_no') ?></label>
                        <input name="ta_flat_shop_no" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.flat_shop_no_title') ?>"
                            value="<?= htmlspecialchars($record['ta_flat_shop_no'] ?? '') ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- Way Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.way_no') ?></label>
                        <input name="ta_way_no" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.way_no_title') ?>"
                            value="<?= htmlspecialchars($record['ta_way_no'] ?? '') ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- Type of Activity -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.type_of_activity') ?></label>
                        <input name="ta_type_of_activity" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.type_of_activity_title') ?>"
                            value="<?= htmlspecialchars($record['ta_type_of_activity'] ?? '') ?>">
                    </div>

                    <!-- Rent Contract Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.rent_contract_no') ?></label>
                        <input name="ta_rent_contract_no" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.rent_contract_no_title') ?>"
                            value="<?= htmlspecialchars($record['ta_rent_contract_no'] ?? '') ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- Expire Date -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.expire_date') ?></label>
                        <input name="ta_expire_date" type="date" required class="form-control"
                            value="<?= htmlspecialchars($record['ta_expire_date'] ?? '') ?>">
                    </div>

                    <!-- Document Upload -->
                    <div class="col-md-12">
                        <label class="form-label"><?= lang('app.ta') ?></label>
                        <input name="ta_document" type="file" class="form-control">
                        <?php if (isset($record['ta_document']) && !empty($record['ta_document'])): ?>
                            <input type="hidden" name="old_ta_document" value="<?= htmlspecialchars($record['ta_document']) ?>">
                            <div class="mt-2">
                                <small class="text-muted"><?= lang('app.current_file') ?>:
                                    <a href="<?= base_url('viewFile/' . $record['ta_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                        <?= htmlspecialchars(basename($record['ta_document'])) ?>
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