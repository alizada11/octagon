<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 py-5">

 <h2 class="mb-4">Contact Details</h2>
 <a href="<?= site_url('admin/contact-details/create') ?>" class="btn btn-primary mb-3">+ Add New</a>

 <?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>

 <table class="table table-bordered table-striped">
  <thead>
   <tr>
    <th>Icon</th>
    <th>Type</th>
    <th>Title</th>
    <th>Value</th>
    <th>Language</th>
    <th>Actions</th>
   </tr>
  </thead>
  <tbody>
   <?php if ($contacts): ?>
    <?php foreach ($contacts as $c): ?>
     <tr>
      <td><i class="<?= esc($c['icon']) ?>"></i></td>
      <td><?= ucfirst($c['type']) ?></td>
      <td><?= esc($c['title']) ?></td>
      <td><?= esc($c['value']) ?></td>
      <td><?= strtoupper($c['language']) ?></td>
      <td>
       <a href="<?= site_url('admin/contact-details/edit/' . $c['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
       <form action="<?= site_url('admin/contact-details/delete/' . $c['id']) ?>" method="post" style="display:inline-block;" onsubmit="return confirm('Delete this entry?');">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
       </form>
      </td>
     </tr>
    <?php endforeach; ?>
   <?php else: ?>
    <tr>
     <td colspan="6" class="text-center">No contact details found.</td>
    </tr>
   <?php endif; ?>
  </tbody>
 </table>
 <?= view('admin/layout/footer') ?>