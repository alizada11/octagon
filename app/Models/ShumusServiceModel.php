<?php

namespace App\Models;

use CodeIgniter\Model;

class ShumusServiceModel extends Model
{
 protected $table = 'shumus_services';
 protected $allowedFields = ['icon', 'title_ar', 'title_en'];
 protected $useTimestamps = true;
}
