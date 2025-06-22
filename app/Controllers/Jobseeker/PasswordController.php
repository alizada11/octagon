<?php

namespace App\Controllers\Jobseeker; // or Employer
use App\Controllers\BaseController;
use App\Models\UserModel;

class PasswordController extends BaseController
{
 public function changePasswordForm()
 {
  return view('jobseeker/change_password'); // or 'employer/change_password'
 }

 public function updatePassword()
 {
  $validation = \Config\Services::validation();
  $rules = [
   'old_password' => 'required',
   'new_password' => 'required|min_length[6]',
   'confirm_password' => 'required|matches[new_password]'
  ];

  if (!$this->validate($rules)) {
   return view('jobseeker/change_password', ['validation' => $validation]); // adjust for employer
  }

  $userModel = new UserModel();
  $user = $userModel->find(session()->get('user_id')); // assuming session stores user id

  if (!$user || !password_verify($this->request->getPost('old_password'), $user['password'])) {
   return redirect()->back()->with('error', 'Old password is incorrect.');
  }

  $userModel->update($user['id'], [
   'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT),
  ]);

  return redirect()->back()->with('success', 'Password updated successfully.');
 }
}
