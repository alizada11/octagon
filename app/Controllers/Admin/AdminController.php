<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SliderModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $sliderCount = (new SliderModel())->countAll();
        // $galleryCount = (new GalleryModel())->countAll();
        // $testimonialCount = (new TestimonialModel())->countAll();

        return view('admin/dashboard', ['sliderCount' => $sliderCount]);
    }
}
