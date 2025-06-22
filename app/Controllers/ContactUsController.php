<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactDetailModel;
use CodeIgniter\HTTP\ResponseInterface;

class ContactUsController extends BaseController
{
    public function index()
    {

        $data['page_name'] = 'Contact Us';
        $sliderModel = new ContactDetailModel();
        $locale = service('request')->getLocale();
        $data['contact_info'] = $sliderModel->where('language', $locale)->findAll();
        return view('frontend/contact_us', $data);
    }

    public function submit()
    {
        $name    = $this->request->getPost('name');
        $email   = $this->request->getPost('email');
        $phone   = $this->request->getPost('phone');
        $message = $this->request->getPost('message');
        if ($this->request->getPost('service')) {

            $service = $this->request->getPost('service'); // from the select dropdown
        } else {
            $service = 'Submited From Contact Us Page';
        }

        // Build HTML email (you can move this to a view file too)
        $htmlMessage = view('emails/contact_message', compact('name', 'email', 'phone', 'service', 'message'));

        $emailService = \Config\Services::email();

        $emailService->setFrom('admin@octagon.om', 'Octagon Website');
        $emailService->setTo('admin@octagon.om');
        $emailService->setReplyTo($email, $name);
        $emailService->setSubject('New Contact Message from Website');
        $emailService->setMessage($htmlMessage);
        $emailService->setMailType('html');

        if ($emailService->send()) {
            return redirect()->back()->with('success', 'Your message has been sent successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to send message. Please try again later.');
        }
    }
}
