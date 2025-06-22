<?php

namespace App\Models;

use CodeIgniter\Model;

class JobseekerSkill extends Model
{
 protected $table = 'jobseeker_skills';
 protected $primaryKey = 'id';
 protected $allowedFields = ['jobseeker_id', 'skill_name', 'level'];
 protected $useTimestamps = true;
}
