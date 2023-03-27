<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function create() {
        // переход на страницу регистрации профиля

       return view('auth.register');
   }

   public function store(Request $request) {
        // логика регистрации профиля

       $request->validate([
           'surname' => ['required', 'string'],
           'name' => ['required', 'string'],
           'patronymic' => ['required', 'string'],
           'series' => ['required', 'numeric'],
           'date' => ['required'],
           'place' => ['required'],
           'login' => ['required', 'string', 'unique:users'],
           'email' => ['required', 'string', 'email', 'unique:users'],
           'password' => ['required', 'confirmed', 'min:8']
       ]);

       $user = User::create([
          'surname' => $request->surname,
           'name' => $request->name,
           'patronymic' => $request->patronymic,
           'series' => $request->series,
           'date' => $request->date,
           'place' => $request->place,
           'login' => $request->login,
           'email' => $request->email,
           'password' => Hash::make($request->password)
       ]);

       event(new Registered($user));

       Auth::login($user);

       return redirect(RouteServiceProvider::HOME);
   }

}
