<?php

namespace App\Services;

use App\Models\Admin\Role;
use Illuminate\Support\Str;
use App\Models\Admin\Permission;

class MakePermission
{
    protected static function getStub($type)
    {
        return file_get_contents(app_path("Console/Commands/admin_stubs/$type.stub"));
    }

    public static function makePermission($name, $role, $for_all, $only_flags = false)
    {
        self::addToDB($name, $role, $for_all);
        self::makePolicy($name, $only_flags);
    }

    // Add Permission Flags to DB
    protected static function addToDB($name, $role, $for_all)
    {
        // Permission for model existence check
        $permissions = Permission::all(['id', 'model']);
        foreach ($permissions as $permission) {
            if ($permission->name == $name) {
                break;
                return false;
            }
        }

        if ($for_all) {
            $roles = Role::all();
            foreach ($roles as $r) {
                Permission::create([
                    'browse' => 1,
                    'read' => 1,
                    'edit' => 1,
                    'add' => 1,
                    'delete' => 1,
                    'role_id' => $r->id,
                    'model' => $name
                ]);
            }
        } else {
            Permission::create([
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'role_id' => $role,
                'model' => $name
            ]);
        }
    }

    // Make a Policy
    protected static function makePolicy($name, $only_flags)
    {
        if (trim($name) != "User" || trim($name) != "user" || !$only_flags) {
            $policyTemplate = str_replace(
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
                self::getStub('Policy')
            );
            file_put_contents(app_path("/Policies/{$name}Policy.php"), $policyTemplate);
        }
    }
}
