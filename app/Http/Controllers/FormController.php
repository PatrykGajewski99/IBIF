<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Services\Email\FormService;

class FormController extends Controller
{
    private FormService $formService;

    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function sendEmail(ContactFormRequest $request)
    {
        $this->formService->sendEmail($request);
        return redirect()->back();
    }
}
