<?php

namespace AhmetCelik43\LaravelCaptcha\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class CaptchaController extends Controller
{
    public function generate($refresh = "", $type = null)
    {
        $im = imagecreatetruecolor(100, 35);
        $white = imagecolorallocate($im, 255, 255, 255);
        $black = imagecolorallocate($im, 0, 0, 0);

        $captcha_code = Str::upper(Str::random(4));

        if ($type) {
            session([$type => $captcha_code]);
        } else {
            session(["captcha_code" => $captcha_code]);
        }

        imagefilledrectangle($im, 0, 0, 100, 35, $black);

        $font_file = public_path('fonts/Inter_18pt-Bold.ttf');
        if (!file_exists($font_file)) {
            // Eğer font yoksa default sistem fontu
            $font_file = '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf';
        }

        imagefttext($im, 20, 0, 15, 30, $white, $font_file, $captcha_code);

        ob_start();
        imagepng($im);
        $imageData = ob_get_clean();
        imagedestroy($im);

        if ($refresh == 0) {
            return response($imageData)->header('Content-Type', 'image/png');
        } else {
            return response("data:image/png;base64," . base64_encode($imageData));
        }

    }

}
