<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactDetailModel;

class ContactDetailsController extends BaseController
{
 protected $contactModel;

 public function __construct()
 {
  $this->contactModel = new ContactDetailModel();
 }

 public function index()
 {
  $data['contacts'] = $this->contactModel->orderBy('type', 'ASC')->findAll();
  return view('admin/contact_details/index', $data);
 }

 public function create()
 {
  return view('admin/contact_details/create');
 }

 public function store()
 {
  $this->contactModel->save([
   'icon' => $this->request->getPost('icon'),
   'type' => $this->request->getPost('type'),
   'title' => $this->request->getPost('title'),
   'value' => $this->request->getPost('value'),
   'language' => $this->request->getPost('language'),
  ]);
  return redirect()->to('/admin/contact-details')->with('success', 'Contact detail created');
 }

 public function edit($id)
 {
  $data['contact'] = $this->contactModel->find($id);
  return view('admin/contact_details/edit', $data);
 }

 public function update($id)
 {
  $this->contactModel->update($id, [
   'icon' => $this->request->getPost('icon'),
   'type' => $this->request->getPost('type'),
   'title' => $this->request->getPost('title'),
   'value' => $this->request->getPost('value'),
   'language' => $this->request->getPost('language'),
  ]);
  return redirect()->to('/admin/contact-details')->with('success', 'Contact detail updated');
 }

 public function delete($id)
 {
  $this->contactModel->delete($id);
  return redirect()->to('/admin/contact-details')->with('success', 'Deleted');
 }
}
