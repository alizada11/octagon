<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
    <div class="card mb-4">
        <div class="card-header">
            <h4><?= lang('app.all_' . $type . '_businesses') ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container mt-5">
                    <form id="myForm" action="<?= base_url('businesses/type/' . $type) ?>">
                        <?= csrf_field() ?>
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="w3-input w3-col m10"
                                placeholder="<?= lang('app.search_business') ?>"
                                value="<?= esc($search_term ?? '') ?>" required>

                            <button type="button" class="w3-button w3-grey w3-col m1" onclick="clearSearch()">
                                <i class="fas fa-times"></i> <?= lang('app.clear') ?>
                            </button>

                            <button class="w3-button w3-blue w3-col m1" type="submit">
                                <i class="fas fa-search"></i> <?= lang('app.search') ?>
                            </button>
                        </div>
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?= lang('app.cr_number') ?></th>
                                <th><?= lang('app.cr_name_en') ?></th>
                                <th><?= lang('app.cr_name_ar') ?></th>
                                <th><?= lang('app.establishment_date') ?></th>
                                <th><?= lang('app.legal_type') ?></th>
                                <?php if (auth('business_edit')) { ?>
                                    <th><?= lang('app.actions') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($businesses)): ?>
                                <tr>
                                    <td colspan="<?= auth('business_edit') ? '6' : '5' ?>" class="text-center py-4">
                                        <i class="fas fa-info-circle fa-2x mb-3" style="color: #6c757d;"></i>
                                        <h5><?= lang('app.no_records_found') ?></h5>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($businesses as $business): ?>
                                    <tr>
                                        <td><?= esc($business['cr_number']) ?></td>
                                        <td><?= esc($business['cr_name_en']) ?></td>
                                        <td><?= esc($business['cr_name_ar']) ?></td>
                                        <td><?= esc($business['cr_establishment_date']) ?></td>
                                        <td><?= esc($business['cr_legal_type']) ?></td>
                                        <?php if (auth('business_edit')) { ?>
                                            <td>
                                                <a href="#" onclick="loadMe('<?= base_url('businesses/view/' . enc(esc($business['id']))) ?>');" class="w3-button"><i class="fas fa-eye"></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>


                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <!-- Previous Page Link -->
                            <li class="page-item <?= !$pagination['has_previous'] ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="javascript:void(0);"
                                    onclick="<?= $pagination['has_previous'] ? "loadMe('" . base_url('businesses/type/' . $type . '?search=' . esc($search_term) . '&page=' . ($pagination['current_page'] - 1)) . "')" : '' ?>"
                                    aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                                <li class="page-item <?= $i == $pagination['current_page'] ? 'active' : '' ?>">
                                    <a class="page-link"
                                        href="javascript:void(0);"
                                        onclick="loadMe('<?= base_url('businesses/type/' . $type . '?search=' . esc($search_term) . '&page=' . $i) ?>')">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <!-- Next Page Link -->
                            <li class="page-item <?= !$pagination['has_next'] ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="javascript:void(0);"
                                    onclick="<?= $pagination['has_next'] ? "loadMe('" . base_url('businesses/type/' . $type . '?search=' . esc($search_term) . '&page=' . ($pagination['current_page'] + 1)) . "')" : '' ?>"
                                    aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Showing entries info -->
                    <div class="text-center text-muted" id="entries-info">
                        Showing <?= (($pagination['current_page'] - 1) * $pagination['per_page']) + 1 ?>
                        to <?= min($pagination['current_page'] * $pagination['per_page'], $pagination['total_items']) ?>
                        of <?= $pagination['total_items'] ?> entries
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<?= view('admin/layout/footer.php') ?>