@extends('layouts.app')

@section('content')

    <h4 class="card-title mb-1">Welcome to Learn LMS! 👋</h4>
    <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

    <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-1">
            <label for="login-email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" value="{{ old('email') }}" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus required/>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

        </div>

        <div class="mb-1">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="login-password">Password</label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        <small>Forgot Password?</small>
                    </a>
                @endif

            </div>
            <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge  @error('password') is-invalid @enderror" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password"  required autocomplete="current-password"/>
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>



        <div class="mb-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" tabindex="3"  {{ old('remember') ? 'checked' : '' }}/>
                <label class="form-check-label" for="remember"> Remember Me </label>
            </div>
        </div>
        <button class="btn btn-primary w-100" type="submit" tabindex="4">Sign in</button>
    </form>

    <p class="text-center mt-2">
        <span>New on our platform?</span>
        <a href="auth-register-basic.html">
            <span>Create an account</span>
        </a>
    </p>

    <div class="divider my-2">
        <div class="divider-text">or</div>
    </div>

    <div class="auth-footer-btn d-flex justify-content-center">
        <a href="#" class="btn btn-facebook">
            <i data-feather="facebook"></i>
        </a>
        <a href="#" class="btn btn-twitter white">
            <i data-feather="twitter"></i>
        </a>
        <a href="#" class="btn btn-google">
            <i data-feather="mail"></i>
        </a>
        <a href="#" class="btn btn-github">
            <i data-feather="github"></i>
        </a>
    </div>

@endsection
