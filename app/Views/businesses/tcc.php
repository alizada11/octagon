<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="h4 mb-0"><?= lang('app.tcc') ?></h3>
        </div>
        <div class="card-body">
            <form role="form" id="myForm" action="<?= base_url('businesses/update/tcc/' . $record['id']) ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <!-- CR Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.cr_number') ?></label>
                        <input name="tcc_cr_number" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.cr_number_title') ?>"
                            value="<?= htmlspecialchars($record['tcc_cr_number'] ?? old('tcc_cr_number')) ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- Tax Card Number -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.tax_card_number') ?></label>
                        <input name="tcc_tax_card_number" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.tax_card_number_title') ?>"
                            value="<?= htmlspecialchars($record['tcc_tax_card_number'] ?? old('tcc_tax_card_number')) ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- TIN -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.tin') ?></label>
                        <input name="tcc_tin" maxlength="200" type="text" required class="form-control"
                            placeholder="<?= lang('app.tin_title') ?>"
                            value="<?= htmlspecialchars($record['tcc_tin'] ?? old('tcc_tin')) ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);">
                    </div>

                    <!-- Expire Date -->
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.expire_date') ?></label>
                        <input name="tcc_expire_date" type="date" required class="form-control"
                            value="<?= htmlspecialchars($record['tcc_expire_date'] ?? old('tcc_expire_date')) ?>">
                    </div>

                    <!-- Document Upload -->
                    <div class="col-md-12">
                        <label class="form-label"><?= lang('app.tcc') ?></label>
                        <input name="tcc_document" type="file" class="form-control" accept=".pdf,.jpg,.png">
                        <?php if (isset($record['tcc_document']) && !empty($record['tcc_document'])): ?>
                            <input type="hidden" name="old_tcc_document" value="<?= htmlspecialchars($record['tcc_document']) ?>">
                            <div class="mt-2">
                                <small class="text-muted"><?= lang('app.current_file') ?>:
                                    <a href="<?= base_url('viewFile/' . $record['tcc_document']) ?>" target="_blank" class="btn btn-sm btn-light">
                                        <?= htmlspecialchars(basename($record['tcc_document'])) ?>
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