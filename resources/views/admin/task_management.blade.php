<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Task Management</title>
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

        <!-- Task Management Section -->
        <div class="panel-default">
            <div class="panel-heading">
                <h1>Assign New Task</h1>
            </div>

            <div class="panel-body">
                <form action="{{ route('admin.task.store') }}" method="POST">
                    @csrf

                    <!-- Task Title -->
                    <div class="form-group">
                        <label for="task_title">Task Title *</label>
                        <input type="text" id="task_title" name="task_title" class="form-control" required>
                    </div>

                    <!-- Task Description -->
                    <div class="form-group">
                        <label for="task_description">Task Description</label>
                        <textarea id="task_description" name="task_description" class="form-control" rows="4"></textarea>
                    </div>

                    <!-- Assign Date -->
                    <div class="form-group">
                        <label for="assign_date">Assign Date *</label>
                        <input type="date" id="assign_date" name="assign_date" class="form-control" required>
                    </div>

                    <!-- End Date -->
                    <div class="form-group">
                        <label for="end_date">End Date *</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="assign_to">Assign To (User) *</label>
                        <select id="assign_to" name="assign_to" class="form-control" required>
                            <option value="">-- Select User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Project ID -->
                    <div class="form-group">
                        <label for="project_id">Project ID *</label>
                        <input type="number" id="project_id" name="project_id" class="form-control" required>
                    </div>

                    <!-- Month -->
                    <div class="form-group">
                        <label for="month">Month *</label>
                        <input type="text" id="month" name="month" class="form-control" required placeholder="e.g. May 2025">
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Assign Task</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Task List Table -->
        <div class="panel-default" style="margin-top: 40px;">
            <div class="panel-heading">
                <h2>Task List</h2>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Task Title</th>
                            <th>Description</th>
                            <th>Assign Date</th>
                            <th>End Date</th>
                            <th>Assigned To</th>
                            <th>Project ID</th>
                            <th>Month</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <td>{{ $task->task_title }}</td>
                                <td>{{ $task->task_description }}</td>
                                <td>{{ $task->assign_date }}</td>
                                <td>{{ $task->end_date }}</td>
                                <td>{{ $task->assign_to }}</td>
                                <td>{{ $task->project_id }}</td>
                                <td>{{ $task->month }}</td>
                                <td>
                                    @if($task->is_done)
                                        <span class="badge bg-success">Done</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">No tasks available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
