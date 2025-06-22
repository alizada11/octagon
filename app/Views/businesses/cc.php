<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h4 mb-0"><?= lang('app.cc') ?></h2>
        </div>
        <div class="card-body">
            <form role="form" id="myForm" method="POST" action="<?= base_url('businesses/update/cc/' . $record['id']) ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <!-- CR Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.cr_number') ?></label>
                        <input name="cc_cr_number" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.cr_number_title') ?>"
                            value="<?= htmlspecialchars($record['cc_cr_number'] ?? '') ?>">
                    </div>

                    <!-- Head Quarter -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.head_quarter') ?></label>
                        <input name="cc_head_quarter" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.head_quarter_title') ?>"
                            value="<?= htmlspecialchars($record['cc_head_quarter'] ?? '') ?>">
                    </div>

                    <!-- OCCI Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.cc_occi_number') ?></label>
                        <input name="cc_occi_number" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.cc_occi_number_title') ?>"
                            value="<?= htmlspecialchars($record['cc_occi_number'] ?? '') ?>">
                    </div>

                    <!-- Expire Date -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.cc_expire_date') ?></label>
                        <input name="cc_expire_date" type="date" required class="form-control"
                            placeholder="<?= lang('app.cc_expire_date_title') ?>"
                            value="<?= htmlspecialchars($record['cc_expire_date'] ?? '') ?>">
                    </div>

                    <!-- Document Upload -->
                    <div class="col-md-12">
                        <label class="form-label"><?= lang('app.cc') ?></label>
                        <input name="cc_document" type="file" class="form-control">
                        <?php

                        use CodeIgniter\Database\BaseUtils;

                        if (isset($record['cc_document']) && !empty($record['cc_document'])): ?>
                            <input type="hidden" name="old_cc_document" value="<?= htmlspecialchars($record['cc_document']) ?>">
                            <div class="mt-2">
                                <small class="text-muted"><?= lang('app.current_file') ?>:
                                    <a href="<?= base_url('viewFile/' . $record['cc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                        <?= htmlspecialchars(basename($record['cc_document'])) ?>
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