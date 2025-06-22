<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h2>Add Agency</h2>
  <form action="<?= site_url('admin/agencies/store') ?>" method="post">
   <div class="mb-3">
    <label for="name" class="form-label">Agency Name</label>
    <input type="text" class="form-control" name="name" required>
   </div>

   <div class="mb-3">
    <label for="country_id" class="form-label">Country</label>
    <select name="country_id" class="form-control" required>
     <option value="">Select Country</option>
     <?php foreach ($countries as $country): ?>
      <option value="<?= $country['id'] ?>"><?= esc($country['country_name_en']) ?></option>
     <?php endforeach; ?>
    </select>
   </div>

   <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" name="address"></textarea>
   </div>

   <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" name="phone">
   </div>

   <button type="submit" class="btn btn-success">Save Agency</button>
  </form>
 </div>

 <?= view('admin/layout/footer.php') ?>