<?php

namespace Zahidhemon\OnePunchCrud\Generators;

use Illuminate\Support\Facades\Artisan;

class ModelGenerator
{
    /**
     * @param $model
     * This will create model using laravel make model command
     */
    public static function make($model)
    {
        Artisan::call('make:model', ['name' => $model, '--migration' => true]);
    }
}
