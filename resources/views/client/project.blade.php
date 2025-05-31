<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Dashboard - Add Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

    @include('client.side')

    <div class="main-content">
        @include('client.header')

        <div class="panel-default">
            <div class="panel-heading">
                <h1>Add New Project</h1>
            </div>

            <div class="panel-body">
                @if(session('success'))
                    <div style="color: green; margin-bottom: 10px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('client.projects.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="project_title">Project Title *</label>
                        <input type="text" id="project_title" name="project_title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="project_description">Project Description</label>
                        <textarea id="project_description" name="project_description" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="project_type">Project Type *</label>
                        <input type="text" id="project_type" name="project_type" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="service_id">Service *</label>
                        <select id="service_id" name="service_id" class="form-control" required>
                            <option value="">-- Select Service --</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Project</button>
                    </div>
                </form>

            </div>
        </div>

        <!--Clinet Project List-->
        <div class="panel-default" style="margin-top: 30px;">
            <div class="panel-heading">
                <h2><i class="fa fa-spinner"></i> My Projects</h2>
            </div>

            <div class="panel-body">
                @if($projects->isEmpty())
                    <p>No projects created yet.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Project Title</th>
                                <th>Type</th>
                                <th>Service</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->project_title }}</td>
                                    <td>{{ $project->project_type }}</td>
                                    <td>{{ $project->service->service_name ?? 'N/A' }}</td>
                                    <td>{{ Str::limit($project->project_description, 50) }}</td>
                                    <td>
                                        @if($project->is_approved)
                                            <span style="color: green;">Approved</span>
                                        @else
                                            <span style="color: orange;">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </div>

</body>
</html>
