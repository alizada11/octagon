<?php

namespace App\Models;

use CodeIgniter\Model;

class ShumusServiceModel extends Model
{
 protected $table = 'shumus_services';
 protected $allowedFields = ['icon', 'title', 'language'];
 protected $useTimestamps = true;
}
