<?php

namespace App\Models;

use CodeIgniter\Model;

class AgencyModel extends Model
{
 protected $table = 'agencies';
 protected $primaryKey = 'id';
 protected $allowedFields = ['country_id', 'name', 'address', 'phone'];
 protected $useTimestamps = true;

 public function getAgenciesWithCountry()
 {
  return $this->select('agencies.*, countries.country_name_en, countries.country_name_ar')
   ->join('countries', 'countries.id = agencies.country_id')
   ->findAll();
 }
}
