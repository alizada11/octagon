<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactDetailModel;
use App\Models\ShumusAboutModel;
use App\Models\ShumusHeroModel;
use App\Models\ShumusServiceModel;
use App\Models\ViarServiceModel;
use CodeIgniter\HTTP\ResponseInterface;

class ShumusController extends BaseController
{
    public function index()
    {

        $locale = service('request')->getLocale();
        $shumusAboutModel = new ShumusAboutModel();
        $shumusHeroModel = new ShumusHeroModel();
        $shumusServiceModel = new ShumusServiceModel();
        $locale = service('request')->getLocale();

        $ShumusServiceModel = new ShumusServiceModel();
        $viarServiceModel = new ViarServiceModel();
        $data['viar_services'] = $viarServiceModel->where('language', $locale)->findAll();
        $data['shumus_services'] = $ShumusServiceModel->where('language', $locale)->findAll();

        $data['about'] = $shumusAboutModel->where('language', $locale)->first();
        $data['hero'] = $shumusHeroModel->where('language', $locale)->first();
        $data['services'] = $shumusServiceModel->where('language', $locale)->findAll();
        $data['page_name'] = 'Shumus';
        $sliderModel = new ContactDetailModel();
        $locale = service('request')->getLocale();
        $data['contact_info'] = $sliderModel->where('language', $locale)->findAll();
        return view('frontend/shumus', $data);
    }

    public function corporate()
    {
        $locale = service('request')->getLocale();
        $shumusAboutModel = new ShumusAboutModel();
        $shumusHeroModel = new ShumusHeroModel();
        $shumusServiceModel = new ShumusServiceModel();
        $locale = service('request')->getLocale();

        $ShumusServiceModel = new ShumusServiceModel();
        $viarServiceModel = new ViarServiceModel();
        $data['viar_services'] = $viarServiceModel->where('language', $locale)->findAll();
        $data['shumus_services'] = $ShumusServiceModel->where('language', $locale)->findAll();

        $data['about'] = $shumusAboutModel->where('language', $locale)->first();
        $data['hero'] = $shumusHeroModel->where('language', $locale)->first();
        $data['services'] = $shumusServiceModel->where('language', $locale)->findAll();
        $data['page_name'] = 'Shumus';
        $sliderModel = new ContactDetailModel();
        $locale = service('request')->getLocale();
        $data['contact_info'] = $sliderModel->where('language', $locale)->findAll();
        return view('frontend/shumus-services', $data);
    }

    public function individual()
    {
        $model = new \App\Models\UserModel();

        $perPage = 12;
        $page = (int) ($this->request->getGet('page') ?? 1);
        $offset = ($page - 1) * $perPage;
        $total = $model->countAll();

        $pager = \Config\Services::pager();
        $pager->makeLinks($page, $perPage, $total, 'default_full');

        $data['pager'] = $pager;
        // Load paginated users
        $data['jobseekers'] = (array) $model->applicantUsers($perPage, $offset);
        // dd($data);
        $data['page_name'] = 'Individuals';
        return view('frontend/individual_list', $data);
    }
}
