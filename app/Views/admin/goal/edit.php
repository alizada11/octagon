<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">

 <div class="container mt-5">
  <h2>Edit About Us</h2>

  <form action="<?= base_url('admin/goal/update/' . $goal['id']) ?>" method="post" enctype="multipart/form-data">
   <div class="mb-3">
    <label for="language">Language</label>
    <select name="language" class="form-select">
     <option value="en" <?= $goal['language'] === 'en' ? 'selected' : '' ?>>English</option>
     <option value="ar" <?= $goal['language'] === 'ar' ? 'selected' : '' ?>>العربية</option>
    </select>
   </div>

   <div class="mb-3">
    <label for="title">Heading</label>
    <input type="text" name="heading" class="form-control" value="<?= esc($goal['heading']) ?>" required>
   </div>
   <div class="mb-3">
    <label for="title">Sub Heading</label>
    <input type="text" name="subheading" class="form-control" value="<?= esc($goal['subheading']) ?>" required>
   </div>


   <div class="mb-3">
    <label for="description">Description</label>
    <textarea name="description" rows="5" class="form-control"><?= esc($goal['description']) ?></textarea>
   </div>

   <?php if ($goal['image']) : ?>
    <div class="mb-3">
     <label>Current Image</label><br>
     <img src="<?= base_url('uploads/goals/' . $goal['image']) ?>" alt="Image" width="150">
    </div>
   <?php endif; ?>

   <div class="mb-3">
    <label for="image">Change Image</label>
    <input type="file" name="image" class="form-control">
   </div>

   <button class="btn btn-primary">Update</button>
  </form>
 </div>
</div>
<?= view('admin/layout/footer') ?>