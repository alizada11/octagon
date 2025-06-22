<?php

namespace App\Models;

use CodeIgniter\Model;

class ShumusHeroModel extends Model
{
 protected $table = 'shumus_hero';
 protected $allowedFields = ['heading1', 'heading2', 'image', 'language'];
 protected $useTimestamps = true;
}
