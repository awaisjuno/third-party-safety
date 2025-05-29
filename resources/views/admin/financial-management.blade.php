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

                <form method="POST">

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

                    <!-- Type -->
                    <div class="form-group">
                        <label for="finance_type">Type *</label>
                        <select id="finance_type" name="finance_type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            <option value="Rent">Rent</option>
                            <option value="Utilities">Utilities</option>
                            <option value="Insurance">Insurance</option>
                            <option value="Stationary & Printing">Stationary & Printing</option>
                            <option value="Food Expense">Food Expense</option>
                            <option value="Marketting">Marketting</option>
                            <option value="Fuel Expense">Fuel Expense</option>
                            <option value="Miscellaneous">Miscellaneous</option>
                        </select>
                    </div>

                    <!-- Created By -->
                    <div class="form-group">
                        <label for="created_by">Created By *</label>
                        <input type="text" id="created_by" name="created_by" class="form-control" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>

        </div>


    </div>

</body>
</html>
