<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Language extends Controller
{
 public function switch($lang)
 {
  if (in_array($lang, ['en', 'ar'])) {
   session()->set('lang', $lang);
  }
  return redirect()->back();
 }
}
