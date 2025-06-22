<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployerRequestModel extends Model
{
  protected $table = 'employer_requests';
  protected $primaryKey = 'id';
  protected $allowedFields = ['employer_id', 'service_category',  'status'];
  protected $useTimestamps = true;
  public function getApplicationsWithCountry()
  {
    return $this->select('employer_requests.*,  jobseeker_profiles.full_name as applicant_name')
      ->join('jobseeker_profiles', 'jobseeker_profiles.user_id = employer_requests.employer_id', 'left');
  }
}
