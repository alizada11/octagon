<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 py-5">

 <form action="<?= site_url('admin/contact-details/store') ?>" method="post" class="p-4 ">

  <div class="mb-3">
   <label for="icon" class="form-label">FontAwesome Icon</label>
   <input type="text" class="form-control" id="icon" name="icon" placeholder="e.g., fas fa-envelope" required>
  </div>

  <div class="mb-3">
   <label for="type" class="form-label">Contact Type</label>
   <select class="form-select" id="type" name="type" required>
    <option value="email">Email</option>
    <option value="phone">Phone</option>
    <option value="address">Address</option>
    <option value="working_hours">Working Hours</option>
   </select>
  </div>

  <div class="mb-3">
   <label for="title" class="form-label">Title</label>
   <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
  </div>

  <div class="mb-3">
   <label for="value" class="form-label">Value</label>
   <input type="text" class="form-control" id="value" name="value" placeholder="Value" required>
  </div>

  <div class="mb-4">
   <label for="language" class="form-label">Language</label>
   <select class="form-select" id="language" name="language" required>
    <option value="ar">Arabic</option>
    <option value="en">English</option>
   </select>
  </div>

  <button type="submit" class="btn btn-primary w-100">Save</button>

 </form>

 <?= view('admin/layout/footer') ?>