<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 py-5">
 <h2 class="mb-4">Edit Contact Detail</h2>

 <form action="<?= site_url('admin/contact-details/update/' . $contact['id']) ?>" method="post">
  <?= csrf_field() ?>

  <div class="mb-3">
   <label>Icon Class</label>
   <input type="text" name="icon" class="form-control" value="<?= esc($contact['icon']) ?>" required>
   <small class="text-muted">e.g., <code>fas fa-envelope</code></small>
  </div>

  <div class="mb-3">
   <label>Type</label>
   <select name="type" class="form-control" required>
    <option value="email" <?= $contact['type'] == 'email' ? 'selected' : '' ?>>Email</option>
    <option value="phone" <?= $contact['type'] == 'phone' ? 'selected' : '' ?>>Phone</option>
    <option value="address" <?= $contact['type'] == 'address' ? 'selected' : '' ?>>Address</option>
    <option value="working_hours" <?= $contact['type'] == 'working_hours' ? 'selected' : '' ?>>Working Hours</option>
   </select>
  </div>

  <div class="mb-3">
   <label>Title</label>
   <input type="text" name="title" class="form-control" value="<?= esc($contact['title']) ?>" required>
  </div>

  <div class="mb-3">
   <label>Value</label>
   <input type="text" name="value" class="form-control" value="<?= esc($contact['value']) ?>" required>
  </div>

  <div class="mb-3">
   <label>Language</label>
   <select name="language" class="form-control" required>
    <option value="ar" <?= $contact['language'] == 'ar' ? 'selected' : '' ?>>Arabic</option>
    <option value="en" <?= $contact['language'] == 'en' ? 'selected' : '' ?>>English</option>
   </select>
  </div>

  <button type="submit" class="btn btn-success">Update</button>
  <a href="<?= site_url('admin/contact-details') ?>" class="btn btn-secondary">Cancel</a>
 </form>
 <?= view('admin/layout/footer') ?>