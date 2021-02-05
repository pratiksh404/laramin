<?php

namespace Pratiksh\Laramin\Repository;

use App\Models\User;
use Pratiksh\Laramin\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Pratiksh\Laramin\Http\Requests\UserRequest;
use Pratiksh\Laramin\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    // User Index
    public function userIndex()
    {
        $users = config('coderz.caching', true)
            ? (Cache::has('users') ? Cache::get('users') : Cache::rememberForever('users', function () {
                return User::all();
            }))
            : User::all();

        $roles = Cache::get('roles', Role::all(['id', 'name']));

        return compact('users', 'roles');
    }

    // User Create
    public function userCreate()
    {
        $roles = Cache::get('roles', Role::all(['id', 'name']));
        return compact('roles');
    }

    // User Store
    public function userStore(UserRequest $request)
    {
        // Validating Request
        $request->validated();
        // Creating User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // Asigning Role
        $this->assignRole($user);
        // Creating Profile
        $user->profile()->create();
    }

    // User Show
    public function userShow(User $user)
    {
        return compact('user');
    }

    // User Edit
    public function userEdit(User $user)
    {
        $roles = Cache::get('roles', Role::all(['id', 'name']));
        return compact('user', 'roles');
    }

    public function userUpdate(UserRequest $request, User $user)
    {
        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $user->password
            ]);
        }
        $this->syncRole($user);
    }

    public function userDestroy(User $user)
    {
        // Deleting Profile
        $user->profile()->delete();
        // Deleting Attached Role
        $user->roles()->detach();
        $user->delete();
    }

    public function userEditRoute($user)
    {
        if (Auth::user()->id == $user->id) {
            return view('admin.profile.edit', compact('user'));
        } else {
            return view('admin.user.edit', $this->userEdit($user));
        }
    }

    public function assignRole($user)
    {
        if (request()->role) {
            $user->roles()->attach(request()->role);
        }
    }

    public function syncRole($user)
    {
        if (request()->role) {
            $role = Role::where('id', request()->role)->first();
            $user->roles()->sync($role);
        }
    }
}
