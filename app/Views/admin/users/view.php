<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <?php if ($data) { ?>

  <!-- Main Content -->
  <div class="card mb-4">
   <div class="card-header">
    <h5><?= esc($owner['full_name'] . "'s" ?? ''); ?>&nbsp;<?= lang('app.business_details') ?></h5>
   </div>
   <div class="card-body">
    <div class="row">
     <div class="container-fluid">
      <!-- Company Registration Certificate Section -->
      <div class="w3-margin-bottom">
       <header class="w3-container w3-light-grey toggle-header" onclick="toggleSection('crc')" style="cursor:pointer">
        <h5><?= lang('app.crc_title') ?> <span class="w3-right">▼</span></h5>
       </header>
       <div id="crc" class="w3-container">
        <div class="w3-row-padding">
         <div class="w3-third">
          <p><strong><?= lang('app.cr_name_en') ?>:</strong> <?= esc($data['cr_name_en']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.cr_name_ar') ?>:</strong> <?= esc($data['cr_name_ar']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($data['cr_number']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.email') ?>:</strong> <?= esc($data['cr_email']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.gsm') ?>:</strong> <?= esc($data['cr_gsm']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.po_box') ?>:</strong> <?= esc($data['cr_po_box']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.postal_code') ?>:</strong> <?= esc($data['cr_postal_code']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.fax') ?>:</strong> <?= esc($data['cr_fax']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.establishment_date') ?>:</strong> <?= esc($data['cr_establishment_date']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.expiry_date') ?>:</strong> <?= esc($data['cr_expiry_date']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.legal_type') ?>:</strong> <?= esc($data['cr_legal_type']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.head_quarter') ?>:</strong> <?= esc($data['cr_head_quarter']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.crc') ?>:</strong>
           <a href="<?= base_url('viewFile/' . $data['cr_document']) ?>" target="_blank" class="w3-button w3-light-grey"> <i class="far fa-file-pdf"> </i> <?= lang('app.document') ?></a>
          </p>
         </div>
         <div class="py-3 text-start">
          <a href="<?= base_url('businesses/edit/cr/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
         </div>
        </div>
       </div>
      </div>

      <!-- Identification Section -->
      <div class="w3-margin-bottom">
       <header class="w3-container w3-light-grey toggle-header" onclick="toggleSection('id')" style="cursor:pointer">
        <h5><?= lang('app.id_title') ?> <span class="w3-right">▼</span></h5>
       </header>
       <div id="id" class="w3-container" style="display:none">
        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.id_number') ?>:</strong> <?= esc($data['id_number']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($data['id_expire_date']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.first_name') ?>:</strong> <?= esc($data['id_first_name']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.second_name') ?>:</strong> <?= esc($data['id_second_name']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.third_name') ?>:</strong> <?= esc($data['id_third_name']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.sur_name') ?>:</strong> <?= esc($data['id_sur_name']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.date_of_birth') ?>:</strong> <?= esc($data['id_date_of_birth']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.address_name') ?>:</strong> <?= esc($data['id_address']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.id') ?>:</strong>
           <a href="<?= base_url('viewFile/' . $data['id_document']) ?>" target="_blank" class="w3-button w3-light-grey">
            <?= lang('app.document') ?>
           </a>
          </p>
         </div>
        </div>
        <div class="py-3 text-start">
         <a href="<?= base_url('businesses/edit/id/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
        </div>
       </div>
      </div>

      <!-- Chamber of Commerce Section -->
      <div class="w3-margin-bottom">
       <header class="w3-container w3-light-grey toggle-header" onclick="toggleSection('cc')" style="cursor:pointer">
        <h5><?= lang('app.cc_title') ?> <span class="w3-right">▼</span></h5>
       </header>
       <div id="cc" class="w3-container" style="display:none">
        <div class="w3-row-padding">
         <div class="w3-third">
          <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($data['cc_cr_number']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.head_quarter') ?>:</strong> <?= esc($data['cc_head_quarter']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.cc_occi_number') ?>:</strong> <?= esc($data['cc_occi_number']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.cc') ?>:</strong>
           <a href="<?= base_url('viewFile/' . $data['cc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
            <?= lang('app.document') ?>
           </a>
          </p>
         </div>
        </div>
        <div class="py-3 text-start">
         <a href="<?= base_url('businesses/edit/cc/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
        </div>
       </div>
      </div>

      <!-- Trade Authorization Section -->
      <div class="w3-margin-bottom">
       <header class="w3-container w3-light-grey toggle-header" onclick="toggleSection('ta')" style="cursor:pointer">
        <h5><?= lang('app.ta_title') ?> <span class="w3-right">▼</span></h5>
       </header>
       <div id="ta" class="w3-container" style="display:none">
        <div class="w3-row-padding">
         <div class="w3-third">
          <p><strong><?= lang('app.governorate') ?>:</strong> <?= esc($data['ta_governorate']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.complex_no') ?>:</strong> <?= esc($data['ta_complex_no']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.state') ?>:</strong> <?= esc($data['ta_state']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.plot_no') ?>:</strong> <?= esc($data['ta_plot_no']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.area') ?>:</strong> <?= esc($data['ta_area']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.building_no') ?>:</strong> <?= esc($data['ta_building_no']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.street_name_no') ?>:</strong> <?= esc($data['ta_street_name_no']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.flat_shop_no') ?>:</strong> <?= esc($data['ta_flat_shop_no']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.way_no') ?>:</strong> <?= esc($data['ta_way_no']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.type_of_activity') ?>:</strong> <?= esc($data['ta_type_of_activity']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.rent_contract_no') ?>:</strong> <?= esc($data['ta_rent_contract_no']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($data['ta_expire_date']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.ta') ?>:</strong>
           <a href="<?= base_url('viewFile/' . $data['ta_document']) ?>" target="_blank" class="w3-button w3-light-grey">
            <?= lang('app.document') ?>
           </a>
          </p>
         </div>
         <div class="py-3 text-start">
          <a href="<?= base_url('businesses/edit/ta/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
         </div>
        </div>
       </div>
      </div>

      <!-- License Certificate Section -->
      <div class="w3-margin-bottom">
       <header class="w3-container w3-light-grey toggle-header" onclick="toggleSection('lc')" style="cursor:pointer">
        <h5><?= lang('app.lc_title') ?> <span class="w3-right">▼</span></h5>
       </header>
       <div id="lc" class="w3-container" style="display:none">
        <div class="w3-row-padding">
         <div class="w3-third">
          <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($data['lc_cr_number']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.governorate') ?>:</strong> <?= esc($data['lc_governorate']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.rent_contract_no') ?>:</strong> <?= esc($data['lc_rent_contract_no']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-third">
          <p><strong><?= lang('app.state') ?>:</strong> <?= esc($data['lc_state']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.area') ?>:</strong> <?= esc($data['lc_area']) ?></p>
         </div>
         <div class="w3-third">
          <p><strong><?= lang('app.poa_code') ?>:</strong> <?= esc($data['lc_poa_code']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.license_type') ?>:</strong> <?= esc($data['lc_license_type']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.license_name') ?>:</strong> <?= esc($data['lc_license_name']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.license_number') ?>:</strong> <?= esc($data['lc_license_number']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($data['lc_expire_date']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.activities_code') ?>:</strong> <?= esc($data['lc_activities_code']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.activities_description') ?>:</strong> <?= esc($data['lc_activities_description']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.lc') ?>:</strong>
           <a href="<?= base_url('viewFile/' . $data['lc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
            <?= lang('app.document') ?>
           </a>
          </p>
         </div>
        </div>
        <div class="py-3 text-start">
         <a href="<?= base_url('businesses/edit/lc/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
        </div>
       </div>
      </div>

      <!-- Tax Card Certificate Section -->
      <div class="w3-margin-bottom">
       <header class="w3-container w3-light-grey toggle-header" onclick="toggleSection('tcc')" style="cursor:pointer">
        <h5><?= lang('app.tcc_title') ?> <span class="w3-right">▼</span></h5>
       </header>
       <div id="tcc" class="w3-container" style="display:none">
        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($data['tcc_cr_number']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.tax_card_number') ?>:</strong> <?= esc($data['tcc_tax_card_number']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.tin') ?>:</strong> <?= esc($data['tcc_tin']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($data['tcc_expire_date']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.ta') ?>:</strong>
           <a href="<?= base_url('viewFile/' . $data['tcc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
            <?= lang('app.document') ?>
           </a>
          </p>
         </div>
        </div>
        <div class="py-3 text-start">
         <a href="<?= base_url('businesses/edit/tcc/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
        </div>
       </div>
      </div>

      <!-- VAT Certificate Section -->
      <div class="w3-margin-bottom">
       <header class="w3-container w3-light-grey toggle-header" onclick="toggleSection('vc')" style="cursor:pointer">
        <h5><?= lang('app.vc_title') ?> <span class="w3-right">▼</span></h5>
       </header>
       <div id="vc" class="w3-container" style="display:none">
        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.cr_number') ?>:</strong> <?= esc($data['vc_cr_number']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.vat_certificate_number') ?>:</strong> <?= esc($data['vc_vat_certificate_number']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.vatin') ?>:</strong> <?= esc($data['vc_vatin']) ?></p>
         </div>
         <div class="w3-half">
          <p><strong><?= lang('app.expire_date') ?>:</strong> <?= esc($data['vc_expire_date']) ?></p>
         </div>
        </div>

        <div class="w3-row-padding">
         <div class="w3-half">
          <p><strong><?= lang('app.vc') ?>:</strong>
           <a href="<?= base_url('viewFile/' . $data['vc_document']) ?>" target="_blank" class="w3-button w3-light-grey">
            <?= lang('app.document') ?>
           </a>
          </p>
         </div>
        </div>
        <div class="py-3 text-start">
         <a href="<?= base_url('businesses/edit/vc/' . $data['id']) ?>" class="btn btn-primary">Edit</a>
        </div>
       </div>
      </div>
     </div>

     <script>
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

      // Open the first section by default
      document.addEventListener('DOMContentLoaded', function() {
       document.getElementById('crc').style.display = "block";
       document.querySelector('#crc').previousElementSibling.querySelector('span').innerHTML = "▲";
      });
     </script>


    </div>
   </div>
  </div>

 <?php } else {
  echo '<div class="text-center py-5">No Profile Submitted for this account</div>';
 }
 ?>
</div>
<?= view('admin/layout/footer.php') ?>