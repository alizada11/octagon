<?= view('employer/layout/header.php') ?>
<?= view('employer/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <?php if ($data && account_type() == 'company') { ?>
  <div class="container py-4">
   <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0 text-primary"><?= lang('app.b_r_info') ?></h2>

   </div>

   <div class="card shadow-sm">
    <div class="card-body">
     <ul class="nav nav-pills mb-4" id="userTabs" role="tablist">
      <li class="nav-item" role="presentation">
       <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#cr">
        <i class="bi bi-building me-1"></i> <?= lang('app.crc') ?>
       </button>
      </li>
      <li class="nav-item" role="presentation">
       <button class="nav-link" data-bs-toggle="pill" data-bs-target="#id">
        <i class="bi bi-person-badge me-1"></i> <?= lang('app.id') ?>
       </button>
      </li>
      <li class="nav-item" role="presentation">
       <button class="nav-link" data-bs-toggle="pill" data-bs-target="#cc">
        <i class="bi bi-file-earmark-text me-1"></i> <?= lang('app.cc') ?>
       </button>
      </li>
      <li class="nav-item" role="presentation">
       <button class="nav-link" data-bs-toggle="pill" data-bs-target="#ta">
        <i class="bi bi-shop me-1"></i> <?= lang('app.ta') ?>
       </button>
      </li>
      <li class="nav-item" role="presentation">
       <button class="nav-link" data-bs-toggle="pill" data-bs-target="#lc">
        <i class="bi bi-award me-1"></i> <?= lang('app.lc') ?>
       </button>
      </li>
      <li class="nav-item" role="presentation">
       <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tcc">
        <i class="bi bi-credit-card me-1"></i> <?= lang('app.tcc') ?>
       </button>
      </li>
      <li class="nav-item" role="presentation">
       <button class="nav-link" data-bs-toggle="pill" data-bs-target="#vc">
        <i class="bi bi-receipt me-1"></i> <?= lang('app.vc') ?>
       </button>
      </li>
     </ul>

     <div class="tab-content pt-2">
      <!-- Commercial Registration Tab -->
      <div class="tab-pane fade show active" id="cr">
       <div class="table-responsive">
        <table class="table table-hover table-striped">
         <tbody>
          <tr>
           <th width="30%" class="bg-light"><?= lang('app.cr_name_en') ?></th>
           <td><?= esc($data['cr_name_en']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.cr_name_ar') ?></th>
           <td><?= esc($data['cr_name_ar']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.cr_number') ?></th>
           <td><?= esc($data['cr_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.email') ?></th>
           <td><a href="mailto:<?= esc($data['cr_email']) ?>"><?= esc($data['cr_email']) ?></a></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.gsm') ?></th>
           <td><a href="tel:<?= esc($data['cr_gsm']) ?>"><?= esc($data['cr_gsm']) ?></a></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.po_box') ?></th>
           <td><?= esc($data['cr_po_box']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.postal_code') ?></th>
           <td><?= esc($data['cr_postal_code']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.fax') ?></th>
           <td><?= esc($data['cr_fax']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.establishment_date') ?></th>
           <td><?= date('d M Y', strtotime(esc($data['cr_establishment_date']))) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.expiry_date') ?></th>
           <td class="<?= (strtotime($data['cr_expiry_date']) < time()) ? 'text-danger fw-bold' : '' ?>">
            <?= date('d M Y', strtotime(esc($data['cr_expiry_date']))) ?>
            <?php if (strtotime($data['cr_expiry_date']) < time()): ?>
             <span class="badge bg-danger ms-2">Expired</span>
            <?php endif; ?>
           </td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.legal_type') ?></th>
           <td><?= esc($data['cr_legal_type']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.head_quarter') ?></th>
           <td><?= esc($data['cr_head_quarter']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.crc') ?></th>
           <td>
            <a href="<?= base_url('viewFile/' . $data['cr_document']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
             <i class="bi bi-eye-fill"></i> View Documentssss
            </a>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>

      <!-- ID Tab -->
      <div class="tab-pane fade" id="id">
       <div class="table-responsive">
        <table class="table table-hover table-striped">
         <tbody>
          <tr>
           <th width="30%" class="bg-light"><?= lang('app.id_number') ?></th>
           <td><?= esc($data['id_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.expire_date') ?></th>
           <td class="<?= (strtotime($data['id_expire_date']) < time()) ? 'text-danger fw-bold' : '' ?>">
            <?= date('d M Y', strtotime(esc($data['id_expire_date']))) ?>
            <?php if (strtotime($data['id_expire_date']) < time()): ?>
             <span class="badge bg-danger ms-2">Expired</span>
            <?php endif; ?>
           </td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.first_name') ?></th>
           <td><?= esc($data['id_first_name']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.second_name') ?></th>
           <td><?= esc($data['id_second_name']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.third_name') ?></th>
           <td><?= esc($data['id_third_name']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.sur_name') ?></th>
           <td><?= esc($data['id_sur_name']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.date_of_birth') ?></th>
           <td><?= date('d M Y', strtotime(esc($data['id_date_of_birth']))) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.address_name') ?></th>
           <td><?= esc($data['id_address']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.id') ?></th>
           <td>
            <a href="<?= base_url('viewFile/' . $data['id_document']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
             <i class="bi bi-eye-fill"></i> View Document
            </a>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>

      <!-- Other tabs follow the same improved pattern -->
      <!-- CC Tab -->
      <div class="tab-pane fade" id="cc">
       <div class="table-responsive">
        <table class="table table-hover table-striped">
         <tbody>
          <tr>
           <th width="30%" class="bg-light"><?= lang('app.cr_number') ?></th>
           <td><?= esc($data['cc_cr_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.head_quarter') ?></th>
           <td><?= esc($data['cc_head_quarter']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.cc_occi_number') ?></th>
           <td><?= esc($data['cc_occi_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.cc_expire_date') ?></th>
           <td class="<?= (strtotime($data['cc_expire_date']) < time()) ? 'text-danger fw-bold' : '' ?>">
            <?= date('d M Y', strtotime(esc($data['cc_expire_date']))) ?>
            <?php if (strtotime($data['cc_expire_date']) < time()): ?>
             <span class="badge bg-danger ms-2">Expired</span>
            <?php endif; ?>
           </td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.cc') ?></th>
           <td>
            <a href="<?= base_url('viewFile/' . $data['cc_document']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
             <i class="bi bi-eye-fill"></i> View Document
            </a>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>

      <!-- Trade Activity Tab -->
      <div class="tab-pane fade" id="ta">
       <div class="table-responsive">
        <table class="table table-hover table-striped">
         <tbody>
          <tr>
           <th width="30%" class="bg-light"><?= lang('app.governorate') ?></th>
           <td><?= esc($data['ta_governorate']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.complex_no') ?></th>
           <td><?= esc($data['ta_complex_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.state') ?></th>
           <td><?= esc($data['ta_state']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.plot_no') ?></th>
           <td><?= esc($data['ta_plot_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.area') ?></th>
           <td><?= esc($data['ta_area']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.building_no') ?></th>
           <td><?= esc($data['ta_building_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.street_name_no') ?></th>
           <td><?= esc($data['ta_street_name_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.flat_shop_no') ?></th>
           <td><?= esc($data['ta_flat_shop_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.way_no') ?></th>
           <td><?= esc($data['ta_way_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.type_of_activity') ?></th>
           <td><?= esc($data['ta_type_of_activity']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.rent_contract_no') ?></th>
           <td><?= esc($data['ta_rent_contract_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.expire_date') ?></th>
           <td class="<?= (strtotime($data['ta_expire_date']) < time()) ? 'text-danger fw-bold' : '' ?>">
            <?= date('d M Y', strtotime(esc($data['ta_expire_date']))) ?>
            <?php if (strtotime($data['ta_expire_date']) < time()): ?>
             <span class="badge bg-danger ms-2">Expired</span>
            <?php endif; ?>
           </td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.ta') ?></th>
           <td>
            <a href="<?= base_url('viewFile/' . $data['ta_document']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
             <i class="bi bi-eye-fill"></i> View Document
            </a>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>

      <!-- License Certificate Tab -->
      <div class="tab-pane fade" id="lc">
       <div class="table-responsive">
        <table class="table table-hover table-striped">
         <tbody>
          <tr>
           <th width="30%" class="bg-light"><?= lang('app.cr_number') ?></th>
           <td><?= esc($data['lc_cr_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.governorate') ?></th>
           <td><?= esc($data['lc_governorate']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.rent_contract_no') ?></th>
           <td><?= esc($data['lc_rent_contract_no']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.state') ?></th>
           <td><?= esc($data['lc_state']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.area') ?></th>
           <td><?= esc($data['lc_area']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.poa_code') ?></th>
           <td><?= esc($data['lc_poa_code']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.license_type') ?></th>
           <td><?= esc($data['lc_license_type']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.license_name') ?></th>
           <td><?= esc($data['lc_license_name']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.license_number') ?></th>
           <td><?= esc($data['lc_license_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.expire_date') ?></th>
           <td class="<?= (strtotime($data['lc_expire_date']) < time()) ? 'text-danger fw-bold' : '' ?>">
            <?= date('d M Y', strtotime(esc($data['lc_expire_date']))) ?>
            <?php if (strtotime($data['lc_expire_date']) < time()): ?>
             <span class="badge bg-danger ms-2">Expired</span>
            <?php endif; ?>
           </td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.activities_code') ?></th>
           <td><?= esc($data['lc_activities_code']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.activities_description') ?></th>
           <td><?= esc($data['lc_activities_description']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.lc') ?></th>
           <td>
            <a href="<?= base_url('viewFile/' . $data['lc_document']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
             <i class="bi bi-eye-fill"></i> View Document
            </a>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>

      <!-- Tax Card Certificate Tab -->
      <div class="tab-pane fade" id="tcc">
       <div class="table-responsive">
        <table class="table table-hover table-striped">
         <tbody>
          <tr>
           <th width="30%" class="bg-light"><?= lang('app.cr_number') ?></th>
           <td><?= esc($data['tcc_cr_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.tax_card_number') ?></th>
           <td><?= esc($data['tcc_tax_card_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.tin') ?></th>
           <td><?= esc($data['tcc_tin']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.expire_date') ?></th>
           <td class="<?= (strtotime($data['tcc_expire_date']) < time()) ? 'text-danger fw-bold' : '' ?>">
            <?= date('d M Y', strtotime(esc($data['tcc_expire_date']))) ?>
            <?php if (strtotime($data['tcc_expire_date']) < time()): ?>
             <span class="badge bg-danger ms-2">Expired</span>
            <?php endif; ?>
           </td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.ta') ?></th>
           <td>
            <a href="<?= base_url('viewFile/' . $data['tcc_document']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
             <i class="bi bi-eye-fill"></i> View Document
            </a>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
      <!-- VAT Certificate Tab -->
      <div class="tab-pane fade" id="vc">
       <div class="table-responsive">
        <table class="table table-hover table-striped">
         <tbody>
          <tr>
           <th width="30%" class="bg-light"><?= lang('app.cr_number') ?></th>
           <td><?= esc($data['vc_cr_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.vat_certificate_number') ?></th>
           <td><?= esc($data['vc_vat_certificate_number']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.vatin') ?></th>
           <td><?= esc($data['vc_vatin']) ?></td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.expire_date') ?></th>
           <td class="<?= (strtotime($data['vc_expire_date']) < time()) ? 'text-danger fw-bold' : '' ?>">
            <?= date('d M Y', strtotime(esc($data['vc_expire_date']))) ?>
            <?php if (strtotime($data['vc_expire_date']) < time()): ?>
             <span class="badge bg-danger ms-2">Expired</span>
            <?php endif; ?>
           </td>
          </tr>
          <tr>
           <th class="bg-light"><?= lang('app.vc') ?></th>
           <td>
            <a href="<?= base_url('viewFile/' . $data['vc_document']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
             <i class="bi bi-eye-fill"></i> View Document
            </a>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>

 <?php } elseif (account_type() == 'company') { ?>
  <div class="container py-5">
   <div class="card shadow-sm text-center py-5">
    <div class="card-body">
     <div class="empty-state">
      <i class="bi bi-building text-muted" style="font-size: 5rem;"></i>
      <h3 class="mt-3">No Business Information Found</h3>
      <p class="text-muted mb-4">You haven't submitted your business information yet.</p>
      <a href="<?= base_url('business/registration') ?>" class="btn btn-primary px-4">
       <i class="bi bi-plus-circle me-2"></i> Add Business Information
      </a>
     </div>
    </div>
   </div>
  </div>
 <?php } else { ?>
  <div class="container py-5">
   <div class="card shadow-sm text-center py-5">
    <div class="card-body">
     <div class="empty-state">
      <i class="bi bi-person-check text-muted" style="font-size: 5rem;"></i>
      <h3 class="mt-3">Personal Account</h3>
      <p class="text-muted">You don't need to provide company information for your account type.</p>
     </div>
    </div>
   </div>
  </div>
 <?php } ?>
</div>

<?= view('employer/layout/footer.php') ?>

<style>
 .nav-pills .nav-link {
  border-radius: 0.375rem;
  padding: 0.5rem 1rem;
  margin-right: 0.5rem;
  color: #495057;
  font-weight: 500;
 }

 .nav-pills .nav-link.active {
  background-color: #0d6efd;
  color: white;
 }

 .nav-pills .nav-link:hover:not(.active) {
  background-color: #f8f9fa;
 }

 .empty-state {
  max-width: 500px;
  margin: 0 auto;
 }

 .table th {
  white-space: nowrap;
 }

 .badge {
  font-size: 0.75em;
 }
</style>