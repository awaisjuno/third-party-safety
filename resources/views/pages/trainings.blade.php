<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Programs | Occupational Health & Safety Training</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}">
</head>
<body>

    @include('pages.header')

    <!-- Trainings Section -->
    <section class="section" id="trainings">
        <div class="container">
            <div class="section-title">
                <h2>Our Trainings</h2>
            </div>
            <div class="services-grid">
                @forelse($trainings as $training)
                    <div class="service-card">
                        <div class="service-img">
                            <img src="{{ asset('uploads/trainings/' . ($training->image ?? 'default.png')) }}" alt="{{ $training->training_name }}">
                        </div>
                        <div class="service-content">
                            <h3>{{ $training->training_name }}</h3>
                            <p>{{ $training->training_description }}</p>
                            <p><strong>Duration:</strong> {{ $training->duration }}</p>
                            <a href="#">Enroll Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <p>No trainings available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    @include('pages.footer')

</body>
</html>