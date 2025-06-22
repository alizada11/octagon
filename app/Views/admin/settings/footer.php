<?= view('admin/layout/header') ?>
<?= view('admin/layout/sidebar') ?>
<div class="col-md-10 p-4">
 <h2>Edit Footer Settings</h2>


 <form method="POST" action="<?= site_url('admin/settings/footer') ?>" enctype="multipart/form-data">
  <?= csrf_field() ?>

  <!-- Logo Upload -->
  <div class="form-group">
   <label>Footer Logo</label><br>
   <?php if (!empty($settings['footer_logo'])): ?>
    <img src="<?= base_url('uploads/' . $settings['footer_logo']) ?>" style="height: 80px;">
   <?php endif; ?>
   <input type="file" name="footer_logo" class="form-control mt-2">
  </div>

  <!-- Social Links -->
  <div class="form-group">
   <label>Facebook</label>
   <input name="facebook" class="form-control" value="<?= esc($settings['facebook'] ?? '') ?>">
  </div>

  <div class="form-group">
   <label>Twitter</label>
   <input name="twitter" class="form-control" value="<?= esc($settings['twitter'] ?? '') ?>">
  </div>

  <div class="form-group">
   <label>YouTube</label>
   <input name="youtube" class="form-control" value="<?= esc($settings['youtube'] ?? '') ?>">
  </div>

  <!-- Footer Links -->
  <div class="form-group">
   <label>Footer Link 1 Text</label>
   <input name="footer_link_1_text" class="form-control" value="<?= esc($settings['footer_link_1_text'] ?? '') ?>">
  </div>

  <div class="form-group">
   <label>Footer Link 1 URL</label>
   <input name="footer_link_1_url" class="form-control" value="<?= esc($settings['footer_link_1_url'] ?? '') ?>">
  </div>

  <div class="form-group">
   <label>Footer Link 2 Text</label>
   <input name="footer_link_2_text" class="form-control" value="<?= esc($settings['footer_link_2_text'] ?? '') ?>">
  </div>

  <div class="form-group">
   <label>Footer Link 2 URL</label>
   <input name="footer_link_2_url" class="form-control" value="<?= esc($settings['footer_link_2_url'] ?? '') ?>">
  </div>

  <!-- Copyright -->
  <div class="form-group">
   <label>Copyright (English)</label>
   <input name="copyright_en" class="form-control" value="<?= esc($settings['copyright_en'] ?? '') ?>">
  </div>

  <div class="form-group">
   <label>حقوق النشر (Arabic)</label>
   <input name="copyright_ar" class="form-control" value="<?= esc($settings['copyright_ar'] ?? '') ?>">
  </div>

  <button type="submit" class="btn btn-primary mt-3">Save</button>
 </form>

</div>
<?= view('admin/layout/footer') ?>