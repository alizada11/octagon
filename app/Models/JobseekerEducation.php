<?php

namespace App\Models;

use CodeIgniter\Model;

class JobseekerEducation extends Model
{
 protected $table = 'jobseeker_educations';
 protected $primaryKey = 'id';
 protected $allowedFields = ['jobseeker_id', 'degree', 'field_of_study', 'institution', 'start_year', 'end_year', 'description'];
 protected $useTimestamps = true;
}
