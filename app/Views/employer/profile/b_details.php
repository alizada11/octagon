<?= view('employer/layout/header.php') ?>
<?= view('employer/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <?php if ($data && account_type() == 'company') { ?>
  <div class="container py-5">
   <h2 class="text-center mb-4"><?= lang('app.b_r_info') ?></h2>

   <ul class="nav nav-tabs" id="userTabs" role="tablist">
    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#cr"><?= lang('app.crc') ?></button></li>
    <li class="nav-item"><button class="nav-link " data-bs-toggle="tab" data-bs-target="#id"><?= lang('app.id') ?></button></li>
    <li class="nav-item"><button class="nav-link " data-bs-toggle="tab" data-bs-target="#cc"><?= lang('app.cc') ?></button></li>
    <li class="nav-item"><button class="nav-link " data-bs-toggle="tab" data-bs-target="#ta"><?= lang('app.ta') ?></button></li>
    <li class="nav-item"><button class="nav-link " data-bs-toggle="tab" data-bs-target="#lc"><?= lang('app.lc') ?></button></li>
    <li class="nav-item"><button class="nav-link " data-bs-toggle="tab" data-bs-target="#tcc"><?= lang('app.tcc') ?></button></li>
    <li class="nav-item"><button class="nav-link " data-bs-toggle="tab" data-bs-target="#vc"><?= lang('app.vc') ?></button></li>
   </ul>
   <div class="tab-content pt-4">
    <div class="tab-pane fade show active" id="cr">
     <table class="table table-bordered">
      <tr>
       <th><?= lang('app.cr_name_en') ?></th>
       <td><?= esc($data['cr_name_en']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.cr_name_ar') ?></th>
       <td><?= esc($data['cr_name_ar']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.cr_number') ?></th>
       <td><?= esc($data['cr_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.email') ?></th>
       <td><?= esc($data['cr_email']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.gsm') ?></th>
       <td><?= esc($data['cr_gsm']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.po_box') ?></th>
       <td><?= esc($data['cr_po_box']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.postal_code') ?></th>
       <td><?= esc($data['cr_postal_code']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.fax') ?></th>
       <td><?= esc($data['cr_fax']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.establishment_date') ?></th>
       <td><?= esc($data['cr_establishment_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.expiry_date') ?></th>
       <td><?= esc($data['cr_expiry_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.legal_type') ?></th>
       <td><?= esc($data['cr_legal_type']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.head_quarter') ?></th>
       <td><?= esc($data['cr_head_quarter']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.crc') ?></th>
       <td><?= esc($data['cr_document']) ?></td>
      </tr>
     </table>
    </div>
    <div class="tab-pane fade " id="id">
     <table class="table table-bordered">
      <tr>
       <th><?= lang('app.id_number') ?></th>
       <td><?= esc($data['id_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.expire_date') ?></th>
       <td><?= esc($data['id_expire_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.first_name') ?></th>
       <td><?= esc($data['id_first_name']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.second_name') ?></th>
       <td><?= esc($data['id_second_name']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.third_name') ?></th>
       <td><?= esc($data['id_third_name']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.sur_name') ?></th>
       <td><?= esc($data['id_sur_name']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.date_of_birth') ?></th>
       <td><?= esc($data['id_date_of_birth']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.address_name') ?></th>
       <td><?= esc($data['id_address']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.id') ?></th>
       <td><?= esc($data['id_document']) ?></td>
      </tr>
     </table>
    </div>
    <div class="tab-pane fade " id="cc">
     <table class="table table-bordered">
      <tr>
       <th><?= lang('app.cr_number') ?></th>
       <td><?= esc($data['cc_cr_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.head_quarter') ?></th>
       <td><?= esc($data['cc_head_quarter']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.cc_occi_number') ?></th>
       <td><?= esc($data['cc_occi_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.cc_expire_date') ?></th>
       <td><?= esc($data['cc_expire_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.cc') ?></th>
       <td><?= esc($data['cc_document']) ?></td>
      </tr>
     </table>
    </div>
    <div class="tab-pane fade " id="ta">
     <table class="table table-bordered">
      <tr>
       <th><?= lang('app.governorate') ?></th>
       <td><?= esc($data['ta_governorate']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.complex_no') ?></th>
       <td><?= esc($data['ta_complex_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.state') ?></th>
       <td><?= esc($data['ta_state']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.plot_no') ?></th>
       <td><?= esc($data['ta_plot_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.area') ?></th>
       <td><?= esc($data['ta_area']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.building_no') ?></th>
       <td><?= esc($data['ta_building_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.street_name_no') ?></th>
       <td><?= esc($data['ta_street_name_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.flat_shop_no') ?></th>
       <td><?= esc($data['ta_flat_shop_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.way_no') ?></th>
       <td><?= esc($data['ta_way_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.type_of_activity') ?></th>
       <td><?= esc($data['ta_type_of_activity']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.rent_contract_no') ?></th>
       <td><?= esc($data['ta_rent_contract_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.expire_date') ?></th>
       <td><?= esc($data['ta_expire_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.ta') ?></th>
       <td><?= esc($data['ta_document']) ?></td>
      </tr>
     </table>
    </div>
    <div class="tab-pane fade " id="lc">
     <table class="table table-bordered">
      <tr>
       <th><?= lang('app.cr_number') ?></th>
       <td><?= esc($data['lc_cr_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.governorate') ?></th>
       <td><?= esc($data['lc_governorate']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.rent_contract_no') ?></th>
       <td><?= esc($data['lc_rent_contract_no']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.state') ?></th>
       <td><?= esc($data['lc_state']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.area') ?></th>
       <td><?= esc($data['lc_area']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.poa_code') ?></th>
       <td><?= esc($data['lc_poa_code']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.license_type') ?></th>
       <td><?= esc($data['lc_license_type']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.license_name') ?></th>
       <td><?= esc($data['lc_license_name']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.license_number') ?></th>
       <td><?= esc($data['lc_license_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.expire_date') ?></th>
       <td><?= esc($data['lc_expire_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.activities_code') ?></th>
       <td><?= esc($data['lc_activities_code']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.activities_description') ?></th>
       <td><?= esc($data['lc_activities_description']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.lc') ?></th>
       <td><?= esc($data['lc_document']) ?></td>
      </tr>
     </table>
    </div>
    <div class="tab-pane fade " id="tcc">
     <table class="table table-bordered">
      <tr>
       <th><?= lang('app.cr_number') ?></th>
       <td><?= esc($data['tcc_cr_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.tax_card_number') ?></th>
       <td><?= esc($data['tcc_tax_card_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.tin') ?></th>
       <td><?= esc($data['tcc_tin']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.expire_date') ?></th>
       <td><?= esc($data['tcc_expire_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.ta') ?></th>
       <td><?= esc($data['tcc_document']) ?></td>
      </tr>
     </table>
    </div>
    <div class="tab-pane fade " id="vc">
     <table class="table table-bordered">
      <tr>
       <th><?= lang('app.cr_number') ?></th>
       <td><?= esc($data['vc_cr_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.vat_certificate_number') ?></th>
       <td><?= esc($data['vc_vat_certificate_number']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.vatin') ?></th>
       <td><?= esc($data['vc_vatin']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.expire_date') ?></th>
       <td><?= esc($data['vc_expire_date']) ?></td>
      </tr>
      <tr>
       <th><?= lang('app.vc') ?></th>
       <td><?= esc($data['vc_document']) ?></td>
      </tr>
     </table>
    </div>
   </div>


  <?php } elseif (account_type() == 'company') {
  ?>
   <div class="row py-3 text-center">
    <h5>No Business information found</h5>
    <a href="<?= base_url('business/registration') ?>" class="text-decoration-none">Set Business Information</a>
   </div>
  <?php
 } else {
  echo '<div class="text-center py-5">You does not need to fill company info</div>';
 }
  ?>
  </div>
  <?= view('employer/layout/footer.php') ?>