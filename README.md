# Laravel CRUD Operation

A simple package to create model, controller, resource route, migration, request and view files with a single command. Due to time constraint, I have chosen to build a prototype so that I can cover all the features. Hence view files are created without any content. I have used laravel artisan commands to create model, migration, request files.But the package can be extended to make it a complete full package.

## Installation
Add this package as a repository in your root composer.json file
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/zahidhasanemon/one-punch-crud"
    }
]
```
And then
```
composer require zahidhemon/one-punch-crud
```
## Features

* Controller
* Views
* Model
* Migration
* Requests
* Routes

## Configuration
Publish the view and stub files (mandatory). This will copy the controller stub file from package folder to the resource folder. 

```
php artisan vendor:publish --provider="Zahidhemon\\OnePunchCrud\\CrudServiceProvider"
```

## Usage
After publishing the configuration, run

```
php artisan make:crud ModelName
```

If you want to migrate the created table, run

```
php artisan make:crud ModelName --migrate
```