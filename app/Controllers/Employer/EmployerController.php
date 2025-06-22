<?php

namespace App\Controllers\Employer;

use App\Controllers\BaseController;
use App\Models\EmployerRequestModel;
use App\Models\JobseekerProfileModel;
use CodeIgniter\HTTP\ResponseInterface;

class EmployerController extends BaseController
{
    public function dashboard()
    {
        $data['requestCount'] = (new EmployerRequestModel())->where('employer_id', session()->get('user_id'))->countAll();

        return view('employer/dashboard', $data);
    }
    public function profile()
    {

        $model = new JobseekerProfileModel();
        $user_id = session()->get('user_id');
        $data['profile'] = $model->where('user_id', $user_id)->first();

        return view('employer/profile/index');
    }
}
