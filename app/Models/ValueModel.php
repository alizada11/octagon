<?php

namespace App\Models;

use CodeIgniter\Model;

class ValueModel extends Model
{
 protected $table      = 'values';
 protected $primaryKey = 'id';

 protected $allowedFields = ['language', 'title', 'description'];
 protected $useTimestamps = true;
}
