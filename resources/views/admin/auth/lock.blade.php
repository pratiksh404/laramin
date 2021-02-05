@extends('laramin::admin.auth.layouts.app')
@section('content')
<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 text-center">
                    <img src="{{$profile_img ?? asset('laramin/static/profile.png')}}" width="110" height="110"
                        alt="unlock-user" class="rounded-circle img-fluid center-block">
                    <h5 class="card-title mt-1">{{$name ?? 'User'}}</h5>
                </div>

                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2"><span>Unlock your
                        account</span></p>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="email" name="email" class="form-control form-control-lg" id="email"
                                    value="{{$email ?? ''}}" placeholder="{{ __('E-Mail Address') }}" readonly required>
                                <div class="form-control-position">
                                    <i class="feather icon-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" name="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="user-password" placeholder="{{ __('Password') }}" required
                                    autocomplete="current-password">
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group row">
                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                    <fieldset>
                                        <input type="checkbox" name="remember" id="remember-me" class="chk-remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right">
                                    <a href="{{ route('password.request') }}" class="card-link">Forgot
                                        Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i
                                    class="icon-lock4"></i> Unlock</button>

                            <a class="btn btn-outline-danger btn-lg btn-block" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="feather icon-power"></i>{{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                {{-- =================================END LOGOUT================================= --}}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection