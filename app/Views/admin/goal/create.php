<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">
 <h2>Add Goals Content</h2>

 <form action="<?= base_url('admin/goal/store') ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
   <label for="language">Language</label>
   <select name="language" class="form-select">
    <option value="en">English</option>
    <option value="ar">العربية</option>
   </select>
  </div>

  <div class="mb-3">
   <label for="title">Title</label>
   <input type="text" name="heading" class="form-control" required>
  </div>
  <div class="mb-3">
   <label for="title">Sub Title</label>
   <input type="text" name="subheading" class="form-control" required>
  </div>

  <div class="mb-3">
   <label for="description">description</label>
   <textarea name="description" rows="5" class="form-control"></textarea>
  </div>

  <div class="mb-3">
   <label for="image">Image</label>
   <input type="file" name="image" class="form-control">
  </div>

  <button class="btn btn-primary">Save</button>
 </form>
</div>
<?= view('admin/layout/footer') ?>