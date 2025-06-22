<?php

namespace App\Models;

use CodeIgniter\Model;

class ViarSectionModel extends Model
{
 protected $table = 'viar_sections';
 protected $allowedFields = ['section', 'heading1', 'heading2', 'description', 'image', 'type', 'language'];
 protected $useTimestamps = true;
}
