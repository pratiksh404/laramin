<?php

namespace Pratiksh\Laramin\Traits;

use Pratiksh\Laramin\Models\Role;
use Pratiksh\Laramin\Models\Profile;

trait HasRole
{
    // User Belongs To Many Roles
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimeStamps();
    }
    // Check is user has given role
    public function hasRole($role)
    {
        return $this->roles()->where('name', trim($role))->count() == 1;
    }

    // Check if user is superadmin
    public function isSuperAdmin()
    {
        $superuser = Role::where('name', 'superadmin')->first();
        if ($superuser) {
            return $superuser->users->contains($this);
        } else {
            return false;
        }
    }

    // Check BREAD Access
    public function userCanDo($model, $bread)
    {
        /*   $permissions = $this->permissions->whereIn('role_id', $this->roles->pluck('id')->toArray())->where('model', trim($model))->get([$bread]); */
        $can = array();
        foreach ($this->roles as $role) {
            $permissions = $role->permissions->whereIn('role_id', $role->id)->whereIn('model', trim($model))->pluck([$bread]);
            if ($permissions) {
                foreach ($permissions as $permission) {
                    $can[] = $permission;
                }
            }
        }
        return in_array(1, $can);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
