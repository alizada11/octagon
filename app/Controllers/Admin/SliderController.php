<?php

// app/Controllers/Admin/SliderController.php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SliderModel;

class SliderController extends BaseController
{
 protected $slider;

 public function __construct()
 {
  $this->slider = new SliderModel();
 }

 public function index()
 {
  $data['sliders'] = $this->slider->findAll();
  return view('admin/slider/index', $data);
 }

 public function create()
 {
  return view('admin/slider/create');
 }

 public function store()
 {
  $file = $this->request->getFile('image');
  $imageName = $file->getRandomName();
  $file->move('uploads/sliders/', $imageName);

  $this->slider->save([
   'title'       => $this->request->getPost('title'),
   'description'    => $this->request->getPost('description'),
   'button_text' => $this->request->getPost('button_text'),
   'button_link' => $this->request->getPost('button_link'),
   'image'       => $imageName,
   'language' => $this->request->getPost('language'),
  ]);

  return redirect()->to('/admin/sliders')->with('success', 'Slide added.');
 }

 public function edit($id)
 {
  $data['slide'] = $this->slider->find($id);
  return view('admin/slider/create', $data);
 }

 public function update($id)
 {
  $slider = $this->slider->find($id);
  $data = [
   'title'       => $this->request->getPost('title'),
   'description'    => $this->request->getPost('description'),
   'button_text' => $this->request->getPost('button_text'),
   'button_link' => $this->request->getPost('button_link'),
   'language' => $this->request->getPost('language'),
  ];


  $file = $this->request->getFile('image');
  if ($file->isValid() && !$file->hasMoved()) {
   if (file_exists('uploads/sliders/' . $slider['image'])) {
    unlink('uploads/sliders/' . $slider['image']);
   }
   $imageName = $file->getRandomName();
   $file->move('uploads/sliders/', $imageName);
   $data['image'] = $imageName;
  }

  $this->slider->update($id, $data);
  return redirect()->to('/admin/sliders')->with('success', 'Slide updated.');
 }

 public function delete($id)
 {
  $slider = $this->slider->find($id);
  if ($slider && file_exists('uploads/sliders/' . $slider['image'])) {
   unlink('uploads/sliders/' . $slider['image']);
  }
  $this->slider->delete($id);
  return redirect()->to('/admin/sliders')->with('success', 'Slide deleted.');
 }
}
