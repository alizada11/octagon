<?php
// app/Controllers/Admin/AboutUs.php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AboutUsModel;

class AboutUs extends BaseController
{
 public function index()
 {
  $model = new AboutUsModel();
  $data['about'] = $model->findAll();
  return view('admin/about/index', $data);
 }

 public function create()
 {
  return view('admin/about/create');
 }

 public function store()
 {
  $model = new AboutUsModel();

  $data = [
   'language' => $this->request->getPost('language'),
   'title' => $this->request->getPost('title'),
   'subtitle' => $this->request->getPost('subtitle'),
   'content' => $this->request->getPost('content'),
  ];

  // Handle image upload
  $image = $this->request->getFile('image');
  if ($image && $image->isValid() && !$image->hasMoved()) {
   $newName = $image->getRandomName();
   $image->move('uploads/about', $newName);
   $data['image'] = 'uploads/about/' . $newName;
  }

  $model->insert($data);
  return redirect()->to('/admin/about')->with('success', 'About section created.');
 }
 // app/Controllers/Admin/AboutUsController.php

 public function edit($id)
 {
  $model = new AboutUsModel();
  $data['about'] = $model->find($id);
  return view('admin/about/edit', $data);
 }

 public function update($id)
 {
  $model = new AboutUsModel();

  $data = [
   'language' => $this->request->getPost('language'),
   'title' => $this->request->getPost('title'),
   'content' => $this->request->getPost('content'),
  ];

  // Handle optional image update
  $image = $this->request->getFile('image');
  if ($image && $image->isValid() && !$image->hasMoved()) {
   $newName = $image->getRandomName();
   $image->move('uploads/about', $newName);
   $data['image'] = 'uploads/about/' . $newName;
  }

  $model->update($id, $data);
  return redirect()->to('/admin/about')->with('success', 'About section updated.');
 }

 public function delete($id)
 {
  $model = new AboutUsModel();
  $model->delete($id);
  return redirect()->to('/admin/about')->with('success', 'About section deleted.');
 }
}
