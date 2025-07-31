<?php

use App\Controllers\Admin\ViarController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 **/
// public pages
$routes->get('viar', 'ViarController::index');
$routes->get('viar/serices', 'ViarController::services');
$routes->get('shumus', 'ShumusController::index');
$routes->get('shumus/services/individual', 'ShumusController::individual');
$routes->get('shumus/services/corporate', 'ShumusController::corporate');
$routes->get('shumus/services/corporate-list/(:num)', 'ShumusController::corporateList/$1');
$routes->get('shumus/services', 'ShumusController::services');
$routes->get('contact-us', 'ContactUsController::index');
$routes->post('contact/submit', 'ContactUsController::submit');
// Role mangement
$routes->group('admin', ['filter' => 'role:admin', 'namespace' => 'App\Controllers\Employer'], function ($routes) {
 $routes->get('employer-requests', 'EmployerRequestController::adminIndex');
 $routes->post('employer-request/assign-agency', 'EmployerRequestController::assignAgency');
 $routes->post('employer-requests/update-status/(:num)', 'EmployerRequestController::updateStatus/$1');
 $routes->get('employer-requests/delete/(:num)', 'EmployerRequestController::delete/$1');
});

$routes->get('viewFile/(:any)', 'Home::viewFile/$1');
$routes->group('admin', ['filter' => 'role:admin', 'namespace' => 'App\Controllers\Admin'], function ($routes) {

 $routes->get('/', 'AdminController::dashboard');
 $routes->get('dashboard', 'AdminController::dashboard');

 // slider
 $routes->get('sliders', 'SliderController::index');
 $routes->get('sliders/create', 'SliderController::create');
 $routes->post('sliders/store', 'SliderController::store');
 $routes->get('sliders/edit/(:num)', 'SliderController::edit/$1');
 $routes->post('sliders/update/(:num)', 'SliderController::update/$1');
 $routes->get('sliders/delete/(:num)', 'SliderController::delete/$1');
 // about us section
 $routes->get('about', 'AboutUs::index');
 $routes->get('about/create', 'AboutUs::create');
 $routes->post('about/store', 'AboutUs::store');
 $routes->get('about/edit/(:num)', 'AboutUs::edit/$1');
 $routes->post('about/update/(:num)', 'AboutUs::update/$1');
 $routes->get('about/delete/(:num)', 'AboutUs::delete/$1');
 //vision
 $routes->get('vision', 'VisionController::index');
 $routes->get('vision/create', 'VisionController::create');
 $routes->post('vision/store', 'VisionController::store');
 $routes->get('vision/edit/(:num)', 'VisionController::edit/$1');
 $routes->post('vision/update/(:num)', 'VisionController::update/$1');
 $routes->post('vision/delete/(:num)', 'VisionController::delete/$1');
 // values
 $routes->get('values', 'ValueController::index');
 $routes->get('values/create', 'ValueController::create');
 $routes->post('values/store', 'ValueController::store');
 $routes->get('values/edit/(:num)', 'ValueController::edit/$1');
 $routes->post('values/update/(:num)', 'ValueController::update/$1');
 $routes->post('values/delete/(:num)', 'ValueController::delete/$1');
 // Contact Details 
 $routes->get('contact-details', 'ContactDetailsController::index');
 $routes->get('contact-details/create', 'ContactDetailsController::create');
 $routes->post('contact-details/store', 'ContactDetailsController::store');
 $routes->get('contact-details/edit/(:num)', 'ContactDetailsController::edit/$1');
 $routes->post('contact-details/update/(:num)', 'ContactDetailsController::update/$1');
 $routes->post('contact-details/delete/(:num)', 'ContactDetailsController::delete/$1');
 // Viar page
 $routes->get('viar', 'ViarController::index');
 $routes->get('viar/edit/(:segment)', 'ViarController::edit/$1');
 $routes->post('viar/update/(:num)', 'ViarController::update/$1');
 $routes->post('viar/service/add', 'ViarController::addService');
 $routes->get('viar/service/delete/(:num)', 'ViarController::deleteService/$1');
 $routes->get('viar/create', 'ViarController::create');
 $routes->post('viar/store', 'ViarController::store');
 $routes->get('viar/createInitialSections', 'ViarController::createInitialSections');
 // Shumus page
 $routes->get('shumus/hero', 'Shumus::listHero');
 $routes->get('shumus/hero/create', 'Shumus::createHero');
 $routes->post('shumus/hero/store', 'Shumus::storeHero');
 $routes->get('shumus/hero/edit/(:num)', 'Shumus::editHero/$1');
 $routes->post('shumus/hero/update/(:num)', 'Shumus::updateHeroById/$1');
 $routes->get('shumus/hero/delete/(:num)', 'Shumus::deleteHero/$1');

 // shumus about
 $routes->get('shumus/about', 'Shumus::listAbout');
 $routes->get('shumus/about/create', 'Shumus::createAbout');
 $routes->post('shumus/about/store', 'Shumus::storeAbout');
 $routes->get('shumus/about/edit/(:num)', 'Shumus::editAbout/$1');
 $routes->post('shumus/about/update/(:num)', 'Shumus::updateAboutById/$1');
 $routes->get('shumus/about/delete/(:num)', 'Shumus::deleteAbout/$1');
 // services\

 $routes->get('shumus/services', 'Shumus::services');
 $routes->post('shumus/addService', 'Shumus::addService');
 $routes->get('shumus/deleteService/(:num)', 'Shumus::deleteService/$1');
 // agencies
 $routes->get('agencies', 'AgencyController::index');
 $routes->get('agencies/create', 'AgencyController::create');
 $routes->post('agencies/store', 'AgencyController::store');
 $routes->get('agencies/edit/(:num)', 'AgencyController::edit/$1');
 $routes->post('agencies/update/(:num)', 'AgencyController::update/$1');
 $routes->get('agencies/delete/(:num)', 'AgencyController::delete/$1');


 // footer
 $routes->get('settings/footer', 'SettingsController::footer');
 $routes->post('settings/footer', 'SettingsController::footer');
});
// goals
$routes->group('admin/goal', ['filter' => 'role:admin', 'namespace' => 'App\Controllers\Admin'], function ($routes) {
 $routes->get('/', 'GoalController::index');
 $routes->get('create', 'GoalController::create');
 $routes->post('store', 'GoalController::store');
 $routes->get('edit/(:num)', 'GoalController::edit/$1');
 $routes->post('update/(:num)', 'GoalController::update/$1');
 $routes->get('delete/(:num)', 'GoalController::delete/$1');
});
// Jobseeker Profile - Education Routes
$routes->group('jobseeker/profile/education', ['namespace' => 'App\Controllers\Jobseeker'], function ($routes) {
 $routes->get('/', 'JobseekerProfileController::educationIndex');
 $routes->get('create', 'JobseekerProfileController::educationCreate');
 $routes->post('store', 'JobseekerProfileController::educationStore');
 $routes->get('edit/(:num)', 'JobseekerProfileController::educationEdit/$1');
 $routes->post('update/(:num)', 'JobseekerProfileController::educationUpdate/$1');
 $routes->post('delete/(:num)', 'JobseekerProfileController::educationDelete/$1');
});

