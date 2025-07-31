<?php

use App\Models\BusinessesModel;

$session = session();
$lang = $session->get('lang');

use App\Models\UserModel;

if (!$lang) {
  $session->set('lang', 'en');
}

\Config\Services::language()->setLocale($lang);
if (!$session->get('page')) {
  $session->set('page', 'home');
}

if (!function_exists("auth")) {
  function auth(string $requiredRole)
  {
    $userId = session()->get('user_id');
    // Load the UserModel (make sure to include the model if needed)
    $userModel = new \App\Models\UserModel();

    // Fetch the user's role from the database
    $user = $userModel->find($userId);

    // Check if user exists and has a role
    if ($user && isset($user['role'])) {
      // Split roles into an array
      $roles = explode(',', $user['role']);

      // Check if the required role exists in the user's roles
      if (in_array($requiredRole, $roles) || in_array('admin', $roles)) {
        return true;
      }
    }

    return false; // User not found or no role assigned
  }
}

if (!function_exists("enc")) {
  function enc(string $string)
  {
    $encrypter = \Config\Services::encrypter();
    $string = bin2hex($encrypter->encrypt($string));

    return $string;
  }
}

if (!function_exists("dec")) {
  function dec(string $string)
  {
    $encrypter = \Config\Services::encrypter();
    $string = $encrypter->decrypt(hex2bin($string));
    return $string;
  }
}


if (!function_exists("sess")) {
  function sess()
  {
    $sess    = \Config\Services::session();
    return $sess;
  }
}

if (!function_exists("login")) {
  function login()
  {
    if (sess()->get('logged_in')) {
      return true;
    } else {
      return false;
    }
  }
}

if (!function_exists('google_maps_script')) {
  function google_maps_script()
  {
    $apiKey = env('GOOGLE_MAPS_API_KEY');
    return '<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script> <script src="https://maps.googleapis.com/maps/api/js?key=' . $apiKey . '&libraries=places&callback=initMap" async defer></script>';
  }
}

if (!function_exists('is_location')) {
  function is_location()
  {
    $userId = session()->get('user_id');
    $userModel = new UserModel();
    $user = $userModel->find($userId);
    if ($user['location'] != '') {
      return true;
    }
    return false;
  }
}



if (!function_exists("account_type")) {
  function account_type()
  {
    $userId = session()->get('user_id');
    $userModel = new \App\Models\UserModel();

    $user = $userModel->find($userId);
    if ($user) {
      return $user['account_type'];
    }
  }
}
if (!function_exists("country_name")) {
  function country_name($id)
  {

    $locale = service('request')->getLocale();
    $countriesModel = new \App\Models\CountriesModel();

    $country = $countriesModel->find($id);

    if ($country) {
      if ($locale === 'en') {
        $country_name =  $country['country_name_en'];
        return $country_name;
      } elseif ($locale === 'ar') {
        $country_name = $country['country_name_ar'];
        return $country_name;
      }
    }

    return null;
  }
}

if (!function_exists("user_full_name")) {
  function user_full_name($id)
  {
    $userModel = new \App\Models\JobseekerProfileModel();

    $user = $userModel->where('user_id', $id)->first();
    if ($user) {
      return $user['full_name'];
    }
  }
}
if (!function_exists("agency_name")) {
  function agency_name($id)
  {
    $agencyModdel = new \App\Models\AgencyModel();

    $agency = $agencyModdel->where('id', $id)->first();
    if ($agency) {
      return $agency['name'];
    }
  }
}
if (!function_exists("role_type")) {
  function role_type()
  {
    $userId = session()->get('user_id');
    $userModel = new \App\Models\UserModel();

    $user = $userModel->find($userId);
    if ($user) {
      return $user['role'];
    }
  }
}

if (!function_exists("interested_title")) {
  function interested_title($id)
  {

    $ShumusServiceModel = new \App\Models\ShumusServiceModel();
    $result = $ShumusServiceModel->find($id);

    if ($result) {
      $locale = service('request')->getLocale();
      $title = $locale == 'en' ? $result['title_en'] : $result['title_ar'];
      // Return the title directly'
      return $title;
    } else {
      return null;
    }
  }
}




if (!function_exists("account_type_by_id")) {
  function account_type_by_id($id)
  {

    $userModel = new \App\Models\UserModel();

    $user = $userModel->find($id);
    if ($user) {
      return $user['account_type'];
    }
  }
}

if (!function_exists("account_stype")) {
  function account_stype()
  {
    $userId = session()->get('user_id');
    $userModel = new \App\Models\UserModel();

    $user = $userModel->find($userId);
    if ($user) {
      return $user['sub_type'];
    }
  }
}

if (!function_exists('has_business')) {
  function has_business()
  {
    $businessesModel = new BusinessesModel();
    $userId = session()->get('user_id');
    $business = $businessesModel->where('pid', $userId)->find();

    if ($business) {
      return true;
    }

    return false;
  }
}

if (!function_exists("getMy")) {
  function getMy(string $string)
  {
    $userId = session()->get('user_id');
    $userModel = new \App\Models\UserModel();

    $user = $userModel->find($userId);
    if ($user) {
      return $user[$string];
    }
  }
}
