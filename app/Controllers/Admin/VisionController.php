<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VisionModel;

class VisionController extends BaseController
{
 protected $visionModel;

 public function __construct()
 {
  $this->visionModel = new VisionModel();
  helper(['form', 'url']);
 }

 // List all visions (admin view)
 public function index()
 {
  $data['visions'] = $this->visionModel->findAll();
  return view('admin/vision/index', $data);
 }

 // Show form to create
 public function create()
 {
  return view('admin/vision/form');
 }

 // Save new vision
 public function store()
 {
  $validationRules = [
   'language'    => 'required',
   'heading'     => 'required|min_length[3]',
   'sub_heading' => 'required|min_length[3]',
   'description' => 'required|min_length[10]',
   'image'       => [
    'uploaded[image]',
    'mime_in[image,image/jpg,image/jpeg,image/png]',
    'max_size[image,2048]',
   ],
  ];

  if (!$this->validate($validationRules)) {
   return view('admin/vision_form', [
    'validation' => $this->validator,
    'old' => $this->request->getPost(),
   ]);
  }

  // Handle file upload
  $img = $this->request->getFile('image');
  $imageName = null;
  if ($img && $img->isValid() && !$img->hasMoved()) {
   $imageName = $img->getRandomName();
   $img->move(ROOTPATH . 'public/uploads/vision', $imageName);
  }

  $this->visionModel->save([
   'language' => $this->request->getPost('language'),
   'heading' => $this->request->getPost('heading'),
   'sub_heading' => $this->request->getPost('sub_heading'),
   'description' => $this->request->getPost('description'),
   'image' => $imageName,
  ]);

  return redirect()->to('/admin/vision')->with('success', 'Vision created successfully');
 }

 // Show form to edit existing vision
 public function edit($id = null)
 {
  $vision = $this->visionModel->find($id);
  if (!$vision) {
   throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Vision with ID $id not found");
  }
  return view('admin/vision/form', ['vision' => $vision]);
 }

 // Update vision
 public function update($id = null)
 {
  $vision = $this->visionModel->find($id);
  if (!$vision) {
   throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Vision with ID $id not found");
  }

  $validationRules = [
   'language'    => 'required',
   'heading'     => 'required|min_length[3]',
   'sub_heading' => 'required|min_length[3]',
   'description' => 'required|min_length[10]',
   'image'       => [
    'mime_in[image,image/jpg,image/jpeg,image/png]',
    'max_size[image,2048]',
   ],
  ];

  if (!$this->validate($validationRules)) {
   return view('admin/vision/form', [
    'validation' => $this->validator,
    'vision' => $vision,
   ]);
  }

  $img = $this->request->getFile('image');
  $imageName = $vision['image']; // keep old image if no new one uploaded
  if ($img && $img->isValid() && !$img->hasMoved()) {
   // Delete old image file
   if ($vision['image'] && file_exists(ROOTPATH . 'public/uploads/vision/' . $vision['image'])) {
    unlink(ROOTPATH . 'public/uploads/vision/' . $vision['image']);
   }
   $imageName = $img->getRandomName();
   $img->move(ROOTPATH . 'public/uploads/vision', $imageName);
  }

  $this->visionModel->update($id, [
   'language' => $this->request->getPost('language'),
   'heading' => $this->request->getPost('heading'),
   'sub_heading' => $this->request->getPost('sub_heading'),
   'description' => $this->request->getPost('description'),
   'image' => $imageName,
  ]);

  return redirect()->to('/admin/vision')->with('success', 'Vision updated successfully');
 }

 // Delete vision
 public function delete($id = null)
 {
  $vision = $this->visionModel->find($id);
  if ($vision) {
   // Delete image file
   if ($vision['image'] && file_exists(ROOTPATH . 'public/uploads/' . $vision['image'])) {
    unlink(ROOTPATH . 'public/uploads/' . $vision['image']);
   }
   $this->visionModel->delete($id);
   return redirect()->to('/admin/vision')->with('success', 'Vision deleted successfully');
  }
  return redirect()->to('/admin/vision')->with('error', 'Vision not found');
 }
}
