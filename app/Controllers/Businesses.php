<?php

namespace App\Controllers;

use App\Models\BusinessesModel;
use App\Models\UserModel;

class Businesses extends BaseController
{
    protected $userModel;
    protected $businessesModel;

    public function __construct()
    {
        helper('app');

        $this->userModel = new UserModel();
        $this->businessesModel = new BusinessesModel();
        $request = \Config\Services::request();

        if (!auth('businesses') || !$request->isAJAX()) {
            return "<script>location.reload();</script>";
        }
    }

    public function all()
    {
        if ($this->request->getPost('search')) {
            $search_term = $this->request->getPost('search');
        } else {
            $search_term = $this->request->getGet('search');
        }

        $perPage = 20; // Number of items per page
        $currentPage = $this->request->getGet('page') ?? 1; // Get current page from URL

        // Build query with optional search
        if (!empty($search_term)) {
            $this->businessesModel->groupStart()
                ->like('cr_number', $search_term)
                ->orLike('cr_name_en', $search_term)
                ->orLike('cr_name_ar', $search_term)
                ->groupEnd();
        }

        // Get total count for pagination
        $totalItems = $this->businessesModel->countAllResults(false); // false to keep previous conditions

        // Calculate total pages
        $totalPages = ceil($totalItems / $perPage);

        // Get paginated results
        $offset = ($currentPage - 1) * $perPage;
        $data['businesses'] = $this->businessesModel->orderBy('created_at', 'DESC')->findAll($perPage, $offset);

        // Pass pagination data to view
        $data['pagination'] = [
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total_items' => $totalItems,
            'has_previous' => $currentPage > 1,
            'has_next' => $currentPage < $totalPages,
        ];

        // Pass search term to view
        $data['search_term'] = $search_term;

        return view('businesses/all', $data);
    }

    public function view($id)
    {
        $id = dec($id);
        $data['form'] = $this->request->getGet('form');
        $data['record'] = $this->businessesModel->find($id);
        return view('businesses/view', $data);
    }

    public function edit($form, $id)
    {
        $businessesModel = new BusinessesModel();
        $data['record'] = $businessesModel->find($id);
        // dd($data);
        return view('businesses/' . $form, $data);
    }

    public function update($form, $id)
    {
        $file = $this->request->getFile($form . '_document');
        $data = $this->request->getPost();

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/documents', $newName);
            $data[$form . '_document'] = $newName;

            if (!empty($this->request->getPost('old_' . $form . '_document'))) {
                @unlink(WRITEPATH . 'uploads/documents/' . $this->request->getPost('old_' . $form . '_document'));
            }
        }

        try {
            if ($this->businessesModel->update($id, $data)) {
                session()->setFlashdata('success', lang('app.record_updated_successfully'));
            } else {
                session()->setFlashdata('error', lang('app.record_update_failed'));
            }
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }

        $bdata = $this->businessesModel->find($id);

        return redirect()->to('admin/users/b_details/' . $bdata['pid']);
    }

    public function type($type)
    {
        $data['search_term'] = '';
        if ($this->request->getGet('search')) {
            $data['search_term'] = $this->request->getGet('search');
        }
        if ($this->request->getPost('search')) {
            $data['search_term'] = $this->request->getPost('search');
        }

        $perPage = 20;
        // Number of items per page
        $currentPage = $this->request->getGet('page') ?? 1;
        // Get current page from URL

        // Build query with optional search
        if (!empty($data['search_term'])) {
            $this->businessesModel->groupStart()
                ->like('cr_number', $data['search_term'])
                ->orLike('cr_name_en', $data['search_term'])
                ->orLike('cr_name_ar', $data['search_term'])
                ->groupEnd();
        }

        // Join with users and filter for eco type
        $this->businessesModel->select('businesses.*, users.type')
            ->join('users', 'businesses.pid = users.id')
            ->where('users.type', $type)
            ->orderBy('businesses.created_at', 'DESC');

        // Get total count for pagination
        $totalItems = $this->businessesModel->countAllResults(false);
        // false to keep previous conditions

        // Calculate total pages
        $totalPages = ceil($totalItems / $perPage);

        // Get paginated results
        $offset = ($currentPage - 1) * $perPage;
        $data['businesses'] = $this->businessesModel->findAll($perPage, $offset);

        // Pass pagination data to view
        $data['pagination'] = [
            'current_page' => $currentPage,
            'total_pages' => $totalPages,
            'per_page' => $perPage,
            'total_items' => $totalItems,
            'has_previous' => $currentPage > 1,
            'has_next' => $currentPage < $totalPages,
        ];

        // Pass search term to view
        $data['type'] = $type;

        return view('businesses/type', $data);
    }
}
