<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">
 <h1>Vision List</h1>



 <?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
 <?php endif; ?>

 <a href="<?= site_url('admin/vision/create') ?>" class="btn btn-primary mb-3">Add New Vision</a>

 <table class="table table-bordered table-striped">
  <thead>
   <tr>
    <th>ID</th>
    <th>Language</th>
    <th>Heading</th>
    <th>Sub-Heading</th>
    <th>Image</th>
    <th>Actions</th>
   </tr>
  </thead>
  <tbody>
   <?php if (!empty($visions) && is_array($visions)): ?>
    <?php foreach ($visions as $v): ?>
     <tr>
      <td><?= esc($v['id']) ?></td>
      <td><?= esc($v['language']) ?></td>
      <td><?= esc($v['heading']) ?></td>
      <td><?= esc($v['sub_heading']) ?></td>
      <td>
       <?php if ($v['image']): ?>
        <img src="<?= base_url('uploads/vision/' . $v['image']) ?>" alt="Vision Image" style="max-width:100px;">
       <?php else: ?>
        No Image
       <?php endif; ?>
      </td>
      <td>
       <a href="<?= site_url('admin/vision/edit/' . $v['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
       <form action="<?= site_url('admin/vision/delete/' . $v['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this vision?');">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
       </form>
      </td>
     </tr>
    <?php endforeach; ?>
   <?php else: ?>
    <tr>
     <td colspan="6" class="text-center">No vision entries found.</td>
    </tr>
   <?php endif; ?>
  </tbody>
 </table>
</div>
<?= view('admin/layout/footer') ?>