// employer routes
$routes->group('apply', ['filter' => 'role:employer'], function ($routes) {
 $routes->get('(:segment)', 'ApplicationController::index/$1');
 $routes->post('apply', 'ApplicationController::apply');
});
// admin application forms
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
 $routes->get('applications', 'ApplicationController::applications');
 $routes->post('applications/delete/(:num)', 'ApplicationController::delete/$1');
 $routes->get('jobseeker/assign/(:num)/(:num)', 'ApplicationController::assign/$1/$2');
 $routes->get('jobseeker/profile/(:num)', 'ApplicationController::applicant_profile/$1');
 $routes->get('applications/update-status/(:num)', 'ApplicationController::updateStatus/$1');
 $routes->post('applications/update-status/(:num)', 'ApplicationController::updateStatus/$1');
});
// jobseeker applications
$routes->group('jobseeker', ['filter' => 'role:jobseeker'], function ($routes) {
 $routes->get('applications', 'JobseekerApplicationController::applications');
 $routes->post('applications/delete/(:num)', 'JobseekerApplicationController::delete/$1');
 $routes->get('applications/update-status/(:num)', 'JobseekerApplicationController::updateStatus/$1');
 $routes->post('applications/update-status/(:num)', 'JobseekerApplicationController::updateStatus/$1');
});
$routes->group('jobseeker', ['filter' => 'role:jobseeker,employer,admin,agency'], function ($routes) {
 $routes->get('profile/(:num)', 'JobseekerApplicationController::applicant_profile/$1');
});
$routes->get('get-agencies/(:num)', 'ApplicationController::getAgencies/$1');
$routes->group('agency', ['filter' => 'role:agency'], function ($routes) {
 $routes->get('dashboard', 'Agency::index');
 $routes->get('assignments', 'Agency::assignments');
 $routes->post('employer-requests/update-status/(:num)', 'Agency::update_status/$1');

 $routes->match(['get', 'post'], 'edit', 'Agency::edit', ['filter' => 'auth']);
 $routes->get('complete-profile', 'AgencyCompletion::index');
 $routes->get('step1', 'AgencyCompletion::step1');
 $routes->post('step1', 'AgencyCompletion::saveStep1');

 $routes->get('step2', 'AgencyCompletion::step2');
 $routes->post('step2', 'AgencyCompletion::saveStep2');

 $routes->get('step3', 'AgencyCompletion::step3');
 $routes->post('step3', 'AgencyCompletion::saveStep3');

 $routes->post('updateStep1', 'Agency::updateStep1');
 $routes->post('updateStep2', 'Agency::updateStep2');
 $routes->post('updateStep3', 'Agency::updateStep3');
});
$routes->group('employer', ['filter' => 'role:employer', 'namespace' => 'App\Controllers\Employer'], function ($routes) {
 $routes->get('dashboard', 'EmployerController::dashboard');
 $routes->get('profile', 'EmployerProfileController::index');
 $routes->get('profile/edit/(:num)', 'EmployerProfileController::edit/$1');
 $routes->get('profile/create', 'EmployerProfileController::create');
 $routes->post('profile/store', 'EmployerProfileController::store');
 $routes->post('profile/update/(:num)', 'EmployerProfileController::update/$1');
 $routes->get('request-form', 'EmployerRequestController::submitForm');
 $routes->get('hire/(:num)', 'EmployerRequestController::hireForm/$1');
 $routes->post('request', 'EmployerRequestController::submitRequest');
 $routes->get('requests', 'EmployerRequestController::myRequests');
 $routes->post('hire', 'EmployerRequestController::hire');
 $routes->get('business/details', 'EmployerProfileController::businessInfo');

 $routes->get('change-password', 'PasswordController::changePasswordForm');
 $routes->post('change-password', 'PasswordController::updatePassword');
});

