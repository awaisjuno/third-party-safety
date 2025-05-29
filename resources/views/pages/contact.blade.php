<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Party Safety Consultancy | Occupational Health & Safety Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}">

</head>
<body>

    @include ('pages/header')

    <!-- Contact Us Section -->
    <section class="contact-section">
        <div class="container">

            <div class="contact-content">

                <div class="contact-info">
                    
                    <h3>Fill Out the Form Below to Request a Consultation</h3>

                    <p class="para-cont">Thank you for your interest in requesting a work estimate, please fill out the form and we will get back to you shortly.</p>
                    
                    <div class="contact-method">
                        <div class="contact-details">
                            <h4>Phone Numbers</h4>
                            <a href="tel:+971542529414">+971 54 252 9414</a>
                            <a href="tel:+97143352606">+971 43 352 606</a>
                        </div>
                    </div>
                    
                    <div class="contact-method">
                        <div class="contact-details">
                            <h4>Email</h4>
                            <a href="mailto:info@thirdpartysafety.com">info@thirdpartysafety.com</a>
                        </div>
                    </div>
                    
                    <div class="contact-method">
                        <div class="contact-details">
                            <h4>Office Address</h4>
                            <p>Office 13-67, Leader Building, Dubai - UAE</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form-container">
                    <form class="contact-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn submit-btn">Send Message</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    @include('pages/footer')
</body>
</html>