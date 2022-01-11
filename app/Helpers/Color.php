<?php

namespace App\Helpers;

class Color
{
   const Colors = [
      "Jan" => "جانفي",
      "Feb" => "فيفري",
      "Mar" => "مارس",
      "Apr" => "أفريل",
      "May" => "ماي",
      "Jun" => "جوان",
      "Jul" => "جويلية",
      "Aug" => "أوت",
      "Sep" => "سبتمبر",
      "Oct" => "أكتوبر",
      "Nov" => "نوفمبر",
      "Dec" => "ديسمبر"
   ];
   public static function get($num){
     return self::Colors[$num];
   }
}

