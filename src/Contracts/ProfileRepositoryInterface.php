<?php

namespace Pratiksh\Laramin\Contracts;

use Pratiksh\Laramin\Models\Profile;
use Pratiksh\Laramin\Http\Requests\ProfileRequest;

interface ProfileRepositoryInterface
{
    public function showProfile(Profile $profile);

    public function editProfile(Profile $profile);

    public function updateProfile(ProfileRequest $request, Profile $profile);
}
