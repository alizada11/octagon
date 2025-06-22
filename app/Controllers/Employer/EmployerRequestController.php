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
  return view('employer/submit_request');
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
   'service_category' => $this->request->getPost('service_category'),
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
