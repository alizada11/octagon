<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AlreadyLoggedInFilter implements FilterInterface
{
 public function before(RequestInterface $request, $arguments = null)
 {
  $session = session();
  $role = $session->get('role'); // You may adjust according to your auth logic

  if ($session->get('isLoggedIn')) {
   // Redirect based on role
   if ($role === 'admin') {
    return redirect()->to('/admin/dashboard');
   } elseif ($role === 'jobseeker') {
    return redirect()->to('/jobseeker/dashboard');
   } elseif ($role === 'employer') {
    return redirect()->to('/employer/dashboard');
   } elseif ($role === 'agency') {
    return redirect()->to('/agency/dashboard');
   } else {
    return redirect()->to('/');
   }
  }
 }

 public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
 {
  // Not used here
 }
}
