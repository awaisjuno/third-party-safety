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

    <!-- Blog Section -->
    <section class="blog-section">
        <div class="container">
            <div class="section-header">
                <h2>Latest Safety Insights</h2>
                <p>Stay updated with our expert articles on occupational health and safety</p>
            </div>

            <div class="services-grid"> <!-- Using your existing grid style -->
                <!-- Blog Post 1 -->
                <article class="service-card"> <!-- Using your card style -->
                    <div class="service-img">
                        <img src="https://images.unsplash.com/photo-1581093196270-1a1d1b6c3a1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Lifting Equipment Safety">
                    </div>
                    <div class="service-content">
                        <span class="blog-date">June 15, 2023</span>
                        <h3>Lifting Equipment Inspection Best Practices</h3>
                        <p>Learn the essential steps for proper lifting equipment inspection to ensure workplace safety and compliance with regulations...</p>
                        <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Blog Post 2 -->
                <article class="service-card">
                    <div class="service-img">
                        <img src="https://images.unsplash.com/photo-1581093057305-25a0a6b9ca0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="PPE Guidelines">
                    </div>
                    <div class="service-content">
                        <span class="blog-date">May 28, 2023</span>
                        <h3>Understanding PPE Requirements in UAE</h3>
                        <p>Discover the latest personal protective equipment standards and how to implement them effectively in your organization...</p>
                        <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Blog Post 3 -->
                <article class="service-card">
                    <div class="service-img">
                        <img src="https://images.unsplash.com/photo-1605152276897-4f618f831968?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Safety Training">
                    </div>
                    <div class="service-content">
                        <span class="blog-date">April 12, 2023</span>
                        <h3>Effective Safety Training Techniques</h3>
                        <p>Explore modern approaches to safety training that improve engagement and knowledge retention among employees...</p>
                        <a href="#">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>

            <div class="blog-cta">
                <a href="#" class="btn">View All Articles</a>
            </div>
        </div>
    </section>

    @include('pages/footer')
</body>
</html>