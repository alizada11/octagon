<?php

namespace App\Controllers\Employer;

use App\Controllers\BaseController;
use App\Models\BusinessesModel;
use App\Models\JobseekerProfileModel;

class EmployerProfileController extends BaseController
{
 protected $profileModel;



 public function __construct()
 {
  $this->profileModel = new JobseekerProfileModel();
  $this->user_id = session()->get('user_id');
 }
 public function index()
 {
  $model = new JobseekerProfileModel();
  $user_id = session()->get('user_id');
  $data['profile'] = $model->where('user_id', $user_id)->first();
  return view('employer/profile/index', $data);
 }

 public function edit()
 {
  $model = new JobseekerProfileModel();
  $profile = $model->where('user_id', $this->user_id)->first();
  return view('employer/profile/edit', ['profile' => $profile]);
 }
 public function create()
 {
  return view('employer/profile/create');
 }

 public function store()
 {
  $data = $this->request->getPost();

  $photo = $this->request->getFile('photo');
  if ($photo && $photo->isValid()) {
   $photoName = $photo->getRandomName();
   $photo->move('uploads/employers', $photoName);
   $data['photo'] = $photoName;
  }

  $cv = $this->request->getFile('cv_file');
  if ($cv && $cv->isValid()) {
   $cvName = $cv->getRandomName();
   $cv->move('uploads/cvs', $cvName);
   $data['cv_file'] = $cvName;
  }

  $IdBack = $this->request->getFile('id_cart_back');
  if ($IdBack && $IdBack->isValid()) {
   $IdBackName = $IdBack->getRandomName();
   $IdBack->move('uploads/documents', $IdBackName);
   $data['id_cart_back'] = $IdBackName;
  }

  $IdFront = $this->request->getFile('id_cart_front');
  if ($IdFront && $IdFront->isValid()) {
   $IdFrontName = $IdFront->getRandomName();
   $IdFront->move('uploads/documents', $IdFrontName);
   $data['id_cart_front'] = $IdFrontName;
  }

  $data['user_id'] = $this->user_id; // Replace with session or auth logic
  $data['role'] = session()->get('role');

  $this->profileModel->save($data);
  return redirect()->to('/employer/profile')->with('success', 'Profile created successfully.');
 }



 public function update($id)
 {
  $profile = $this->profileModel->find($id);
  $data = $this->request->getPost();

  $photo = $this->request->getFile('photo');
  if ($photo && $photo->isValid()) {
   if (!empty($profile['photo']) && file_exists('uploads/employers/' . $profile['photo'])) {
    unlink('uploads/employers/' . $profile['photo']);
   }
   $photoName = $photo->getRandomName();
   $photo->move('uploads/employers', $photoName);
   $data['photo'] = $photoName;
  }

  $cv = $this->request->getFile('cv_file');
  if ($cv && $cv->isValid()) {
   if (!empty($profile['cv_file']) && file_exists('uploads/cvs/' . $profile['cv_file'])) {
    unlink('uploads/cvs/' . $profile['cv_file']);
   }
   $cvName = $cv->getRandomName();
   $cv->move('uploads/cvs', $cvName);
   $data['cv_file'] = $cvName;
  }

  $IdBack = $this->request->getFile('id_cart_back');
  if ($IdBack && $IdBack->isValid()) {
   if (!empty($profile['id_cart_back']) && file_exists('uploads/documents/' . $profile['id_cart_back'])) {
    unlink('uploads/documents/' . $profile['id_cart_back']);
   }
   $IdBackName = $IdBack->getRandomName();
   $IdBack->move('uploads/documents', $IdBackName);
   $data['id_cart_back'] = $IdBackName;
  }

  $IdFront = $this->request->getFile('id_cart_front');
  if ($IdFront && $IdFront->isValid()) {
   if (!empty($profile['id_cart_front']) && file_exists('uploads/documents/' . $profile['id_cart_front'])) {
    unlink('uploads/documents/' . $profile['id_cart_front']);
   }
   $IdFrontName = $IdFront->getRandomName();
   $IdFront->move('uploads/documents', $IdFrontName);
   $data['id_cart_front'] = $IdFrontName;
  }

  $this->profileModel->update($id, $data);
  return redirect()->to('/employer/profile')->with('success', 'Profile updated successfully.');
 }

 public function delete($id)
 {
  $profile = $this->profileModel->find($id);

  if (!empty($profile['photo']) && file_exists('uploads/employers/' . $profile['photo'])) {
   unlink('uploads/employers/' . $profile['photo']);
  }

  if (!empty($profile['cv_file']) && file_exists('uploads/cvs/' . $profile['cv_file'])) {
   unlink('uploads/cvs/' . $profile['cv_file']);
  }

  $this->profileModel->delete($id);
  return redirect()->to('/employer/profile')->with('success', 'Profile deleted successfully.');
 }
 public function businessInfo()
 {
  $model = new BusinessesModel();
  $info = $model->where('pid', session()->get('user_id'))->first();

  return view('employer/profile/b_details', ['data' => $info]);
 }
}
