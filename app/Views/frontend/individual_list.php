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
       <strong>Title:</strong>
       <?php
       $availability = json_decode($js->available_for_work, true); // true => decode as array

       foreach ($availability as $items) {
        echo $items . ', ';
       } ?>
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