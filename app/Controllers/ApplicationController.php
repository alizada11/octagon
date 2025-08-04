<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CountriesModel;
use App\Models\AgencyModel;
use App\Models\JobApplicationModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Email\Email;
use App\Models\JobseekerProfileModel;
use App\Models\JobseekerEducation;
use App\Models\JobseekerExperience;
use App\Models\JobseekerLanguage;
use App\Models\JobseekerSkill;
use App\Models\PassportModel;
use App\Models\ShumusServiceModel;
use App\Models\UserModel;
use App\Models\ViarServiceModel;
use Mpdf\Mpdf;


class ApplicationController extends BaseController
{

  private function sendStatusUpdateEmail($toEmail, $name, $status)
  {
    $email = \Config\Services::email();

    $message = view('emails/status_update', [
      'name' => $name,
      'status' => $status
    ]);

    $email->setFrom('admin@octagon.om', 'Octagon Careers');
    $email->setTo($toEmail);
    $email->setSubject('Application Status Update');
    $email->setMessage($message);
    $email->setMailType('html');

    if (!$email->send()) {
      log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
    }
  }

  public function assign($jobseekerId, $employerId)
  {
    $requestModel = new \App\Models\EmployerRequestModel();
    $userModel = new \App\Models\UserModel(); // Assuming this exists
    $jobseekerProfileModel = new \App\Models\JobseekerProfileModel(); // Assuming this exists

    // 1. Assign jobseeker to employer (you may need a logic to find the correct request record)
    $request = $requestModel->where('employer_id', $employerId)
      ->where('assigned', 0)
      ->first();
    // dd($request);
    if ($request) {
      $requestModel->update($request['id'], ['assigned' => 1]);

      // 2. Get employer and jobseeker emails
      $employer = $userModel->find($employerId);
      $user = $userModel->find($jobseekerId);
      $jobseeker = $jobseekerProfileModel->where('user_id', $jobseekerId)->first();
      $employerProfile = $jobseekerProfileModel->where('user_id', $employerId)->first();

      // 3. Send email to both
      $email = \Config\Services::email();

      // Email to Jobseeker
      $email->setTo($user['email']);
      $email->setSubject('You have been assigned to a job!');
      $email->setMessage("Hello " . $jobseeker['full_name'] . ",\n\nYou have been assigned to a job by employer: " . $jobseeker['full_name'] . ".");

      $email->send();

      // Email to Employer
      $email->clear(); // Clear previous email
      $email->setTo($employer['email']);
      $email->setSubject('You have assigned a jobseeker');
      $email->setMessage("Hello " . $employerProfile['full_name'] . ",\n\nYou have successfully assigned jobseeker: " . $jobseeker['full_name'] . ".");

      $email->send();

      return redirect()->back()->with('success', 'Jobseeker assigned and emails sent.');
    } else {
      return redirect()->back()->with('error', 'No matching employer request found or already assigned.');
    }
  }


  public function index($segment = null)
  {
    helper('profile');
    $locale = service('request')->getLocale();
    $ShumusServiceModel = new ShumusServiceModel();
    $viarServiceModel = new ViarServiceModel();
    $data['viar_services'] = $viarServiceModel->where('language', $locale)->findAll();
    $data['shumus_services'] = $ShumusServiceModel->findAll();

    $countryModel = new CountriesModel();
    $user_id = session()->get('user_id');
    $JobseekerProfileModel = new JobseekerProfileModel();
    $user = $JobseekerProfileModel->where('user_id', $user_id)->first();
    $completion = calculateProfileCompletion($user);
    if ($completion < 50) {
      return redirect()->back()->with('error', 'You must complete at least 70% of your profile to apply for jobs.<br>Please compelete your profile from your dashboard.' . $completion . '% completed');
    }
    // Use the $segment for logic if needed
    $data['seg_name'] = ucfirst($segment); // example: turns "viar" into "Viar"
    $data['page_name'] = 'Application Page';
    $data['countries'] = $countryModel->findAll();
    $role = session()->get('role');
    if ($role === 'employer') {
      return view('employer/submit_request', $data);
    }
    return view('frontend/application_form', $data);
  }

