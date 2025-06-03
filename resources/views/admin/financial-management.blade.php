<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
        <!--Insert new finance-->
        <div class="panel-default">

            <div class="panel-heading">
                <h1>Add New Financial Record</h1>
            </div>

            <div class="panel-body">

                <form method="POST" action="{{ route('admin.finance.store') }}">
                    @csrf

                    <!-- Finance Title -->
                    <div class="form-group">
                        <label for="finance_title">Finance Title *</label>
                        <input type="text" id="finance_title" name="finance_title" class="form-control" required>
                    </div>

                    <!-- Finance Description -->
                    <div class="form-group">
                        <label for="finance_description">Finance Description</label>
                        <textarea id="finance_description" name="finance_description" class="form-control" rows="4"></textarea>
                    </div>

                    <!-- Create Date -->
                    <div class="form-group">
                        <label for="create_date">Create Date *</label>
                        <input type="date" id="create_date" name="create_date" class="form-control" required>
                    </div>

                    <!-- Month -->
                    <div class="form-group">
                        <label for="month_id">Month *</label>
                        <select id="month_id" name="month_id" class="form-control" required>
                            <option value="">-- Select Month --</option>
                            @foreach($months as $month)
                                <option value="{{ $month->month_id }}">{{ $month->month_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Year -->
                    <div class="form-group">
                        <label for="year">Year *</label>
                        <input type="number" id="year" name="year" class="form-control" value="{{ date('Y') }}" required>
                    </div>

                    <!-- Type (type_id) -->
                    <div class="form-group">
                        <label for="type_id">Type *</label>
                        <select id="type_id" name="type_id" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            @foreach($budgetTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Created By -->
                    <div class="form-group">
                        <label for="create_by">Created By *</label>
                        <input type="text" id="create_by" name="create_by" class="form-control" required>
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>


            </div>

        </div>


    </div>

</body>
</html>
