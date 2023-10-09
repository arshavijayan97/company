<html>
<head>
    <title>Companies</title>
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

    <h1>Companies Details</h1>
    <div class="container">
    <a href="{{ route('companies.create')}}" class="btn btn-primary btn-sm" style="width: 70px; height:30px;">Add</a>
    </div><br>
       <table id="companies-table" class="table table-bordered data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function () {
        $('#companies-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('companies.index') }}",
            columns: [
                { data: 'serial_number', name: 'serial_number' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                {
    data: 'logo',
    name: 'logo',
    render: function (data, type, full, meta) {
        if (type === 'display' && data) {
            var assetsPath = 'public/'; 
            var appUrl = @json(config('app.url'));
            return '<img src="' + appUrl + '/' + assetsPath + data + '" alt="Logo">';
        } else {
            return 'NA';
        }
    }
},

                { data: 'website', name: 'website',
                 render: function (data, type, full, meta) {
                    
                    return data ? data : 'NA';
                 }
               },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
        });
    });
</script>

                