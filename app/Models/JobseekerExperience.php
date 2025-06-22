<?php

namespace App\Models;

use CodeIgniter\Model;

class JobseekerExperience extends Model
{
 protected $table = 'jobseeker_experiences';
 protected $primaryKey = 'id';
 protected $allowedFields = ['jobseeker_id', 'company_name', 'job_title', 'start_date', 'end_date', 'description'];
 protected $useTimestamps = true;
}
