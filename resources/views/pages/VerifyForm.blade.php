<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Third Party Safety Consultancy | Occupational Health & Safety Services</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}" />
    <style>
        /* Center container styling */
        .verify-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            background: #fff;
            text-align: center;
        }
        .verify-container h2 {
            margin-bottom: 20px;
        }
        .verify-container form input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    @include('pages/header')

    <!-- Certificate Verify Section -->
    <section class="section" id="certificate-verify">
        <div class="container">
            <div class="verify-container">
                <h2>Verify Certificate</h2>

                @if($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('certificate.verify') }}">
                    @csrf
                    <input
                      type="text"
                      name="key"
                      placeholder="Enter your certificate key"
                      value="{{ old('key') }}"
                      required
                    />
                    <button class="btn submit-btn" type="submit">Verify</button>
                </form>
            </div>
        </div>
    </section>

    @include('pages/footer')

</body>
</html>
