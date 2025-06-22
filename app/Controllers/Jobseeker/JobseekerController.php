<?php

namespace App\Controllers\Jobseeker;

use App\Controllers\BaseController;
use App\Models\JobApplicationModel;
use CodeIgniter\HTTP\ResponseInterface;

class JobseekerController extends BaseController
{
    public function dashboard()
    {
        $data['requestCount'] = (new JobApplicationModel())->where('user_id', session()->get('user_id'))->countAll();


        return view('jobseeker/dashboard', $data);
    }
}
