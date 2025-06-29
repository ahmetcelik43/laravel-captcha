<?php

use Illuminate\Support\Facades\Route;
use AhmetCelik43\LaravelCaptcha\Http\Controllers\CaptchaController;

Route::get('captcha/generate', [CaptchaController::class, 'generate']);
