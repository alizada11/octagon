<?php
// app/Models/AboutUsModel.php
namespace App\Models;

use CodeIgniter\Model;

class AboutUsModel extends Model
{
 protected $table = 'about_us';
 protected $primaryKey = 'id';
 protected $allowedFields = ['language', 'title', 'content', 'image'];
 protected $useTimestamps = true;
}
