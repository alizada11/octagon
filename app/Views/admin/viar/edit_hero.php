<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">
 <div class="container mt-4">
  <h2>Edit Hero Section</h2>
  <form action="<?= site_url('admin/viar/update/' . $section['id']) ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field() ?>

   <input type="hidden" name="section" value="hero">
   <input type="hidden" name="language" value="<?= esc($section['language']) ?>">

   <div class="mb-3">
    <label>Heading 1</label>
    <input name="heading1" value="<?= esc($section['heading1']) ?>" class="form-control">
   </div>

   <div class="mb-3">
    <label>Heading 2</label>
    <input name="heading2" value="<?= esc($section['heading2']) ?>" class="form-control">
   </div>

   <div class="mb-3">
    <label>Current Image</label><br>
    <?php if ($section['image']): ?>
     <img src="<?= base_url($section['image']) ?>" height="100">
    <?php endif; ?>
   </div>

   <div class="mb-3">
    <label>Upload New Image</label>
    <input type="file" name="image" class="form-control">
   </div>


   <button class="btn btn-success">Update Hero</button>
  </form>
 </div>

</div>
<?= view('admin/layout/footer') ?>