<?php
namespace App\Helpers;

class Helper
{
    public static function reload()
    {

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
