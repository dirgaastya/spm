<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Helper
{

    public static function getFileNamePdf($request)
    {
        $prefixDate = Helper::getPrefixDateNow();
        $slugFileName = Str::slug($request->nama);
        $extension = '.pdf';
        $getFileName = $prefixDate . '-' . $slugFileName . $extension;
        return $getFileName;
    }
    public static function getPrefixDateNow()
    {
        $date = Carbon::now()->format('Y-m');
        $getPrefixDate = substr($date, 2);

        return $getPrefixDate;
    }

    public static function getPrefixDate($nama_file)
    {
        $prefix = substr($nama_file, 0, 5);
        return $prefix;
    }

    public static function getThumbnailExtension($nama)
    {
        $length = strpos($nama, ".") - strlen($nama);
        return substr($nama, $length);
    }
}
