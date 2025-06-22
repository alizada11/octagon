<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactDetailModel extends Model
{
 protected $table = 'contact_details';
 protected $primaryKey = 'id';
 protected $allowedFields = ['icon', 'type', 'title', 'value', 'language'];
 protected $useTimestamps = true;
}
