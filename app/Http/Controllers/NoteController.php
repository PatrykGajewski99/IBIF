<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Services\Note\NoteService;

class NoteController extends Controller
{
    private NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function store(NoteRequest $request)
    {
        dd($request);
      $this->noteService->storeNote($request);
      return redirect()->back();
    }
}
