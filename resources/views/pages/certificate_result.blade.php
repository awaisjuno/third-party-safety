<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Third Party Safety Consultancy | Certificate Verification</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}">

    <style>
        .verify-result {
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .verify-result h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .verify-result .info {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .verify-result .info span {
            font-weight: bold;
            display: inline-block;
            width: 160px;
            color: #34495e;
        }

        .valid-status {
            padding: 10px;
            background: #e0f7e9;
            color: #2d8f4b;
            text-align: center;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

@include('pages.header')

<section class="section">
    <div class="container">
        <div class="verify-result">
            <h2>Certificate Verified</h2>

            <div class="info"><span>Certificate ID:</span> {{ $certificate->unique_id }}</div>
            <div class="info"><span>Enrollment ID:</span> {{ $certificate->enrollment_id }}</div>
            <div class="info"><span>Pass Date:</span> {{ $certificate->pass_date }}</div>
            <div class="info"><span>Total Marks:</span> {{ $certificate->total_marks }}</div>

            @if($certificate->enrollment && $certificate->enrollment->userDetail)
                <div class="info">
                    <span>Name:</span>
                    {{ $certificate->enrollment->userDetail->first_name }} {{ $certificate->enrollment->userDetail->last_name }}
                </div>
            @endif

            <div class="valid-status">This certificate is valid and registered.</div>
        </div>
    </div>
</section>

@include('pages.footer')

</body>
</html>
