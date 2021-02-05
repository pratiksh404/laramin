@extends('laramin::admin.auth.layouts.app')
@section('content')
<section class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <img src="{{asset('laramin/'.config('coderz.login_logo','static/techcoderzlogin.png'))}}"
                            alt="branding logo" class="img-fluid">
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Create
                            Account</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="form-horizontal form-simple">
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="text" name="name" class="form-control form-control-lg" id="user-name"
                                    value="{{old('name')}}" placeholder="User Name" autocomplete="name" required>
                                <div class="form-control-position">
                                    <i class="feather icon-user"></i>
                                </div>
                            </fieldset>
                            @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                <input type="email" name="email" class="form-control form-control-lg" id="user-email"
                                    value="{{old('email')}}" placeholder="Your Email Address" autocomplete="email"
                                    required>
                                <div class="form-control-position">
                                    <i class="feather icon-mail"></i>
                                </div>
                            </fieldset>
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    id="user-password" placeholder="Enter Password" autocomplete="new-password"
                                    required>
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                    id="password-confirm" placeholder="Enter Password Confirmation"
                                    autocomplete="new-password" required>
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                    class="feather icon-unlock"></i> {{ __('Register') }}</button>
                        </form>
                    </div>
                    <p class="text-center">Already have an account ? <a href="{{route('login')}}"
                            class="card-link">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection