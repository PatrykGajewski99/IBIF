<?php

namespace App\Services\Email;

use App\Http\Requests\ContactFormRequest;
use App\Mail\FormEmail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class FormService
{
    public function sendEmail(ContactFormRequest $request)
    {
        try {
            $formData = $request->validated();
            Mail::to($formData['email'])->send(new FormEmail($formData));
            Alert::success("Congratulation", "E-mail sent successfully");
        } catch (\Exception $e) {
            Alert::error("Something was wrong", $e->getMessage());
        }

    }
}
