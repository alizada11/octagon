<select name="service_name" class="form-control" required>
 <?php foreach ($shumus_services as $shams): ?>
  <option value="<?= $shams['title'] ?>">
   <?= $shams['title'] ?>
  </option>
 <?php endforeach; ?>
</select>