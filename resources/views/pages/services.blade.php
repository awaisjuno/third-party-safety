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