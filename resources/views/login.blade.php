@extends('layouts.auth')

@section('title', 'JNL System')
@section('card_title', 'Login')
@section('card_sub', 'Welcome back')

@section('card_body')

    @if($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input id="user_id" name="user_id" class="form-control" inputmode="numeric" pattern="\d*" maxlength="12"
                placeholder="Enter your ID" autocomplete="username" required value="{{ old('user_id') }}">
        </div>

        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>

            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control password-field"
                    placeholder="Enter your password" required>

                <button type="button" class="btn btn-outline-light toggle-password" data-target="password">
                    👁️
                </button>
            </div>
        </div>


        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        <p class="mb-1 text-muted">Don't have an account?</p>
        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
    </div>

@endsection