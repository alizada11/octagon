<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactDetailModel;
use App\Models\ShumusServiceModel;
use App\Models\ViarSectionModel;
use App\Models\ViarServiceModel;
use CodeIgniter\HTTP\ResponseInterface;

class ViarController extends BaseController
{
    public function index()
    {

        $viarModel = new ViarSectionModel();
        $viarServiceModel = new ViarServiceModel();
        $locale = service('request')->getLocale();
        $ShumusServiceModel = new ShumusServiceModel();
        $viarServiceModel = new ViarServiceModel();
        $data['viar_services'] = $viarServiceModel->where('language', $locale)->findAll();
        $data['shumus_services'] = $ShumusServiceModel->where('language', $locale)->findAll();

        $locale = service('request')->getLocale();
        $data['hero'] = $viarModel->where('language', $locale)->where('type', 'hero')->first();
        $data['about'] = $viarModel->where('language', $locale)->where('type', 'about')->first();
        $data['services'] = $viarServiceModel->where('language', $locale)->findAll();
        $contactModel = new ContactDetailModel();
        $data['page_name'] = 'Viar';
        // $locale = service('request')->getLocale();
        $data['contact_info'] = $contactModel->where('language', $locale)->findAll();
        // dd($data);
        return view('frontend/viar', $data);
    }
}
