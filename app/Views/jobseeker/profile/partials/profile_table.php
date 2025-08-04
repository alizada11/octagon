<div class="container profile-page mt-4">


 <div class="card-body">
  <?php if (!empty($profile)): ?>
   <div class="row mb-4">
    <div class="col-md-4 d-flex flex-column align-items-center">
     <div class="profile-photo-container mb-3">
      <?php if (!empty($profile['photo'])): ?>
       <img src="<?= base_url('uploads/jobseekers/' . $profile['photo']) ?>" alt="Photo" class="img-thumbnail profile-photo">
      <?php else: ?>
       <div class="no-photo-placeholder bg-light border rounded d-flex align-items-center justify-content-center">
        <i class="fas fa-user fa-3x text-muted"></i>
       </div>
      <?php endif; ?>
     </div>

     <?php if (!empty($profile['cv_file'])): ?>
      <a href="<?= base_url('uploads/cvs/' . $profile['cv_file']) ?>" target="_blank" class="btn btn-outline-primary btn-sm mt-2">
       <i class="fas fa-file-pdf mr-1"></i><?= lang('Global.view_cv') ?>
      </a>
     <?php endif; ?>
    </div>

    <div class="col-md-8">
     <div class="table-responsive">
      <table class="table table-bordered table-hover text-center">
       <tbody>
        <tr>
         <th class="bg-light" style="width: 40%;"><?= lang('Global.full_name') ?></th>
         <td><?= esc($profile['full_name']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.dob') ?></th>
         <td><?= esc($profile['dob']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.gender') ?></th>
         <td><?= esc($profile['gender']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.marital_status') ?></th>
         <td><?= esc($profile['marital_status']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.nationality') ?></th>
         <td><?= lang('Nationalitites.' . $profile['nationality']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.address') ?></th>
         <td><?= esc($profile['address']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.phone') ?></th>
         <td><?= esc($profile['country_code']) ?>&nbsp;<?= esc($profile['phone']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.religion') ?></th>
         <td><?= lang('Religions.' . $profile['religion']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.no_of_children') ?></th>
         <td><?= esc($profile['no_of_children']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.place_of_birth') ?></th>
         <td><?= esc($profile['place_of_birth']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.living_town') ?></th>
         <td><?= esc($profile['living_town']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.weight') ?></th>
         <td><?= esc($profile['weight']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.height') ?></th>
         <td><?= esc($profile['height']) ?></td>
        </tr>
        <tr>
         <th class="bg-light"><?= lang('Global.complexion') ?></th>
         <td><?= esc($profile['complexion']) ?></td>
        </tr>
       </tbody>
      </table>
     </div>
    </div>
   </div>

   <div class="text-center mt-4">
    <a href="<?= site_url('jobseeker/profile/edit/' . $profile['id']) ?>" class="btn btn-primary px-5">
     <?= lang('Global.edit_profile') ?>
    </a>
   </div>

  <?php else: ?>
   <div class="alert alert-info text-center"><?= lang('Global.no_profile_found') ?></div>
   <div class="text-center mt-3">
    <a href="<?= site_url('jobseeker/profile/create') ?>" class="btn btn-success px-4">
     <?= lang('Global.create_profile') ?>
    </a>
   </div>
  <?php endif; ?>
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