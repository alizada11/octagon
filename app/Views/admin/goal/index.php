<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">

 <div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h2>About Us Sections</h2>
   <a href="<?= base_url('admin/goal/create') ?>" class="btn btn-success">Add New</a>
  </div>


  <table class="table table-bordered">
   <thead>
    <tr>
     <th>Language</th>
     <th>Title</th>
     <th>content</th>
     <th>Actions</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($goals as $row): ?>
     <tr>
      <td><?= esc($row['heading']) ?></td>
      <td><?= esc($row['subheading']) ?></td>
      <td><?= esc($row['description']) ?></td>
      <td>
       <a href="<?= base_url('admin/goal/edit/' . $row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
       <a href="<?= base_url('admin/goal/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
</div>
<?= view('admin/layout/footer') ?>