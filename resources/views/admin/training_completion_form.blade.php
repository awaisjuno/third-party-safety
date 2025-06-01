<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Certificate Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

    @include('admin.side')

    <div class="main-content">
        
        @include('admin.header')

        <!-- Insert New Certificate Record -->
        <div class="panel-default">
            <div class="panel-heading">
                <h1>Add New Certificate</h1>
            </div>

            <div class="panel-body">
                <form method="POST" action="{{ route('certificate.store') }}">
                    @csrf

                    <!-- Enrollment ID (readonly) -->
                    <div class="form-group">
                        <label for="enrollment_id">Enrollment ID *</label>
                        <input type="number" id="enrollment_id" name="enrollment_id" class="form-control" value="{{ $enrollment->enrollment_id }}" readonly>
                    </div>

                    <!-- User Name -->
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" value="{{ $enrollment->first_name }} {{ $enrollment->last_name }}" readonly>
                    </div>

                    <!-- Pass Date -->
                    <div class="form-group">
                        <label for="pass_date">Pass Date *</label>
                        <input type="date" id="pass_date" name="pass_date" class="form-control" required>
                    </div>

                    <!-- Total Marks -->
                    <div class="form-group">
                        <label for="total_marks">Total Marks *</label>
                        <input type="number" id="total_marks" name="total_marks" class="form-control" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>
</html>