$routes->group('jobseeker', ['filter' => 'role:jobseeker'], function ($routes) {
 $routes->get('/', 'jobseeker\JobseekerController::dashboard');
 $routes->get('dashboard', 'jobseeker\JobseekerController::dashboard');

 $routes->get('change-password', 'jobseeker\PasswordController::changePasswordForm');
 $routes->post('change-password', 'jobseeker\PasswordController::updatePassword');
});

// businesses
$routes->get('businesses', 'Businesses::index');
$routes->match(['get', 'post'], 'businesses/all', 'Businesses::all');
$routes->get('businesses/view/(:any)', 'Businesses::view/$1');
$routes->get('businesses/edit/(:any)/(:any)', 'Businesses::edit/$1/$2');
$routes->post('businesses/update/(:any)/(:any)', 'Businesses::update/$1/$2');
$routes->match(['get', 'post'], 'businesses/type/(:any)', 'Businesses::type/$1');
$routes->match(['get', 'post'], 'signup/(:any)/(:any)', 'Auth::signup/$1/$2');
$routes->match(['get', 'post'], 'business/registration', 'Auth::businesses_reg');
$routes->match(['get', 'post'], 'change/password', 'Auth::password');
$routes->match(['get', 'post'], 'password/(:any)', 'Auth::password_reset/$1');


