<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h2>Edit Agency</h2>
  <form action="<?= site_url('admin/agencies/update/' . $agency['id']) ?>" method="post">
   <div class="mb-3">
    <label for="name" class="form-label">Agency Name</label>
    <input type="text" class="form-control" name="name" value="<?= esc($agency['name']) ?>" required>
   </div>

   <div class="mb-3">
    <label for="country_id" class="form-label">Country</label>
    <select name="country_id" class="form-control" required>
     <option value="">Select Country</option>
     <?php foreach ($countries as $country): ?>
      <option value="<?= $country['id'] ?>" <?= $agency['country_id'] == $country['id'] ? 'selected' : '' ?>>
       <?= esc($country['country_name_en']) ?>
      </option>
     <?php endforeach; ?>
    </select>
   </div>

   <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" name="address"><?= esc($agency['address']) ?></textarea>
   </div>

   <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" name="phone" value="<?= esc($agency['phone']) ?>">
   </div>

   <button type="submit" class="btn btn-primary">Update Agency</button>
  </form>
 </div>
</div>
<?= view('admin/layout/footer.php') ?>