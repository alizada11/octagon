<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
 public function before(RequestInterface $request, $arguments = null)
 {
  // Check if the admin is logged in
  if (!session()->get('isLoggedIn')) {

   return redirect()->to('/login')->with('error', lang('Auth.must_be_logged_in'));
  }
 }

 public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
 {
  // No action needed after response
 }
}
