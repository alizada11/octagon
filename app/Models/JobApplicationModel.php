<?php

namespace App\Models;

use CodeIgniter\Model;

class JobApplicationModel extends Model
{
 protected $table = 'job_applications';
 protected $allowedFields = ['category', 'agency_id', 'user_id', 'submitted_date', 'status', 'country'];
 protected $useTimestamps = false;

 public function getApplicationsWithAgency()
 {
  return $this->select('job_applications.*, agencies.name as agency_name, jobseeker_profiles.full_name as applicant_name')
   ->join('agencies', 'agencies.id = job_applications.agency_id', 'left')
   ->join('jobseeker_profiles', 'jobseeker_profiles.user_id = job_applications.user_id', 'left');
 }
}
