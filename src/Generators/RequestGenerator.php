<?php

namespace Zahidhemon\OnePunchCrud\Generators;

use Illuminate\Support\Facades\Artisan;

class RequestGenerator
{
    /**
     * @param $model
     * This will create Request using laravel make request command
     */
    public static function make($model)
    {
        Artisan::call('make:request', ['name' => 'Store' . $model . 'Request']);
        Artisan::call('make:request', ['name' => 'Update' . $model . 'Request']);
    }
}
