<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<div class="col-md-10 mt-4">
 <h2>About Section</h2>
 <a href="<?= base_url('admin/shumus/about/create') ?>" class="btn btn-primary mb-3">Add New</a>

 <table class="table table-bordered">
  <thead>
   <tr>
    <th>Language</th>
    <th>Heading</th>
    <th>Description</th>
    <th>Image</th>
    <th>Actions</th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($abouts as $about): ?>
    <tr>
     <td><?= esc($about['language']) ?></td>
     <td><?= esc($about['heading']) ?></td>
     <td><?= character_limiter(strip_tags($about['description']), 80) ?></td>
     <td>
      <?php if ($about['image']): ?>
       <img src="<?= base_url($about['image']) ?>" width="80">
      <?php endif; ?>
     </td>
     <td>
      <a href="<?= base_url('admin/shumus/about/edit/' . $about['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
      <a href="<?= base_url('admin/shumus/about/delete/' . $about['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
     </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>

</div>


<?= view('admin/layout/footer') ?>