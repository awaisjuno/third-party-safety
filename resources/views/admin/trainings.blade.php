<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Trainings</title>
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
                <h1>Add New Training</h1>
            </div>

            <div class="panel-body">
                @if(session('success'))
                    <div style="color: green; margin-bottom: 10px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('add_training') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="training_name">Training Name *</label>
                        <input type="text" id="training_name" name="training_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="training_description">Training Description</label>
                        <textarea id="training_description" name="training_description" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration *</label>
                        <input type="text" id="duration" name="duration" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="training_img">Training Image *</label>
                        <input type="file" id="training_img" name="training_img" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Training</button>
                    </div>
                </form>

            </div>
        </div>

        <!-- Training List -->
        <div class="panel-default">
            <div class="panel-heading">
                <h2>Training List</h2>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Training Name</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainings as $training)
                            <tr>
                                <td>{{ $training->training_name }}</td>
                                <td>{{ $training->training_description }}</td>
                                <td>{{ $training->duration }}</td>
                                <td>
                                    <a href="#">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('trainings.delete', $training->training_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this training?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none; background: none;">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if($trainings->isEmpty())
                            <tr><td colspan="5">No trainings found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
