<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h2>Agencies</h2>
  <!-- <a href="<?= site_url('admin/agencies/create') ?>" class="btn btn-primary mb-3">Add New Agency</a> -->

  <table class="table table-bordered">
   <thead>
    <tr>
     <th>ID</th>
     <th>Name</th>
     <th>Country</th>
     <th>Phone</th>
     <th>Actions</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($agencies as $agency): ?>
     <tr>
      <td><?= $agency['id'] ?></td>
      <td><?= esc($agency['name']) ?></td>
      <td>
       <?= $locale == 'ar' ? $agency['country_name_ar'] : $agency['country_name_en']; ?>
      </td>
      <td><?= esc($agency['phone']) ?></td>
      <td><?= esc($agency['address']) ?></td>
      <td>
       <a href="<?= site_url('admin/agencies/edit/' . $agency['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
       <a href="<?= site_url('admin/agencies/delete/' . $agency['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this agency?')">Delete</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
 <?= view('admin/layout/footer.php') ?>