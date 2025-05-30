<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Third Party Safety Consultancy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}">
</head>
<body>

    @include('pages.header')

    <section class="about-section">
        <div class="container">
            <h2>About Us</h2>
            <div class="about-content">
                <p>
                    We are a leading third-party safety consultancy specializing in Occupational Health & Safety Services. Our goal is to help businesses and industries achieve the highest standards of safety compliance and risk management.
                </p>
                <p>
                    With a team of certified professionals, we provide training, safety audits, risk assessments, and personalized consultancy tailored to the unique needs of our clients.
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-box">
                    <i class="fas fa-hard-hat"></i>
                    <h4>Certified Experts</h4>
                    <p>Our team consists of qualified safety professionals and certified trainers.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Risk Assessment</h4>
                    <p>Comprehensive analysis of safety risks and practical mitigation plans.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <h4>Professional Training</h4>
                    <p>Interactive and impactful training sessions for all staff levels.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-users-cog"></i>
                    <h4>Customized Solutions</h4>
                    <p>Every business is different. We adapt our approach to your operations.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="container">
            <h2 style="text-align: center;">Our Team</h2>
            <div class="features-grid">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?crop=faces&fit=crop&w=200&h=200" alt="Team Member">
                    <h5>Awais Juno</h5>
                    <p>Safety Consultant & Lead Trainer</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?crop=faces&fit=crop&w=200&h=200" alt="Team Member">
                    <h5>Irshad Ali</h5>
                    <p>Health Inspector & Audit Expert</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?crop=faces&fit=crop&w=200&h=200" alt="Team Member">
                    <h5>Sana Khan</h5>
                    <p>Training Coordinator</p>
                </div>
            </div>
        </div>
    </section>


    @include('pages.footer')

</body>
</html>