  public function applications()
  {
    $model = new \App\Models\JobApplicationModel();

    $applications = $model->getApplicationsWithAgency()->paginate(10);
    $pager = $model->pager;

    return view('admin/applications/index', [
      'applications' => $applications,
      'pager' => $pager
    ]);
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

    return view('admin/applications/applicant_profile', $data);
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
    session()->set('redirect_after_login', current_url());
    helper(['form']);

    // Load models
    // Load models
    $jobAppModel = new JobApplicationModel();
    $user_id = session()->get('user_id');

    $educationModel = new JobseekerEducation();
    $experienceModel = new JobseekerExperience();
    $languageModel = new JobseekerLanguage();
    $skillModel = new JobseekerSkill();
    $model = new JobseekerProfileModel();
    $passportModel = new PassportModel();

    $data['profile'] = $model->where('user_id', $user_id)->first();
    $data['educations'] = $educationModel->where('jobseeker_id', $user_id)->findAll();
    $data['experiences'] = $experienceModel->where('jobseeker_id', $user_id)->findAll();
    $data['languages'] = $languageModel->where('jobseeker_id', $user_id)->findAll();
    $data['skills'] = $skillModel->where('jobseeker_id', $user_id)->findAll();
    $data['passports'] = $passportModel->where('user_id', $user_id)->first();
    $data['applied_for'] = $this->request->getPost('service_name');

    // Base64 encode images
    $headerPath = FCPATH . 'images/cv_header.png';
    $footerPath = FCPATH . 'images/cv_footer.png';
    $photoPath = FCPATH . 'uploads/jobseekers/' . $data['profile']['photo'];

    $data['cvHeaderSrc'] = 'data:' . mime_content_type($headerPath) . ';base64,' . base64_encode(file_get_contents($headerPath));
    $data['cvFooterSrc'] = 'data:' . mime_content_type($footerPath) . ';base64,' . base64_encode(file_get_contents($footerPath));
    $data['profilePhotoSrc'] = 'data:' . mime_content_type($photoPath) . ';base64,' . base64_encode(file_get_contents($photoPath));

    // Render HTML view
    $html = view('emails/cv_profile', $data);

    // ✅ Generate PDF with mPDF (Arabic-friendly)
    $mpdf = new Mpdf([
      'mode' => 'utf-8',
      'default_font' => 'dejavusans', // bundled with mPDF and supports Arabic
      'directionality' => 'rtl', // default RTL for Arabic
      'autoScriptToLang' => true,
      'autoLangToFont' => true,
    ]);

    $mpdf->WriteHTML($html);

    // Save file
    $pdfPath = WRITEPATH . 'uploads/cv_' . $user_id . '.pdf';
    $mpdf->Output($pdfPath, \Mpdf\Output\Destination::FILE);

    // Send Email
    $email = \Config\Services::email();
    $email->setTo('admin@octagon.om');
    $email->setSubject('New Job Application');
    $profile_url = base_url("admin/jobseeker/profile/{$user_id}");
    $message = view('emails/application_form', ['url' => $profile_url]);
    $email->setMessage($message);
    $email->setMailType('html');
    $email->attach($pdfPath);

    if (!$email->send()) {
      return redirect()->back()->with('error', 'Failed to send email to admin.');
    }

    // Save to DB
    $data = [
      'category' => $this->request->getPost('service_name'),
      'agency_id' => $this->request->getPost('agency_id'),
      'user_id' => $user_id,
      'submitted_date' => date('Y-m-d H:i:s'),
      'status' => 'pending'
    ];

    $jobAppModel->save($data);

    return redirect()->to('/')
      ->with('message', 'Application submitted successfully!<br>Check your dashboard for next steps.');
  }
  // view cv

