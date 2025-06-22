<?php

namespace App\Models;

use CodeIgniter\Model;

class PassportModel extends Model
{
    protected $table      = 'jobseeker_passports';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'number',
        'date_of_issue',
        'place_of_issue',
        'date_of_expiry'
    ];
}
