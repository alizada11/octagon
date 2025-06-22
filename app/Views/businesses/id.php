<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h4 mb-0"><?= lang('app.id') ?></h2>
        </div>
        <div class="card-body">
            <form role="form" id="myForm" method="POST" action="<?= base_url('businesses/update/id/' . $record['id']) ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.id_number') ?></label>
                        <input name="id_number" maxlength="100" type="text" required="required" class="form-control"
                            placeholder="<?= lang('app.id_number_title') ?>"
                            value="<?= htmlspecialchars($record['id_number'] ?? '') ?>"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.expire_date') ?></label>
                        <input name="id_expire_date" type="date" required="required" class="form-control"
                            value="<?= htmlspecialchars($record['id_expire_date'] ?? '') ?>" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.first_name') ?></label>
                        <input name="id_first_name" maxlength="100" type="text" required="required" class="form-control"
                            placeholder="<?= lang('app.first_name_title') ?>"
                            value="<?= htmlspecialchars($record['id_first_name'] ?? '') ?>" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.second_name') ?></label>
                        <input name="id_second_name" maxlength="100" type="text" class="form-control"
                            placeholder="<?= lang('app.second_name_title') ?>"
                            value="<?= htmlspecialchars($record['id_second_name'] ?? '') ?>" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.third_name') ?></label>
                        <input name="id_third_name" maxlength="100" type="text" class="form-control"
                            placeholder="<?= lang('app.third_name_title') ?>"
                            value="<?= htmlspecialchars($record['id_third_name'] ?? '') ?>" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.sur_name') ?></label>
                        <input name="id_sur_name" maxlength="100" type="text" required="required" class="form-control"
                            placeholder="<?= lang('app.sur_name_title') ?>"
                            value="<?= htmlspecialchars($record['id_sur_name'] ?? '') ?>" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.date_of_birth') ?></label>
                        <input name="id_date_of_birth" type="date" required="required" class="form-control"
                            value="<?= htmlspecialchars($record['id_date_of_birth'] ?? '') ?>" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><?= lang('app.address_name') ?></label>
                        <input name="id_address" maxlength="100" type="text" required="required" class="form-control"
                            placeholder="<?= lang('app.address_title') ?>"
                            value="<?= htmlspecialchars($record['id_address'] ?? '') ?>" />
                    </div>

                    <div class="col-md-12">
                        <label class="form-label"><?= lang('app.id') ?></label>
                        <input name="id_document" type="file" class="form-control" />
                        <?php if (isset($record['id_document']) && !empty($record['id_document'])): ?>
                            <input type="hidden" name="old_id_document" value="<?= htmlspecialchars($record['id_document']) ?>">
                            <div class="mt-2">
                                <small class="text-muted"><?= lang('app.current_file') ?>:
                                    <a href="<?= base_url('viewFile/' . $record['id_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                        <?= htmlspecialchars(basename($record['id_document'])) ?>
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