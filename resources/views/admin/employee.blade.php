<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Employee Accounts</title>
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

        <!-- Pending Employees -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Pending Employee Accounts</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered At</th>
                            <th>Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pending as $emp)
                            <tr>
                                <td>{{ $emp->name }}</td>
                                <td>{{ $emp->mobile }}</td>
                                <td>{{ $emp->email }}</td>
                                <td>Pending</td>
                                <td>{{ \Carbon\Carbon::parse($emp->created_at)->format('d M Y, h:i A') }}</td>
                                <td>
                                    <form action="{{ route('admin.employee.approve', $emp->user_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to approve this employee?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-approve">Approve</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center;">No pending employees found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Active Employees -->
        <div class="panel-default" style="margin-top: 40px;">
            <div class="panel-heading">
                <h2>Active Employee Accounts</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Approved At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($active as $emp)
                            <tr>
                                <td>{{ $emp->name }}</td>
                                <td>{{ $emp->mobile }}</td>
                                <td>{{ $emp->email }}</td>
                                <td>Active</td>
                                <td>{{ \Carbon\Carbon::parse($emp->updated_at)->format('d M Y, h:i A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;">No active employees found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
