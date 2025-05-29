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

    <!-- Sign Up Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <h2>Create Your Account</h2>
                <p class="auth-subtitle">Join our safety consultancy platform</p>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="auth-errors">
                        @foreach($errors->all() as $error)
                        <p><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                
                <form action="{{ route('signup') }}" method="POST" class="auth-form">
                    @csrf
                    
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
                        <i class="fas fa-phone input-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Create a password" required>
                        <i class="fas fa-lock input-icon"></i>
                        <span class="toggle-password" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                        <i class="fas fa-lock input-icon"></i>
                        <span class="toggle-password" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    
                    <button type="submit" class="btn auth-btn">Sign Up</button>
                    
                    <p class="auth-footer">Already have an account? <a href="{{ route('signin') }}">Sign in</a></p>
                </form>
            </div>
            
            <div class="auth-hero">
                <div class="auth-hero-content">
                    <h3>Why Join Us?</h3>
                    <p>Access comprehensive safety services and training programs designed for your needs.</p>
                    <div class="auth-features">
                        <div class="feature">
                            <i class="fas fa-certificate"></i>
                            <span>Get certified in safety standards</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-file-alt"></i>
                            <span>Manage your inspection reports</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-bell"></i>
                            <span>Receive important safety alerts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include ('pages/footer')

</body>
</html>
