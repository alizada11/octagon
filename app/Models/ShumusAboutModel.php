<?php

namespace App\Models;

use CodeIgniter\Model;

class ShumusAboutModel extends Model
{
 protected $table = 'shumus_about';
 protected $allowedFields = ['heading', 'description', 'image', 'language'];
 protected $useTimestamps = true;
}
