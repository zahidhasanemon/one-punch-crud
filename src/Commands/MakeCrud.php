<?php

namespace Zahidhemon\OnePunchCrud\Commands;

use Illuminate\Console\Command;
use InvalidArgumentException;
use Zahidhemon\OnePunchCrud\Generators\{ControllerGenerator, ModelGenerator, RequestGenerator, ViewGenerator};

class MakeCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {model} {--migrate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make all CRUD process with this command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * validate model class name.
     *
     * @param  string  $model
     * @return string
     */
    protected function validateModel($model)
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new InvalidArgumentException('Model name is not valid.');
        }

        $namespace = $this->laravel->getNamespace();

        $modelClass = $namespace . 'Models\\' . $model;
        if (class_exists($modelClass)) {
            throw new InvalidArgumentException('Model already exists.');
        }

        $controllerClass = $namespace . 'Http\\Controllers\\' . $model . 'Controller';
        if (class_exists($controllerClass)) {
            throw new InvalidArgumentException('Controller already exists.');
        }

        return $model;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = $this->argument('model');

        $this->validateModel($model);

        ModelGenerator::make($model);
        if ($this->option('migrate')) {
            $this->call('migrate');
        }
        RequestGenerator::make($model);
        ControllerGenerator::make($model);
        ViewGenerator::make($model);

        $this->info('CRUD process for model ' . $model . ' has been done successfully!');
    }
}
