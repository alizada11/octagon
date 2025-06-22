<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AgencyModel;
use App\Models\CountriesModel;


class AgencyController extends BaseController
{
 protected $agencyModel;
 protected $countryModel;

 public function __construct()
 {

  $this->agencyModel = new AgencyModel();
  $this->countryModel = new CountriesModel();
 }

 public function index()
 {
  $locale = service('request')->getLocale();
  $data['locale'] = $locale;

  // Use the new method
  $data['agencies'] = $this->agencyModel->getAgenciesWithCountry();
  return view('admin/agencies/index', $data);
 }

 public function create()
 {
  $data['countries'] = $this->countryModel->findAll();
  return view('admin/agencies/create', $data);
 }

 public function store()
 {
  $this->agencyModel->save($this->request->getPost());
  return redirect()->to('/admin/agencies')->with('message', 'Agency added successfully');
 }

 public function edit($id)
 {
  $data['agency'] = $this->agencyModel->find($id);
  $data['countries'] = $this->countryModel->findAll();
  return view('admin/agencies/edit', $data);
 }

 public function update($id)
 {
  $this->agencyModel->update($id, $this->request->getPost());
  return redirect()->to('/admin/agencies')->with('message', 'Agency updated');
 }

 public function delete($id)
 {
  $this->agencyModel->delete($id);
  return redirect()->to('/admin/agencies')->with('message', 'Agency deleted');
 }
}
