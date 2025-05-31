    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container top-bar-container">
            <div class="top-bar-contacts">
                <a href="tel:+971542529414" class="top-bar-link">
                    <i class="fas fa-phone-alt"></i> +971 54 252 9414
                </a>
                <a href="mailto:info@thirdpartysafety.com" class="top-bar-link">
                    <i class="fas fa-envelope"></i> info@thirdpartysafety.com
                </a>
                <span class="top-bar-link">
                    <i class="fas fa-map-marker-alt"></i> Office 13-67, Leader Building
                </span>
            </div>
            <div class="top-bar-social">
                <a href="[FACEBOOK_URL]" target="_blank" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="[TWITTER_URL]" target="_blank" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="[INSTAGRAM_URL]" target="_blank" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="[LINKEDIN_URL]" target="_blank" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
    
    
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <img src="{{ asset('img/logo.jpeg') }}" alt="Third Party Safety Consultancy Logo">
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </button>
            <nav id="mainNav">
                <ul class="space-top">
                    <li><a href="/">Home</a></li>
                    <li><a href="/services">Services</a></li>
					<li><a href="/trainings">Trainings</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                    @if(auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-regular fa-user"></i> Account</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signin') }}">Sign In</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>