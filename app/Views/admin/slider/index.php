<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">

 <h2>Sliders</h2>
 <a href="<?= base_url('admin/sliders/create') ?>" class="btn btn-primary mb-3">Add Slider</a>

 <table class="table table-bordered">
  <thead>
   <tr>
    <th>#</th>
    <th>Title</th>
    <th>Image</th>
    <th>Actions</th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($sliders as $slider): ?>
    <tr>
     <td><?= $slider['id'] ?></td>
     <td><?= esc($slider['title']) ?></td>
     <td><img src="<?= base_url('uploads/sliders/' . $slider['image']) ?>" width="100"></td>
     <td>
      <a href="<?= base_url('admin/sliders/edit/' . $slider['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
      <a href="<?= base_url('admin/sliders/delete/' . $slider['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this slider?')">Delete</a>
     </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>
</div>
<?= view('admin/layout/footer') ?>