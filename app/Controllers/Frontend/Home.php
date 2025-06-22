<?php

namespace App\Controllers\Frontend;

use CodeIgniter\Controller;

class Home extends Controller
{
 public function index($locale = 'en')
 {
  service('request')->setLocale($locale);
  return view('frontend/home');
 }
}
