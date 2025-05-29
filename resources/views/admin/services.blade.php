<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

    @include('admin.side')

    <div class="main-content">

        @include('admin.header')

        <div class="panel-default">
            <div class="panel-heading">
                <h1>Add New Service</h1>
            </div>

            <div class="panel-body">
                @if(session('success'))
                    <div style="color: green; margin-bottom: 10px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('add_training') }}">
                    @csrf

                    <div class="form-group">
                        <label for="service_name">Service Name *</label>
                        <input type="text" id="service_name" name="service_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="service_description">Service Description</label>
                        <textarea id="service_description" name="service_description" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Service List -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Service List</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->service_description }}</td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if($services->isEmpty())
                            <tr><td colspan="5">No services found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
