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
<style>
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .service-card {
        border: 1px solid #eee;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        transition: box-shadow 0.3s ease;
    }

    .service-card:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .service-img img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .service-content {
        padding: 20px;
    }

    .service-content h3 {
        margin-bottom: 10px;
        font-size: 20px;
    }

    .service-content p {
        font-size: 14px;
        margin-bottom: 15px;
    }

    .service-content a {
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
    }

    .service-content a i {
        margin-left: 5px;
    }
</style>

<body>

    @include ('pages/header')

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
            </div>
            <div class="services-grid">
                @forelse($services as $service)
                    <div class="service-card">
                        <div class="service-img">
                            <img src="{{ asset('uploads/services/' . $service->image) }}" alt="{{ $service->service_name }}">
                        </div>
                        <div class="service-content">
                            <h3>{{ $service->service_name }}</h3>
                            <p>{{ $service->service_description }}</p>
                            <a href="#">Book Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <p>No services available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    @include('pages/footer')
</body>
</html>