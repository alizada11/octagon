<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployerRequestModel extends Model
{
  protected $table = 'employer_requests';
  protected $primaryKey = 'id';
  protected $allowedFields = ['employer_id', 'service_id', 'jobseeker_id',  'status', 'assigned', 'agency_approval'];
  protected $useTimestamps = true;

  public function getApplicationsWithCountry()
  {
    $locale = service('request')->getLocale(); // e.g., 'en' or 'ar'
    $field = ($locale === 'ar') ? 'country_name_ar' : 'country_name_en';
    return $this->select('
      employer_requests.*,
      jobseeker_profiles.full_name as applicant_name,
      countries.country_name_en as country_name_en,
      countries.country_name_ar as country_name_ar
    ')
      ->join('jobseeker_profiles', 'jobseeker_profiles.user_id = employer_requests.employer_id', 'left')
      ->join('countries', 'countries.id = jobseeker_profiles.country_id', 'left');
  }
}
