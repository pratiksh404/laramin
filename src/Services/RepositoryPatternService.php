<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class RepositoryPatternService
{
    protected static function getStubs($type)
    {
        return file_get_contents(app_path("Console/Commands/admin_stubs/$type.stub"));
    }

    public static function ImplementNow($name, $makeRequest = false)
    {
        if (!file_exists($repository_path = app_path('/Repositories'))) {
            mkdir($repository_path, 0777, true);
        }
        if (!file_exists($contract_path = app_path('/Contracts'))) {
            mkdir($contract_path, 0777, true);
        }

        self::MakeInterface($name);
        self::MakeRepositoryClass($name);
        if ($makeRequest) {
            self::makeRequest($name);
        }
    }


    protected static function MakeInterface($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNameLowerCase}}',
                '{{modelNamePluralLowerCase}}'
            ],
            [
                $name,
                strtolower($name),
                strtolower(Str::plural($name))
            ],

            self::GetStubs('RepositoryInterface')
        );

        file_put_contents(app_path("/Contracts/{$name}RepositoryInterface.php"), $template);
    }

    protected static function MakeRepositoryClass($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNameLowerCase}}',
                '{{modelNamePluralLowerCase}}'
            ],
            [
                $name,
                strtolower($name),
                strtolower(Str::plural($name))
            ],
            self::GetStubs('Repository')
        );

        file_put_contents(app_path("/Repositories/{$name}Repository.php"), $template);
    }

    protected static function makeRequest($name)
    {
        Artisan::call('make:request ' . $name . 'Request');
    }
}
