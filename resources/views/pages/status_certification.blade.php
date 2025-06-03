<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Certifications | Third Party Safety</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favcon.png') }}">
</head>
<style>
/* Certifications Section */
.certifications-section {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.section-header {
    margin-bottom: 30px;
    text-align: center;
}

.section-header h2 {
    font-size: 32px;
    margin-bottom: 10px;
}

.section-description {
    color: #666;
    font-size: 16px;
    max-width: 700px;
    margin: 0 auto;
}

tr,td,th {
    border: 1px solid #000;
}

/* Table Container */
.certifications-table-container {
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 20px;
    overflow-x: auto;
}

/* Table Styles */
.certifications-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px;
}

.certifications-table thead {
    color: #000;
    font-weight: bold;
}

.certifications-table th {
    padding: 15px;
    text-align: left;
    font-weight: 600;
}

.certifications-table td {
    padding: 20px 15px;
    border-bottom: 1px solid #eee;
    vertical-align: top;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .certifications-table th,
    .certifications-table td {
        padding: 12px 10px;
    }
    
    .training-meta {
        flex-direction: column;
        gap: 5px;
    }
    
    .action-buttons {
        flex-direction: row;
        flex-wrap: wrap;
    }
}

@media (max-width: 576px) {
    .section-header h2 {
        font-size: 26px;
    }
    
    .certifications-table-container {
        padding: 15px;
    }
    
    .certifications-table {
        font-size: 14px;
    }
    
    .training-info h4 {
        font-size: 15px;
    }
}
</style>
<body>

    @include('pages/header')

    <section class="certifications-section">
        <div class="container">
            <div class="section-header">
                <h2>My Certifications</h2>
                <p class="section-description">Below is the list of your trainings and certification status.</p>
            </div>

            <div class="certifications-table-container">
                <table class="certifications-table">
                    <thead>
                        <tr>
                            <th>Training</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($enrollments as $enrollment)
                        <tr>
                            <td>
                                <div class="training-info">
                                    <h4>{{ $enrollment->training->title ?? 'N/A' }}</h4>
                                </div>
                            </td>
                            <td>
                                <div class="training-details">
                                    <p><strong>Status:</strong> 
                                        <span class="status-badge completed">Completed</span>
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if($enrollment->certificate)
                                        <a href="#"
                                        class="download-btn" target="_blank">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                        <a href="#" 
                                        class="view-btn" target="_blank">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    @else
                                        <span class="not-available">Certificate Pending</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="no-certifications">
                                <i class="fas fa-certificate"></i>
                                <p>No certifications found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @include('pages/footer')
</body>
</html>