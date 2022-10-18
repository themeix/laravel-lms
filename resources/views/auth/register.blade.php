@extends('layouts.app')

@section('content')

    <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
    <p class="card-text mb-2">Make your Learning easy and fun!</p>

    <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-1">
            <label for="register-username" class="form-label">Name</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                placeholder="Enter your name"
                aria-describedby="register-username"
                tabindex="1"
                value="{{ old('name') }}" required autocomplete="name"
                autofocus
            />


            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="mb-1">
            <label for="register-email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email" value="{{ old('email') }}" required autocomplete="email"
                placeholder="Enter Your email"
                aria-describedby="register-email"
                tabindex="2"
            />

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>




        <div class="mb-1">
            <label for="register-phone" class="form-label">Phone (With Country Code)</label>
            <input
                type="number"
                class="form-control @error('phone_number') is-invalid @enderror"
                id="phone_number"
                name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number"
                placeholder="+12025550179"
                aria-describedby="register-phone"
                tabindex="2"
            />

            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>







        <div class="mb-1">
            <label for="register-password" class="form-label">Password</label>

            <div class="input-group input-group-merge form-password-toggle">
                <input
                    type="password"
                    class="form-control form-control-merge @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="register-password"
                    required autocomplete="new-password"
                    tabindex="3"
                />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>


        <div class="mb-1">
            <label for="password-confirm" class="form-label">Confirm Password</label>


            <div class="input-group input-group-merge form-password-toggle">
                <input
                    type="password"
                    class="form-control form-control-merge @error('password') is-invalid @enderror"
                    id="password-confirm"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="register-password"
                    required autocomplete="new-password"
                    tabindex="3"
                />
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
            </div>
        </div>


        {{--<div class="mb-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="register-privacy-policy" tabindex="4" />
                <label class="form-check-label" for="register-privacy-policy">
                    I agree to <a href="#">privacy policy & terms</a>
                </label>
            </div>
        </div>--}}
        <button type="submit" class="btn btn-primary w-100" tabindex="5">Sign up</button>
    </form>

    <p class="text-center mt-2">
        <span>Already have an account?</span>
        <a href="{{ route('login') }}">
            <span>Sign in instead</span>
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
