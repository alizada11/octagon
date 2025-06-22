<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>

<div class="col-md-10 mt-4">

 <div class="container mt-4">
  <h2>Hero Records</h2>
  <a href="<?= base_url('admin/shumus/hero/create') ?>" class="btn btn-primary mb-3">Add New</a>
  <table class="table table-bordered">
   <thead>
    <tr>
     <th>Language</th>
     <th>Heading 1</th>
     <th>Heading 2</th>
     <th>Image</th>
     <th>Actions</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($heroes as $hero): ?>
     <tr>
      <td><?= esc($hero['language']) ?></td>
      <td><?= esc($hero['heading1']) ?></td>
      <td><?= esc($hero['heading2']) ?></td>
      <td>
       <?php if ($hero['image']): ?>
        <img src="<?= base_url($hero['image']) ?>" width="80">
       <?php endif; ?>
      </td>
      <td>
       <a href="<?= base_url('admin/shumus/hero/edit/' . $hero['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
       <a href="<?= base_url('admin/shumus/hero/delete/' . $hero['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">Delete</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>


</div>


<?= view('admin/layout/footer') ?>