<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
 protected $table = 'settings';
 protected $primaryKey = 'id';
 protected $allowedFields = ['type', 'key', 'value', 'created_at', 'updated_at'];
 protected $useTimestamps = true;

 public function getSettingsByType($type)
 {
  return $this->where('type', $type)->findAll();
 }

 public function getSetting($type, $key)
 {
  return $this->where(['type' => $type, 'key' => $key])->first();
 }

 public function updateSetting($type, $key, $value)
 {
  $existing = $this->getSetting($type, $key);
  if ($existing) {
   return $this->update($existing['id'], ['value' => $value]);
  } else {
   return $this->insert(['type' => $type, 'key' => $key, 'value' => $value]);
  }
 }
}
