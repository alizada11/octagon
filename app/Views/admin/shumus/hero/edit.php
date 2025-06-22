<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<div class="col-md-10">

 <div class="container mt-4">
  <h2>Edit Hero</h2>
  <form action="<?= base_url('admin/shumus/hero/update/' . $hero['id']) ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field() ?>
   <div class=" mb-3">
    <label for="language" class="form-label">Language</label>
    <select name="language" class="form-control" required>
     <option value="en" <?= $hero['language'] === 'en' ? 'selected' : '' ?>>English</option>
     <option value="ar" <?= $hero['language'] === 'ar' ? 'selected' : '' ?>>Arabic</option>
    </select>
   </div>
   <div class="mb-3">
    <label>Heading 1</label>
    <input type="text" name="heading1" class="form-control" value="<?= esc($hero['heading1']) ?>">
   </div>
   <div class="mb-3">
    <label>Heading 2</label>
    <input type="text" name="heading2" class="form-control" value="<?= esc($hero['heading2']) ?>">
   </div>
   <div class="mb-3">
    <label>Image</label>
    <?php if ($hero['image']): ?>
     <div><img src="<?= base_url($hero['image']) ?>" width="100"></div>
    <?php endif; ?>
    <input type="file" name="image" class="form-control">
   </div>
   <button class="btn btn-primary">Update</button>
  </form>
 </div>
</div>


<?= view('admin/layout/footer') ?>