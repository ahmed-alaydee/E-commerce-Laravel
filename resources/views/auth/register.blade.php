@extends('layouts.base')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg w-100 border-0" style="max-width: 400px; background: #fff;">
        <div class="card-body">
            <h2 class="text-center" style="color: #e87316;">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- حقل الاسم -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input id="name" type="text" 
                           class="form-control rounded-pill @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" 
                           required autocomplete="name" autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- حقل البريد الإلكتروني -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input id="email" type="email" 
                           class="form-control rounded-pill @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" 
                           required autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- حقل كلمة المرور -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input id="password" type="password" 
                           class="form-control rounded-pill @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- حقل تأكيد كلمة المرور -->
                <div class="mb-3">
                    <label for="password-confirm" class="form-label fw-bold">Confirm Password</label>
                    <input id="password-confirm" type="password" 
                           class="form-control rounded-pill" 
                           name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- زر التسجيل -->
                <div class="d-grid">
                    <button type="submit" class="btn rounded-pill" style="background: #e87316; color: white;">
                        Sign Up
                    </button>
                </div>

                <!-- تسجيل الدخول -->
                <p class="text-center mt-3">
                    Already have an account? 
                    <a href="{{route('login')}}" class="text-decoration-none fw-bold" style="color: #e87316;">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>

@endsection

{{-- 
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

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
</div>  --}}