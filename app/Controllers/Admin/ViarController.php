<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ViarSectionModel;
use App\Models\ViarServiceModel;

class ViarController extends BaseController
{
 protected $sectionModel;
 protected $serviceModel;

 public function __construct()
 {
  $this->sectionModel = new ViarSectionModel();
  $this->serviceModel = new ViarServiceModel();
 }
 public function index()
 {
  $model = new \App\Models\ViarSectionModel();

  $sections = $model->orderBy('type')->findAll();

  // Group sections by `type`
  $grouped = [];
  foreach ($sections as $section) {
   $grouped[$section['type']][] = $section;
  }
  $data['sectionsGrouped'] = $grouped;
  $data['sections'] = $this->sectionModel->findAll();
  $data['services'] = $this->serviceModel->findAll();
  return view('admin/viar/index', $data);
 }
 public function create()
 {
  return view('admin/viar/create');
 }
 private function uploadImage()
 {
  $file = $this->request->getFile('image');
  if ($file && $file->isValid() && !$file->hasMoved()) {
   $newName = $file->getRandomName();
   $file->move('uploads/viar', $newName);
   return 'uploads/viar/' . $newName;
  }
  return null;
 }


 public function store()
 {
  $data = [
   'heading1' => $this->request->getPost('heading1'),
   'heading2' => $this->request->getPost('heading2'),
   'image' => $this->uploadImage(), // optional if image upload exists
   'language' => $this->request->getPost('language'),
   'type' => $this->request->getPost('type'),
  ];

  $this->sectionModel->insert($data);

  return redirect()->to('/admin/viar')->with('success', 'Section created successfully');
 }



 public function edit($type)
 {
  $locale = service('request')->getLocale();
  $data['section'] = $this->sectionModel->where('id', $type)->first();

  $type = $data['section']['type'];
  return view("admin/viar/edit_$type", $data);
 }

 public function update($id)
 {
  $file = $this->request->getFile('image');
  $data = $this->request->getPost();

  if ($file && $file->isValid()) {
   $newName = $file->getRandomName();
   $file->move('uploads/viar', $newName);
   $data['image'] = 'uploads/viar/' . $newName;
  }

  $this->sectionModel->update($id, $data);
  return redirect()->to('/admin/viar')->with('success', 'Section updated');
 }

 public function addService()
 {
  $bullets = json_encode($this->request->getPost('bullets'));
  $this->serviceModel->save([
   'title' => $this->request->getPost('title'),
   'bullets' => $bullets,
   'language' => $this->request->getPost('language'),
  ]);
  return redirect()->to('/admin/viar')->with('success', 'Service added');
 }

 public function deleteService($id)
 {
  $this->serviceModel->delete($id);
  return redirect()->to('/admin/viar')->with('success', 'Service deleted');
 }
}
