<?php

namespace Pratiksh\Laramin\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Pratiksh\Laramin\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Pratiksh\Laramin\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->authorizeResource(User::class, 'user');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laramin::admin.user.index', $this->userRepositoryInterface->userIndex());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laramin::admin.user.create', $this->userRepositoryInterface->userCreate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Pratiksh\Laramin\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->userRepositoryInterface->userStore($request);
        return redirect(adminRedirectRoute('user'))->withSuccess('User Created Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('laramin::admin.user.show', $this->userRepositoryInterface->userShow($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('laramin::admin.user.edit', $this->userRepositoryInterface->userEdit($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Laramin\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->userRepositoryInterface->userUpdate($request, $user);
        return request()->has('from_profile') ? redirect(adminEditRoute('profile', $user->profile->id))->withInfo('User Updated Sucessfully') : redirect(adminRedirectRoute('user'))->withInfo('User Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userRepositoryInterface->userDestroy($user);
        return redirect(adminRedirectRoute('user'))->withFail('User Deleted Sucessfully');
    }
}
