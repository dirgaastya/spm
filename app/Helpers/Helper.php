<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Helper
{

    public static function getFileNamePdf($request)
    {
        $prefixDate = Helper::getPrefixDate();
        $slugFileName = Str::slug($request->nama);
        $extension = '.pdf';
        $getFileName = $prefixDate . '-' . $slugFileName . $extension;
        return $getFileName;
    }
    public static function getPrefixDate()
    {
        $date = Carbon::now()->format('Y-m');
        $getPrefixDate = substr($date, 2);

        return $getPrefixDate;
    }
}
