<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 py-5">

 <div class="container mt-4">
  <h3><?= isset($slide) ? 'Edit Slide' : 'Add Slide' ?></h3>

  <form action="<?= isset($slide) ? base_url('admin/sliders/update/' . $slide['id']) : base_url('admin/sliders/store') ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field() ?>

   <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="<?= old('title', $slide['title'] ?? '') ?>">
   </div>

   <div class="mb-3">
    <label for="subtitle" class="form-label">Description</label>
    <textarea name="description" id="description" class="form-control"><?= old('description', $slide['description'] ?? '') ?></textarea>
   </div>

   <div class="mb-3">
    <label for="button_text" class="form-label">Button Text</label>
    <input type="text" name="button_text" id="button_text" class="form-control" value="<?= old('button_text', $slide['button_text'] ?? '') ?>">
   </div>

   <div class="mb-3">
    <label for="button_link" class="form-label">Button Link</label>
    <input type="text" name="button_link" id="button_link" class="form-control" value="<?= old('button_link', $slide['button_link'] ?? '') ?>">
   </div>

   <div class="mb-3">
    <label for="language" class="form-label">Language</label>
    <select name="language" id="language" class="form-select">
     <option value="ar" <?= old('language', $slide['language'] ?? '') === 'ar' ? 'selected' : '' ?>>Arabic</option>
     <option value="en" <?= old('language', $slide['language'] ?? '') === 'en' ? 'selected' : '' ?>>English</option>
    </select>
   </div>

   <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" id="image" class="form-control">
    <?php if (!empty($slide['image'])): ?>
     <img src="<?= base_url('uploads/sliders/' . $slide['image']) ?>" height="80" class="mt-2">
    <?php endif; ?>
   </div>

   <button type="submit" class="btn btn-success">Save</button>
   <a href="<?= base_url('admin/slider') ?>" class="btn btn-secondary">Cancel</a>
  </form>
 </div>
</div>
<?= view('admin/layout/footer') ?>