  public function view_cv($id)
  {
    helper(['form']);

    // Load models
    $jobAppModel = new \App\Models\JobApplicationModel();
    $educationModel = new \App\Models\JobseekerEducation();
    $experienceModel = new \App\Models\JobseekerExperience();
    $languageModel = new \App\Models\JobseekerLanguage();
    $skillModel = new \App\Models\JobseekerSkill();
    $profileModel = new \App\Models\JobseekerProfileModel();
    $passportModel = new \App\Models\PassportModel();
    $userModel = new \App\Models\UserModel();

    // Get user data
    $user_id = $id;
    $data['profile'] = $profileModel->where('user_id', $user_id)->first();
    $data['user'] = $userModel->where('id', $user_id)->first();
    $data['educations'] = $educationModel->where('jobseeker_id', $user_id)->findAll();
    $data['experiences'] = $experienceModel->where('jobseeker_id', $user_id)->findAll();
    $data['languages'] = $languageModel->where('jobseeker_id', $user_id)->findAll();
    $data['skills'] = $skillModel->where('jobseeker_id', $user_id)->findAll();
    $data['passports'] = $passportModel->where('user_id', $user_id)->first();

    // Images (header/footer/photo)
    $headerPath = FCPATH . 'images/cv_header.png';
    $footerPath = FCPATH . 'images/cv_footer.png';
    $photoPath = FCPATH . 'uploads/jobseekers/' . $data['profile']['photo'];

    $data['cvHeaderSrc'] = 'data:' . mime_content_type($headerPath) . ';base64,' . base64_encode(file_get_contents($headerPath));
    $data['cvFooterSrc'] = 'data:' . mime_content_type($footerPath) . ';base64,' . base64_encode(file_get_contents($footerPath));
    $data['profilePhotoSrc'] = 'data:' . mime_content_type($photoPath) . ';base64,' . base64_encode(file_get_contents($photoPath));

    // Generate HTML
    $html = view('emails/cv_profile', $data);


    // Create PDF with mPDF
    $mpdf = new Mpdf([
      'mode' => 'utf-8',
      'default_font' => 'dejavusans',
      'directionality' => 'rtl',
      'autoScriptToLang' => true,
      'autoLangToFont' => true,
    ]);

    $mpdf->WriteHTML($html);

    // Save or overwrite PDF
    $pdfPath = WRITEPATH . 'uploads/cv_' . $user_id . '.pdf';

    // ✅ Delete existing file if exists
    if (file_exists($pdfPath)) {
      unlink($pdfPath);
    }

    $mpdf->Output($pdfPath, \Mpdf\Output\Destination::FILE);

    // Return PDF inline in browser
    return $this->response
      ->setHeader('Content-Type', 'application/pdf')
      ->setHeader('Content-Disposition', 'inline; filename="cv_' . $user_id . '.pdf"')
      ->setBody(file_get_contents($pdfPath));
  }


  // ADMIN: update status
  public function updateStatus($id)
  {
    $model = new \App\Models\JobApplicationModel();
    $application = $model->find($id);
    $user = (new UserModel())->find($application['user_id']);

    $profile = (new JobseekerProfileModel())->where('user_id', $user['id'])->first();
    $user_name = $profile['full_name'];
    $user_email =  $user['email'];

    $status = $this->request->getPost('status'); // 'approved', 'rejected', etc.

    if ($profile && $user) {
      $this->sendStatusUpdateEmail($user_email, $user_name, $status);
    }

    if (in_array($status, ['pending', 'reviewed', 'rejected', 'approved'])) {
      $model->update($id, ['status' => $status]);

      if ($profile && $user) {
        $this->sendStatusUpdateEmail($user_email, $user_name, $status);
      }

      return redirect()->back()->with('message', 'Status updated.');
    } else {
      return redirect()->back()->with('error', 'Invalid status.');
    }
  }
}
