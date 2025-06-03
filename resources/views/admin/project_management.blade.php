<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Projects</title>
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

        <!-- Add New Project -->
        <div class="panel-default">

            <div class="panel-heading">
                <h1>Add New Project</h1>
            </div>

            <div class="panel-body">

                <form method="POST" action="{{ route('admin.project.add') }}">
                    @csrf

                    <!-- Project Title -->
                    <div class="form-group">
                        <label for="project_title">Project Title *</label>
                        <input type="text" id="project_title" name="project_title" class="form-control" required>
                    </div>

                    <!-- Project Description -->
                    <div class="form-group">
                        <label for="project_description">Project Description</label>
                        <textarea id="project_description" name="project_description" class="form-control" rows="4"></textarea>
                    </div>

                    <!-- Project Type -->
                    <div class="form-group">
                        <label for="project_type">Project Type</label>
                        <input type="text" id="project_type" name="project_type" class="form-control">
                    </div>

                    <!-- Service -->
                    <div class="form-group">
                        <label for="service_id">Select Service</label>
                        <select id="service_id" name="service_id" class="form-control" required>
                            <option value="">-- Select Service --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Select Month -->
                    <div class="form-group">
                        <label for="month_id">Select Month</label>
                        <select id="month_id" name="month_id" class="form-control" required>
                            <option value="">-- Select Month --</option>
                            @foreach($months as $month)
                                <option value="{{ $month->month_id }}">{{ $month->month_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Starting Date -->
                    <div class="form-group">
                        <label for="starting_date">Starting Date</label>
                        <input type="date" id="starting_date" name="starting_date" class="form-control">
                    </div>

                    <!-- Delivery Date -->
                    <div class="form-group">
                        <label for="delivery_date">Delivery Date</label>
                        <input type="date" id="delivery_date" name="delivery_date" class="form-control">
                    </div>

                    <!-- Assign To (User) -->
                    <div class="form-group">
                        <label for="assign_to">Assign To (User)</label>
                        <select id="assign_to" name="assign_to" class="form-control" required>
                            <option value="">-- Select User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Project</button>
                    </div>
                    
                </form>


            </div>

        </div>

        <!-- Wait for Approval Section -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Projects Waiting for Approval</h2>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Service ID</th>
                            <th>Starting Date</th>
                            <th>Delivery Date</th>
                            <th>Assign To</th>
                            <th>Done</th>
                            <th>Active</th>
                            <th>Approved</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($approvel as $project)
                            <tr>
                                <td>{{ $project->project_id }}</td>
                                <td>{{ $project->project_title }}</td>
                                <td>{{ $project->project_description }}</td>
                                <td>{{ $project->project_type }}</td>
                                <td>{{ $project->service_id }}</td>
                                <td>{{ $project->starting_date }}</td>
                                <td>{{ $project->delivery_date }}</td>
                                <td>{{ $project->assign_to }}</td>
                                <td>{{ $project->is_done ? 'Yes' : 'No' }}</td>
                                <td>{{ $project->is_active ? 'Yes' : 'No' }}</td>
                                <td>{{ $project->is_approved ? 'Yes' : 'No' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="11">No projects waiting for approval.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Project Listing -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>All Projects</h2>
            </div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Service ID</th>
                            <th>Starting Date</th>
                            <th>Delivery Date</th>
                            <th>Assign To</th>
                            <th>Done</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>{{ $project->project_id }}</td>
                                <td>{{ $project->project_title }}</td>
                                <td>{{ $project->project_description }}</td>
                                <td>{{ $project->project_type }}</td>
                                <td>{{ $project->service_id }}</td>
                                <td>{{ $project->starting_date }}</td>
                                <td>{{ $project->delivery_date }}</td>
                                <td>{{ $project->assign_to }}</td>
                                <td>{{ $project->is_done ? 'Yes' : 'No' }}</td>
                                <td>{{ $project->is_active ? 'Yes' : 'No' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="10">No projects found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
