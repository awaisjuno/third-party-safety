<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Enrollments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

    @include('admin.side')

    <!-- Main Content -->
    <div class="main-content">
        
        @include('admin.header')

        <!-- Panel 1: Unpaid Enrollments -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Unpaid Enrollments</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Training ID</th>
                            <th>Enroll Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($paid as $c)
                            <tr>
                                <td>{{ $c->user_id }}</td>
                                <td>{{ $c->training_id }}</td>
                                <td>{{ \Carbon\Carbon::parse($c->enroll_date)->format('d M Y, h:i A') }}</td>
                                <td>Unpaid</td>
                                <td>
                                    <form action="{{ route('enrollment.markPaid', $c->enrollment_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success">Mark as Paid</button>
                                    </form>                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center;">No unpaid enrollments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Panel 2: Incomplete Enrollments -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Incomplete Enrollments</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Training ID</th>
                            <th>Enroll Date</th>
                            <th>Completion Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($complete as $c)
                            <tr>
                                <td>{{ $c->user_id }}</td>
                                <td>{{ $c->training_id }}</td>
                                <td>{{ \Carbon\Carbon::parse($c->enroll_date)->format('d M Y, h:i A') }}</td>
                                <td>Not Completed</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center;">No incomplete enrollments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
