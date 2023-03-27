<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordConfirmationController extends Controller
{
    public function show() {
         // переход на страницу подтверждения пороля

        return view('auth.confirm-password');
    }

    public function store(Request $request) {
        // логика подтверждения пороля

        if (! Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['Предоставленный пароль не соответствует нашим записям']
            ]);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }
}
