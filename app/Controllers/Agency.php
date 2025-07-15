<?php
// app/Controllers/Agency.php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgencyModel;
use App\Models\CountriesModel;

class Agency extends BaseController
{
 protected $agencyModel;
 protected $countryModel;

 public function __construct()
 {

  $this->agencyModel = new AgencyModel();
  $this->countryModel = new CountriesModel();
 }
 public function index()
 {
  return view('agency/dashboard');
 }
 public function register()
 {
  return view('agency/register');
 }
 public function edit()
 {
  $userId = session()->get('user_id');

  // Try to find agency for this user
  $agency = $this->agencyModel->where('user_id', $userId)->first();

  // If agency doesn't exist, create a new row with just the user_id
  if (!$agency) {
   $this->agencyModel->insert([
    'user_id' => $userId,
    'status' => 'incomplete',
    'created_at' => date('Y-m-d H:i:s'),
   ]);

   return redirect()->to(base_url('agency/step1'))->with('success', 'Please complete your agency profile.');
  }



  if ($this->request->getMethod() === 'post') {
   $data = [
    'name'                => $this->request->getPost('name'),
    'license_number'      => $this->request->getPost('license_number'),
    'license_expiry'      => $this->request->getPost('license_expiry'),
    'country_id'          => $this->request->getPost('country_id'),
    'city'                => $this->request->getPost('city'),
    'address'             => $this->request->getPost('address'),
    'phone'               => $this->request->getPost('phone'),
    'email'               => $this->request->getPost('email'),
    'website'             => $this->request->getPost('website'),
    'representative_name' => $this->request->getPost('representative_name'),
    'representative_phone' => $this->request->getPost('representative_phone'),
    'representative_id'   => $this->request->getPost('representative_id'),
   ];

   // Handle file uploads
   foreach (['doc_registration', 'doc_license', 'doc_tax'] as $docField) {
    $file = $this->request->getFile($docField);
    if ($file && $file->isValid() && !$file->hasMoved()) {
     $filename = $file->getRandomName();
     $file->move(WRITEPATH . 'uploads/agencies/', $filename);
     $data[$docField] = $filename;
    }
   }

   $this->agencyModel->update($agency['id'], $data);
   return redirect()->back()->with('success', 'Agency profile updated successfully.');
  }

  $countries = $this->countryModel->findAll();

  return view('agency/edit', [
   'agency' => $agency,
   'countries' => $countries
  ]);
 }
 public function updateStep1()
 {
  $agencyModel = new AgencyModel();
  if (account_type() == 'agency') {

   $userId = session()->get('user_id');
  }
  $userId = $this->request->getPost('user_id');


  $agencyModel->where('user_id', $userId)->set([
   'name'           => $this->request->getPost('name'),
   'license_number' => $this->request->getPost('license_number'),
   'license_expiry' => $this->request->getPost('license_expiry'),
   'country_id'     => $this->request->getPost('country_id'),
   'city'           => $this->request->getPost('city'),
   'address'        => $this->request->getPost('address'),
   'phone'          => $this->request->getPost('phone'),
   'email'          => $this->request->getPost('email'),
   'website'        => $this->request->getPost('website'),
  ])->update();

  return redirect()->back()->with('success', 'Core information updated.');
 }
 public function updateStep2()
 {
  if (account_type() == 'agency') {

   $userId = session()->get('user_id');
  }
  $userId = $this->request->getPost('user_id');


  $data = [
   'representative_name'   => $this->request->getPost('representative_name'),
   'representative_email'  => $this->request->getPost('representative_email'),
   'representative_phone'  => $this->request->getPost('representative_phone'),
   'representative_nid'    => $this->request->getPost('representative_nid'),
   'representative_passport' => $this->request->getPost('representative_passport'),
   'updated_at'            => date('Y-m-d H:i:s'),
  ];

  $agencyModel = new \App\Models\AgencyModel();
  $agency = $agencyModel->where('user_id', $userId)->first();

  if ($agency) {
   $agencyModel->update($agency['id'], $data);
   return redirect()->to(base_url('agency/edit'))->with('success', 'Step 2 updated successfully');
  } else {
   return redirect()->back()->with('error', 'Agency not found.');
  }
 }
 public function updateStep3()
 {
  if (account_type() == 'agency') {
   $userId = session()->get('user_id');
  }

  // In case of override (not recommended unless admin)
  if ($this->request->getPost('user_id')) {
   $userId = $this->request->getPost('user_id');
  }

  $agencyModel = new \App\Models\AgencyModel();
  $agency = $agencyModel->where('user_id', $userId)->first();

  if (!$agency) {
   return redirect()->back()->with('error', 'Agency not found.');
  }

  $data = [];

  // Ensure upload directory exists
  $uploadPath = FCPATH . 'uploads/agencies/';
  if (!is_dir($uploadPath)) {
   mkdir($uploadPath, 0755, true);
  }

  // Handle file upload
  $license = $this->request->getFile('license_file');
  if ($license && $license->isValid() && !$license->hasMoved()) {
   $newName = $license->getRandomName();
   $license->move($uploadPath, $newName);
   $data['license_file'] = $newName;
  }

  $data['status'] = 'pending';
  $data['updated_at'] = date('Y-m-d H:i:s');

  $agencyModel->update($agency['id'], $data);

  return redirect()->back()->with('success', 'Profile completed successfully.');
 }


 public function store()
 {
  $validation = \Config\Services::validation();

  $rules = [
   'name' => 'required',
   'license_number' => 'required',
   'license_expiry' => 'required|valid_date',
   'country_id' => 'required|integer',
   'city' => 'required',
   'address' => 'required',
   'phone' => 'required',
   'email' => 'required|valid_email',
   'representative_name' => 'required',
   'representative_designation' => 'required',
   'representative_phone' => 'required',
   'representative_email' => 'required|valid_email',
   'license_file' => 'uploaded[license_file]|max_size[license_file,2048]|ext_in[license_file,pdf,jpg,jpeg,png]'
  ];

  if (!$this->validate($rules)) {
   return redirect()->back()->withInput()->with('errors', $validation->getErrors());
  }

  $file = $this->request->getFile('license_file');
  $newName = $file->getRandomName();
  $file->move(WRITEPATH . 'uploads/licenses/', $newName);

  $agencyModel = new AgencyModel();
  $agencyModel->save([
   'user_id' => session()->get('user_id'), // Assuming user is logged in
   'name' => $this->request->getPost('name'),
   'license_number' => $this->request->getPost('license_number'),
   'license_expiry' => $this->request->getPost('license_expiry'),
   'country_id' => $this->request->getPost('country_id'),
   'city' => $this->request->getPost('city'),
   'address' => $this->request->getPost('address'),
   'phone' => $this->request->getPost('phone'),
   'email' => $this->request->getPost('email'),
   'website' => $this->request->getPost('website'),
   'representative_name' => $this->request->getPost('representative_name'),
   'representative_designation' => $this->request->getPost('representative_designation'),
   'representative_phone' => $this->request->getPost('representative_phone'),
   'representative_email' => $this->request->getPost('representative_email'),
   'license_file' => $newName,
   'status' => 'pending',
  ]);

  return redirect()->to('/agency/register')->with('success', 'Registration submitted. Awaiting approval.');
 }
}
