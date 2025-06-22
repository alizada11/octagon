<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 py-5">
 <h2>Values</h2>
 <a href="<?= site_url('admin/values/create') ?>" class="btn btn-primary mb-3">Add Value</a>

 <table class="table table-bordered">
  <thead>
   <tr>
    <th>Language</th>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
   </tr>
  </thead>
  <tbody>
   <?php foreach ($values as $value): ?>
    <tr>
     <td><?= esc($value['language']) ?></td>
     <td><?= esc($value['title']) ?></td>
     <td><?= esc($value['description']) ?></td>
     <td>
      <a href="<?= site_url('admin/values/edit/' . $value['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
      <a href="<?= site_url('admin/values/delete/' . $value['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this value?')">Delete</a>
     </td>
    </tr>
   <?php endforeach ?>
  </tbody>
 </table>
</div>
<?= view('admin/layout/footer') ?>