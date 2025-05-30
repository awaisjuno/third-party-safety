<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard - Third Party Safety Consultancy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

    @include('employee.side')

    <!-- Main Content -->
    <div class="main-content">
        
        @include('employee.header')

        <!-- Dashboard Widgets -->
        <div class="dashboard-widgets">
            <div class="card card-blue">
                <i class="fas fa-tasks"></i>
                <div>
                    <h3>Assigned Tasks</h3>
                    <p>24</p>
                </div>
            </div>
            <div class="card card-green">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h3>Completed Tasks</h3>
                    <p>18</p>
                </div>
            </div>
            <div class="card card-orange">
                <i class="fas fa-clock"></i>
                <div>
                    <h3>Pending Tasks</h3>
                    <p>6</p>
                </div>
            </div>
            <div class="card card-purple">
                <i class="fas fa-money-bill-wave"></i>
                <div>
                    <h3>Monthly Salary</h3>
                    <p>$2,000</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
