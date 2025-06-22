<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 py-5">

 <h2>Edit Value</h2>
 <form action="<?= site_url('admin/values/update/' . $value['id']) ?>" method="post">
  <div class="mb-3">
   <label>Language</label>
   <select name="language" class="form-control" required>
    <option value="en" <?= $value['language'] === 'en' ? 'selected' : '' ?>>English</option>
    <option value="ar" <?= $value['language'] === 'ar' ? 'selected' : '' ?>>Arabic</option>
   </select>
  </div>
  <div class="mb-3">
   <label>Title</label>
   <input type="text" name="title" class="form-control" value="<?= esc($value['title']) ?>" required>
  </div>
  <div class="mb-3">
   <label>Description</label>
   <textarea name="description" class="form-control" rows="4" required><?= esc($value['description']) ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
 </form>
</div>
<?= view('admin/layout/footer') ?>