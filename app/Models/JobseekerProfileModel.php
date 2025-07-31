<?php

namespace App\Models;

use CodeIgniter\Model;

class JobseekerProfileModel extends Model
{
 protected $table            = 'jobseeker_profiles';
 protected $primaryKey       = 'id';
 protected $allowedFields    = [
  'user_id',
  'full_name',
  'dob',
  'gender',
  'marital_status',
  'nationality',
  'religion',
  'address',
  'phone',
  'country_id',
  'country_code',
  'photo',
  'cv_file',
  'place_of_birth',
  'living_town',
  'no_of_children',
  'weight',
  'height',
  'complexion',
  'available_for_work',
  'id_cart_back',
  'id_cart_number',
  'id_cart_front',
  'agency_id'
 ];


 protected array $casts = [
  'available_for_work' => 'json'
 ];
 protected $useTimestamps    = true;
}
