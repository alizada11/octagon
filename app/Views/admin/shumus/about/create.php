<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<div class="col-md-10">
 <h2>Create About Section</h2>
 <form action="<?= base_url('admin/shumus/about/store') ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>

  <div class=" mb-3">
   <label for="language" class="form-label">Language</label>
   <select name="language" class="form-control" required>
    <option value="en">English</option>
    <option value="ar">Arabic</option>
   </select>
  </div>

  <div class="mb-3">
   <label>Heading</label>
   <input type="text" name="heading" class="form-control">
  </div>

  <div class="mb-3">
   <label>Description</label>
   <textarea name="description" class="form-control" rows="5"></textarea>
  </div>

  <div class="mb-3">
   <label>Image</label>
   <input type="file" name="image" class="form-control">
  </div>

  <button class="btn btn-success">Save</button>
 </form>
</div>


<?= view('admin/layout/footer') ?>