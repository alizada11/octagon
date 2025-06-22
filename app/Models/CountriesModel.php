<?php

namespace App\Models;

use CodeIgniter\Model;

class CountriesModel extends Model
{
 protected $table = 'countries';
 protected $allowedFields = ['country_name_en', 'country_name_ar'];
 protected $useTimestamps = true;
}
