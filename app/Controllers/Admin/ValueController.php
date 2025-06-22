<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ValueModel;

class ValueController extends BaseController
{
 protected $model;

 public function __construct()
 {
  $this->model = new ValueModel();
 }

 public function index()
 {
  $data['values'] = $this->model->orderBy('id', 'DESC')->findAll();
  return view('admin/values/index', $data);
 }

 public function create()
 {
  return view('admin/values/create');
 }

 public function store()
 {
  $this->model->save([
   'language'    => $this->request->getPost('language'),
   'title'       => $this->request->getPost('title'),
   'description' => $this->request->getPost('description'),
  ]);

  return redirect()->to('/admin/values')->with('success', 'Value created');
 }

 public function edit($id)
 {
  $data['value'] = $this->model->find($id);
  return view('admin/values/edit', $data);
 }

 public function update($id)
 {
  $this->model->update($id, [
   'language'    => $this->request->getPost('language'),
   'title'       => $this->request->getPost('title'),
   'description' => $this->request->getPost('description'),
  ]);

  return redirect()->to('/admin/values')->with('success', 'Value updated');
 }

 public function delete($id)
 {
  $this->model->delete($id);
  return redirect()->to('/admin/values')->with('success', 'Value deleted');
 }
}
