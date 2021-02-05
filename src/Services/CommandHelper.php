<?php

namespace Pratiksh\Laramin\Services;

class CommandHelper
{
    protected static function getStub($type)
    {
        return file_get_contents(stub("$type.stub"));
    }

    protected static function checkHttpAdminFolder(): void
    {
        if (!file_exists($path = app_path("/Http/Controllers/Admin"))) {
            mkdir($path, 0777, true);
        }
    }

    protected static function checkModelAdminFolder(): void
    {
        if (!file_exists($path = app_path("/Models/Admin"))) {
            mkdir($path, 0777, true);
        }
    }
}
