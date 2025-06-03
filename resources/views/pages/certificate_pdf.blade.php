<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate of Completion</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', serif;
            background-color: #faf5e6;
            height: 297mm; /* Full A4 height */
            width: 210mm;  /* Full A4 width */
        }
        .certificate {
            width: 100%;
            height: 100%;
            background: white;
            position: relative;
            border: 15px solid #8b4513;
            box-sizing: border-box;
            overflow: hidden;
        }
        .border-pattern {
            position: absolute;
            width: calc(100% - 40px);
            height: calc(100% - 40px);
            top: 20px;
            left: 20px;
            border: 2px solid #d4af37;
            z-index: 1;
        }
        .content {
            position: relative;
            z-index: 2;
            padding: 40px;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .header {
            margin-bottom: 30px;
        }
        .logo {
            height: 80px;
            margin-bottom: 10px;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #8b0000;
            margin-bottom: 5px;
        }
        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin: 30px 0;
            text-decoration: underline;
            text-transform: uppercase;
        }
        .presented-to {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .recipient-name {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin: 20px 0;
            border-bottom: 2px solid #d4af37;
            padding-bottom: 10px;
            width: 80%;
        }
        .certificate-text {
            font-size: 18px;
            line-height: 1.6;
            margin: 20px 0;
            width: 80%;
        }
        .course-name {
            font-weight: bold;
            font-size: 22px;
            color: #8b0000;
        }
        .details {
            margin: 40px 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
        }
        .detail-item {
            text-align: center;
        }
        .detail-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .seal {
            position: absolute;
            width: 120px;
            opacity: 0.8;
        }
        .seal-1 {
            top: 50px;
            left: 50px;
        }
        .seal-2 {
            bottom: 50px;
            right: 50px;
            transform: rotate(180deg);
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 60px;
        }
        .signature {
            width: 200px;
            text-align: center;
        }
        .signature-line {
            border-top: 1px solid #333;
            width: 150px;
            margin: 0 auto 10px;
        }
        .certificate-id {
            position: absolute;
            bottom: 20px;
            right: 40px;
            font-size: 12px;
            color: #777;
        }
        .gold-stamp {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 80px;
            color: #d4af37;
            opacity: 0.1;
            font-weight: bold;
            z-index: 0;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="border-pattern"></div>
        <div class="gold-stamp">OFFICIAL</div>
        
        <div class="content">
            <div class="header">
                <img src="{{ public_path('img/logo.jpeg') }}" class="logo" alt="Company Logo">
                <div class="company-name">Third Party Safety Consultancy</div>
                <div>Recognized Training Provider</div>
            </div>
            
            <div class="certificate-title">Certificate of Completion</div>
            
            <div class="presented-to">This is to certify that</div>
            
            <div class="recipient-name">
                {{ $certificate->user->name ?? 'N/A' }}
            </div>
            
            <div class="certificate-text">
                has successfully completed the <span class="course-name">{{ $certificate->training->name ?? 'N/A' }}</span> course
                with distinction and demonstrated exceptional understanding of the subject matter.
            </div>
            
            <div class="details">
                <div class="detail-item">
                    <div class="detail-label">Certificate Number</div>
                    <div>123</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Date Completed</div>
                    <div>{{ $certificate->pass_date }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Final Score</div>
                    <div>{{ $certificate->total_marks }}</div>
                </div>
            </div>
            
            <div class="signatures">
                <div class="signature">
                    <div class="signature-line"></div>
                    <div>Training Director</div>
                    <div>Third Party Safety Consultancy</div>
                </div>
                <div class="signature">
                    <div class="signature-line"></div>
                    <div>Date Awarded</div>
                    <div>{{ date('F j, Y') }}</div>
                </div>
            </div>
            
            <div class="certificate-id">
                Verification ID: 123
            </div>
        </div>
        
        <img src="{{ public_path('img/seal.png') }}" class="seal seal-1" alt="Official Seal">
        <img src="{{ public_path('img/seal.png') }}" class="seal seal-2" alt="Official Seal">
    </div>
</body>
</html>