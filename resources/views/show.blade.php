<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>All Users</h2>
        <a href="{{ route('create-form') }}" class="btn btn-primary float-end mb-3"> Add New user</a>
        <table id="userTable" class="display table-hover table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Age</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Occuation</th>
                    <th>Marital Status</th>
                    <th>Parent Name</th>
                    <th>Parent Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->occupation }}</td>
                        <td>{{ $user->marital_staus }}</td>
                        <td>{{ $user->p_name }}</td>
                        <td>{{ $user->p_age }}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                onclick="generateQRCode({{ $user->id }})">Generate QR Code</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="qrCodeContent">
                Loading QR Code...
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });

    function generateQRCode(userId) {
        $.ajax({
            url: `/generate-qr-code/${userId}`,
            method: 'GET',
            success: function(response) {
                $('#qrCodeContent').html(response.qrCode);
            },
            error: function() {
                $('#qrCodeContent').html('Error generating QR code.');
            }
        });
    }
</script>
