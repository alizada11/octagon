<div class="container profile-page mt-4">
 <div class="card shadow-sm mb-4">


  <div class="card-body">
   <?php if (!empty($profile)): ?>
    <div class="row mb-4">
     <div class="col-md-4 d-flex flex-column align-items-center">
      <div class="profile-photo-container mb-3">
       <?php if (!empty($profile['photo'])): ?>
        <img src="<?= base_url('uploads/employers/' . $profile['photo']) ?>" alt="Photo" class="img-thumbnail profile-photo">
       <?php else: ?>
        <div class="no-photo-placeholder bg-light border rounded d-flex align-items-center justify-content-center">
         <i class="fas fa-user fa-3x text-muted"></i>
        </div>
       <?php endif; ?>
      </div>

      <?php if (!empty($profile['cv_file'])): ?>
       <a href="<?= base_url('uploads/cvs/' . $profile['cv_file']) ?>" target="_blank" class="btn btn-outline-primary btn-sm mt-2">
        <i class="fas fa-file-pdf mr-1"></i>View CV
       </a>
      <?php endif; ?>
     </div>

     <div class="col-md-8">
      <div class="table-responsive">
       <table class="table table-bordered table-hover text-center">
        <tbody>
         <tr>
          <th class="bg-light" style="width: 40%;"><?= lang('Global.full_name') ?></th>
          <td><?= esc($profile['full_name'] ?? lang('Global.N/A')) ?></td>
         </tr>
         <tr>
          <th class="bg-light"><?= lang('Global.dob') ?></th>
          <td><?= esc($profile['dob'] ?? lang('Global.N/A')) ?></td>
         </tr>
         <tr>
          <th class="bg-light"><?= lang('Global.gender') ?></th>
          <td><?= esc($profile['gender'] ?? lang('Global.N/A')) ?></td>
         </tr>
         <tr>
          <th class="bg-light"><?= lang('Global.marital_status') ?></th>
          <td><?= esc($profile['marital_status'] ?? lang('Global.N/A')) ?></td>
         </tr>
         <tr>
          <th class="bg-light"><?= lang('Global.nationality') ?></th>
          <td><?= esc($profile['nationality'] ?? lang('Global.N/A')) ?></td>
         </tr>
         <tr>
          <th class="bg-light"><?= lang('Global.address') ?></th>
          <td><?= esc($profile['address'] ?? lang('Global.N/A')) ?></td>
         </tr>
         <tr>
          <th class="bg-light"><?= lang('Global.phone') ?></th>
          <td><?= esc($profile['country_code'] . $profile['phone'] ?? lang('Global.N/A')) ?></td>
         </tr>
        </tbody>
       </table>
      </div>
     </div>
    </div>

    <div class="text-center mt-4">
     <a href="<?= site_url('employer/profile/edit/' . $profile['id']) ?>" class="btn btn-primary px-5">
      Edit Profile
     </a>
    </div>

   <?php else: ?>
    <div class="alert alert-info text-center"><?= lang('Global.no_profile_found') ?>.</div>
    <div class="text-center mt-3">
     <a href="<?= site_url('employer/profile/create') ?>" class="btn btn-success px-4"><?= lang('Global.create_profile') ?></a>
    </div>
   <?php endif; ?>
  </div>
 </div>
</div>

<style>
 .profile-photo {
  width: 200px;
  height: 200px;
  object-fit: cover;
 }

 .no-photo-placeholder {
  width: 200px;
  height: 200px;
 }

 .card-header {
  border-radius: 0.25rem 0.25rem 0 0 !important;
 }

 th.bg-light {
  background-color: #f8f9fa !important;
 }

 .table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.03);
 }

 .profile-page i.fas {
  color: #000;
 }
</style>