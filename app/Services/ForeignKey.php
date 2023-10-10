<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ForeignKey
{
    public static function disable()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }

    public static function enable()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
