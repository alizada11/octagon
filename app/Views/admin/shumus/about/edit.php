<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<div class="col-md-10 py-4 px-4">

 <h2>Edit About Section</h2>
 <form action="<?= base_url('admin/shumus/about/update/' . $about['id']) ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>

  <div class=" mb-3">
   <label for="language" class="form-label">Language</label>
   <select name="language" class="form-control" required>
    <option value="en" <?= $about['language'] === 'en' ? 'selected' : '' ?>>English</option>
    <option value="ar" <?= $about['language'] === 'ar' ? 'selected' : '' ?>>Arabic</option>
   </select>
  </div>

  <div class="mb-3">
   <label>Heading</label>
   <input type="text" name="heading" class="form-control" value="<?= esc($about['heading']) ?>">
  </div>

  <div class="mb-3">
   <label>Description</label>
   <textarea name="description" class="form-control" rows="5"><?= esc($about['description']) ?></textarea>
  </div>

  <div class="mb-3">
   <label>Current Image</label><br>
   <?php if ($about['image']): ?>
    <img src="<?= base_url($about['image']) ?>" width="100"><br><br>
   <?php endif; ?>
   <input type="file" name="image" class="form-control">
  </div>

  <button class="btn btn-primary">Update</button>
 </form>
</div>


<?= view('admin/layout/footer') ?>