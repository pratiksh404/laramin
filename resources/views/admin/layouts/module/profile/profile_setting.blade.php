{{-- User id hidden field --}}
<input type="hidden" name="user_id" value="{{$profile->user->id}}">
{{-- ------------ --}}
<div class="row">
    <div class="col-lg-6">
        <!-- users edit media object start -->
        <div class="media mb-2">
            <a class="mr-2" href="#">
                @if (isset($profile->profile_pic))
                <img src="{{asset($profile->thumbnail('profile_pic','small'))}}"
                    alt="{{$profile->user->name}} view avatar" class="users-avatar-shadow rounded-circle" height="64"
                    width="64" id="avatar">
                @else
                <img src="{{asset('storage/static/profile.png')}}" alt="{{$profile->user->name}} view avatar"
                    class="users-avatar-shadow rounded-circle" id="avatar" height="64" width="64">
                @endif
            </a>
            <div>
                <h4 class="media-heading">Avatar</h4>
                <div class="col-12 px-0 d-flex">
                    <label id="upload" class="btn btn-sm btn-primary mr-25">
                        <div class="btn btn-sm btn-primary mr-25">Change</div>
                        <input type="file" name="profile_pic" id="profile_pic" accept="image/*"
                            onchange="readURL(this);">
                    </label>
                </div>
            </div>
        </div>
        <!-- users edit media object ends -->
    </div>
    <hr>
    {{--     <div class="col-lg-6">
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="username" type="text" value="{{$profile->username ?? old('username')}}">
</div>
</div> --}}
</div>
<!-- users edit Info form start -->
<div class="row">
    <div class="col-12 col-sm-6">
        <h5 class="mb-1"><i class="feather icon-link mr-25"></i>Social Links</h5>
        <div class="form-group">
            <label>Twitter</label>
            <input class="form-control" name="twitter" type="text" value="{{$profile->twitter ?? old('twitter')}}">
        </div>
        <div class="form-group">
            <label>Facebook</label>
            <input class="form-control" name="facebook" type="text" value="{{$profile->facebook ?? old('facebook')}}">
        </div>
        <div class="form-group">
            <label>Instagram</label>
            <input class="form-control" name="instagram" type="text"
                value="{{$profile->instagram ?? old('instagram')}}">
        </div>
        <div class="form-group">
            <label>LinkedIn</label>
            <input class="form-control" name="linkedin" type="text" value="{{$profile->linkedin ?? old('linkedin')}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="form-control" name="email" type="text" value="{{$profile->email ?? old('email')}}">
        </div>

        <hr>

        <h5 class="mb-1"><i class="feather icon-user"></i>Contact</h5>
        <div class="form-group">
            <div class="controls">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
        </div>
        <div class="form-group">
            <select name="phone_no[]" class="tagging form-control" multiple="">
                @if (isset($profile->phone_no))
                @foreach ($profile->phone_no as $phone_no)
                <option value="{{$phone_no}}" selected>{{$phone_no}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>



    <div class="col-12 col-sm-6 mt-1 mt-sm-0">
        <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Personal Info</h5>
        <label>Gender</label>
        <div class="form-group">
            <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" name="gender" class="custom-control-input" name="gender" value="1" id="radio1"
                    {{isset($profile->gender) ? ($profile->gender == 1 ? 'checked' : '') : '' }}>
                <label class="custom-control-label" for="radio1">Male</label>
            </div>
            <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" name="gender" class="custom-control-input" name="gender" value="2" id="radio2"
                    {{isset($profile->gender) ? ($profile->gender == 2 ? 'checked' : '') : '' }}>
                <label class="custom-control-label" for="radio2">Female</label>
            </div>
            <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" name="gender" class="custom-control-input" name="gender" value="3" id="radio3"
                    {{isset($profile->gender) ? ($profile->gender == 3 ? 'checked' : '') : '' }}>
                <label class="custom-control-label" for="radio3">Other</label>
            </div>
        </div>
        <div class="form-group">
            <div class="controls position-relative">
                <label>Birth date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-calendar-o"></span>
                        </span>
                    </div>
                    <input type='text' name="birthday" class="form-control birthday" placeholder="Select Year"
                        value="{{$profile->birthday ?? old('birthday')}}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Country</label><br>
            <select class="form-control select2" name="country" style="width:100%">
                @if (isset($countries))
                @foreach ($countries as $country)
                <option value="{{$country->name}}"
                    {{$profile->country ? ($country->name == $profile->country ? 'selected' : '') : ($country->name == "Nepal" ? 'selected' : '')}}>
                    {{$country->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label>Blood Group</label> <br>
                <div class="input-group">
                    <select class="form-control select2" name="blood_group" style="width:100%">
                        <option selected disabled>Select Blood Group..</option>
                        <option value="1"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 1 ? "selected" : "") : ""}}>A
                        </option>
                        <option value="2"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 2 ? "selected" : "") : ""}}>B
                        </option>
                        <option value="3"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 3 ? "selected" : "") : ""}}>A+
                        </option>
                        <option value="4"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 4 ? "selected" : "") : ""}}>B+
                        </option>
                        <option value="5"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 5 ? "selected" : "") : ""}}>AB
                        </option>
                        <option value="6"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 6 ? "selected" : "") : ""}}>AB+
                        </option>
                        <option value="7"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 7 ? "selected" : "") : ""}}>O+
                        </option>
                        <option value="8"
                            {{isset($profile->blood_group) ? ($profile->blood_group == 8 ? "selected" : "") : ""}}>O-
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Martial Status</label> <br>
                    <select class="form-control select2" name="martial_status" style="width:100%">
                        <option selected disabled>Select Martial Status..</option>
                        <option value="1"
                            {{isset($profile->martial_status) ? ($profile->martial_status == 1 ? "selected" : "") : ""}}>
                            Married
                        </option>
                        <option value="2"
                            {{isset($profile->martial_status) ? ($profile->martial_status == 2 ? "selected" : "") : ""}}>
                            Unmarried</option>
                        <option value="3"
                            {{isset($profile->martial_status) ? ($profile->martial_status == 3 ? "selected" : "") : ""}}>
                            Divorced</option>
                        <option value="4"
                            {{isset($profile->martial_status) ? ($profile->martial_status == 4 ? "selected" : "") : ""}}>
                            Widowed
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <label>Father Name</label>
                <input type="text" name="father_name" class="form-control"
                    value="{{$profile->father_name ?? old('father_name')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <label>Mother Name</label>
                <input type="text" name="mother_name" class="form-control"
                    value="{{$profile->mother_name ?? old('mother_name')}}">
            </div>
        </div>
    </div>

    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
            changes</button>
        <button type="reset" class="btn btn-light">Cancel</button>
    </div>
</div>

<!-- users edit Info form ends -->