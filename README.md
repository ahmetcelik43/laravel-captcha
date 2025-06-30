LARAVEL CAPTCHA:
KURULUM:
composer require ahmetcelik43/laravel-captcha
KULLANIMI:
VİEWSDE:
@include('captcha::input',["type"=>"code"])
DOĞRULAMA:
use AhmetCelik43\LaravelCaptcha\Rules\CaptchaCheck;
$request->validate([
 "code" => ["required", new CaptchaCheck]
]);
