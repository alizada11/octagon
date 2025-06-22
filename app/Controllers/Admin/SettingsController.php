<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingsModel;

class SettingsController extends BaseController
{
 protected $settingsModel;

 public function __construct()
 {
  $this->settingsModel = new SettingsModel();
 }

 public function footer()
 {
  if ($this->request->getMethod() === 'POST') {
   $fields = [
    'facebook',
    'twitter',
    'youtube',
    'footer_link_1_text',
    'footer_link_1_url',
    'footer_link_2_text',
    'footer_link_2_url',
    'copyright_en',
    'copyright_ar'
   ];

   // Handle logo upload
   $logo = $this->request->getFile('footer_logo');
   if ($logo && $logo->isValid()) {
    $newName = $logo->getRandomName();
    $logo->move('uploads', $newName);
    $this->settingsModel->updateSetting('footer', 'footer_logo', $newName);
   }

   foreach ($fields as $field) {
    $this->settingsModel->updateSetting('footer', $field, $this->request->getPost($field));
   }

   return redirect()->back()->with('success', 'Footer settings updated.');
  }

  $settings = [];
  foreach ($this->settingsModel->getSettingsByType('footer') as $row) {
   $settings[$row['key']] = $row['value'];
  }

  return view('admin/settings/footer', ['settings' => $settings]);
 }
}
