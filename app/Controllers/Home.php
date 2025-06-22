<?php

namespace App\Controllers;

use App\Models\AboutUsModel;
use App\Models\SliderModel;
use App\Models\AboutUsModelModel;
use App\Models\ContactDetailModel;
use App\Models\GoalModel;
use App\Models\SettingsModel;
use App\Models\ValueModel;
use App\Models\VisionModel;

class Home extends BaseController
{
    public function viewFile($filename)
    {
        $filePath = WRITEPATH . 'uploads/documents/' . $filename;

        if (!file_exists($filePath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Set headers for inline display
        $this->response
            ->setHeader('Content-Type', mime_content_type($filePath))
            ->setHeader('Content-Disposition', 'inline; filename="' . basename($filePath) . '"')
            ->setBody(file_get_contents($filePath));

        return $this->response;
    }
    public function index(): string
    {
        $settings = [];
        $settingsModel = new SettingsModel();
        foreach ($settingsModel->getSettingsByType('footer') as $row) {
            $settings[$row['key']] = $row['value'];
        }
        $data['settings'] = $settings;
        $data['page_name'] = 'Home';
        $sliderModel = new SliderModel();
        $locale = service('request')->getLocale();
        $data['slides'] = $sliderModel->where('language', $locale)->findAll();
        $sliderModel = new ValueModel();
        $sliderModel = new ContactDetailModel();
        $locale = service('request')->getLocale();
        $data['contact_info'] = $sliderModel->where('language', $locale)->findAll();
        $sliderModel = new ValueModel();
        $locale = service('request')->getLocale();
        $data['values'] = $sliderModel->where('language', $locale)->findAll();
        $sliderModel = new AboutUsModel();
        $locale = service('request')->getLocale();
        $data['about'] = $sliderModel->where('language', $locale)->first();
        $sliderModel = new GoalModel();
        $locale = service('request')->getLocale();
        $data['goal'] = $sliderModel->where('language', $locale)->first();
        $sliderModel = new VisionModel();
        $locale = service('request')->getLocale();
        $data['vision'] = $sliderModel->where('language', $locale)->first();
        return view('frontend/home', $data);
    }
}
