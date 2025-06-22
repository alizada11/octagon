<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">

 <div class="container mt-5">
  <h2>Edit About Us</h2>

  <form action="<?= base_url('admin/about/update/' . $about['id']) ?>" method="post" enctype="multipart/form-data">
   <div class="mb-3">
    <label for="language">Language</label>
    <select name="language" class="form-select">
     <option value="en" <?= $about['language'] === 'en' ? 'selected' : '' ?>>English</option>
     <option value="ar" <?= $about['language'] === 'ar' ? 'selected' : '' ?>>العربية</option>
    </select>
   </div>

   <div class="mb-3">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="<?= esc($about['title']) ?>" required>
   </div>


   <div class="mb-3">
    <label for="content">Content</label>
    <textarea name="content" rows="5" class="form-control"><?= esc($about['content']) ?></textarea>
   </div>

   <?php if ($about['image']) : ?>
    <div class="mb-3">
     <label>Current Image</label><br>
     <img src="<?= base_url($about['image']) ?>" alt="Image" width="150">
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