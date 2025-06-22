<?= view('jobseeker/layout/header.php') ?>
<?= view('jobseeker/layout/sidebar.php') ?>
<div class="col-md-10 my-3">
 <div class="container">

  <form action="<?= base_url('jobseeker/profile/passport/update') ?>" method="post">
   <input type="hidden" name="user_id" value="<?= $passport['user_id'] ?? '' ?>">

   <div class="mb-3">
    <label><?= lang('Global.passport_number') ?></label>
    <input type="text" class="form-control" name="number" value="<?= $passport['number'] ?? '' ?>" required>
   </div>

   <div class="mb-3">
    <label><?= lang('Global.date_of_issue') ?></label>
    <input type="date" class="form-control" name="date_of_issue" value="<?= $passport['date_of_issue'] ?? '' ?>" required>
   </div>

   <div class="mb-3">
    <label><?= lang('Global.place_of_issue') ?></label>
    <input type="text" class="form-control" name="place_of_issue" value="<?= $passport['place_of_issue'] ?? '' ?>" required>
   </div>

   <div class="mb-3">
    <label><?= lang('Global.date_of_expiry') ?></label>
    <input type="date" class="form-control" name="date_of_expiry" value="<?= $passport['date_of_expiry'] ?? '' ?>" required>
   </div>

   <button type="submit" class="btn btn-primary"><?= lang('Global.save') ?></button>
  </form>
 </div>
</div>
<?= view('jobseeker/layout/footer.php') ?>