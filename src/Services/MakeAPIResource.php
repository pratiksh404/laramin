<?php

namespace Pratiksh\Laramin\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Pratiksh\Laramin\Services\CommandHelper;

class MakeAPIResource extends CommandHelper
{
    public static function makeRestAPI($name)
    {
        // Making API Resource Controller
        self::makeRestAPIController($name);
    }

    public static function makeAPI($name)
    {
        // Making Resource and Collection
        self::makeResource($name);
        // Making API Resource Controller
        self::makeAPIController($name);
    }

    /**
     *
     * Make Resource and Collection
     *
     */
    protected static function makeResource($name)
    {
        Artisan::call('make:resource ' . $name . 'Resource');
        Artisan::call('make:resource ' . 'Collection/' . $name . 'Collection');
    }

    /**
     *
     * Make API Resourceful Controller
     *
     */
    protected static function makeRestAPIController($name)
    {
        $lowername = strtolower($name);
        if (!file_exists($path = app_path('Http/Controllers/Admin/API/Restful'))) {
            mkdir($path, 0777, true);
        }

        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            self::getStub('RestAPIController')
        );
        file_put_contents(app_path("/Http/Controllers/Admin/API/Restful/{$name}ApiController.php"), $controllerTemplate);
    }

    /**
     *
     * Make API Resourceful Controller
     *
     */
    protected static function makeAPIController($name)
    {
        $lowername = strtolower($name);
        if (!file_exists($path = app_path('Http/Controllers/Admin/API'))) {
            mkdir($path, 0777, true);
        }
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}'
            ],
            [
                $name,
                strtolower(Str::plural($name)),
                strtolower($name)
            ],
            self::getStub('APIController')
        );
        file_put_contents(app_path("/Http/Controllers/Admin/API/{$name}ApiController.php"), $controllerTemplate);
    }
}
