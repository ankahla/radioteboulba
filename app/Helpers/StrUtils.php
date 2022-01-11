<?php

namespace App\Helpers;

class StrUtils
{

    public static function slugify($string, $separator = '-')
    {
        $string = trim($string);
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace("/[^a-z0-9_\s\-۰۱۲۳۴۵۶۷۸۹يـءاآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهیإلأة ]/u", '', $string);
        $string = preg_replace("/[\s\-_]+/", ' ', $string);
        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }


}

