<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10">
 <div class="container mt-4">
  <h3>Section Management</h3>

  <a href="<?= site_url('admin/viar/create') ?>" class="btn btn-success mb-3">+ Add New Section</a>
  <div class="card">

   <?php foreach ($sectionsGrouped as $type => $sections): ?>
    <div class="card-header mt-2">
     <h3 class="mt-4 text-primary"><?= ucfirst($type) ?> Sections</h3>
    </div>
    <div class="card-body">
     <table class="table table-bordered">
      <thead>
       <tr>
        <th>Language</th>
        <th>Heading 1</th>
        <th>Heading 2</th>
        <th>Description</th>
        <th>Image</th>
        <th>Actions</th>
       </tr>
      </thead>
      <tbody>
       <?php foreach ($sections as $section): ?>
        <tr>
         <td><?= esc($section['language']) ?></td>
         <td><?= esc($section['heading1']) ?></td>
         <td><?= esc($section['heading2']) ?></td>
         <td><?= esc($section['description']) ?></td>
         <td>
          <?php if ($section['image']): ?>
           <img src="<?= base_url($section['image']) ?>" width="100">
          <?php endif; ?>
         </td>
         <td class="d-flex" style="gap:4px">
          <a href="<?= site_url('admin/viar/edit/' . $section['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
          <a href="<?= site_url('admin/viar/delete/' . $section['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
         </td>
        </tr>
       <?php endforeach; ?>
      </tbody>
     </table>
    </div>
   <?php endforeach; ?>

  </div>
  <!-- Services Section -->
  <h4 class="mt-4"> Services Management</h4>
  <div class="card">
   <div class="card-header">
    <h4 class="mt-4">Add Services</h4>
   </div>
   <div class="card-body mt-3">
    <form action="<?= site_url('admin/viar/service/add') ?>" method="post" class="mb-4">
     <?= csrf_field() ?>
     <div class="row g-2 align-items-start">

      <div class="col-md-4">
       <input name="title" class="form-control" placeholder="Service title" required>
      </div>
      <div class="col-md-4">
       <div id="bullet-container">
        <input name="bullets[]" class="form-control mb-2" placeholder="Service" required>
       </div>
       <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addBullet()">+ Add Service</button>
      </div>
      <div class="col-md-3">
       <select name="language" class="form-control" required>
        <option value="en">EN</option>
        <option value="ar">AR</option>
       </select>
      </div>
      <div class="col-md-1">
       <button class="btn btn-success">Add</button>
      </div>
     </div>
    </form>
   </div>

  </div>

  <div class="card">
   <div class="card-header">
    <h4>All Services</h4>
   </div>
   <div class="card-body">
    <table class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Title</th>
       <th>Services</th>
       <th>Lang</th>
       <th>Action</th>
      </tr>
     </thead>
     <tbody>
      <?php foreach ($services as $service): ?>
       <tr>
        <td><?= esc($service['title']) ?></td>
        <td>
         <ul>
          <?php foreach (json_decode($service['bullets']) as $bullet): ?>
           <li><?= esc($bullet) ?></li>
          <?php endforeach; ?>
         </ul>
        </td>
        <td><?= esc($service['language']) ?></td>
        <td>
         <a href="<?= site_url('admin/viar/service/delete/' . $service['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this service?')">Delete</a>
        </td>
       </tr>
      <?php endforeach; ?>
     </tbody>
    </table>
   </div>
  </div>
 </div>
</div>
<?= view('admin/layout/footer') ?>