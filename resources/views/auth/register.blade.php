<x-guest-layout>
    <style>
        /* Form Styling */
        .register-container {
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
            width:fit-content;
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
    </style>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 register-container">
            <div style="text-align: center;"><span>Nilam Registration Page</span></div>
            
            <h2 class="form-title">Create Your Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text form-icon"><i class="fas fa-user"></i></span>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your full name" />
                    </div>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Username -->
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text form-icon"><i class="fas fa-user-tag"></i></span>
                        <input id="username" class="form-control @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required placeholder="Choose a username" />
                    </div>
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text form-icon"><i class="fas fa-envelope"></i></span>
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email" />
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
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="Choose a password" />
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text form-icon"><i class="fas fa-lock"></i></span>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter your password" />
                    </div>
                </div>
                
                <input type="hidden" name="role" value="3">

                <div class="d-flex justify-content-between mt-4">
                    <a class="text-decoration-none underline-link" href="{{ route('login') }}">Already registered?</a>
                    <button type="submit" class="btn btn-primary px-4">Register</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include FontAwesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</x-guest-layout>
