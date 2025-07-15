<?php

namespace App\Controllers;

use App\Models\AgencyModel;
use CodeIgniter\Controller;
use App\Models\CountriesModel;

class AgencyCompletion extends Controller
{

 protected $countryModel;

 public function __construct()
 {

  $this->countryModel = new CountriesModel();
 }
 public function index()
 {
  return redirect()->to('/agency/step1');
 }

 public function step1()
 {
  $data['countries'] = $this->countryModel->findAll();
  return view('agency/steps/step1', $data);
 }

 public function saveStep1()
 {
  $agencyModel = new AgencyModel();
  $agencyModel->where('user_id', session()->get('user_id'))
   ->set([
    'name' => $this->request->getPost('name'),
    'license_number' => $this->request->getPost('license_number'),
    'license_expiry' => $this->request->getPost('license_expiry'),
    'country_id' => $this->request->getPost('country_id'),
    'city' => $this->request->getPost('city'),
    'address' => $this->request->getPost('address'),
    'phone' => $this->request->getPost('phone'),
    'email' => $this->request->getPost('email'),
    'website' => $this->request->getPost('website'),
   ])
   ->update();

  return redirect()->to('/agency/step2');
 }

 public function step2()
 {
  return view('agency/steps/step2');
 }

 public function saveStep2()
 {
  $agencyModel = new AgencyModel();
  $agencyModel->where('user_id', session()->get('user_id'))
   ->set([
    'representative_name' => $this->request->getPost('representative_name'),
    'representative_designation' => $this->request->getPost('representative_designation'),
    'representative_phone' => $this->request->getPost('representative_phone'),
    'representative_email' => $this->request->getPost('representative_email'),
   ])
   ->update();

  return redirect()->to('/agency/step3');
 }

 public function step3()
 {
  return view('agency/steps/step3');
 }

 public function saveStep3()
 {
  $file = $this->request->getFile('license_file');
  $newName = $file->getRandomName();
  $file->move(WRITEPATH . 'uploads/licenses', $newName);

  $agencyModel = new AgencyModel();
  $agencyModel->where('user_id', session()->get('user_id'))
   ->set([
    'license_file' => $newName,
    'status' => 'pending'  // Finalize completion
   ])
   ->update();

  return redirect()->to('/agency/dashboard')->with('success', 'Agency profile completed. Awaiting admin approval.');
 }
}
