<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Form</h2>
        <form action="{{ route('create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="pwd">Contact Number:</label>
                <input type="number" class="form-control" id="contact" placeholder="Enter contact" name="contact">
            </div>
            <div class="mb-3">
                <label for="pwd">Age:</label>
                <input type="number" class="form-control" id="contact" placeholder="Enter contact" name="age">
            </div>
            <div class="mb-3">
                <label for="state">State:</label>
                <input type="text" class="form-control" id="state" placeholder="Enter state" name="state">
            </div>
            <div class="mb-3">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" placeholder="Enter contact" name="city">
            </div>
            <div class="mb-1">
                <label for="city">Occupation:</label>
                <input type="text" class="form-control" id="occupation" placeholder="Enter occupation"
                    name="occupation">
            </div>
            <div class="mb-1">
                <label for="city">Marital Status:</label>
                <input type="radio" name="marital" value="yes"><span>Yes</span>
                <input type="radio" name="marital" value="no"><span>No</span>
            </div>
            <div id="checkStatus" class="d-none">
                <div class="mb-1">
                    <label for="city">Partner Name:</label>
                    <input type="text" class="form-control" id="p_name" placeholder="Enter partner name"
                        name="p_name">
                </div>
                <div class="mb-3">
                    <label for="city">Age:</label>
                    <input type="number" class="form-control" id="p_age" placeholder="Enter partner name"
                        name="p_age">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Attach a change event to the radio buttons
        $('input[name="marital"]').change(function() {
            // Get the selected value
            var selectedValue = $('input[name="marital"]:checked').val();
            if (selectedValue == "yes") {
                $("#checkStatus").removeClass('d-none');
            }else{
                $("#checkStatus").addClass('d-none');
            }
        });
    });
</script>
