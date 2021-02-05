<?php

namespace Pratiksh\Laramin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        // Assigning Default Role to New User
        $role = Role::where('name', 'user')->first();
        if ($role) {
            $user->roles()->attach($role);
        } else {
            $default_user_role = config('coderz.default_user_role', 'user');
            $default_user_role_level = config('coderz.default_user_role_level', 1);
            Role::create([
                'name' => $default_user_role,
                'description' => 'Default role for newly registered user.',
                'level' => $default_user_role_level
            ]);
        }
        // Creating Profile
        $user->profile()->create();
        return $user;
    }

    // Overriding the default Register view

    /**
     * Show the application's Register form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view(config('laramin.register_view', 'laramin::admin.auth.register'));
    }
}
