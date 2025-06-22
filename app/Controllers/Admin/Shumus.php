<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ShumusHeroModel;
use App\Models\ShumusAboutModel;
use App\Models\ShumusServiceModel;

class Shumus extends BaseController
{
    public function __construct()
    {
        $this->heroModel = new ShumusHeroModel();
        $this->aboutModel = new ShumusAboutModel();
    }
    public function listHero()
    {
        $data['heroes'] = $this->heroModel->findAll();
        return view('admin/shumus/hero/list', $data);
    }

    public function createHero()
    {
        return view('admin/shumus/hero/create');
    }

    public function storeHero()
    {
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/shumus/hero', $imageName);
            $data['image'] = 'uploads/shumus/hero/' . $imageName;
        }

        $this->heroModel->insert($data);
        return redirect()->to('/admin/shumus/hero')->with('success', 'Hero created successfully.');
    }

    public function editHero($id)
    {
        $data['hero'] = $this->heroModel->find($id);
        return view('admin/shumus/hero/edit', $data);
    }

    public function updateHeroById($id)
    {
        $hero = $this->heroModel->find($id);
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            if (!empty($hero['image']) && file_exists($hero['image'])) {
                unlink($hero['image']);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/shumus/hero', $imageName);
            $data['image'] = 'uploads/shumus/hero/' . $imageName;
        } else {
            $data['image'] = $hero['image'];
        }

        $this->heroModel->update($id, $data);
        return redirect()->to('/admin/shumus/hero')->with('success', 'Hero updated successfully.');
    }

    public function deleteHero($id)
    {
        $hero = $this->heroModel->find($id);
        if ($hero && !empty($hero['image']) && file_exists($hero['image'])) {
            unlink($hero['image']);
        }
        $this->heroModel->delete($id);
        return redirect()->back()->with('success', 'Hero deleted successfully.');
    }
    public function updateAbout()
    {
        $language = $this->request->getPost('language');
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');

        $about = $this->aboutModel->where('language', $language)->first();

        $data = [
            'title' => $title,
            'description' => $description,
            'language' => $language
        ];

        // Handle image
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            if (!empty($about['image']) && file_exists($about['image'])) {
                unlink($about['image']);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/shumus/about', $imageName);
            $data['image'] = 'uploads/shumus/about/' . $imageName;
        } else {
            $data['image'] = $about['image'] ?? null;
        }

        if ($about) {
            $this->aboutModel->update($about['id'], $data);
        } else {
            $this->aboutModel->insert($data);
        }

        return redirect()->back()->with('success', 'About section saved successfully.');
    }
    // List all about records
    public function listAbout()
    {
        $data['abouts'] = $this->aboutModel->findAll();
        return view('admin/shumus/about/list', $data);
    }

    // Show form to create new about
    public function createAbout()
    {
        return view('admin/shumus/about/create');
    }

    // Store new about record
    public function storeAbout()
    {
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/shumus/about', $imageName);
            $data['image'] = 'uploads/shumus/about/' . $imageName;
        }

        $this->aboutModel->insert($data);
        return redirect()->to('/admin/shumus/about')->with('success', 'About created.');
    }

    // Show edit form
    public function editAbout($id)
    {
        $data['about'] = $this->aboutModel->find($id);
        return view('admin/shumus/about/edit', $data);
    }

    // Update the about record
    public function updateAboutById($id)
    {
        $about = $this->aboutModel->find($id);
        $data = $this->request->getPost();
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            if (!empty($about['image']) && file_exists($about['image'])) {
                unlink($about['image']);
            }
            $imageName = $image->getRandomName();
            $image->move('uploads/shumus/about', $imageName);
            $data['image'] = 'uploads/shumus/about/' . $imageName;
        } else {
            $data['image'] = $about['image'];
        }

        $this->aboutModel->update($id, $data);
        return redirect()->to('/admin/shumus/about')->with('success', 'About updated.');
    }

    // Delete the about record
    public function deleteAbout($id)
    {
        $about = $this->aboutModel->find($id);
        if ($about && !empty($about['image']) && file_exists($about['image'])) {
            unlink($about['image']);
        }

        $this->aboutModel->delete($id);
        return redirect()->back()->with('success', 'About deleted.');
    }


    public function services()
    {
        $model = new ShumusServiceModel();
        $data['services'] = $model->findAll();

        return view('admin/shumus/services/index', $data);
    }

    public function addService()
    {
        $model = new ShumusServiceModel();
        $data = [
            'title'    => $this->request->getPost('title'),
            'language' => $this->request->getPost('language'),
        ];

        if ($icon = $this->request->getFile('icon')) {
            if ($icon->isValid() && !$icon->hasMoved()) {
                $filename = $icon->getRandomName();
                $icon->move('uploads/shumus/', $filename);
                $data['icon'] = 'uploads/shumus/' . $filename;
            }
        }

        $model->save($data);
        return redirect()->back()->with('success', 'Service added');
    }

    public function deleteService($id)
    {
        $model = new ShumusServiceModel();
        $model->delete($id);
        return redirect()->back()->with('success', 'Service deleted');
    }
}
