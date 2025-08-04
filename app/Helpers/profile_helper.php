<?php
// App/Helpers/ProfileHelper.php
function calculateProfileCompletion($user)
{
 $fields = [
  'full_name',
  'dob',
  'gender',
  'marital_status',
  'nationality',
  'religion',
  'address',
  'phone',
  'country_code',
  'photo',
  'place_of_birth',
  'living_town',
  'no_of_children',
  'weight',
  'height',
  'complexion',
  'available_for_work',
 ];
 $filled = 0;

 foreach ($fields as $field) {
  if (!empty($user[$field])) {
   $filled++;
  }
 }

 return ($filled / count($fields)) * 100;
}
