<select name="service_name" class="form-control" required>
 <?php foreach ($viar_services as $viar): ?>
  <option value="<?= $viar['title'] ?>">
   <?= $viar['title'] ?>
  </option>
 <?php endforeach; ?>
</select>