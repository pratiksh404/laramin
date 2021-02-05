<div class="form-body">
    <h4 class="form-section"><i class="feather icon-user"></i>Account Registration</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" value="{{$profile->user->name ?? old('name')}}"
                    placeholder="Name" name="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" value="{{$profile->user->email ?? old('email')}}"
                    placeholder="Email" name="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password"
                    name="password_confirmation">
            </div>
        </div>
    </div>
    <hr>
    <input type="submit" class="btn btn-warning" value="Edit Account">
</div>