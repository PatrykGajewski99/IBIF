<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserService
{
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed','min:8'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Alert::success("Congratulation", "User registered successfully");
            return response('Created',201);
        } catch (\Exception $e) {
            Alert::error("Something was wrong", $e->getMessage());
            return response('Not created',404);
        }
    }
}
