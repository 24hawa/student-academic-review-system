@extends('layouts.guest')

@section('title', 'Login | Student Academic Review System')

@section('content')
<div class="auth-card">

    {{-- Left: brand panel --}}
    <section class="auth-brand">
        <svg class="auth-brand__icon" viewBox="0 0 64 64" fill="none" stroke="#fff" stroke-width="3" stroke-linejoin="round" stroke-linecap="round" aria-hidden="true">
            <path d="M32 12 6 24l26 12 26-12-26-12Z"/>
            <path d="M16 30v12c0 4 7 8 16 8s16-4 16-8V30"/>
            <path d="M58 24v16"/>
        </svg>

        <h1 class="auth-brand__title">Student Academic<br>Review System</h1>
        <p class="auth-brand__tagline">Submit and manage your academic review requests easily.</p>

        {{-- Simple illustration: laptop with checklist --}}
        <svg class="auth-brand__art" viewBox="0 0 280 170" fill="none" aria-hidden="true">
            <rect x="70" y="20" width="150" height="100" rx="8" fill="#ede7fb"/>
            <rect x="82" y="32" width="126" height="76" rx="4" fill="#fff"/>
            <g fill="#9a7be6">
                <rect x="94" y="46" width="12" height="12" rx="3"/>
                <rect x="94" y="68" width="12" height="12" rx="3"/>
                <rect x="94" y="90" width="12" height="12" rx="3"/>
            </g>
            <g fill="#cfc3f2">
                <rect x="114" y="49" width="60" height="6" rx="3"/>
                <rect x="114" y="71" width="72" height="6" rx="3"/>
                <rect x="114" y="93" width="48" height="6" rx="3"/>
            </g>
            <rect x="178" y="42" width="22" height="22" rx="5" fill="#6d3bd0"/>
            <path d="m183 53 4 4 8-8" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M52 128h176l-10 14H62l-10-14Z" fill="#ede7fb"/>
            <rect x="30" y="142" width="130" height="14" rx="3" fill="#8f6be0"/>
            <rect x="24" y="156" width="140" height="12" rx="3" fill="#6d3bd0"/>
            <path d="M40 142 90 124l50 18-50 18-50-18Z" fill="#2b1a55"/>
            <path d="M140 142v14" stroke="#f5b942" stroke-width="3" stroke-linecap="round"/>
        </svg>
    </section>

    {{-- Right: login form --}}
    <section class="auth-form-panel">
        <div class="auth-form-panel__badge">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="9" cy="8" r="3.5"/>
                <path d="M2.5 20c0-3.6 2.9-6 6.5-6s6.5 2.4 6.5 6"/>
                <path d="M16 4.6a3.5 3.5 0 0 1 0 6.8M18 14.4c2 .7 3.5 2.5 3.5 5.6"/>
            </svg>
        </div>

        <h2 class="auth-form-panel__title">Login</h2>
        <p class="auth-form-panel__subtitle">Access your account</p>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        {{-- Form action points to the login route; the login logic is added in Iteration 1 (FR1) --}}
        <form method="POST" action="{{ route('login.attempt') }}" novalidate>
            @csrf

            <div class="form-group">
                <div class="input-wrap @error('email') has-error @enderror">
                    <svg class="input-wrap__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <path d="m3.5 7 8.5 6 8.5-6"/>
                    </svg>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" required autofocus>
                </div>
                @error('email')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="input-wrap @error('password') has-error @enderror">
                    <svg class="input-wrap__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="4" y="10" width="16" height="11" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                    </svg>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="current-password" required>
                    <button type="button" class="input-wrap__toggle" id="togglePassword" aria-label="Show or hide password">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="field-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <label class="checkbox">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="#" class="link">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 17l5-5-5-5M15 12H3M15 4h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-4"/>
                </svg>
                Login
            </button>

            <div class="divider">OR</div>

            <a href="#" class="btn btn-outline">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="9" cy="8" r="3.5"/>
                    <path d="M2.5 20c0-3.6 2.9-6 6.5-6s6.5 2.4 6.5 6M19 8v6M16 11h6"/>
                </svg>
                Create New Account (Student)
            </a>
        </form>
    </section>

</div>
@endsection

@push('scripts')
<script>
    // Show / hide password
    document.getElementById('togglePassword').addEventListener('click', function () {
        var input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    });
</script>
@endpush
