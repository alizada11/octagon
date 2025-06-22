<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 py-5">
 <h2>Add Value</h2>
 <form action="<?= site_url('admin/values/store') ?>" method="post">
  <div class="mb-3">
   <label>Language</label>
   <select name="language" class="form-control" required>
    <option value="en">English</option>
    <option value="ar">Arabic</option>
   </select>
  </div>
  <div class="mb-3">
   <label>Title</label>
   <input type="text" name="title" class="form-control" required>
  </div>
  <div class="mb-3">
   <label>Description</label>
   <textarea name="description" class="form-control" rows="4" required></textarea>
  </div>
  <button type="submit" class="btn btn-success">Save</button>
 </form>
</div>
<?= view('admin/layout/footer') ?>