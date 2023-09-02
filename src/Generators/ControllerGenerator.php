<?php

namespace Zahidhemon\OnePunchCrud\Generators;

use Illuminate\Support\Facades\{Artisan, File};
use Illuminate\Support\Str;

class ControllerGenerator
{
    /**
     * @param $model
     * This will append a resource route in web.php file and create a resource controller
     */
    public static function make($model)
    {
        $path_to_file = base_path('routes/web.php');
        $file = fopen($path_to_file, "r+");

        $oldLines = file_get_contents($path_to_file);
        $str_to_insert = "use App\\Http\\Controllers\\" . $model . "Controller; \n";
        $specificLine = "<?php";

        while (($buffer = fgets($file)) !== false) {
            if (strpos($buffer, $specificLine) !== false) {
                $pos = ftell($file) + 1;
                $newLines = substr_replace($oldLines, $str_to_insert, $pos, 0);
                file_put_contents($path_to_file, $newLines);
                break;
            }
        }
        fclose($file);

        $append_route = 'Route::resource(\'' . Str::plural(strtolower($model)) . "', '{$model}Controller'); \n";
        File::append($path_to_file, $append_route);

        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $model,
                strtolower( Str::plural($model)),
                strtolower($model)
            ],

            file_get_contents(resource_path("vendor/zahidhemon/stubs/Controller.stub"))
        );

        file_put_contents(app_path("/Http/Controllers/{$model}Controller.php"), $controllerTemplate);
    }
}
