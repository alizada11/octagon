<?php

namespace App\Models;

use CodeIgniter\Model;

class VisionModel extends Model
{
 protected $table = 'vision';
 protected $primaryKey = 'id';
 protected $allowedFields = ['language', 'heading', 'sub_heading', 'description', 'image'];

 protected $useTimestamps = true;
}
