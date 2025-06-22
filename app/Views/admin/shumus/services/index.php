<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<div class="col-md-10 mt-4">
 <?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>

 <div class="container mt-4">
  <h2>Add New Service</h2>
  <form action="<?= site_url('admin/shumus/addService') ?>" method="post" enctype="multipart/form-data" class="row g-3">
   <input type="hidden" name="language" value="<?= service('request')->getLocale() ?>">

   <div class="col-md-4">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" required>
   </div>

   <div class="col-md-4">
    <label class="form-label">Icon</label>
    <input type="file" name="icon" class="form-control" required>
   </div>
   <div class="col-md-4 mb-3">
    <label for="language" class="form-label">Language</label>
    <select name="language" class="form-control" required>
     <option value="en" <?= old('language') === 'en' ? 'selected' : '' ?>>English</option>
     <option value="ar" <?= old('language') === 'ar' ? 'selected' : '' ?>>Arabic</option>
    </select>
   </div>
   <div class="col-12">
    <button type="submit" class="btn btn-success">Add Service</button>
   </div>
  </form>

  <hr class="my-4">

  <h3>Existing Services</h3>
  <div class="row">
   <?php foreach ($services as $service): ?>
    <div class="col-md-4 mb-3">
     <div class="card h-100">
      <?php if (!empty($service['icon'])): ?>
       <img src="<?= base_url($service['icon']) ?>" class="card-img-top p-3" alt="icon" style="height:100px; object-fit:contain;">
      <?php endif; ?>
      <div class="card-body">
       <h5 class="card-title"><?= esc($service['title']) ?></h5>
       <a href="<?= site_url('admin/shumus/deleteService/' . $service['id']) ?>"
        class="btn btn-danger"
        onclick="return confirm('Are you sure you want to delete this service?')">Delete</a>
      </div>
     </div>
    </div>
   <?php endforeach; ?>
  </div>
 </div>

</div>


<?= view('admin/layout/footer') ?>