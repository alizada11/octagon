<?php

namespace App\Controllers\Employer;

use App\Models\EmployerRequestModel;
use App\Controllers\BaseController;
use App\Models\JobseekerProfileModel;
use App\Models\UserModel;

class EmployerRequestController extends BaseController
{
 private function sendStatusUpdateEmail($toEmail, $name, $status)
 {
  $email = \Config\Services::email();

  $message = view('emails/status_update', [
   'name' => $name,
   'status' => $status
  ]);

  $email->setFrom('no-reply@octagon.om', 'Octagon Careers');
  $email->setTo($toEmail);
  $email->setSubject('Application Status Update');
  $email->setMessage($message);
  $email->setMailType('html');

  if (!$email->send()) {
   log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
  }
 }

 public function submitForm()
 {

  helper(['form']);
  $data['page_name'] = 'Application form';
  return view('employer/submit_request', $data);
 }
 public function hireForm($id)
 {
  helper(['form']);

  $jobseeker = new JobseekerProfileModel();
  $data['interested'] = $jobseeker->select('available_for_work')->where('user_id', $id)->first();
  $data['user_id'] = $id;
  // dd($interested);
  $data['page_name'] = 'Application form';
  return view('employer/hire_form', $data);
 }

 public function assignAgency()
 {


  $request = service('request');
  $requestId = $request->getPost('request_id');
  $agencyId = $request->getPost('agency_id');

  $model = new \App\Models\EmployerRequestModel();
  $userModel = new \App\Models\UserModel();
  $agencyModel = new \App\Models\AgencyModel();
  $jobseekerProfileModel = new \App\Models\JobseekerProfileModel();

  $agency = $agencyModel->where('id', $agencyId)->first();
  $agencyEmail = $agency['email'];
  $representative_name = $agency['representative_name'];
  $request = $model->find($requestId);
  $employer_id = $request['employer_id'];
  $jobseeker_id = $request['jobseeker_id'];


  if (!$requestId || !$agencyId) {
   return redirect()->back()->with('error', 'Missing data.');
  }
  if (!$request) {
   return redirect()->back()->with('error', 'Employer request not found.');
  }
  $db = \Config\Database::connect();
  $db->table('employer_requests')->where('id', $requestId)->update(['agency_id' => $agencyId]);

  // $model->update($requestId, ['agency_id' => $agencyId]);

  // TODO: Send email to jobseeker and employer
  // 2. Get employer and jobseeker emails
  $employer = $userModel->find($employer_id);
  $user = $userModel->find($jobseeker_id);
  $jobseeker = $jobseekerProfileModel->where('user_id', $jobseeker_id)->first();
  $employerProfile = $jobseekerProfileModel->where('user_id', $employer_id)->first();

  // 3. Send email to agency, jobseeker and employer
  $email = \Config\Services::email();

  // Email to agency

  $message = view('emails/agency_assignment', [
   'name' => $representative_name,
   'content' => 'Your have an new agency assignment , please login to you octagon account to see the details.'
  ]);
  $email->setSubject('You have a new assignment to process!');
  $email->setTo($agencyEmail);
  $email->setMessage($message);
  $email->setMailType('html');
  $email->send();

  if (!$email->send()) {
   log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
  }

  // Email to Jobseeker
  $message = view('emails/agency_assignment', [
   'name' => $jobseeker['full_name'],
   'content' => 'An agency have been assigned to your request by Octgon admin.'
  ]);
  $email->clear(); // Clear previous email
  $email->setTo($user['email']);
  $email->setSubject('An agency have been assigned to process your request!');
  $email->setMessage($message);
  $email->setMailType('html');

  $email->send();

  // Email to Employer
  $message = view('emails/agency_assignment', [
   'name' => $employerProfile['full_name'],
   'content' => 'An agency have been assigned to your request, login to your Octagon account to see the details.'
  ]);
  $email->clear(); // Clear previous email
  $email->setTo($employer['email']);
  $email->setSubject('An agency have been assigned to your request');
  $email->setMessage($message);
  $email->setMailType('html');
  $email->send();

  return redirect()->back()->with('success', 'Agency assigned successfully.');
 }



 public function submitRequest()
 {
  helper(['form']);

  $rules = [
   'service_category' => 'required',
  ];

  if (!$this->validate($rules)) {
   return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
  }

  $model = new EmployerRequestModel();
  $model->save([
   'employer_id' => session()->get('user_id'), // Assuming logged-in user ID is stored in session
   'service_id' => $this->request->getPost('service_category'),
   'jobseeker_id' => $this->request->getPost('jobseeker_id'),
  ]);

  return redirect()->back()->with('success', 'Request submitted successfully.');
 }
 public function myRequests()
 {
  $employerId = session()->get('user_id'); // assumes employer is logged in


  $model = new \App\Models\EmployerRequestModel();
  $data['requests'] = $model
   ->getApplicationsWithCountry()
   ->where('employer_requests.employer_id', $employerId)
   ->orderBy('employer_requests.id', 'DESC')
   ->paginate(10);

  return view('employer/my_requests', $data);
 }


 // ADMIN AREA
 public function adminIndex()
 {
  $model = new EmployerRequestModel();
  $data['requests'] = $model->getApplicationsWithCountry()->findAll();
  $agencyModel = new \App\Models\AgencyModel();
  $data['agencies'] = $agencyModel->findAll();

  return view('admin/employer_requests/index', $data);
 }

 public function updateStatus($id)
 {

  $model = new \App\Models\EmployerRequestModel();
  $application = $model->find($id);
  $user = (new UserModel())->find($application['employer_id']);

  $profile = (new JobseekerProfileModel())->where('user_id', $user['id'])->first();

  $user_name = $profile['full_name'];
  $user_email =  $user['email'];

  $status = $this->request->getPost('status'); // 'approved', 'rejected', etc.

  $status = $this->request->getPost('status');
  $model = new EmployerRequestModel();
  $model->update($id, ['status' => $status]);
  if ($profile && $user) {
   $this->sendStatusUpdateEmail($user_email, $user_name, $status);
  }
  return redirect()->back()->with('success', 'Status updated.');
 }

 public function delete($id)
 {
  $model = new EmployerRequestModel();
  $model->delete($id);

  return redirect()->back()->with('success', 'Request deleted.');
 }
}
