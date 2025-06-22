<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CountriesModel;
use App\Models\AgencyModel;
use App\Models\JobApplicationModel;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\JobseekerProfileModel;
use App\Models\JobseekerEducation;
use App\Models\JobseekerExperience;
use App\Models\JobseekerLanguage;
use App\Models\JobseekerSkill;
use App\Models\PassportModel;

class JobseekerApplicationController extends BaseController
{
 public function index($segment = null)
 {
  $countryModel = new CountriesModel();
  $locale = service('request')->getLocale();

  // Use the $segment for logic if needed
  $data['seg_name'] = ucfirst($segment); // example: turns "viar" into "Viar"
  $data['page_name'] = 'Application Page';
  $data['countries'] = $countryModel->findAll();

  return view('frontend/application_form', $data);
 }

 public function applications()
 {
  $model = new \App\Models\JobApplicationModel();
  $user_id = session()->get('user_id');
  $applications = $model->getApplicationsWithAgency()->where('job_applications.user_id', $user_id)->paginate(10);
  $pager = $model->pager;

  return view('jobseeker/applications/index', [
   'applications' => $applications,
   'pager' => $pager
  ]);
 }

 public function delete($id)
 {
  $model = new \App\Models\JobApplicationModel();

  if ($model->find($id)) {
   $model->delete($id);
   return redirect()->back()->with('message', 'Application deleted successfully.');
  } else {
   return redirect()->back()->with('error', 'Application not found.');
  }
 }

 public function getAgencies($countryId)
 {
  $agencyModel = new AgencyModel();
  $agencies = $agencyModel->where('country_id', $countryId)->findAll();

  return $this->response->setJSON($agencies);
 }


 public function apply()
 {
  helper(['form']);


  $model = new JobApplicationModel();

  $data = [
   'category' => $this->request->getPost('service_name'),
   'agency_id' => $this->request->getPost('agency_id'),
   'user_id' => session()->get('user_id'), // assume logged-in user
   'submitted_date' => date('Y-m-d H:i:s'),
   'status' => 'pending'
  ];
  // dd($data);
  $model->save($data);
  return redirect()->back()->with('message', 'Application submitted successfully!<br>Check your dashoard for status');
 }

 // ADMIN: update status
 public function updateStatus($id)
 {
  $model = new \App\Models\JobApplicationModel();

  $status = $this->request->getPost('status'); // 'approved', 'rejected', etc.

  if (in_array($status, ['pending', 'reviewed', 'rejected', 'approved'])) {
   $model->update($id, ['status' => $status]);
   return redirect()->back()->with('message', 'Status updated.');
  } else {
   return redirect()->back()->with('error', 'Invalid status.');
  }
 }


 public function applicant_profile($user_id)
 {

  $educationModdel = new JobseekerEducation();
  $experienceModdel = new JobseekerExperience();
  $languageModdel = new JobseekerLanguage();
  $skillModdel = new JobseekerSkill();
  $model = new JobseekerProfileModel();
  $passportModel = new PassportModel();
  $data['profile'] = $model->where('user_id', $user_id)->first();
  $data['educations'] = $educationModdel->where('jobseeker_id', $user_id)->findAll();
  $data['experiences'] = $experienceModdel->where('jobseeker_id', $user_id)->findAll();
  $data['languages'] = $languageModdel->where('jobseeker_id', $user_id)->findAll();
  $data['skills'] = $skillModdel->where('jobseeker_id', $user_id)->findAll();
  $data['passports'] = $passportModel->where('user_id', $user_id)->findAll();
  $data['page_name'] = 'Jobseeker Profile';
  return view('frontend/applicant_profile', $data);
 }
}
