@extends('laramin::admin.auth.layouts.app')
@section('content')
<section class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                    <div class="card-title text-center">
                        @if (isset($setting->logo))
                        <img src="{{asset('laramin/'.$setting->logo)}}" alt="branding logo" class="img-fluid">
                        @else
                        <img src="{{asset('laramin/'.config('coderz.login_logo','static/techcoderzlogin.png'))}}"
                            alt="branding logo" class="img-fluid">
                        @endif
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>We will send
                            you a link to reset password.</span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="email" name="email" class="form-control form-control-lg" id="user-email"
                                    placeholder="Your Email Address" required>
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="feather icon-mail"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i
                                    class="feather icon-unlock"></i> Recover Password</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer border-0">
                    <p class="float-sm-left text-center"><a href="{{route('login')}}" class="card-link">Login</a></p>
                    {{--   <p class="float-sm-right text-center">New Member ? <a href="{{route('register')}}"
                    class="card-link">Create Account</a></p> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection