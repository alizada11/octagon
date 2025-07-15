<?= $this->extend('frontend/layout/main') ?>
<?= $this->section('content') ?>

<section class="py-5">
 <div class="container">
  <h2 class="mb-4 text-center">Available Jobseekers</h2>

  <div class="row gy-4">
   <?php foreach ($jobseekers as $js): ?>
    <div class="col-md-6 col-lg-4">
     <div class="card h-100 shadow border-0 rounded-3 p-3">
      <div class="d-flex align-items-center mb-3">
       <i class="fas fa-user-circle fa-2x text-primary me-2"></i>
       <h5 class="mb-0"><?= esc($js->full_name) ?></h5>
      </div>
      <p><strong>Nationality:</strong> <?= esc($js->nationality) ?></p>
      <p><strong>Phone:</strong> <?= esc($js->phone) ?></p>
      <p><strong>Address:</strong> <?= esc($js->address) ?></p>
      <p>
       <strong>Interested areas:<br></strong>

       <?php
       $availability = json_decode($js->available_for_work, true);
       if ($availability) {

        if (is_array($availability)) {
         foreach ($availability as $id) {
          $title = interested_title($id);
          echo '<span style="display:inline-block; margin:2px; padding:4px 10px; background-color:#eee; border-radius:12px; font-size:13px;">' . esc($title) . '</span>';
         }
        } else {
         echo 'N/A';
        }
       }
       ?>



      </p>
      <a href="<?= base_url('jobseeker/profile/' . $js->user_id) ?>" class="btn py-2 btn-outline-primary btn-sm mt-auto">View Profile</a>
     </div>
    </div>
   <?php endforeach; ?>
  </div>
  <div class="mt-4">
   <?= $pager->links('default', 'bootstrap_full') ?>
  </div>
 </div>
 </div>
</section>

<?= $this->endSection() ?>