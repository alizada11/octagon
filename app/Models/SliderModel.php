<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
 protected $table = 'sliders';
 protected $primaryKey = 'id';
 protected $allowedFields = ['title', 'description', 'button_text', 'button_link', 'image', 'language', 'created_at', 'updated_at'];
}
