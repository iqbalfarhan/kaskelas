<?php

namespace App\Helpers;

class KasKelasHelper
{
    public static function money($nominal)
    {
        return number_format($nominal, 0, ',', '.');
    }
}
