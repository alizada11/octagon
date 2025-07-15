<?php

// app/Models/AgencyModel.php
namespace App\Models;

use CodeIgniter\Model;

class AgencyModel extends Model
{
  protected $table = 'agencies';
  protected $primaryKey = 'id';

  protected $allowedFields = [
    'user_id',
    'name',
    'license_number',
    'license_expiry',
    'country_id',
    'city',
    'address',
    'phone',
    'email',
    'website',
    'representative_name',
    'representative_designation',
    'representative_phone',
    'representative_email',
    'license_file',
    'status'
  ];

  protected $useTimestamps = true;
  public function getAgenciesWithCountry()
  {
    return $this->select('agencies.*, countries.country_name_en, countries.country_name_ar')
      ->join('countries', 'countries.id = agencies.country_id')
      ->findAll();
  }
}
