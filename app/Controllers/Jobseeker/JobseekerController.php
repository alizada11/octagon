<?php

namespace App\Controllers\Jobseeker;

use App\Controllers\BaseController;
use App\Models\EmployerRequestModel;
use App\Models\JobApplicationModel;
use CodeIgniter\HTTP\ResponseInterface;

class JobseekerController extends BaseController
{
    public function dashboard()
    {
        $user_id = session()->get('user_id');
        $applications = (new JobApplicationModel())->getApplicationsWithAgency()->where('job_applications.user_id', $user_id)->countAll();

        $data['requestCount'] = (new EmployerRequestModel())->where('jobseeker_id', session()->get('user_id'))->countAll();


        return view('jobseeker/dashboard', $data);
    }
}
