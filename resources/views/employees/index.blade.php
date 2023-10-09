<html>
<head>
    <title>Empoyees</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
     
<div class="container">

    <h1>Empoyees Details</h1>
    <div class="container">
    <a href="{{ route('employees.create')}}" class="btn btn-primary btn-sm" style="width: 70px; height:30px;">Add</a>
    </div><br>
       <table id="employees-table" class="table table-bordered data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Lastname</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function () {
        $('#employees-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employees.index') }}",
            columns: [
                { data: 'serial_number', name: 'serial_number' },
                { data: 'first_name', name: 'first_name' },

                { data: 'last_name', name: 'last_name',
                 render: function (data, type, full, meta) {
                    
                    return data ? data : 'NA';
                 }
               },
               { data: 'company_name', name: 'company_name' },
               { data: 'email', name: 'email' },
               { data: 'phone', name: 'phone' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
        });
    });
</script>

                