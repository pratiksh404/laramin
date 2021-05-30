<?php

namespace App\Services;

use App\Models\User;
use App\Models\Admin\Role;

class MakeSuperAdmin
{
    public static function checkAuthorization($authorization_password)
    {
        return trim($authorization_password) == 'makemesuper';
    }

    public static function make($name, $email, $password)
    {
        $user = User::create([
            'name' => trim($name),
            'email' => trim($email),
            'password' => bcrypt($password)
        ]);

        $role = Role::where('name', 'superadmin')->exists()
            ? Role::where('name', 'superadmin')->first()
            : $role = Role::create([
                'name' => 'superadmin',
                'description' => 'This is super admin. This role has authority over everything in this application.',
                'level' => 6
            ]);
        $user->roles()->attach($role);
        $user->profile()->create();
    }
}
