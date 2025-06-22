<?= $this->extend('main') ?>


<?= $this->section('content') ?>
<?php if (session()->getFlashdata('error')): ?>
    <div style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%); z-index: 1050; min-width: 300px;">
        <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<head>
    <style>
        .stepwizard-step p {
            margin-top: 0px;
            color: #666;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard .btn.disabled,
        .stepwizard .btn[disabled],
        .stepwizard fieldset[disabled] .btn {
            opacity: 1 !important;
            color: #bbb;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>
</head>

<div class=" py-4 container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-2">
                <a href="#step-1" type="button" class="btn btn-success w3-green btn-circle">1</a>
                <p>
                    <small><?= lang('app.crc') ?></small>
                </p>
            </div>
            <div class="stepwizard-step col-xs-1">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>
                    <small><?= lang('app.id') ?></small>
                </p>
            </div>
            <div class="stepwizard-step col-xs-2">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small><?= lang('app.cc') ?></small></p>
            </div>
            <div class="stepwizard-step col-xs-2">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small><?= lang('app.ta') ?></small></p>
            </div>
            <div class="stepwizard-step col-xs-1">
                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                <p><small><?= lang('app.lc') ?></small></p>
            </div>
            <div class="stepwizard-step col-xs-2">
                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                <p><small><?= lang('app.tcc') ?></small></p>
            </div>
            <div class="stepwizard-step col-xs-2">
                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
                <p><small><?= lang('app.vc') ?></small></p>
            </div>
        </div>
    </div>

    <form role="form" action="<?= base_url('business/registration') ?>" method="POST" enctype="multipart/form-data" id="myForm">
        <?= csrf_field() ?>
        <div class="panel panel-primary setup-content" id="step-1" style="display:none;">
            <div class="panel-heading">
                <h3 class="panel-title"><?= lang('app.crc_title') ?></h3>
            </div>
            <div class="panel-body w3-row-padding">
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.cr_name_en') ?></label>
                    <input name="cr_name_en" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_name_en_title') ?>" value="<?= old('cr_name_en') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.cr_name_ar') ?></label>
                    <input name="cr_name_ar" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_name_ar_title') ?>" value="<?= old('cr_name_ar') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.cr_number') ?></label>
                    <input name="cr_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_number_title') ?>" value="<?= old('cr_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.email') ?></label>
                    <input name="cr_email" maxlength="200" type="email" required="required" class="form-control" placeholder="<?= lang('app.email_title') ?>" value="<?= old('cr_email') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.gsm') ?></label>
                    <input name="cr_gsm" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.gsm_title') ?>" value="<?= old('cr_gsm') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.po_box') ?></label>
                    <input name="cr_po_box" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.po_box_title') ?>" value="<?= old('cr_po_box') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.postal_code') ?></label>
                    <input name="cr_postal_code" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.postal_code_title') ?>" value="<?= old('cr_postal_code') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.fax') ?></label>
                    <input name="cr_fax" maxlength="200" type="text" class="form-control" placeholder="<?= lang('app.fax_title') ?>" value="<?= old('cr_fax') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.establishment_date') ?></label>
                    <input name="cr_establishment_date" type="date" required="required" class="form-control" value="<?= old('cr_establishment_date') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.expiry_date') ?></label>
                    <input name="cr_expiry_date" type="date" required="required" class="form-control" value="<?= old('cr_expiry_date') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.legal_type') ?></label>
                    <input name="cr_legal_type" type="text" required="required" class="form-control" placeholder="<?= lang('app.legal_type_title') ?>" value="<?= old('cr_legal_type') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.head_quarter') ?></label>
                    <input name="cr_head_quarter" type="text" required="required" class="form-control" placeholder="<?= lang('app.head_quarter_title') ?>" value="<?= old('cr_head_quarter') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.crc') ?></label>
                    <input name="cr_document" type="file" required="required" class="form-control" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-2" style="display:none;">
            <div class="panel-heading mybbg">
                <h3 class="panel-title"><?= lang('app.about_you') ?></h3>
            </div>
            <div class="panel-body w3-row-padding">
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.id_number') ?></label>
                    <input name="id_number" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.id_number_title') ?>" value="<?= old('id_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.expire_date') ?></label>
                    <input name="id_expire_date" type="date" required="required" class="form-control" value="<?= old('id_expire_date') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.first_name') ?></label>
                    <input name="id_first_name" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.first_name_title') ?>" value="<?= old('id_first_name') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.second_name') ?></label>
                    <input name="id_second_name" maxlength="100" type="text" class="form-control" placeholder="<?= lang('app.second_name_title') ?>" value="<?= old('id_second_name') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.third_name') ?></label>
                    <input name="id_third_name" maxlength="100" type="text" class="form-control" placeholder="<?= lang('app.third_name_title') ?>" value="<?= old('id_third_name') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.sur_name') ?></label>
                    <input name="id_sur_name" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.sur_name_title') ?>" value="<?= old('id_sur_name') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.date_of_birth') ?></label>
                    <input name="id_date_of_birth" type="date" required="required" class="form-control" value="<?= old('id_date_of_birth') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.address_name') ?></label>
                    <input name="id_address" maxlength="100" type="text" required="required" class="form-control" placeholder="<?= lang('app.address_title') ?>" value="<?= old('id_address') ?>" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.id') ?></label>
                    <input name="id_document" type="file" required="required" class="form-control" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
            </div>
        </div>



        <div class="panel panel-primary setup-content" id="step-3" style="display:none;">
            <div class="panel-heading">
                <h3 class="panel-title"><?= lang('app.cc_title') ?></h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label"><?= lang('app.cr_number') ?></label>
                    <input name="cc_cr_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_number_title') ?>" value="<?= old('cc_cr_number') ?>" />
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('app.head_quarter') ?></label>
                    <input name="cc_head_quarter" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.head_quarter_title') ?>" value="<?= old('cc_head_quarter') ?>" />
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('app.cc_occi_number') ?></label>
                    <input name="cc_occi_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cc_occi_number_title') ?>" value="<?= old('cc_occi_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('app.cc_expire_date') ?></label>
                    <input name="cc_expire_date" maxlength="200" type="date" required="required" class="form-control" placeholder="<?= lang('app.cc_expire_date_title') ?>" value="<?= old('cc_occi_number') ?>" />
                </div>
                <div class="form-group">
                    <label class="control-label"><?= lang('app.cc') ?></label>
                    <input name="cc_document" type="file" required="required" class="form-control" />
                </div>

                <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-4" style="display:none;">
            <div class="panel-heading">
                <h3 class="panel-title"><?= lang('app.ta_title') ?></h3>
            </div>
            <div class="panel-body w3-row-padding">
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.governorate') ?></label>
                    <input name="ta_governorate" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.governorate_title') ?>" value="<?= old('ta_governorate') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.complex_no') ?></label>
                    <input name="ta_complex_no" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.complex_no_title') ?>" value="<?= old('ta_complex_no') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.state') ?></label>
                    <input name="ta_state" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.state_title') ?>" value="<?= old('ta_state') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.plot_no') ?></label>
                    <input name="ta_plot_no" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.plot_no_title') ?>" value="<?= old('ta_plot_no') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.area') ?></label>
                    <input name="ta_area" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.area_title') ?>" value="<?= old('ta_area') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.building_no') ?></label>
                    <input name="ta_building_no" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.building_no_title') ?>" value="<?= old('ta_building_no') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.street_name_no') ?></label>
                    <input name="ta_street_name_no" maxlength="200" type="text" class="form-control" placeholder="<?= lang('app.street_name_no_title') ?>" value="<?= old('ta_street_name_no') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.flat_shop_no') ?></label>
                    <input name="ta_flat_shop_no" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.flat_shop_no_title') ?>" value="<?= old('ta_flat_shop_no') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.way_no') ?></label>
                    <input name="ta_way_no" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.way_no_title') ?>" value="<?= old('ta_way_no') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.type_of_activity') ?></label>
                    <input name="ta_type_of_activity" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.type_of_activity_title') ?>" value="<?= old('ta_type_of_activity') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.rent_contract_no') ?></label>
                    <input name="ta_rent_contract_no" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.rent_contract_no_title') ?>" value="<?= old('ta_rent_contract_no') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.expire_date') ?></label>
                    <input name="ta_expire_date" type="date" required="required" class="form-control" value="<?= old('ta_expire_date') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.ta') ?></label>
                    <input name="ta_document" type="file" required="required" class="form-control" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-5" style="display:none;">
            <div class="panel-heading">
                <h3 class="panel-title"><?= lang('app.lc_title') ?></h3>
            </div>
            <div class="panel-body w3-row-padding">
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.cr_number') ?></label>
                    <input name="lc_cr_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_number_title') ?>" value="<?= old('lc_cr_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.governorate') ?></label>
                    <input name="lc_governorate" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.governorate_title') ?>" value="<?= old('lc_governorate') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.rent_contract_no') ?></label>
                    <input name="lc_rent_contract_no" maxlength="200" type="text" class="form-control" placeholder="<?= lang('app.rent_contract_no_title') ?>" value="<?= old('lc_rent_contract_no') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.state') ?></label>
                    <input name="lc_state" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.state_title') ?>" value="<?= old('lc_state') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.area') ?></label>
                    <input name="lc_area" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.area_title') ?>" value="<?= old('lc_area') ?>" />
                </div>
                <div class="form-group w3-third">
                    <label class="control-label"><?= lang('app.poa_code') ?></label>
                    <input name="lc_poa_code" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.poa_code_title') ?>" value="<?= old('lc_poa_code') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.license_type') ?></label>
                    <input name="lc_license_type" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.license_type_title') ?>" value="<?= old('lc_license_type') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.license_name') ?></label>
                    <input name="lc_license_name" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.license_name_title') ?>" value="<?= old('lc_license_name') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.license_number') ?></label>
                    <input name="lc_license_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.license_number_title') ?>" value="<?= old('lc_license_number') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.expire_date') ?></label>
                    <input name="lc_expire_date" type="date" required="required" class="form-control" value="<?= old('lc_expire_date') ?>" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.activities_code') ?></label>
                    <input name="lc_activities_code" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.activities_code_title') ?>" value="<?= old('lc_activities_code') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-half">
                    <label class="control-label"><?= lang('app.activities_description') ?></label>
                    <input name="lc_activities_description" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.activities_description_title') ?>" value="<?= old('lc_activities_description') ?>" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.lc') ?></label>
                    <input name="lc_document" type="file" required="required" class="form-control" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-6" style="display:none;">
            <div class="panel-heading">
                <h3 class="panel-title"><?= lang('app.tcc_title') ?></h3>
            </div>
            <div class="panel-body w3-row-padding">
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.cr_number') ?></label>
                    <input name="tcc_cr_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_number_title') ?>" value="<?= old('tcc_cr_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.tax_card_number') ?></label>
                    <input name="tcc_tax_card_number" minlength="3" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.tax_card_number_title') ?>" value="<?= old('tcc_tax_card_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.tin') ?></label>
                    <input name="tcc_tin" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.tin_title') ?>" value="<?= old('tcc_tin') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.expire_date') ?></label>
                    <input name="tcc_expire_date" type="date" required="required" class="form-control" value="<?= old('tcc_expire_date') ?>" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.ta') ?></label>
                    <input name="tcc_document" type="file" required="required" class="form-control" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button"><?= lang('app.next') ?></button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-7" style="display:none;">
            <div class="panel-heading">
                <h3 class="panel-title"><?= lang('app.vc_title') ?></h3>
            </div>
            <div class="panel-body w3-row-padding">
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.cr_number') ?></label>
                    <input name="vc_cr_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_number_title') ?>" value="<?= old('vc_cr_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.vat_certificate_number') ?></label>
                    <input name="vc_vat_certificate_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.vat_certificate_number_title') ?>" value="<?= old('vc_vat_certificate_number') ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.vatin') ?></label>
                    <input name="vc_vatin" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.vatin_title') ?>" value="<?= old('vc_vatin') ?>" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.expire_date') ?></label>
                    <input name="vc_expire_date" type="date" required="required" class="form-control" value="<?= old('vc_expire_date') ?>" />
                </div>
                <div class="form-group w3-col">
                    <label class="control-label"><?= lang('app.vc') ?></label>
                    <input name="vc_document" type="file" required="required" class="form-control" />
                </div>
                <button class="btn btn-success pull-right" type="submit"><?= lang('app.finish_up') ?></button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-success').addClass('btn-default');
                $item.addClass('btn-success');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'], input[type='file'], input[type='url'], input[type='email'], input[type='date']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click').addClass('w3-green');
        });

        $('div.setup-panel div a.btn-success').trigger('click');
    });
</script>
<?= $this->endSection() ?>