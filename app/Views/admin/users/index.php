<?= view('admin/layout/header.php') ?>
<?= view('admin/layout/sidebar.php') ?>

<div class="col-md-10 p-4">
 <div class="container mt-4">
  <h2>Users</h2>


  <table class="table table-bordered">
   <thead>
    <tr>
     <th>ID</th>
     <th>Email</th>
     <th>Full Name</th>
     <th>Phone</th>
     <th>Account Type</th>
     <th>Registeration Date</th>
     <th>Actions</th>
    </tr>
   </thead>
   <tbody>

    <?php foreach ($users as $user): ?>
     <tr>
      <td><?= $user->user_id; ?></td>
      <td><?= esc($user->email) ?></td>
      <td><?= esc($user->full_name ?? 'N/A') ?></td>
      <td><?= esc($user->phone ?? 'N/A') ?></td>
      <td><?= esc($user->account_type ?? 'N/A') ?></td>
      <td><?= esc($user->created_at) ?></td>
      <td>
       <a href="<?= site_url('admin/users/b_details/' . $user->user_id) ?>" class="btn btn-sm btn-primary">Business Profile</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>

  <!-- Pagination -->
  <div class="mt-4">
   <?= $pager->links('default', 'bootstrap_full') ?>
  </div>
 </div>
 <?= view('admin/layout/footer.php') ?>