KULLANIMI:
VİEWSDE:
@include('captcha::input',["type"=>"code"])
DOĞRULAMA:
use AhmetCelik43\LaravelCaptcha\Rules\CaptchaCheck;
$request->validate([
 "code" => ["required", new CaptchaCheck]
]);
