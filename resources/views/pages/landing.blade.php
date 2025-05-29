<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safety Services | HSE Audits, Fire Safety & Risk Assessment - Third Party Safety Consultancy</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Meta Description -->
    <meta name="description" content="Explore our third-party safety services including HSE audits, fire safety inspections, workplace risk assessments, and safety training to ensure compliance and employee well-being.">

    <!-- Meta Keywords -->
    <meta name="keywords" content="safety services, third party HSE audits, fire safety inspection, workplace risk assessment, safety training programs, occupational health and safety consultants, compliance solutions, industrial safety audits, risk mitigation services, safety certifications">

    <!-- Open Graph Meta Tags (for social sharing) -->
    <meta property="og:title" content="Expert Safety Services | HSE Audits, Fire Safety, Risk Assessments">
    <meta property="og:description" content="Comprehensive safety solutions including third-party audits, fire safety inspections, and HSE compliance support for your workplace.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>

    @include ('pages/header')

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Your Trusted Partner in Occupational Health & Safety</h1>
            <p>Providing comprehensive safety consultancy, training, and inspection services to ensure your workplace meets all regulatory requirements.</p>
            <a href="/signup" class="btn">Get Started</a>
            <a href="#services" class="white-btn btn-outline">Our Services</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-img">
                        <img src="{{ asset('img/saftly-traning.jpg') }}" alt="Training Services">
                    </div>
                    <div class="service-content">
                        <h3>Safety Training</h3>
                        <p>Comprehensive training programs tailored to your industry needs, ensuring your team is equipped with the latest safety knowledge and practices.</p>
                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img">
                        <img src="{{ asset('img/equipment.jpg') }}" alt="Inspection Services">
                    </div>
                    <div class="service-content">
                        <h3>Equipment Inspection</h3>
                        <p>Thorough inspection of all types of lifting accessories, pressure vessels, and other equipment to ensure compliance and safety.</p>
                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img">
                        <img src="{{ asset('img/safty-con.jpg') }}" alt="Consultancy Services">
                    </div>
                    <div class="service-content">
                        <h3>Safety Consultancy</h3>
                        <p>Expert advice and solutions to help you navigate complex safety regulations and implement best practices in your organization.</p>
                        <a href="#">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Process Section -->
    <section class="section process" id="process">
        <div class="container">
            <div class="section-title">
                <h2>Our Process</h2>
            </div>
            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Discovery Call</h3>
                    <p>To best understand the safety needs of your organization and clarify what the law requires of you, one of our safety consultants joins your team for a discovery call.</p>
                    <a href="#" class="step-link">Learn More</a>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Propose Solutions</h3>
                    <p>Once we understand what you need, we send a proposal with possible safety consulting solutions and clarify what is to be provided during the specified timeline.</p>
                    <a href="#" class="step-link">Learn More</a>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Begin Safety Services</h3>
                    <p>Upon engagement with our safety consultant services, we schedule relevant meetings, prepare safety topics, learn active job lists, visit your premises, & offer unlimited consulting.</p>
                    <a href="#" class="step-link">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="about">
                <div class="about-img">
                    <img src="{{ asset('img/define-img.jpg') }}" alt="About Third Party Safety Consultancy">
                </div>
                <div class="about-content">
                    <h2>Occupational Health and Safety Consultant and Training Provider</h2>
                    <p>Third Party Consultancy provides combined services in the field of Occupational Health and Safety by Training and Inspection as a Third Party on all types of Lifting Accessories, Lifting Equipment, Pressure Vessels, PAT Testing, Scaffolding, and Calibration Services.</p>
                    <p>As a third-party inspection provider, our aim is to provide all kinds of inspection, Training, and Calibration services in one place to fulfill the all requirements of the clients.</p>
                    
                    <div class="mission-vision">
                        <div class="mv-item">
                            <h3><i class="fas fa-bullseye"></i> Our Mission</h3>
                            <p>To develop the Occupational Health and Safety Environment Culture and enforcing standards and by providing, training, outreach, education and assistance.</p>
                        </div>
                        <div class="mv-item">
                            <h3><i class="fas fa-eye"></i> Our Vision</h3>
                            <p>To be Recognize as a Occupational health and safety consultancy and safe workplaces in United Arab Emirates.</p>
                        </div>
                        <div class="mv-item">
                            <h3><i class="fas fa-heart"></i> Our Values</h3>
                            <p>Our vision is to create a better Health and Safety Environment for people according to the International standard. We are committed to a safe and healthy environment for all stockholders. We maintain a zero-harm vision for our health and safety program.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services List Section -->
    <section class="section services-list">
        <div class="container">
            <div class="section-title">
                <h2>Comprehensive Safety Solutions</h2>
            </div>
            <div class="services-container">
                <div class="service-item">
                    <h3><i class="fas fa-cogs"></i> Lifting Accessories & Equipment</h3>
                    <p>A lifting accessory is any equipment used to attach a load to the lifting equipment, which is not a permanent part of the load.</p>
                </div>
                <div class="service-item">
                    <h3><i class="fas fa-truck"></i> Earth Moving Equipment's</h3>
                    <p>Excavators as Mining Equipment. An excavator is a standard piece of heavy industry machinery used as earth-moving equipment.</p>
                </div>
                <div class="service-item">
                    <h3><i class="fas fa-hard-hat"></i> Personal Protection Equipment</h3>
                    <p>PPE such as safety helmets, gloves, eye or hearing protection, high-visibility clothing, safety footwear, and harnesses.</p>
                </div>
                <div class="service-item">
                    <h3><i class="fas fa-tachometer-alt"></i> Pressure Equipment, Storage Tank, Scaffold</h3>
                    <p>Apply foam through the tank wall onto the burning surface of the fuel.</p>
                </div>
                <div class="service-item">
                    <h3><i class="fas fa-search"></i> Inspection</h3>
                    <p>Once the project has broken ground, progress inspections become part of the job site's daily routine to guarantee these requirements are met.</p>
                </div>
                <div class="service-item">
                    <h3><i class="fas fa-plug"></i> PAT Testing</h3>
                    <p>Most electrical safety defects can be found by visual examination but some types of defects can only be found by testing. Equipment to ensure they are safe to use.</p>
                </div>
            </div>
        </div>
    </section>

    @include('pages/footer')
</body>
</html>