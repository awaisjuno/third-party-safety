<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard Finance Section - Third Party Safety Consultancy</title>
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

        <div class="panel-default">
            <div class="panel-heading">
                <h1>Add Finance Entry</h1>
            </div>

            <div class="panel-body">
                @if(session('success'))
                    <div style="color: green;">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('employee.finance.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="finance_title">Title *</label>
                        <input type="text" id="finance_title" name="finance_title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="finance_description">Description</label>
                        <textarea id="finance_description" name="finance_description" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="create_date">Create Date *</label>
                        <input type="date" id="create_date" name="create_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="type_id">Budget Type *</label>
                        <select name="type_id" class="form-control" required>
                            <option value="">-- Select Budget Type --</option>
                            @foreach($type as $type)
                                <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Finance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
