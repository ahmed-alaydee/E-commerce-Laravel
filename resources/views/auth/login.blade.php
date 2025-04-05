@extends('layouts.base')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg w-100 border-0" style="max-width: 400px; background: #fff;">
        <div class="card-body">
            <h2 class="text-center" style="color: #e87316;">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- حقل البريد الإلكتروني -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Username</label>
                    <input id="email" type="email" 
                           class="form-control rounded-pill @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" 
                           required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- حقل كلمة المرور -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input id="password" type="password" 
                           class="form-control rounded-pill @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- زر تسجيل الدخول -->
                <div class="d-grid">
                    <button type="submit" class="btn rounded-pill" style="background: #e87316; color: white;">
                        Log In
                    </button>
                </div>

                <!-- رابط التسجيل -->
                <p class="text-center mt-3">
                    Not a member? 
                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #e87316;">Sign up now</a>
                </p>
            </form>
        </div>
    </div>
</div>

@endsection

