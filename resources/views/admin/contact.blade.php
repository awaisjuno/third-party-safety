<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Contact Messages</title>
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

        <!-- Contact Messages List -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Contact Messages</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Replied</th>
                            <th>Received At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contact as $c)
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->mobile }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ Str::limit($c->message, 50) }}</td>
                                <td>{{ $c->status ?? 'Pending' }}</td>
                                <td>{{ $c->is_replied ? 'Yes' : 'No' }}</td>
                                <td>{{ $c->created_at->format('d M Y, h:i A') }}</td>
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
                                <td colspan="8" style="text-align:center;">No contact messages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>        

    </div>

</body>
</html>
