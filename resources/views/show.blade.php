<!DOCTYPE html>
<html>

<head>
    <title>Laravel DataTable Example</title>

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>User Data</h2>
        <table id="userTable" class="display">
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
                        <a href="{{ route('user.qr', $user->id) }}" class="btn btn-primary">Generate QR Code</a>
                        @if(session('qr'))
                        </td>
                        <h3>QR Code for {{ $user->name }}:</h3>
                        <img src="data:image/png;base64, {{ session('qr') }}" alt="QR Code">
                    @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>

</body>

</html>
