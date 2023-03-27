<?php

use App\Http\Controllers\Auth\EditProfileController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordConfirmationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use \Illuminate\Foundation\Auth\EmailVerificationRequest;
use \App\Providers\RouteServiceProvider;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Вся логика роутов реализована в этом файле!

// Домашняя страница
Route::view('/', 'welcome')->name('welcome');

// Страница регистрации
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Страница авторизации
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout'); // реализация выхода

// Страницы востановления пароля
Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
Route::get('/reset-password', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');

// Страница подтверждения почты
Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, '__invoke'])->middleware('auth')->name('verification.send');

// Страница подтверждения пороля
Route::get('/confirm-password', [PasswordConfirmationController::class, 'show'])->middleware('auth')->name('password.confirm');
Route::post('/confirm-password', [PasswordConfirmationController::class, 'store'])->middleware('auth');

// Страница профиля
Route::view('/profile', 'profile')->middleware(['auth', 'verified'])->name('profile');

// Страница редактирования профиля
Route::get('/profile/edit', [EditProfileController::class, 'create'])->middleware(['auth', 'password.confirm'])->name('profile.edit');
Route::post('/profile/edit', [EditProfileController::class, 'store'])->middleware('auth');
Route::get('/profile/edit/login', [EditProfileController::class, 'getLogin'])->middleware('auth')->name('login.edit');
Route::post('/profile/edit/login', [EditProfileController::class, 'postLogin'])->middleware('auth');
Route::get('/profile/edit/email', [EditProfileController::class, 'getEmail'])->middleware('auth')->name('email.edit');
Route::post('/profile/edit/email', [EditProfileController::class, 'postEmail'])->middleware('auth');
