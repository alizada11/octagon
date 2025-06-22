<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h4 mb-0"><?= lang('app.business_details') ?></h2>
        </div>
        <div class="card-body">
            <form role="form" id="myForm" action="<?= base_url('businesses/update/cr/' . $record['id']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <h3 class="h5 mb-3"><?= lang('app.crc') ?></h3>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="cr_name_en" class="form-label"><?= lang('app.cr_name_en') ?></label>
                            <input id="cr_name_en" name="cr_name_en" maxlength="200" type="text" required
                                class="form-control" placeholder="<?= lang('app.cr_name_en_title') ?>"
                                value="<?= htmlspecialchars($record['cr_name_en'] ?? '') ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="cr_name_ar" class="form-label"><?= lang('app.cr_name_ar') ?></label>
                            <input id="cr_name_ar" name="cr_name_ar" maxlength="200" type="text" required
                                class="form-control" placeholder="<?= lang('app.cr_name_ar_title') ?>"
                                value="<?= htmlspecialchars($record['cr_name_ar'] ?? '') ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="cr_number" class="form-label"><?= lang('app.cr_number') ?></label>
                            <input id="cr_number" name="cr_number" maxlength="20" type="text" required
                                class="form-control" placeholder="<?= lang('app.cr_number_title') ?>"
                                value="<?= htmlspecialchars($record['cr_number'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_email" class="form-label"><?= lang('app.email') ?></label>
                            <input id="cr_email" name="cr_email" maxlength="200" type="email" required
                                class="form-control" placeholder="<?= lang('app.email_title') ?>"
                                value="<?= htmlspecialchars($record['cr_email'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_gsm" class="form-label"><?= lang('app.gsm') ?></label>
                            <input id="cr_gsm" name="cr_gsm" maxlength="8" type="tel" required
                                class="form-control" placeholder="<?= lang('app.gsm_title') ?>"
                                value="<?= htmlspecialchars($record['cr_gsm'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_po_box" class="form-label"><?= lang('app.po_box') ?></label>
                            <input id="cr_po_box" name="cr_po_box" maxlength="200" type="text" required
                                class="form-control" placeholder="<?= lang('app.po_box_title') ?>"
                                value="<?= htmlspecialchars($record['cr_po_box'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_postal_code" class="form-label"><?= lang('app.postal_code') ?></label>
                            <input id="cr_postal_code" name="cr_postal_code" maxlength="20" type="text" required
                                class="form-control" placeholder="<?= lang('app.postal_code_title') ?>"
                                value="<?= htmlspecialchars($record['cr_postal_code'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_fax" class="form-label"><?= lang('app.fax') ?></label>
                            <input id="cr_fax" name="cr_fax" maxlength="20" type="tel"
                                class="form-control" placeholder="<?= lang('app.fax_title') ?>"
                                value="<?= htmlspecialchars($record['cr_fax'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_establishment_date" class="form-label"><?= lang('app.establishment_date') ?></label>
                            <input id="cr_establishment_date" name="cr_establishment_date" type="date" required
                                class="form-control" value="<?= htmlspecialchars($record['cr_establishment_date'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_expiry_date" class="form-label"><?= lang('app.expiry_date') ?></label>
                            <input id="cr_expiry_date" name="cr_expiry_date" type="date" required
                                class="form-control" value="<?= htmlspecialchars($record['cr_expiry_date'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_legal_type" class="form-label"><?= lang('app.legal_type') ?></label>
                            <input id="cr_legal_type" name="cr_legal_type" type="text" required
                                class="form-control" placeholder="<?= lang('app.legal_type_title') ?>"
                                value="<?= htmlspecialchars($record['cr_legal_type'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_head_quarter" class="form-label"><?= lang('app.head_quarter') ?></label>
                            <input id="cr_head_quarter" name="cr_head_quarter" type="text" required
                                class="form-control" placeholder="<?= lang('app.head_quarter_title') ?>"
                                value="<?= htmlspecialchars($record['cr_head_quarter'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="cr_document" class="form-label"><?= lang('app.crc') ?></label>
                            <input id="cr_document" name="cr_document" type="file" class="form-control">
                            <?php if (isset($record['cr_document']) && !empty($record['cr_document'])): ?>
                                <input type="hidden" name="old_cr_document" value="<?= htmlspecialchars($record['cr_document']) ?>">
                                <div class="mt-2">
                                    <small class="text-muted"><?= lang('app.current_file') ?>: <a href="<?= base_url('viewFile/' . $record['cr_document']) ?>" target="_blank" class="w3-button w3-light-grey"><?= htmlspecialchars(basename($record['cr_document'])) ?></a></small>
                                </div>
                            <?php endif; ?>
                        </div>
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