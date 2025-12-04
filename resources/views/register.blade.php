@extends('layouts.auth')

@section('title', 'JNL System')
@section('card_title', 'Create account')
@section('card_sub', 'Register a new user')

@section('card_body')

    @if($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input id="user_id" name="user_id" class="form-control" inputmode="numeric" pattern="\d*" maxlength="12"
                placeholder="Enter numeric User ID" required value="{{ old('user_id') }}">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last name</label>
            <input id="last_name" name="last_name" class="form-control" placeholder="Enter your last name" required
                value="{{ old('last_name') }}">
        </div>

        <div class="mb-3">
            <label for="first_name" class="form-label">First name</label>
            <input id="first_name" name="first_name" class="form-control" placeholder="Enter your first name" required
                value="{{ old('first_name') }}">
        </div>

        <div class="mb-3">
            <label for="middle_name" class="form-label">Middle name</label>
            <input id="middle_name" name="middle_name" class="form-control" placeholder="Enter your middle name"
                value="{{ old('middle_name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required
                value="{{ old('email') }}">
        </div>

        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>

            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control password-field"
                    placeholder="Choose a password" required>

                <button type="button" class="btn btn-outline-light toggle-password" data-target="password">
                    👁️
                </button>
            </div>
        </div>


        <div class="mb-3 position-relative">
            <label for="password_confirmation" class="form-label">Confirm password</label>

            <div class="input-group">
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control password-field" placeholder="Repeat password" required>

                <button type="button" class="btn btn-outline-light toggle-password" data-target="password_confirmation">
                    👁️
                </button>
            </div>
        </div>


        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>

    <div class="text-center mt-3">
        <p class="mb-1 text-muted">Already have an account?</p>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
    </div>

@endsection