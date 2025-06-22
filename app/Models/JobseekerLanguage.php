<?php

namespace App\Models;

use CodeIgniter\Model;

class JobseekerLanguage extends Model
{
 protected $table = 'jobseeker_languages';
 protected $primaryKey = 'id';
 protected $allowedFields = ['jobseeker_id', 'language', 'proficiency'];
 protected $useTimestamps = true;
}
