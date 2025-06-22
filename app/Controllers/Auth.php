<?php

namespace App\Controllers;

use App\Models\BusinessesModel;
use App\Models\JobseekerProfileModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
 public function __construct()
 {
  helper('app');
  helper('cookie');
 }
 public function login()
 {


  helper(['form']);
  return view('auth/login');
 }


 public function loginPost()
 {
  $userModel = new \App\Models\UserModel();
  $email = $this->request->getPost('email');
  $password = $this->request->getPost('password');
  $profileModel = new JobseekerProfileModel();

  $user = $userModel->where('email', $email)->first();
  if ($user && password_verify($password, $user['password'])) {
   $profile = $profileModel->where('user_id', $user['id'])->first();

   if ($profile) {
    session()->set([
     'profile_img' => $profile['photo'],
     'full_name'   => $profile['full_name'],
    ]);
   }

   session()->set([
    'user_id'     => $user['id'],
    'email'       => $user['email'],
    'role'        => $user['role'],
    'isLoggedIn'  => true
   ]);

   // ✅ Redirect to previously requested URL if available
   $redirectUrl = session()->get('redirect_after_login');
   if ($redirectUrl) {
    session()->remove('redirect_after_login');
    return redirect()->to($redirectUrl);
   }

   // 🔁 Default dashboard redirection
   // redirec to addmi dashboard
   if ($user['role'] == 'admin') {
    return redirect()->to('/admin/dashboard');
   } elseif ($user['role'] == 'employer' && account_type() == 'company') {
    // check if role is employer and account type is company
    if (!has_business()) {
     // if does not havve businesses account redirects to registeration

     return redirect()->to('business/registration');
    } else {
     // otherwise redirect to their dashboard
     return redirect()->to('/employer/dashboard');
    }
    // if account type is personal redirect them to their dashboard
   } elseif ($user['role'] == 'employer' && account_type() == 'personal') {

    return redirect()->to('/employer/dashboard');
   } else {

    return redirect()->to('/jobseeker/dashboard');
   }
  }

  return redirect()->back()->with('error', 'Invalid login credentials');
 }



 public function logout()
 {
  session()->remove(['user_id', 'email', 'role', 'isLoggedIn', 'profile_img', 'full_name']);
  return redirect()->to('/login');
 }

 public function register()
 {
  helper('form');

  return view('auth/register');
 }

 public function registerPost()
 {

  helper('form');

  $validation = \Config\Services::validation();
  $messages = [
   'full_name' => [
    'required'    => lang('Validation.name_required')
   ],
   'email' => [
    'required'    => lang('Validation.email_required'),
    'valid_email' => lang('Validation.email_valid'),
    'is_unique'   => lang('Validation.email_unique'),
   ],
   'password' => [
    'required'   => lang('Validation.password_required'),
    'min_length' => lang('Validation.password_min'),
   ],
   'confirm_password' => [
    'required' => lang('Validation.confirm_password_required'),
    'matches'  => lang('Validation.passwords_not_match'),
   ],
   'role' => [
    'required' => lang('Validation.role_required'),
    'in_list'  => lang('Validation.role_invalid'),
   ],
  ];

  $rules = [
   'full_name'    => 'required',
   'email'    => 'required|valid_email|is_unique[users.email]',
   'password' => 'required|min_length[6]',
   'confirm_password' => 'required|matches[password]',
   'role'     => 'required|in_list[employer,jobseeker]', // don't allow admin registration
  ];

  if (!$this->validate($rules, $messages)) {
   return view('auth/register', ['validation' => $this->validator]);
  }
  $userModel = new \App\Models\UserModel();
  $profileModel = new \App\Models\JobseekerProfileModel();
  $role = $this->request->getVar('role');
  $available = $this->request->getVar('available_for_work');

  // If the user is a jobseeker, keep available_for_work as array; otherwise, set null
  $availableForWork = ($role === 'jobseeker') ? (is_array($available) ? $available : []) : null;

  // Insert the user and get the inserted ID
  $userData = [
   'email'    => $this->request->getPost('email'),
   'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
   'role'     => $this->request->getPost('role'),
   'account_type'     => $this->request->getPost('account_type'),
  ];

  $userId = $userModel->insert($userData); // This returns the insert ID

  // Now save the jobseeker profile using the user_id
  $profileModel->save([
   'full_name' => $this->request->getPost('full_name'),
   'user_id'   => $userId,
   'available_for_work' => $availableForWork,
  ]);


  return redirect()->to('/login')->with('success', 'Registration successful!');
 }

 public function forgot()
 {
  return view('auth/forgot');
 }

 public function forgotPost()
 {
  $email = $this->request->getPost('email');
  $model = new UserModel();
  $user = $model->where('email', $email)->first();

  if (!$user) {
   return redirect()->back()->with('error', lang('Auth.email_not_found') ?? 'Email not found.');
  }

  $token = bin2hex(random_bytes(32));
  $model->update($user['id'], ['reset_token' => $token, 'reset_expires' => Time::now()->addHours(1)]);

  // Replace this with actual email sending logic
  $resetLink = base_url("reset/$token");
  log_message('info', "Reset link: $resetLink");

  return redirect()->back()->with('success', lang('Auth.reset_link_sent') ?? 'Reset link sent to your email.');
 }

 public function reset($token)
 {
  $model = new UserModel();
  $user = $model->where('reset_token', $token)
   ->where('reset_expires >=', Time::now())
   ->first();

  if (!$user) {
   return redirect()->to('forgot')->with('error', lang('Auth.token_invalid') ?? 'Invalid or expired token.');
  }

  return view('auth/reset', ['token' => $token]);
 }

 public function resetPost($token)
 {
  $rules = [
   'password' => 'required|min_length[6]',
   'confirm_password' => 'required|matches[password]',
  ];

  if (!$this->validate($rules)) {
   return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
  }

  $model = new UserModel();
  $user = $model->where('reset_token', $token)
   ->where('reset_expires >=', Time::now())
   ->first();

  if (!$user) {
   return redirect()->to('forgot')->with('error', lang('Auth.token_invalid') ?? 'Invalid or expired token.');
  }

  $model->update($user['id'], [
   'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
   'reset_token' => null,
   'reset_expires' => null,
  ]);

  return redirect()->to('login')->with('success', lang('Auth.password_reset_success') ?? 'Password reset successfully.');
 }
 public function users()
 {
  $model = new UserModel();
  $perPage = 12;
  $page = (int) ($this->request->getGet('page') ?? 1);
  $offset = ($page - 1) * $perPage;

  // Total count for pagination
  $total = $model->countAll();

  // Load paginated users
  $data['users'] = $model->getUsersWithProfiles($perPage, $offset);

  // Set up pager
  $pager = \Config\Services::pager();
  $pager->makeLinks($page, $perPage, $total, 'default_full');

  $data['pager'] = $pager;
  return view('admin/users/index', $data);
 }
 public function b_details($id)
 {

  $model = new BusinessesModel();
  $profileModel = new JobseekerProfileModel();
  $data['owner'] = $profileModel->where('user_id', $id)->select('full_name')->first();

  $data['data'] = $model->where('pid', $id)->first();
  // dd($data);
  return view('admin/users/view', $data);
 }
 public function businesses_reg()
 {
  if (!session()->get('isLoggedIn') || account_type() == 'personal') {
   return redirect()->to('/');
  }

  if ($this->request->getMethod() == 'post' || $this->request->getMethod() == 'POST') {
   $model = new BusinessesModel();

   // Define validation rules
   $rules = [
    // Step 1 Rules
    'cr_name_en' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.cr_name_en') . lang('app.in_step1'),
    ],
    'cr_name_ar' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.cr_name_ar') . lang('app.in_step1'),
    ],
    'cr_number' => [
     'rules' => 'required|alpha_numeric|min_length[3]',
     'label' => lang('app.cr_number') . lang('app.in_step1'),
    ],
    'cr_email' => [
     'rules' => 'required|valid_email',
     'label' => lang('app.email') . lang('app.in_step1'),
    ],
    'cr_gsm' => [
     'rules' => 'required|numeric|max_length[8]|is_unique[businesses.cr_gsm]',
     'label' => lang('app.gsm') . lang('app.in_step1'),
    ],
    'cr_po_box' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.po_box') . lang('app.in_step1'),
    ],
    'cr_postal_code' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.postal_code') . lang('app.in_step1'),
    ],
    'cr_fax' => [
     'rules' => 'permit_empty|numeric|min_length[3]',
     'label' => lang('app.fax') . lang('app.in_step1'),
    ],
    'cr_establishment_date' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.establishment_date') . lang('app.in_step1'),
    ],
    'cr_expiry_date' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.expiry_date') . lang('app.in_step1'),
    ],
    'cr_legal_type' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.legal_type') . lang('app.in_step1'),
    ],
    'cr_head_quarter' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.head_quarter') . lang('app.in_step1'),
    ],
    'cr_cr_document' => [
     'rules' => 'uploaded[cr_document]|max_size[cr_document,2048]|mime_in[cr_document,image/jpeg,image/png,application/pdf]',
     'label' => lang('app.crc') . lang('app.in_step1'),
    ],

    // Step 2 Rules
    'id_number' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.id_number') . lang('app.in_step2'),
    ],
    'id_expire_date' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.expire_date') . lang('app.in_step2'),
    ],
    'id_first_name' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.first_name') . lang('app.in_step2'),
    ],
    'id_second_name' => [
     'rules' => 'permit_empty|min_length[3]',
     'label' => lang('app.second_name') . lang('app.in_step2'),
    ],
    'id_third_name' => [
     'rules' => 'permit_empty|min_length[3]',
     'label' => lang('app.third_name') . lang('app.in_step2'),
    ],
    'id_sur_name' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.sur_name') . lang('app.in_step2'),
    ],
    'id_date_of_birth' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.date_of_birth') . lang('app.in_step2'),
    ],
    'id_document' => [
     'rules' => 'uploaded[id_document]|max_size[id_document,2048]|mime_in[id_document,image/jpeg,image/png,application/pdf]',
     'label' => lang('app.id') . lang('app.in_step2'),
    ],
    'id_address' => [
     'rules' => 'required',
     'label' => lang('app.address') . lang('app.in_step2'),
    ],

    // Step 3 Rules
    'cc_cr_number' => [
     'rules' => 'required|alpha_numeric|min_length[3]',
     'label' => lang('app.cr_number') . lang('app.in_step3'),
    ],
    'cc_head_quarter' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.head_quarter') . lang('app.in_step3'),
    ],
    'cc_occi_number' => [
     'rules' => 'required|alpha_numeric|min_length[3]',
     'label' => lang('app.cc_occi_number') . lang('app.in_step3'),
    ],
    'cc_document' => [
     'rules' => 'uploaded[cc_document]|max_size[cc_document,2048]|mime_in[cc_document,image/jpeg,image/png,application/pdf]',
     'label' => lang('app.cc') . lang('app.in_step3'),
    ],
    // Step 4 Rules
    'ta_governorate' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.governorate') . lang('app.in_step4'),
    ],
    'ta_complex_no' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.complex_no') . lang('app.in_step4'),
    ],
    'ta_state' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.state') . lang('app.in_step4'),
    ],
    'ta_plot_no' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.plot_no') . lang('app.in_step4'),
    ],
    'ta_area' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.area') . lang('app.in_step4'),
    ],
    'ta_building_no' => [
     'rules' => 'required',
     'label' => lang('app.building_no') . lang('app.in_step4'),
    ],
    'ta_street_name_no' => [
     'rules' => 'permit_empty|min_length[3]',
     'label' => lang('app.street_name_no') . lang('app.in_step4'),
    ],
    'ta_flat_shop_no' => [
     'rules' => 'required',
     'label' => lang('app.flat_shop_no') . lang('app.in_step4'),
    ],
    'ta_way_no' => [
     'rules' => 'required',
     'label' => lang('app.way_no') . lang('app.in_step4'),
    ],
    'ta_type_of_activity' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.type_of_activity') . lang('app.in_step4'),
    ],
    'ta_rent_contract_no' => [
     'rules' => 'permit_empty|min_length[3]',
     'label' => lang('app.rent_contract_no') . lang('app.in_step4'),
    ],
    'ta_expire_date' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.expire_date') . lang('app.in_step4'),
    ],
    'ta_document' => [
     'rules' => 'uploaded[ta_document]|max_size[ta_document,2048]|mime_in[ta_document,image/jpeg,image/png,application/pdf]',
     'label' => lang('app.ta') . lang('app.in_step4'),
    ],
    // Step 5 Rules
    'lc_cr_number' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.cr_number') . lang('app.in_step5'),
    ],
    'lc_governorate' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.governorate') . lang('app.in_step5'),
    ],
    'lc_rent_contract_no' => [
     'rules' => 'permit_empty|min_length[3]',
     'label' => lang('app.rent_contract_no') . lang('app.in_step5'),
    ],
    'lc_state' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.state') . lang('app.in_step5'),
    ],
    'lc_area' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.area') . lang('app.in_step5'),
    ],
    'lc_poa_code' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.poa_code') . lang('app.in_step5'),
    ],
    'lc_license_type' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.license_type') . lang('app.in_step5'),
    ],
    'lc_license_name' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.license_name') . lang('app.in_step5'),
    ],
    'lc_license_number' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.license_number') . lang('app.in_step5'),
    ],
    'lc_expire_date' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.expire_date') . lang('app.in_step5'),
    ],
    'lc_activities_code' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.activities_code') . lang('app.in_step5'),
    ],
    'lc_activities_description' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.activities_description') . lang('app.in_step5'),
    ],
    'lc_document' => [
     'rules' => 'uploaded[lc_document]|max_size[lc_document,2048]|mime_in[lc_document,image/jpeg,image/png,application/pdf]',
     'label' => lang('app.lc') . lang('app.in_step5'),
    ],
    // Step 6 Rules
    'tcc_cr_number' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.cr_number') . lang('app.in_step6'),
    ],
    'tcc_tax_card_number' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.tax_card_number') . lang('app.in_step6'),
    ],
    'tcc_tin' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.tin') . lang('app.in_step6'),
    ],
    'tcc_expire_date' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.expire_date') . lang('app.in_step6'),
    ],
    'ta_document' => [
     'rules' => 'uploaded[ta_document]|max_size[ta_document,2048]|mime_in[ta_document,image/jpeg,image/png,application/pdf]',
     'label' => lang('app.ta') . lang('app.in_step6'),
    ],
    // Step 7 Rules
    'vc_cr_number' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.cr_number') . lang('app.in_step7'),
    ],
    'vc_vat_certificate_number' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.vat_certificate_number') . lang('app.in_step7'),
    ],
    'vc_vatin' => [
     'rules' => 'required|min_length[3]',
     'label' => lang('app.vatin') . lang('app.in_step7'),
    ],
    'vc_expire_date' => [
     'rules' => 'required|valid_date',
     'label' => lang('app.expire_date') . lang('app.in_step7'),
    ],
    'vc_document' => [
     'rules' => 'uploaded[vc_document]|max_size[vc_document,2048]|mime_in[vc_document,image/jpeg,image/png,application/pdf]',
     'label' => lang('app.vc') . lang('app.in_step7'),
    ],
   ];

   // Validate input fields
   if (!$this->validate($rules)) {
    return redirect()->to(base_url($_SERVER['HTTP_REFERER']))->with('errors', $this->validator->getErrors());
    //return redirect()->to($_SERVER['HTTP_REFERER'])->with('errors', $this->validator->getErrors());
   }

   // Step 1: Upload CR document
   $crFile = $this->request->getFile('cr_document');
   if ($crFile->isValid() && !$crFile->hasMoved()) {
    $crFileName = $crFile->getRandomName();
    $crFile->move(WRITEPATH . 'uploads/documents', $crFileName);
   }

   // Step 2: Upload ID document
   $idFile = $this->request->getFile('id_document');
   if ($idFile->isValid() && !$idFile->hasMoved()) {
    $idFileName = $idFile->getRandomName();
    $idFile->move(WRITEPATH . 'uploads/documents', $idFileName);
   }

   // Step 3: Upload CC document
   $ccFile = $this->request->getFile('cc_document');
   if ($ccFile->isValid() && !$ccFile->hasMoved()) {
    $ccFileName = $ccFile->getRandomName();
    $ccFile->move(WRITEPATH . 'uploads/documents', $ccFileName);
   }
   // Step 4: Upload TA document
   $taFile = $this->request->getFile('ta_document');
   if ($taFile->isValid() && !$taFile->hasMoved()) {
    $taFileName = $taFile->getRandomName();
    $taFile->move(WRITEPATH . 'uploads/documents', $taFileName);
   }
   // Step 5: Upload LC document
   $lcFile = $this->request->getFile('lc_document');
   if ($lcFile->isValid() && !$lcFile->hasMoved()) {
    $lcFileName = $lcFile->getRandomName();
    $lcFile->move(WRITEPATH . 'uploads/documents', $lcFileName);
   }
   // Step 6: Upload TCC document
   $tccFile = $this->request->getFile('tcc_document');
   if ($tccFile->isValid() && !$tccFile->hasMoved()) {
    $tccFileName = $tccFile->getRandomName();
    $tccFile->move(WRITEPATH . 'uploads/documents', $tccFileName);
   }
   // Step 7: Upload VC document
   $vcFile = $this->request->getFile('vc_document');
   if ($vcFile->isValid() && !$vcFile->hasMoved()) {
    $vcFileName = $vcFile->getRandomName();
    $vcFile->move(WRITEPATH . 'uploads/documents', $vcFileName);
   }

   $data = [
    // Prepare data for Step 1
    'id_number' => $this->request->getPost('id_number'),
    'id_expire_date' => $this->request->getPost('id_expire_date'),
    'id_first_name' => $this->request->getPost('id_first_name'),
    'id_second_name' => $this->request->getPost('id_second_name'),
    'id_third_name' => $this->request->getPost('id_third_name'),
    'id_sur_name' => $this->request->getPost('id_sur_name'),
    'id_date_of_birth' => $this->request->getPost('id_date_of_birth'),
    'id_document' => $idFileName,
    'id_address' => $this->request->getPost('id_address'),

    // Prepare data for Step 2
    'cr_name_en' => $this->request->getPost('cr_name_en'),
    'cr_name_ar' => $this->request->getPost('cr_name_ar'),
    'cr_number' => $this->request->getPost('cr_number'),
    'cr_email' => $this->request->getPost('cr_email'),
    'cr_gsm' => $this->request->getPost('cr_gsm'),
    'cr_po_box' => $this->request->getPost('cr_po_box'),
    'cr_postal_code' => $this->request->getPost('cr_postal_code'),
    'cr_fax' => $this->request->getPost('cr_fax'),
    'cr_establishment_date' => $this->request->getPost('cr_establishment_date'),
    'cr_expiry_date' => $this->request->getPost('cr_expiry_date'),
    'cr_legal_type' => $this->request->getPost('cr_legal_type'),
    'cr_head_quarter' => $this->request->getPost('cr_head_quarter'),
    'cr_document' => $crFileName,

    // Prepare data for Step 3
    'cc_cr_number' => $this->request->getPost('cc_cr_number'),
    'cc_head_quarter' => $this->request->getPost('cc_head_quarter'),
    'cc_occi_number' => $this->request->getPost('cc_occi_number'),
    'cc_expire_date' => $this->request->getPost('cc_expire_date'),
    'cc_document' => $ccFileName,

    // Prepare data for Step 4
    'ta_governorate' => $this->request->getPost('ta_governorate'),
    'ta_complex_no' => $this->request->getPost('ta_complex_no'),
    'ta_state' => $this->request->getPost('ta_state'),
    'ta_plot_no' => $this->request->getPost('ta_plot_no'),
    'ta_area' => $this->request->getPost('ta_area'),
    'ta_building_no' => $this->request->getPost('ta_building_no'),
    'ta_street_name_no' => $this->request->getPost('ta_street_name_no'),
    'ta_flat_shop_no' => $this->request->getPost('ta_flat_shop_no'),
    'ta_way_no' => $this->request->getPost('ta_way_no'),
    'ta_type_of_activity' => $this->request->getPost('ta_type_of_activity'),
    'ta_rent_contract_no' => $this->request->getPost('ta_rent_contract_no'),
    'ta_expire_date' => $this->request->getPost('ta_expire_date'),
    'ta_document' => $taFileName,

    // Prepare data for Step 5
    'lc_cr_number' => $this->request->getPost('lc_cr_number'),
    'lc_governorate' => $this->request->getPost('lc_governorate'),
    'lc_rent_contract_no' => $this->request->getPost('lc_rent_contract_no'),
    'lc_state' => $this->request->getPost('lc_state'),
    'lc_area' => $this->request->getPost('lc_area'),
    'lc_poa_code' => $this->request->getPost('lc_poa_code'),
    'lc_license_type' => $this->request->getPost('lc_license_type'),
    'lc_license_name' => $this->request->getPost('lc_license_name'),
    'lc_license_number' => $this->request->getPost('lc_license_number'),
    'lc_expire_date' => $this->request->getPost('lc_expire_date'),
    'lc_activities_code' => $this->request->getPost('lc_activities_code'),
    'lc_activities_description' => $this->request->getPost('lc_activities_description'),
    'lc_document' => $lcFileName,

    // Prepare data for Step 6
    'tcc_cr_number' => $this->request->getPost('tcc_cr_number'),
    'tcc_tax_card_number' => $this->request->getPost('tcc_tax_card_number'),
    'tcc_tin' => $this->request->getPost('tcc_tin'),
    'tcc_expire_date' => $this->request->getPost('tcc_expire_date'),
    'tcc_document' => $tccFileName,

    // Prepare data for Step 7
    'vc_cr_number' => $this->request->getPost('vc_cr_number'),
    'vc_vat_certificate_number' => $this->request->getPost('vc_vat_certificate_number'),
    'vc_vatin' => $this->request->getPost('vc_vatin'),
    'vc_expire_date' => $this->request->getPost('vc_expire_date'),
    'vc_document' => $vcFileName,
    'pid' => session()->get('user_id'),
   ];

   $userId = $model->insert($data);

   // This will return the new user's ID
   if ($userId) {


    return redirect()->to('/employer/dashboard')->with('success', 'Businesses registered successfully');
   } else {
    return redirect()->to('business/registration')->with('error', 'Businesses registration failed.');
   }
   // return redirect()->to(base_url($_SERVER['HTTP_REFERER']))->with('error', 'File upload failed.');
  } elseif (has_business()) {
   return redirect()->to('employer/dashboard');
  } else {
   return view('auth/bussnes_reg', ['page_name' => 'Business Registeration']);
  }
 }
}
