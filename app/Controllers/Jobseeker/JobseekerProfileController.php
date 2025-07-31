<?php

namespace App\Controllers\Jobseeker;

use App\Controllers\BaseController;
use App\Models\JobseekerProfileModel;
use App\Models\JobseekerEducation;
use App\Models\JobseekerExperience;
use App\Models\JobseekerLanguage;
use App\Models\JobseekerSkill;
use App\Models\PassportModel;

class JobseekerProfileController extends BaseController
{
 protected $profileModel;


 public function __construct()
 {
  $this->profileModel = new JobseekerProfileModel();
  $this->user_id = session()->get('user_id');
 }
 public function index()
 {
  $educationModel = new JobseekerEducation();
  $experienceModel = new JobseekerExperience();
  $languageModel = new JobseekerLanguage();
  $skillModel = new JobseekerSkill();
  $profileModel = new JobseekerProfileModel();
  $passportModel = new PassportModel();

  // Fetch data
  $profile = $profileModel->where('user_id', $this->user_id)->first();
  $educations = $educationModel->where('jobseeker_id', $this->user_id)->findAll();
  $experiences = $experienceModel->where('jobseeker_id', $this->user_id)->findAll();
  $languages = $languageModel->where('jobseeker_id', $this->user_id)->findAll();
  $skills = $skillModel->where('jobseeker_id', $this->user_id)->findAll();
  $passports = $passportModel->where('user_id', $this->user_id)->findAll();

  // Define profile fields to check
  $profileFields = [
   'full_name',
   'dob',
   'gender',
   'marital_status',
   'nationality',
   'religion',
   'phone',
   'country_id',
   'country_code',
   'photo',
   'cv_file',
   'place_of_birth',
   'living_town',
   'no_of_children',
   'weight',
   'height',
   'complexion',
  ];

  $filled = 0;
  $emptyFields = [];

  foreach ($profileFields as $field) {
   if (isset($profile[$field]) && $profile[$field] !== '' && $profile[$field] !== null) {
    $filled++;
   } else {
    $emptyFields[] = $field;
   }
  }

  $profileCompletion = round(($filled / count($profileFields)) * 100);

  // Now score sections
  $score = 0;

  if ($profileCompletion >= 80) $score += 30; // Basic profile is 30%
  if (count($educations)) $score += 15;
  if (count($experiences)) $score += 15;
  if (count($skills)) $score += 15;
  if (count($languages)) $score += 10;
  if (count($passports)) $score += 15;

  // Output
  $data = [
   'profile' => $profile,
   'educations' => $educations,
   'experiences' => $experiences,
   'languages' => $languages,
   'skills' => $skills,
   'passports' => $passports,
   'completion_score' => $score, // send to view
   'page_name' => 'Jobseeker Profile',
  ];


  return view('jobseeker/profile/index', $data);
 }

 public function edit()
 {
  $model = new JobseekerProfileModel();
  $profile = $model->where('user_id', $this->user_id)->first();
  return view('jobseeker/profile/edit', ['profile' => $profile]);
 }
 public function create()
 {
  return view('jobseeker/profile/create');
 }

