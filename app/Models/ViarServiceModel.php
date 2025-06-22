<?php

namespace App\Models;

use CodeIgniter\Model;

class ViarServiceModel extends Model
{
 protected $table = 'viar_services';
 protected $allowedFields = ['title', 'bullets', 'language'];
 protected $useTimestamps = true;
}
