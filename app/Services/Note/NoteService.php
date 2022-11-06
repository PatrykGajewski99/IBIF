<?php

namespace App\Services\Note;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use RealRashid\SweetAlert\Facades\Alert;

class NoteService
{
    public function storeNote(NoteRequest $request)
    {
        try {
            $noteData = $request->validated();
            $title = $noteData['title'];
            $description = $noteData['description'];
            $userID = auth()->user()->id;
            Note::create([
                'userID' => $userID,
                'title' => $title,
                'description' => $description
            ]);
            Alert::success("Congratulation", "Post added successfully");
        } catch (\Exception $e) {
            dd($e->getMessage());
            Alert::error("Something was wrong", $e->getMessage());
        }

    }
}
