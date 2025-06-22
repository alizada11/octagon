<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GoalModel;

class GoalController extends BaseController
{
 protected $goalModel;

 public function __construct()
 {
  $this->goalModel = new GoalModel();
 }

 public function index()
 {
  $data['goals'] = $this->goalModel->findAll();
  return view('admin/goal/index', $data);
 }

 public function create()
 {
  return view('admin/goal/create');
 }

 public function store()
 {
  $img = $this->request->getFile('image');
  $imgName = $img->isValid() ? $img->getRandomName() : null;
  if ($imgName) $img->move('uploads/goals/', $imgName);

  $this->goalModel->save([
   'language' => $this->request->getPost('language'),
   'heading' => $this->request->getPost('heading'),
   'subheading' => $this->request->getPost('subheading'),
   'description' => $this->request->getPost('description'),
   'image' => $imgName
  ]);

  return redirect()->to('/admin/goal')->with('message', 'Saved successfully');
 }

 public function edit($id)
 {
  $data['goal'] = $this->goalModel->find($id);
  return view('admin/goal/edit', $data);
 }

 public function update($id)
 {
  $goal = $this->goalModel->find($id);
  $img = $this->request->getFile('image');

  if ($img && $img->isValid()) {
   if ($goal['image'] && file_exists('uploads/goals/' . $goal['image'])) {
    unlink('uploads/goals/' . $goal['image']);
   }
   $imgName = $img->getRandomName();
   $img->move('uploads/goals/', $imgName);
  } else {
   $imgName = $goal['image'];
  }

  $this->goalModel->update($id, [
   'language' => $this->request->getPost('language'),
   'heading' => $this->request->getPost('heading'),
   'subheading' => $this->request->getPost('subheading'),
   'description' => $this->request->getPost('description'),
   'image' => $imgName
  ]);

  return redirect()->to('/admin/goal')->with('message', 'Updated successfully');
 }

 public function delete($id)
 {
  $goal = $this->goalModel->find($id);
  if ($goal['image'] && file_exists('uploads/goals/' . $goal['image'])) {
   unlink('uploads/goals/' . $goal['image']);
  }
  $this->goalModel->delete($id);
  return redirect()->to('/admin/goal')->with('message', 'Deleted successfully');
 }
}
