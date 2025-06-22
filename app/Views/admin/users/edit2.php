<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">


 <div class=" py-4 container">
  <?php


  if ($data) { ?>
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

   <form role="form" action="<?= base_url('business/edit/' . $data['pid']) ?>" method="POST" enctype="multipart/form-data" id="myForm">
    <?= csrf_field() ?>
    <div class="panel panel-primary setup-content" id="step-1" style="display:none;">
     <div class="panel-heading">
      <h3 class="panel-title"><?= lang('app.crc_title') ?></h3>
     </div>
     <div class="panel-body w3-row-padding">

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.cr_name_en') ?></label>
       <input name="cr_name_en" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.cr_name_en_title') ?>"
        value="<?= old('cr_name_en', $data['cr_name_en'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.cr_name_ar') ?></label>
       <input name="cr_name_ar" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.cr_name_ar_title') ?>"
        value="<?= old('cr_name_ar', $data['cr_name_ar'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.cr_number') ?></label>
       <input name="cr_number" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.cr_number_title') ?>"
        value="<?= old('cr_number', $data['cr_number'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.email') ?></label>
       <input name="cr_email" maxlength="200" type="email" required class="form-control"
        placeholder="<?= lang('app.email_title') ?>"
        value="<?= old('cr_email', $data['cr_email'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.gsm') ?></label>
       <input name="cr_gsm" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.gsm_title') ?>"
        value="<?= old('cr_gsm', $data['cr_gsm'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.po_box') ?></label>
       <input name="cr_po_box" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.po_box_title') ?>"
        value="<?= old('cr_po_box', $data['cr_po_box'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.postal_code') ?></label>
       <input name="cr_postal_code" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.postal_code_title') ?>"
        value="<?= old('cr_postal_code', $data['cr_postal_code'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.fax') ?></label>
       <input name="cr_fax" maxlength="200" type="text" class="form-control"
        placeholder="<?= lang('app.fax_title') ?>"
        value="<?= old('cr_fax', $data['cr_fax'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.establishment_date') ?></label>
       <input name="cr_establishment_date" type="date" required class="form-control"
        value="<?= old('cr_establishment_date', $data['cr_establishment_date'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.expiry_date') ?></label>
       <input name="cr_expiry_date" type="date" required class="form-control"
        value="<?= old('cr_expiry_date', $data['cr_expiry_date'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.legal_type') ?></label>
       <input name="cr_legal_type" type="text" required class="form-control"
        placeholder="<?= lang('app.legal_type_title') ?>"
        value="<?= old('cr_legal_type', $data['cr_legal_type'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.head_quarter') ?></label>
       <input name="cr_head_quarter" type="text" required class="form-control"
        placeholder="<?= lang('app.head_quarter_title') ?>"
        value="<?= old('cr_head_quarter', $data['cr_head_quarter'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.crc') ?></label>
       <?php if (!empty($data['cr_document'])): ?>
        <p>
         <a href="<?= site_url('uploads/documents/' . $data['cr_document']) ?>" target="_blank">
          <?= lang('app.view_uploaded_file') ?>
         </a>
        </p>
       <?php endif; ?>
       <input name="cr_document" type="file" class="form-control" />
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
       <input name="id_number" maxlength="100" type="text" required class="form-control"
        placeholder="<?= lang('app.id_number_title') ?>"
        value="<?= old('id_number', $data['id_number'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.expire_date') ?></label>
       <input name="id_expire_date" type="date" required class="form-control"
        value="<?= old('id_expire_date', $data['id_expire_date'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.first_name') ?></label>
       <input name="id_first_name" maxlength="100" type="text" required class="form-control"
        placeholder="<?= lang('app.first_name_title') ?>"
        value="<?= old('id_first_name', $data['id_first_name'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.second_name') ?></label>
       <input name="id_second_name" maxlength="100" type="text" class="form-control"
        placeholder="<?= lang('app.second_name_title') ?>"
        value="<?= old('id_second_name', $data['id_second_name'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.third_name') ?></label>
       <input name="id_third_name" maxlength="100" type="text" class="form-control"
        placeholder="<?= lang('app.third_name_title') ?>"
        value="<?= old('id_third_name', $data['id_third_name'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.sur_name') ?></label>
       <input name="id_sur_name" maxlength="100" type="text" required class="form-control"
        placeholder="<?= lang('app.sur_name_title') ?>"
        value="<?= old('id_sur_name', $data['id_sur_name'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.date_of_birth') ?></label>
       <input name="id_date_of_birth" type="date" required class="form-control"
        value="<?= old('id_date_of_birth', $data['id_date_of_birth'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.address_name') ?></label>
       <input name="id_address" maxlength="100" type="text" required class="form-control"
        placeholder="<?= lang('app.address_title') ?>"
        value="<?= old('id_address', $data['id_address'] ?? '') ?>" />
      </div>

      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.id') ?></label>
       <?php if (!empty($data['id_document'])): ?>
        <p>
         <a href="<?= site_url('uploads/documents/' . $data['id_document']) ?>" target="_blank">
          <?= lang('app.view_uploaded_file') ?>
         </a>
        </p>
       <?php endif; ?>
       <input name="id_document" type="file" class="form-control" />
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
       <input name="cc_cr_number" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.cr_number_title') ?>"
        value="<?= old('cc_cr_number', $data['cc_cr_number'] ?? '') ?>" />
      </div>

      <div class="form-group">
       <label class="control-label"><?= lang('app.head_quarter') ?></label>
       <input name="cc_head_quarter" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.head_quarter_title') ?>"
        value="<?= old('cc_head_quarter', $data['cc_head_quarter'] ?? '') ?>" />
      </div>

      <div class="form-group">
       <label class="control-label"><?= lang('app.cc_occi_number') ?></label>
       <input name="cc_occi_number" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.cc_occi_number_title') ?>"
        value="<?= old('cc_occi_number', $data['cc_occi_number'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group">
       <label class="control-label"><?= lang('app.cc_expire_date') ?></label>
       <input name="cc_expire_date" maxlength="200" type="date" required class="form-control"
        placeholder="<?= lang('app.cc_expire_date_title') ?>"
        value="<?= old('cc_expire_date', $data['cc_expire_date'] ?? '') ?>" />
      </div>

      <div class="form-group">
       <label class="control-label"><?= lang('app.cc') ?></label>
       <?php if (!empty($data['cc_document'])): ?>
        <p>
         <a href="<?= site_url('uploads/documents/' . $data['cc_document']) ?>" target="_blank">
          <?= lang('app.view_uploaded_file') ?>
         </a>
        </p>
       <?php endif; ?>
       <input name="cc_document" type="file" class="form-control" />
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
       <input name="ta_governorate" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.governorate_title') ?>"
        value="<?= old('ta_governorate', $data['ta_governorate'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.complex_no') ?></label>
       <input name="ta_complex_no" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.complex_no_title') ?>"
        value="<?= old('ta_complex_no', $data['ta_complex_no'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.state') ?></label>
       <input name="ta_state" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.state_title') ?>"
        value="<?= old('ta_state', $data['ta_state'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.plot_no') ?></label>
       <input name="ta_plot_no" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.plot_no_title') ?>"
        value="<?= old('ta_plot_no', $data['ta_plot_no'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.area') ?></label>
       <input name="ta_area" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.area_title') ?>"
        value="<?= old('ta_area', $data['ta_area'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.building_no') ?></label>
       <input name="ta_building_no" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.building_no_title') ?>"
        value="<?= old('ta_building_no', $data['ta_building_no'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.street_name_no') ?></label>
       <input name="ta_street_name_no" maxlength="200" type="text" class="form-control"
        placeholder="<?= lang('app.street_name_no_title') ?>"
        value="<?= old('ta_street_name_no', $data['ta_street_name_no'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.flat_shop_no') ?></label>
       <input name="ta_flat_shop_no" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.flat_shop_no_title') ?>"
        value="<?= old('ta_flat_shop_no', $data['ta_flat_shop_no'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.way_no') ?></label>
       <input name="ta_way_no" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.way_no_title') ?>"
        value="<?= old('ta_way_no', $data['ta_way_no'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.type_of_activity') ?></label>
       <input name="ta_type_of_activity" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.type_of_activity_title') ?>"
        value="<?= old('ta_type_of_activity', $data['ta_type_of_activity'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.rent_contract_no') ?></label>
       <input name="ta_rent_contract_no" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.rent_contract_no_title') ?>"
        value="<?= old('ta_rent_contract_no', $data['ta_rent_contract_no'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.expire_date') ?></label>
       <input name="ta_expire_date" type="date" required class="form-control"
        value="<?= old('ta_expire_date', $data['ta_expire_date'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.ta') ?></label>
       <?php if (!empty($data['ta_document'])): ?>
        <p>
         <a href="<?= site_url('uploads/documents/' . $data['ta_document']) ?>" target="_blank">
          <?= lang('app.view_uploaded_file') ?>
         </a>
        </p>
       <?php endif; ?>
       <input name="ta_document" type="file" class="form-control" />
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
       <input name="lc_cr_number" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.cr_number_title') ?>"
        value="<?= old('lc_cr_number', $data['lc_cr_number'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.governorate') ?></label>
       <input name="lc_governorate" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.governorate_title') ?>"
        value="<?= old('lc_governorate', $data['lc_governorate'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.rent_contract_no') ?></label>
       <input name="lc_rent_contract_no" maxlength="200" type="text" class="form-control"
        placeholder="<?= lang('app.rent_contract_no_title') ?>"
        value="<?= old('lc_rent_contract_no', $data['lc_rent_contract_no'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.state') ?></label>
       <input name="lc_state" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.state_title') ?>"
        value="<?= old('lc_state', $data['lc_state'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.area') ?></label>
       <input name="lc_area" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.area_title') ?>"
        value="<?= old('lc_area', $data['lc_area'] ?? '') ?>" />
      </div>

      <div class="form-group w3-third">
       <label class="control-label"><?= lang('app.poa_code') ?></label>
       <input name="lc_poa_code" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.poa_code_title') ?>"
        value="<?= old('lc_poa_code', $data['lc_poa_code'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.license_type') ?></label>
       <input name="lc_license_type" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.license_type_title') ?>"
        value="<?= old('lc_license_type', $data['lc_license_type'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.license_name') ?></label>
       <input name="lc_license_name" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.license_name_title') ?>"
        value="<?= old('lc_license_name', $data['lc_license_name'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.license_number') ?></label>
       <input name="lc_license_number" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.license_number_title') ?>"
        value="<?= old('lc_license_number', $data['lc_license_number'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.expire_date') ?></label>
       <input name="lc_expire_date" type="date" required class="form-control"
        value="<?= old('lc_expire_date', $data['lc_expire_date'] ?? '') ?>" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.activities_code') ?></label>
       <input name="lc_activities_code" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.activities_code_title') ?>"
        value="<?= old('lc_activities_code', $data['lc_activities_code'] ?? '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>

      <div class="form-group w3-half">
       <label class="control-label"><?= lang('app.activities_description') ?></label>
       <input name="lc_activities_description" maxlength="200" type="text" required class="form-control"
        placeholder="<?= lang('app.activities_description_title') ?>"
        value="<?= old('lc_activities_description', $data['lc_activities_description'] ?? '') ?>" />
      </div>

      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.lc') ?></label>
       <?php if (!empty($data['lc_document'])): ?>
        <p>
         <a href="<?= site_url('uploads/documents/' . $data['lc_document']) ?>" target="_blank">
          <?= lang('app.view_uploaded_file') ?>
         </a>
        </p>
       <?php endif; ?>
       <input name="lc_document" type="file" class="form-control" />
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
       <input name="tcc_cr_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_number_title') ?>"
        value="<?= old('tcc_cr_number', isset($data['tcc_cr_number']) ? $data['tcc_cr_number'] : '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.tax_card_number') ?></label>
       <input name="tcc_tax_card_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.tax_card_number_title') ?>"
        value="<?= old('tcc_tax_card_number', isset($data['tcc_tax_card_number']) ? $data['tcc_tax_card_number'] : '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.tin') ?></label>
       <input name="tcc_tin" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.tin_title') ?>"
        value="<?= old('tcc_tin', isset($data['tcc_tin']) ? $data['tcc_tin'] : '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.expire_date') ?></label>
       <input name="tcc_expire_date" type="date" required="required" class="form-control"
        value="<?= old('tcc_expire_date', isset($data['tcc_expire_date']) ? $data['tcc_expire_date'] : '') ?>" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.ta') ?></label>
       <?php if (!empty($data['tcc_document'])): ?>
        <p>
         <a href="<?= site_url('uploads/documents/' . $data['tcc_document']) ?>" target="_blank">
          <?= lang('app.view_uploaded_file') ?>
         </a>
        </p>
       <?php endif; ?>
       <input name="tcc_document" type="file" class="form-control" />
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
       <input name="vc_cr_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.cr_number_title') ?>"
        value="<?= old('vc_cr_number', isset($data['vc_cr_number']) ? $data['vc_cr_number'] : '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.vat_certificate_number') ?></label>
       <input name="vc_vat_certificate_number" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.vat_certificate_number_title') ?>"
        value="<?= old('vc_vat_certificate_number', isset($data['vc_vat_certificate_number']) ? $data['vc_vat_certificate_number'] : '') ?>"
        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 20);" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.vatin') ?></label>
       <input name="vc_vatin" maxlength="200" type="text" required="required" class="form-control" placeholder="<?= lang('app.vatin_title') ?>"
        value="<?= old('vc_vatin', isset($data['vc_vatin']) ? $data['vc_vatin'] : '') ?>" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.expire_date') ?></label>
       <input name="vc_expire_date" type="date" required="required" class="form-control"
        value="<?= old('vc_expire_date', isset($data['vc_expire_date']) ? $data['vc_expire_date'] : '') ?>" />
      </div>
      <div class="form-group w3-col">
       <label class="control-label"><?= lang('app.vc') ?></label>
       <?php if (!empty($data['vc_document'])): ?>
        <p>
         <a href="<?= site_url('uploads/documents/' . $data['vc_document']) ?>" target="_blank">
          <?= lang('app.view_uploaded_file') ?>
         </a>
        </p>
       <?php endif; ?>
       <input name="vc_document" type="file" class="form-control" />
      </div>
      <button class="btn btn-success pull-right" type="submit"><?= lang('app.finish_up') ?></button>
     </div>
    </div>

   </form>
  <?php } else { ?>
   <div class="text-center">
    No business Information submited
   </div>

  <?php } ?>
 </div>


</div>
<?= view('admin/layout/footer.php') ?>