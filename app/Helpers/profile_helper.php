<?php
// App/Helpers/ProfileHelper.php
function calculateProfileCompletion($user)
{
 $fields = ['full_name', 'dob', 'gender', 'marital_status', 'nationality', 'address', 'phone', 'photo', 'cv_file'];
 $filled = 0;

 foreach ($fields as $field) {
  if (!empty($user[$field])) {
   $filled++;
  }
 }

 return ($filled / count($fields)) * 100;
}
