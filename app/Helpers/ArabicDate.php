<?php

namespace App\Helpers;

class ArabicDate
{
   const months = [
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
   public static function convertMonths($month){
 
     return self::months[$month];
   }
}