 public function store()
 {
  $data = $this->request->getPost();

  $photo = $this->request->getFile('photo');
  if ($photo && $photo->isValid()) {
   $photoName = $photo->getRandomName();
   $photo->move('uploads/profile-photos', $photoName);
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
  // dd($data);
  $this->profileModel->save($data);
  return redirect()->to('/jobseeker/profile')->with('success', 'Profile created successfully.');
 }



 public function update($id)
 {
  $profile = $this->profileModel->find($id);

  $data = $this->request->getPost();

  $photo = $this->request->getFile('photo');
  if ($photo && $photo->isValid()) {
   if (!empty($profile['photo']) && file_exists('uploads/jobseekers/' . $profile['photo'])) {
    unlink('uploads/jobseekers/' . $profile['photo']);
   }
   $photoName = $photo->getRandomName();
   $photo->move('uploads/jobseekers', $photoName);
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

  $cv = $this->request->getFile('cv_file');
  if ($cv && $cv->isValid()) {
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

  $data['user_id'] = $this->user_id; // Replace with session or auth logic
  $data['role'] = session()->get('role');
  // dd($data);
  $this->profileModel->update($id, $data);

  $profile = $this->profileModel->where('id', $id)->first();

  if ($profile) {
   session()->set([
    'profile_img' => $profile['photo'],
    'full_name'   => $profile['full_name'],
   ]);
  }

  return redirect()->to('/jobseeker/profile')->with('success', 'Profile updated successfully.');
 }

 public function delete($id)
 {
  $profile = $this->profileModel->find($id);

  if (!empty($profile['photo']) && file_exists('uploads/jobseekers/' . $profile['photo'])) {
   unlink('uploads/jobseekers/' . $profile['photo']);
  }

  if (!empty($profile['cv_file']) && file_exists('uploads/cvs/' . $profile['cv_file'])) {
   unlink('uploads/cvs/' . $profile['cv_file']);
  }

  $this->profileModel->delete($id);
  return redirect()->to('/jobseeker-profile')->with('success', 'Profile deleted successfully.');
 }

 public function educationIndex()
 {

  $model = new JobseekerEducation();
  $data['educations'] = $model->where('jobseeker_id', session('user_id'))->findAll();
  return view('jobseeker/profile/education/index', $data);
 }

 public function educationCreate()
 {
  return view('jobseeker/profile/education/create');
 }

 public function educationStore()
 {

  $model = new JobseekerEducation();
  $model->save([
   'jobseeker_id' => session('user_id'),
   'degree' => $this->request->getPost('degree'),
   'institution' => $this->request->getPost('institution'),
   'field_of_study' => $this->request->getPost('field_of_study'),
   'start_year' => $this->request->getPost('start_year'),
   'end_year' => $this->request->getPost('end_year'),

  ]);
  return redirect()->to('/jobseeker/profile/education')->with('success', 'Education added successfully.');
 }

 public function educationEdit($id)
 {
  $model = new JobseekerEducation();
  $data['education'] = $model->find($id);
  return view('jobseeker/profile/education/edit', $data);
 }

 public function educationUpdate($id)
 {

  $model = new JobseekerEducation();
  $model->update($id, [
   'degree' => $this->request->getPost('degree'),
   'institution' => $this->request->getPost('institution'),
   'field_of_study' => $this->request->getPost('field_of_study'),
   'start_year' => $this->request->getPost('start_year'),
   'end_year' => $this->request->getPost('end_year'),
  ]);
  return redirect()->to('/jobseeker/profile/education')->with('success', 'Education updated successfully.');
 }

 public function educationDelete($id)
 {
  $model = new JobseekerEducation();
  $model->delete($id);
  return redirect()->to('/jobseeker/profile/education')->with('success', 'Education deleted successfully.');
 }

 // EXPERIENCE CRUD
 public function experienceIndex()
 {


  $model = new JobseekerExperience();
  $data['experiences'] = $model->where('jobseeker_id', session('user_id'))->findAll();
  return view('jobseeker/profile/experience/index', $data);
 }

 public function experienceCreate()
 {
  return view('jobseeker/profile/experience/create');
 }

 public function experienceStore()
 {
  $model = new JobseekerExperience();

  $model->save([
   'jobseeker_id' => session('user_id'),
   'company_name' => $this->request->getPost('company_name'),
   'job_title' => $this->request->getPost('job_title'),
   'start_date' => $this->request->getPost('start_date'),
   'end_date' => $this->request->getPost('end_date'),
   'description' => $this->request->getPost('description'),
  ]);
  return redirect()->to('/jobseeker/profile/experience')->with('success', 'Experience added successfully.');
 }

 public function experienceEdit($id)
 {
  $model = new JobseekerExperience();
  $data['experience'] = $model->find($id);
  return view('jobseeker/profile/experience/edit', $data);
 }

 public function experienceUpdate($id)
 {
  $model = new JobseekerExperience();
  $model->update($id, [
   'company_name' => $this->request->getPost('company_name'),
   'job_title' => $this->request->getPost('job_title'),
   'start_date' => $this->request->getPost('start_date'),
   'end_date' => $this->request->getPost('end_date'),
   'description' => $this->request->getPost('description'),
  ]);
  return redirect()->to('/jobseeker/profile/experience')->with('success', 'Experience updated successfully.');
 }

 public function experienceDelete($id)
 {
  $model = new JobseekerExperience();
  $model->delete($id);
  return redirect()->to('/jobseeker/profile/experience');
 }

 // LANGUAGE CRUD
 public function languageIndex()
 {

  $model = new JobseekerLanguage();
  $data['languages'] = $model->where('jobseeker_id', session('user_id'))->findAll();
  return view('jobseeker/profile/language/index', $data);
 }

 public function languageCreate()
 {
  return view('jobseeker/profile/language/create');
 }

 public function languageStore()
 {

  $model = new JobseekerLanguage();
  $model->save([
   'jobseeker_id' => session('user_id'),
   'language' => $this->request->getPost('language'),
   'proficiency' => $this->request->getPost('proficiency'),
  ]);
  return redirect()->to('/jobseeker/profile/languages')->with('success', 'Language added successfully.');
 }

 public function languageEdit($id)
 {
  $model = new JobseekerLanguage();
  $data['language'] = $model->find($id);
  return view('jobseeker/profile/language/edit', $data);
 }

 public function languageUpdate($id)
 {
  $model = new JobseekerLanguage();
  $model->update($id, [
   'language' => $this->request->getPost('language'),
   'proficiency' => $this->request->getPost('proficiency'),
  ]);
  return redirect()->to('/jobseeker/profile/languages')->with('success', 'Language updated successfully.');
 }

 public function languageDelete($id)
 {
  $model = new JobseekerLanguage();
  $model->delete($id);
  return redirect()->to('/jobseeker/profile/languages')->with('success', 'Language deleted successfully.');
 }

 // SKILL CRUD
 public function skillIndex()
 {

  $model = new JobseekerSkill();
  $data['skills'] = $model->where('jobseeker_id', session('user_id'))->findAll();
  return view('jobseeker/profile/skill/index', $data);
 }

 public function skillCreate()
 {
  return view('jobseeker/profile/skill/create');
 }

 public function skillStore()
 {
  $model = new JobseekerSkill();
  $model->save([
   'jobseeker_id' => session('user_id'),
   'skill_name' => $this->request->getPost('skill_name'),
   'level' => $this->request->getPost('level'),
  ]);
  return redirect()->to('/jobseeker/profile/skills')->with('success', 'Skill added successfully.');
 }

 public function skillEdit($id)
 {
  $model = new JobseekerSkill();
  $data['skill'] = $model->find($id);
  return view('jobseeker/profile/skill/edit', $data);
 }

 public function skillUpdate($id)
 {

  $model = new JobseekerSkill();
  $model->update($id, [
   'skill_name' => $this->request->getPost('skill_name'),
   'level' => $this->request->getPost('level'),
  ]);
  return redirect()->to('/jobseeker/profile/skills')->with('success', 'Skill Updated successfully.');
 }

 public function skillDelete($id)
 {
  $model = new JobseekerSkill();
  $model->delete($id);
  return redirect()->to('/jobseeker/profile/skills')->with('success', 'Skill deleted successfully.');
 }

 public function updatePassport()
 {
  $passportModel = new PassportModel();
  $data = $passportModel->where('user_id', $this->user_id)->first();
  if (empty($data)) {
   $passportModel->save([
    'user_id'        => $this->user_id,
    'number'         => '',
    'date_of_issue'  => ' ',
    'place_of_issue' => '',
    'date_of_expiry' => '',
   ]);
  }
  $data = $passportModel->where('user_id', $this->user_id)->first();
  $id = $data['id'];
  $passportModel->update($id, [
   'user_id'        => $this->user_id,
   'number'         => $this->request->getPost('number'),
   'date_of_issue'  => $this->request->getPost('date_of_issue'),
   'place_of_issue' => $this->request->getPost('place_of_issue'),
   'date_of_expiry' => $this->request->getPost('date_of_expiry'),
  ]);
  return redirect()->to('jobseeker/profile/passport/')->with('success', 'Passport info saved successfully');
 }

 public function editPassport()
 {
  $passportModel = new PassportModel();
  $data['passport'] = $passportModel->where('user_id', $this->user_id)->first();


  return view('/jobseeker/profile/passport/edit', $data);
 }
 public function passport()
 {
  $passportModel = new PassportModel();
  $data['passport'] = $passportModel->where('user_id', $this->user_id)->first();
  return view('/jobseeker/profile/passport/passport', $data);
 }

 public function deletePassport($id)
 {

  $model = new PassportModel();
  $model->delete($id);

  return redirect()->to('/jobseeker/profile/passport');
 }
}
