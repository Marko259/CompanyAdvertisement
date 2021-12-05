@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
                    <h2 class="log-title">Register</h2>
                    <p>
                        Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
                    </p>
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group form-floating">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="First & Last Name" required autocomplete="name"
                                autofocus />
                            <label class="control-label" for="input">First & Last Name</label><i
                                class="mtrl-select"></i>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-floating">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Email" required autocomplete="email" />
                            <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" required autocomplete="new-password" />
                            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-floating">
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password" required autocomplete="new-password" />
                            <label class="control-label" for="input">Confirm Password</label><i class="mtrl-select"></i>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required /><i class="check-box"></i>Accept Terms &
                                Conditions ?
                            </label>
                        </div>
                        <a href="{{ route('login') }}" title="" class="already-have">Already have an account?</a>
                        <div class="submit-btns">
                            <button class="mtr-btn" type="submit"><span>Register</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
