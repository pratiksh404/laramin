<div class="form-body">
    <h4 class="form-section"><i class="feather icon-user"></i>Account Registration</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input type="text" id="name" class="form-control" value="{{$user->name ?? old('name')}}"
                    placeholder="Name" name="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email<span class="text-danger">*</span></label>
                <input type="email" id="email" class="form-control" value="{{$user->email ?? old('email')}}"
                    placeholder="Email" name="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Password<span class="text-danger">*</span></label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Confirm Password<span class="text-danger">*</span></label>
                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password"
                    name="password_confirmation">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="role">Role<span class="text-danger">*</span></label>
            <select name="role[]" id="role" class="form-control select2" multiple>
                @if (isset($roles))
                @foreach ($roles as $role)
                @if ($role->name != 'superadmin')
                <option value="{{$role->id}}"
                    {{isset($user) ? ($user->roles ? (in_array($role->id,$user->roles->pluck('id')->toArray()) ? 'selected' : '') : '') : ''}}>
                    {{$role->name}}</option>
                @endif
                @endforeach
                @endif
            </select>
        </div>
        <div class="col-md-6">
            <label for="designation_id">Designation<span class="text-danger">*</span></label>
            <select name="designation_id" id="designation_id" class="form-control select2">
                <option selected disabled>Select Designation..</option>
                @if (isset($designations))
                @foreach ($designations as $designation)
                <option value="{{$designation->id}}">{{$designation->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<hr>
<input type="submit" value="{{isset($user) ? 'Edit User' : 'Create User'}}"
    class="btn btn-{{isset($user) ? 'warning' : 'primary'}}">
</div>