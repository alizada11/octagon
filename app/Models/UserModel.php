<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table      = 'users';
  protected $primaryKey = 'id';

  protected $allowedFields = ['email', 'role', 'password', 'reset_token', 'reset_expires', 'account_type'];

  protected $useTimestamps = true;

  public function getUsersWithProfiles($limit, $offset)
  {
    return $this->db->table('users')
      ->select([
        'users.id as user_id',
        'users.email',
        'users.account_type',
        'users.created_at',
        'jobseeker_profiles.id as profile_id',
        'jobseeker_profiles.full_name as full_name',
        'jobseeker_profiles.user_id as profile_user_id',
        'jobseeker_profiles.dob',
        'jobseeker_profiles.phone',
        'jobseeker_profiles.address',
        'jobseeker_profiles.nationality'
      ])
      ->join('jobseeker_profiles', 'jobseeker_profiles.user_id = users.id', 'left')
      ->limit($limit, $offset)
      ->get()
      ->getResult();
  }

  public function applicantUsers($limit, $offset)
  {
    return $this->db->table('users')
      ->select([
        'users.id as user_id',
        'users.email',
        'users.account_type',
        'users.created_at',
        'jobseeker_profiles.id as profile_id',
        'jobseeker_profiles.full_name as full_name',
        'jobseeker_profiles.user_id as profile_user_id',
        'jobseeker_profiles.dob',
        'jobseeker_profiles.phone',
        'jobseeker_profiles.address',
        'jobseeker_profiles.nationality',
        'jobseeker_profiles.country_code',
        'jobseeker_profiles.available_for_work'
      ])
      ->join('jobseeker_profiles', 'jobseeker_profiles.user_id = users.id', 'left')
      ->where('JSON_LENGTH(jobseeker_profiles.available_for_work) > 0', null, false)
      ->where('users.role', 'jobseeker')
      ->limit($limit, $offset)
      ->get()
      ->getResult();
  }

  public function countApplicantUsers()
  {
    return $this->db->table('users')
      ->join('jobseeker_profiles', 'jobseeker_profiles.user_id = users.id', 'left')
      ->where('jobseeker_profiles.available_for_work', 0)
      ->where('users.role', 'jobseeker')
      ->countAllResults(); // ✅ counts only matching rows
  }
}
