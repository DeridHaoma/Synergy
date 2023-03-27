<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function create() {
        // переход на страницу редактирования профиля

        return view('auth.edit-profile');
    }

    public function store(Request $request) {
        // логика редактирования профиля

       $request->validate([
           'surname' => ['required', 'string'],
           'name' => ['required', 'string'],
           'patronymic' => ['required', 'string'],
           'series' => ['required', 'numeric'],
           'date' => ['required'],
           'place' => ['required'],
       ]);

        Auth::user()->update([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'series' => $request->series,
            'date' => $request->date,
            'place' => $request->place
        ]);

        return redirect()->route('profile');
    }

    public function getLogin() {
        // переход на страницу редактирования логина

        return view('auth.edit-login');
    }

    public function postLogin(Request $request) {
        // логика редактирования логина

        $request->validate([
            'login' => ['required', 'string', 'unique:users']
        ]);

        Auth::user()->update([
            'login' => $request->login
        ]);

        return redirect()->route('profile');
    }

    public function getEmail() {
        // переход на страницу редактирования почты

        return view('auth.edit-email');
    }

}
