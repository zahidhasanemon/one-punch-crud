<?php

namespace Zahidhemon\OnePunchCrud\Generators;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ViewGenerator
{
    /**
     * @param $model
     * This will create a directory with three view files
     */
    public static function make($model)
    {
        $folderName = strtolower( Str::plural($model));
        if (!file_exists($path = base_path("/resources/views/$folderName"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents("$path/index.blade.php", '');
        file_put_contents("$path/create.blade.php", '');
        file_put_contents("$path/show.blade.php", '');
        file_put_contents("$path/edit.blade.php", '');
    }
}
