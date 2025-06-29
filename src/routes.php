<?php

use Illuminate\Support\Facades\Route;
use AhmetCelik43\LaravelCaptcha\Http\Controllers\CaptchaController;

Route::get('captcha/generate/{refresh?}/{type?}', [CaptchaController::class, 'generate'])
    ->middleware('web')
    ->name('captcha.generate');