<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">

 <div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
   <h2>About Us Sections</h2>
   <a href="<?= base_url('admin/about/create') ?>" class="btn btn-success">Add New</a>
  </div>


  <table class="table about-table table-bordered">
   <thead>
    <tr>
     <th>Language</th>
     <th>Title</th>
     <th>content</th>
     <th>Actions</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($about as $row): ?>
     <tr>
      <td><?= esc($row['language']) ?></td>
      <td><?= esc($row['title']) ?></td>
      <td><?= esc($row['content']) ?></td>
      <td class="actions">
       <a href="<?= base_url('admin/about/edit/' . $row['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
       <a href="<?= base_url('admin/about/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
</div>
<?= view('admin/layout/footer') ?>