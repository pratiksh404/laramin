<?php

namespace Pratiksh\Laramin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Pratiksh\Laramin\Models\Profile;
use Pratiksh\Laramin\Http\Requests\ProfileRequest;
use Pratiksh\Laramin\Contracts\ProfileRepositoryInterface;

class ProfileController extends Controller
{
    protected $profileRepositoryInterface;

    public function __construct(ProfileRepositoryInterface $profileRepositoryInterface)
    {
        $this->profileRepositoryInterface = $profileRepositoryInterface;
    }


    /**
     * Display the specified resource.
     *
     * @param  \Pratiksh\Laramin\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('laramin::admin.user.show', $this->profileRepositoryInterface->showProfile($profile));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pratiksh\Laramin\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('laramin::admin.profile.edit', $this->profileRepositoryInterface->editProfile($profile));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Laramin\Http\Requests\ProfileRequest  $request
     * @param  \Pratiksh\Laramin\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $this->profileRepositoryInterface->updateProfile($request, $profile);
        return redirect(adminEditRoute('profile', $profile->id))->withInfo('Profile Updated Sucessfully');
    }
}
