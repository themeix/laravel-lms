@extends('layouts.app')

@section('content')





    <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
    <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="auth-forgot-password-form mt-2" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-1">
            <label for="forgot-password-email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1" autocomplete="email" required autofocus />

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary w-100" tabindex="2">Send Password Reset Link</button>
    </form>

    <p class="text-center mt-2">
        <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login </a>
    </p>


@endsection
