<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Third Party Safety Consultancy | Certificate Verification</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}">

    <style>
        .verify-result {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border: 5px solid red;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            position: relative;
        }

        .certificate-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }

        .certificate-logo {
            height: 80px;
            margin-right: 20px;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
        }

        .certificate-title {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
            font-size: 28px;
            text-decoration: underline;
        }

        .verify-result h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .verify-result .info {
            margin-bottom: 20px;
            font-size: 18px;
            padding-left: 20px;
        }

        .verify-result .info span {
            font-weight: bold;
            display: inline-block;
            width: 180px;
            color: #34495e;
        }

        .valid-status {
            padding: 15px;
            background: #e0f7e9;
            color: #2d8f4b;
            text-align: center;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 30px;
            font-size: 20px;
            border: 2px solid #2d8f4b;
        }

        .certificate-footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            border-top: 2px solid #eee;
            padding-top: 20px;
        }

        .signature {
            text-align: center;
            width: 200px;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin: 10px auto;
            width: 150px;
        }
    </style>
</head>
<body>

@include('pages.header')

<section class="section">
    <div class="container">
        <div class="verify-result">
            <div class="certificate-header">
                <img src="http://127.0.0.1:8000/img/logo.jpeg" alt="Company Logo" class="certificate-logo">
                <div class="company-name">Third Party Safety Consultancy</div>
            </div>

            <div class="certificate-title">Certificate of Completion</div>

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

            <div class="valid-status">This certificate is valid and registered</div>

            <div class="certificate-footer">
                <div class="signature">
                    <div class="signature-line"></div>
                    <div>Authorized Signature</div>
                </div>
                <div class="signature">
                    <div class="signature-line"></div>
                    <div>Date: {{ date('Y-m-d') }}</div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('pages.footer')

</body>
</html>