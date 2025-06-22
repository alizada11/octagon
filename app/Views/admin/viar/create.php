<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<div class="col-md-10 mt-4">
 <div class="card">
  <div class="card-header">
   <h4>Create New Section</h4>
  </div>
  <div class="card-body">

   <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
   <?php endif; ?>

   <form action="<?= site_url('admin/viar/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="mb-3">
     <label for="heading1" class="form-label">Heading 1</label>
     <input type="text" name="heading1" class="form-control" placeholder="Main heading"
      value="<?= old('heading1') ?>">
    </div>

    <div class="mb-3">
     <label for="heading2" class="form-label">Heading 2</label>
     <input type="text" name="heading2" class="form-control" placeholder="Subheading"
      value="<?= old('heading2') ?>">
    </div>
    <div class="mb-3">
     <label for="heading2" class="form-label">Description</label>
     <textarea name="description" class="form-control" placeholder="Description"><?= old('heading2') ?></textarea>
    </div>

    <div class="mb-3">
     <label for="image" class="form-label">Image </label>
     <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
     <label for="language" class="form-label">Language</label>
     <select name="language" class="form-control" required>
      <option value="en" <?= old('language') === 'en' ? 'selected' : '' ?>>English</option>
      <option value="ar" <?= old('language') === 'ar' ? 'selected' : '' ?>>Arabic</option>
     </select>
    </div>

    <div class="mb-3">
     <label for="type" class="form-label">Section Type</label>
     <select name="type" class="form-control" required onchange="toggleHints(this.value)">
      <option value="">-- Select Section Type --</option>
      <option value="hero" <?= old('type') === 'hero' ? 'selected' : '' ?>>Hero</option>
      <option value="about" <?= old('type') === 'about' ? 'selected' : '' ?>>About</option>
      <!-- Add more as needed -->
     </select>
    </div>

    <div class="mb-3" id="hint-box">
     <small class="text-muted" id="hint-text">Please select a section type to see guidance.</small>
    </div>

    <button type="submit" class="btn btn-success">Create Section</button>
   </form>
  </div>
 </div>
</div>

<script>
 function toggleHints(type) {
  let hintText = document.getElementById('hint-text');
  switch (type) {
   case 'hero':
    hintText.innerText = "Hero section typically has a main heading, subheading, and a banner image.";
    break;
   case 'about':
    hintText.innerText = "About section contains details about your company or mission.";
    break;

   default:
    hintText.innerText = "Please select a section type to see guidance.";
  }
 }

 // Run on page load if old value exists
 document.addEventListener("DOMContentLoaded", function() {
  const oldType = "<?= old('type') ?>";
  if (oldType) toggleHints(oldType);
 });
</script>

<?= view('admin/layout/footer') ?>