$routes->group('jobseeker/profile', ['filter' => 'role:jobseeker', 'namespace' => 'App\Controllers\Jobseeker'], function ($routes) {

 // profile
 $routes->get('/', 'JobseekerProfileController::index');
 $routes->get('edit/(:num)', 'JobseekerProfileController::edit/$1');
 $routes->get('create', 'JobseekerProfileController::create');
 $routes->post('store', 'JobseekerProfileController::store');
 $routes->post('update/(:num)', 'JobseekerProfileController::update/$1');
 // Experience
 $routes->get('experience', 'JobseekerProfileController::experienceIndex');
 $routes->get('experience/create', 'JobseekerProfileController::experienceCreate');
 $routes->post('experience/store', 'JobseekerProfileController::experienceStore');
 $routes->get('experience/edit/(:num)', 'JobseekerProfileController::experienceEdit/$1');
 $routes->post('experience/update/(:num)', 'JobseekerProfileController::experienceUpdate/$1');
 $routes->get('experience/delete/(:num)', 'JobseekerProfileController::experienceDelete/$1');

 // Languages
 $routes->get('languages', 'JobseekerProfileController::languageIndex');
 $routes->get('languages/create', 'JobseekerProfileController::languageCreate');
 $routes->post('languages/store', 'JobseekerProfileController::languageStore');
 $routes->get('languages/edit/(:num)', 'JobseekerProfileController::languageEdit/$1');
 $routes->post('languages/update/(:num)', 'JobseekerProfileController::languageUpdate/$1');
 $routes->get('languages/delete/(:num)', 'JobseekerProfileController::languageDelete/$1');

 // Skills
 $routes->get('skills', 'JobseekerProfileController::skillIndex');
 $routes->get('skills/create', 'JobseekerProfileController::skillCreate');
 $routes->post('skills/store', 'JobseekerProfileController::skillStore');
 $routes->get('skills/edit/(:num)', 'JobseekerProfileController::skillEdit/$1');
 $routes->post('skills/update/(:num)', 'JobseekerProfileController::skillUpdate/$1');
 $routes->get('skills/delete/(:num)', 'JobseekerProfileController::skillDelete/$1');

 // passport// Passport section for Jobseeker
 $routes->get('passport', 'JobseekerProfileController::passport');
 $routes->get('passport/edit', 'JobseekerProfileController::editPassport');
 $routes->post('passport/update', 'JobseekerProfileController::updatePassport');
 $routes->get('passport/delete/(:num)', 'JobseekerProfileController::deletePassport/$1');
});

// language switch
$routes->get('lang/(:segment)', 'Language::switch/$1');
// authentication
$routes->get('login', 'Auth::login', ['filter' => 'noauth']);
$routes->post('login', 'Auth::loginPost', ['filter' => 'noauth']);
$routes->get('logout', 'Auth::logout');
$routes->get('get-agencies-by-country/(:num)', 'Auth::agencies_by_countryId/$1');

// users
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
 $routes->get('users', 'Auth::users');
 $routes->get('users/b_details/(:num)', 'Auth::b_details/$1');
 // $routes->get('users/b_edit/(:num)', 'Auth::b_edit/$1');
});
// Admin route — protect later
// $routes->get('admin', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::registerPost');

$routes->get('forgot', 'Auth::forgot');
$routes->post('forgot', 'Auth::forgotPost');

$routes->get('reset/(:segment)', 'Auth::reset/$1');
$routes->post('reset/(:segment)', 'Auth::resetPost/$1');

$routes->get('/', 'Home::index');
$routes->group('', ['namespace' => 'App\Controllers\Frontend'], function ($routes) {
 $routes->get('/', 'Home::index');
 $routes->get('(:locale)', 'Home::index');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], function ($routes) {
 $routes->get('/', 'Dashboard::index');
});
