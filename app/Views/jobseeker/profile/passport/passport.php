<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>
<div class="col-md-10 my-3 p-4">

 <div class="card ">
  <div class="card-header">
   <?= lang('Global.passport_info') ?>
  </div>
  <div class="card-body">
   <?php if ($passport): ?>
    <p><strong> <?= lang('Global.passport_number') ?>:</strong> <?= esc($passport['number']) ?></p>
    <p><strong> <?= lang('Global.date_of_issue') ?>:</strong> <?= esc($passport['date_of_issue']) ?></p>
    <p><strong> <?= lang('Global.date_of_expiry') ?>:</strong> <?= esc($passport['date_of_expiry']) ?></p>
    <p><strong> <?= lang('Global.place_of_issue') ?>:</strong> <?= esc($passport['place_of_issue']) ?></p>
   <?php else: ?>
    <p><?= lang('Global.no_information_available') ?></p>
   <?php endif; ?>
   <a href="<?= site_url('jobseeker/profile/passport/edit') ?>" class="btn btn-primary"> <?= lang('Global.edit') ?></a>
  </div>
 </div>
 <?= view('jobseeker/layout/footer.php') ?>