<x-guest-layout>
    <style>
        /* Form Styling */
        .login-container {
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        
        .form-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group .form-label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .btn-primary {
            background-color: #4a76a8;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #356693;
        }

        .underline-link:hover {
            text-decoration: underline;
        }

        .form-helper {
            font-size: 14px;
            margin-top: 8px;
        }

        .form-icon {
            color: #4a76a8;
        }

        /* Animation */
        .input-focused {
            box-shadow: 0 0 0 0.25rem rgba(58, 132, 255, 0.25);
        }

        .btn-google {
            background-color: #db4437;
            color: white;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .btn-google:hover {
            background-color: #c33d2f;
        }
    </style>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 login-container">
            <div style="text-align: center;"><span>Login to Nilam</span></div>
            
            <h2 class="form-title">Login to Your Account</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text form-icon"><i class="fas fa-envelope"></i></span>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="Enter your email" />
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text form-icon"><i class="fas fa-lock"></i></span>
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-group mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none underline-link" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary px-4">Login</button>
                </div>
            </form>

            <!-- Google Login Button -->
            <div class="text-center mt-4">
                <a href="{{ route('auth.google') }}" class="btn btn-google w-100">
                    <i class="fab fa-google me-2"></i> {{ __('Login with Google') }}
                </a>
            </div>

            <div class="text-center mt-4">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none underline-link">Register</a></p>
            </div>
        </div>
    </div>

    <!-- Include FontAwesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</x-guest-layout>
