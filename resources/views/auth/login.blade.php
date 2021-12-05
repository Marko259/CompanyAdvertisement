@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="row merged">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="land-featurearea">
                <div class="land-meta">
                    <h1>Winku</h1>
                    <p>
                        Winku is free to use for as long as you want with two active projects.
                    </p>
                    <div class="friend-logo">
                        <span><img src="images/wink.png" alt=""></span>
                    </div>
                    <a href="#" title="" class="folow-me">Follow Us on</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="login-reg-bg">
                <div class="log-reg-area sign">
                    <h2 class="log-title">Login</h2>
                    <p>
                        Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
                    </p>
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="input" required="required" />
                            <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" required="required" />
                            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked="checked" /><i class="check-box"></i>Always Remember
                                Me.
                            </label>
                        </div>
                        <a href="#" title="" class="forgot-pwd">Forgot Password?</a>
                        <div class="submit-btns">
                            <button class="mtr-btn signin" type="submit"><span>Login</span></button>
                            <button class="mtr-btn signup" type="button"><a href="{{ route('register') }}">Register</a></button>
                        </div>
                    </form>
                </div>
                <div class="log-reg-area reg">
                    <h2 class="log-title">Register</h2>
                    <p>
                        Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
                    </p>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" required="required" />
                            <label class="control-label" for="input">First & Last Name</label><i
                                class="mtrl-select"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" />
                            <label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" required="required" />
                            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-radio">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio" checked="checked" /><i class="check-box"></i>Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio" /><i class="check-box"></i>Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" />
                            <label class="control-label" for="input"><a
                                    href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="6c29010d05002c">[email&#160;protected]</a></label><i
                                class="mtrl-select"></i>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked="checked" /><i class="check-box"></i>Accept Terms &
                                Conditions ?
                            </label>
                        </div>
                        <a href="#" title="" class="already-have">Already have an account</a>
                        <div class="submit-btns">
                            <button class="mtr-btn signup" type="button"><span>Register</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src=" {{ asset('js/vendor.js') }} "></script>
    <script src="{{ asset('js/backgroundVideo.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
