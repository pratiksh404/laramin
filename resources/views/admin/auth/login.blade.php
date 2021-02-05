@extends('laramin::admin.auth.layouts.app')
@section('content')
<section class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1">
                            @if (isset($setting->logo))
                            <img src="{{asset('laramin/'.$setting->logo)}}" alt="branding logo" class="img-fluid">
                            @else
                            <img src="{{asset('laramin/'.config('coderz.login_logo','static/techcoderzlogin.png'))}}"
                                alt="branding logo" class="img-fluid">
                            @endif
                        </div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                        <span>Login</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal form-simple" method="POST" action="{{ route('login') }}">
                            @csrf

                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="email" name="email" class="form-control form-control-lg" id="email"
                                    placeholder="{{ __('E-Mail Address') }}" required>
                                <div class="form-control-position">
                                    <i class="feather icon-user"></i>
                                </div>
                            </fieldset>
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

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
                                <div class="col-sm-6 col-12 text-center text-sm-left">
                                    <fieldset>
                                        <input type="checkbox" name="remember" id="remember-me" class="chk-remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12 text-center text-sm-right"><a
                                        href="{{ route('password.request') }}" class="card-link">Forgot
                                        Password?</a></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                    class="feather icon-unlock"></i> Login</button>
                        </form>
                    </div>
                </div>
                {{--               <div class="card-footer">
                    <div class="">
                        <p class="float-sm-right text-center m-0">New Member? <a href="{{route('register')}}"
                class="card-link">Sign Up</a></p>
            </div>
        </div> --}}
    </div>
    </div>
    </div>
</section>
@endsection