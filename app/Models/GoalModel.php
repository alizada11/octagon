<?php

namespace App\Models;

use CodeIgniter\Model;

class GoalModel extends Model
{
 protected $table = 'goal';
 protected $allowedFields = ['language', 'heading', 'subheading', 'description', 'image'];
 protected $useTimestamps = true;
}
