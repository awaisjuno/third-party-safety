<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Party Safety Consultancy | Occupational Health & Safety Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>

    @include ('pages/header')

    <!-- Sign In Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <h2>Sign In to Your Account</h2>
                <p class="auth-subtitle">Access your dashboard and manage your safety services</p>
                
                {{-- Laravel Form Start --}}
                <form class="auth-form" action="{{ route('signin') }}" method="POST">
                    @csrf

                    @if($errors->any())
                        <div class="auth-errors">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="Enter your email" value="{{ old('email') }}">
                        <i class="fas fa-envelope input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Enter your password">
                        <i class="fas fa-lock input-icon"></i>
                        <span class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn auth-btn">Sign In</button>

                    <p class="auth-footer">Don't have an account? <a href="{{ route('signup') }}">Sign up</a></p>
                </form>
                {{-- Laravel Form End --}}
            </div>

            <div class="auth-hero">
                <div class="auth-hero-content">
                    <h3>Safety First, Always</h3>
                    <p>Access your safety training records, inspection reports, and compliance documents all in one place.</p>
                    <div class="auth-features">
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <span>Track your safety compliance</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-certificate"></i>
                            <span>Manage your certifications</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-chart-line"></i>
                            <span>View your safety metrics</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include ('pages/footer')

</body>
</html>
