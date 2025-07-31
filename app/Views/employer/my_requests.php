<?php include('layout/header.php') ?>
<?php include('layout/sidebar.php') ?>

<div class="col-md-10 p-4">
  <h4>My Submitted Requests</h4>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Service Category</th>
        <th>Status</th>
        <th>Submitted At</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($requests as $r): ?>
        <tr>
          <td><?= $r['id'] ?></td>
          <td><?= $r['service_id'] ? interested_title($r['service_id']) : ''; ?></td>

          <td><span class="badge bg-<?= $r['status'] == 'approved' ? 'success' : ($r['status'] == 'rejected' ? 'danger' : 'warning') ?>">
              <?= ucfirst($r['status']) ?>
            </span></td>
          <td><?= date('Y-m-d', strtotime($r['created_at'])) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php include('layout/footer.php') ?>