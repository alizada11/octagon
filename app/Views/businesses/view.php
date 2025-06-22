<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4"><!-- Main Content -->
    <!-- Message display section -->
    <div class="w3-container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center w3-margin">
                <div>
                    <i class="fas fa-check-circle me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
                <i class="btn-close fas fa-times" data-bs-dismiss="alert" aria-label="Close" onclick="$('.alert').remove();"></i>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center w3-margin">
                <div>
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
    <!-- End of message display section -->

    <div class="card mb-4">
        <div class="card-header">
            <h5><?= lang('app.business_details') ?></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <!-- Company Registration Certificate Section 1-->
                    <div class="w3-margin-bottom">
                        <header class="w3-container w3-light-grey" onclick="toggleSection('crc')" style="cursor:pointer">
                            <h5><?= lang('app.crc_title') ?> <span class="w3-right">▼</span></h5>
                        </header>
                        <div id="crc" class="w3-container" style="display:none">
                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <p><strong><?= lang('app.cr_name_en') ?>:</strong> <?= esc($record['cr_name_en']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.cr_name_ar') ?>:</strong> <?= esc($record['cr_name_ar']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record['cr_number']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.email') ?>:</strong> <?= esc($record['cr_email']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.gsm') ?>:</strong> <?= esc($record['cr_gsm']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.po_box') ?>:</strong> <?= esc($record['cr_po_box']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.postal_code') ?>:</strong> <?= esc($record['cr_postal_code']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.fax') ?>:</strong> <?= esc($record['cr_fax']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.establishment_date') ?>:</strong> <?= esc($record['cr_establishment_date']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.expiry_date') ?>:</strong> <?= esc($record['cr_expiry_date']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.legal_type') ?>:</strong> <?= esc($record['cr_legal_type']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.head_quarter') ?>:</strong> <?= esc($record['cr_head_quarter']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.crc') ?>:</strong>
                                        <a href="<?= base_url('viewFile/' . $record['cr_document']) ?>" target="_blank" class="w3-button w3-light-grey"> <i class="far fa-file-pdf"> </i> <?= lang('app.document') ?></a>
                                        <a href="#" class="btn w3-blue" onclick="loadMe('<?= base_url('businesses/edit/cr/' . enc($record['id'])) ?>')"> <i class="fa fa-edit"> </i> <?= lang('app.edit') ?> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Identification Section 2 -->
                    <div class="w3-margin-bottom">
                        <header class="w3-container w3-light-grey" onclick="toggleSection('id')" style="cursor:pointer">
                            <h5><?= lang('app.id_title') ?> <span class="w3-right">▼</span></h5>
                        </header>
                        <div id="id" class="w3-container" style="display:none">
                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.id_number') ?>:</strong> <?= esc($record['id_number']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record['id_expire_date']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.first_name') ?>:</strong> <?= esc($record['id_first_name']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.second_name') ?>:</strong> <?= esc($record['id_second_name']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.third_name') ?>:</strong> <?= esc($record['id_third_name']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.sur_name') ?>:</strong> <?= esc($record['id_sur_name']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.date_of_birth') ?>:</strong> <?= esc($record['id_date_of_birth']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.address_name') ?>:</strong> <?= esc($record['id_address']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.id') ?>:</strong>
                                        <a href="<?= base_url('viewFile/' . $record['id_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                            <?= lang('app.document') ?>
                                        </a>
                                        <a href="#" class="btn w3-blue" onclick="loadMe('<?= base_url('businesses/edit/id/' . enc($record['id'])) ?>')"> <i class="fa fa-edit"> </i> <?= lang('app.edit') ?> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chamber of Commerce Section 3 -->
                    <div class="w3-margin-bottom">
                        <header class="w3-container w3-light-grey" onclick="toggleSection('cc')" style="cursor:pointer">
                            <h5><?= lang('app.cc_title') ?> <span class="w3-right">▼</span></h5>
                        </header>
                        <div id="cc" class="w3-container" style="display:none">
                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record['cc_cr_number']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.head_quarter') ?>:</strong> <?= esc($record['cc_head_quarter']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.cc_occi_number') ?>:</strong> <?= esc($record['cc_occi_number']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.cc') ?>:</strong>
                                        <a href="<?= base_url('viewFile/' . $record['cc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                            <?= lang('app.document') ?>
                                        </a>
                                        <a href="#" class="btn w3-blue" onclick="loadMe('<?= base_url('businesses/edit/cc/' . enc($record['id'])) ?>')"> <i class="fa fa-edit"> </i> <?= lang('app.edit') ?> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trade Authorization Section 4 -->
                    <div class="w3-margin-bottom">
                        <header class="w3-container w3-light-grey" onclick="toggleSection('ta')" style="cursor:pointer">
                            <h5><?= lang('app.ta_title') ?> <span class="w3-right">▼</span></h5>
                        </header>
                        <div id="ta" class="w3-container" style="display:none">
                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <p><strong><?= lang('app.governorate') ?>:</strong> <?= esc($record['ta_governorate']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.complex_no') ?>:</strong> <?= esc($record['ta_complex_no']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.state') ?>:</strong> <?= esc($record['ta_state']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.plot_no') ?>:</strong> <?= esc($record['ta_plot_no']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.area') ?>:</strong> <?= esc($record['ta_area']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.building_no') ?>:</strong> <?= esc($record['ta_building_no']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.street_name_no') ?>:</strong> <?= esc($record['ta_street_name_no']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.flat_shop_no') ?>:</strong> <?= esc($record['ta_flat_shop_no']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.way_no') ?>:</strong> <?= esc($record['ta_way_no']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.type_of_activity') ?>:</strong> <?= esc($record['ta_type_of_activity']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.rent_contract_no') ?>:</strong> <?= esc($record['ta_rent_contract_no']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record['ta_expire_date']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.ta') ?>:</strong>
                                        <a href="<?= base_url('viewFile/' . $record['ta_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                            <?= lang('app.document') ?>
                                        </a>
                                        <a href="#" class="btn w3-blue" onclick="loadMe('<?= base_url('businesses/edit/ta/' . enc($record['id'])) ?>')"> <i class="fa fa-edit"> </i> <?= lang('app.edit') ?> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- License Certificate Section 5 -->
                    <div class="w3-margin-bottom">
                        <header class="w3-container w3-light-grey" onclick="toggleSection('lc')" style="cursor:pointer">
                            <h5><?= lang('app.lc_title') ?> <span class="w3-right">▼</span></h5>
                        </header>
                        <div id="lc" class="w3-container" style="display:none">
                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record['lc_cr_number']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.governorate') ?>:</strong> <?= esc($record['lc_governorate']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.rent_contract_no') ?>:</strong> <?= esc($record['lc_rent_contract_no']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-third">
                                    <p><strong><?= lang('app.state') ?>:</strong> <?= esc($record['lc_state']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.area') ?>:</strong> <?= esc($record['lc_area']) ?></p>
                                </div>
                                <div class="w3-third">
                                    <p><strong><?= lang('app.poa_code') ?>:</strong> <?= esc($record['lc_poa_code']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.license_type') ?>:</strong> <?= esc($record['lc_license_type']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.license_name') ?>:</strong> <?= esc($record['lc_license_name']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.license_number') ?>:</strong> <?= esc($record['lc_license_number']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record['lc_expire_date']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.activities_code') ?>:</strong> <?= esc($record['lc_activities_code']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.activities_description') ?>:</strong> <?= esc($record['lc_activities_description']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.lc') ?>:</strong>
                                        <a href="<?= base_url('viewFile/' . $record['lc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                            <?= lang('app.document') ?>
                                        </a>
                                        <a href="#" class="btn w3-blue" onclick="loadMe('<?= base_url('businesses/edit/lc/' . enc($record['id'])) ?>')"> <i class="fa fa-edit"> </i> <?= lang('app.edit') ?> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tax Card Certificate Section 6 -->
                    <div class="w3-margin-bottom">
                        <header class="w3-container w3-light-grey" onclick="toggleSection('tcc')" style="cursor:pointer">
                            <h5><?= lang('app.tcc_title') ?> <span class="w3-right">▼</span></h5>
                        </header>
                        <div id="tcc" class="w3-container" style="display:none">
                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record['tcc_cr_number']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.tax_card_number') ?>:</strong> <?= esc($record['tcc_tax_card_number']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.tin') ?>:</strong> <?= esc($record['tcc_tin']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record['tcc_expire_date']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.ta') ?>:</strong>
                                        <a href="<?= base_url('viewFile/' . $record['tcc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                            <?= lang('app.document') ?>
                                        </a>
                                        <a href="#" class="btn w3-blue" onclick="loadMe('<?= base_url('businesses/edit/tcc/' . enc($record['id'])) ?>')"> <i class="fa fa-edit"> </i> <?= lang('app.edit') ?> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- VAT Certificate Section -->
                    <div class="w3-margin-bottom">
                        <header class="w3-container w3-light-grey" onclick="toggleSection('vc')" style="cursor:pointer">
                            <h5><?= lang('app.vc_title') ?> <span class="w3-right">▼</span></h5>
                        </header>
                        <div id="vc" class="w3-container" style="display:none">
                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($record['vc_cr_number']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.vat_certificate_number') ?>:</strong> <?= esc($record['vc_vat_certificate_number']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.vatin') ?>:</strong> <?= esc($record['vc_vatin']) ?></p>
                                </div>
                                <div class="w3-half">
                                    <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($record['vc_expire_date']) ?></p>
                                </div>
                            </div>

                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <p><strong><?= lang('app.vc') ?>:</strong>
                                        <a href="<?= base_url('viewFile/' . $record['vc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
                                            <?= lang('app.document') ?>
                                        </a>
                                        <a href="#" class="btn w3-blue" onclick="loadMe('<?= base_url('businesses/edit/vc/' . enc($record['id'])) ?>')"> <i class="fa fa-edit"> </i> <?= lang('app.edit') ?> </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var x = '<?= @$form ?>';
                    if (x) {
                        toggleSection(x);
                    } else {
                        toggleSection('crc');
                    }

                    function toggleSection(sectionId) {
                        var section = document.getElementById(sectionId);
                        var header = section.previousElementSibling;
                        var arrow = header.querySelector('span');

                        if (section.style.display === "none") {
                            section.style.display = "block";
                            arrow.innerHTML = "▲";
                        } else {
                            section.style.display = "none";
                            arrow.innerHTML = "▼";
                        }
                    }
                </script>


            </div>
        </div>
    </div>
</div>
<?= view('admin/layout/footer.php') ?>