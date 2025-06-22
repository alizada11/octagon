<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">
 <h1><?= isset($vision) ? 'Edit Vision' : 'Add Vision' ?></h1>

 <?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>

 <?php if (isset($validation)): ?>
  <div class="alert alert-danger">
   <?= $validation->listErrors() ?>
  </div>
 <?php endif; ?>

 <form action="<?= isset($vision) ? site_url('admin/vision/update/' . $vision['id']) : site_url('admin/vision/store') ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>

  <div class="mb-3">
   <label for="language" class="form-label">Language</label>
   <select name="language" id="language" class="form-select" required>
    <option value="en" <?= (isset($vision) && $vision['language'] == 'en') ? 'selected' : '' ?>>English</option>
    <option value="ar" <?= (isset($vision) && $vision['language'] == 'ar') ? 'selected' : '' ?>>Arabic</option>
    <!-- add more languages if needed -->
   </select>
  </div>

  <div class="mb-3">
   <label for="heading" class="form-label">Heading</label>
   <input type="text" name="heading" id="heading" class="form-control" value="<?= set_value('heading', isset($vision) ? $vision['heading'] : '') ?>" required />
  </div>

  <div class="mb-3">
   <label for="sub_heading" class="form-label">Sub-Heading</label>
   <input type="text" name="sub_heading" id="sub_heading" class="form-control" value="<?= set_value('sub_heading', isset($vision) ? $vision['sub_heading'] : '') ?>" required />
  </div>

  <div class="mb-3">
   <label for="description" class="form-label">Description</label>
   <textarea name="description" id="description" rows="6" class="form-control" required><?= set_value('description', isset($vision) ? $vision['description'] : '') ?></textarea>
  </div>

  <div class="mb-3">
   <label for="image" class="form-label">Image</label>
   <input type="file" name="image" id="image" class="form-control" />
   <?php if (isset($vision) && !empty($vision['image'])): ?>
    <img src="<?= base_url('uploads/' . $vision['image']) ?>" alt="Vision Image" class="img-thumbnail mt-2" style="max-width: 300px;" />
   <?php endif; ?>
  </div>

  <button type="submit" class="btn btn-primary"><?= isset($vision) ? 'Update' : 'Save' ?></button>
  <a href="<?= site_url('admin/vision') ?>" class="btn btn-secondary">Back</a>
 </form>
</div>
<?= view('admin/layout/footer') ?>