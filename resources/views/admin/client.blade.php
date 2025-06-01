<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Client Records</title>
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

        <!-- Client Records -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Client Accounts</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $index => $client)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $client->email }}</td>
                                <td>
                                    <a href="#" title="View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align:center;">No clients found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
