{{-- @extends('admin.layout.main')
@section('section') --}}




{{-- @extends('admin.layout.main')
@section('section') --}}

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Yajra Datatables Tutorial - ItSolutionStuff.com</title>
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
    <h1>Laravel 10 Yajra Datatables Tutorial - ItSolutionStuff.com</h1>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>branch</th>
                <th>userid</th>
                <th>policy</th>
                <th>prody666yhuct</th>
                <th>covernoteissuedate</th>
                <th>creationdate</th>
                <th>lastmodifiedby</th>
                <th>lastmodifiedtime</th>

                <th>businessstatus</th>
                <th>policyholder</th>
                <th>oacode</th>
                <th>inceptiondate</th>
                <th>expirydate</th>
                <th>make</th>
                <th>agent_id</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
     
</body>
     
<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('royalsundaram') }}",
        columns: [
            { data: 'branch', name: 'branch' },
            { data: 'userid', name: 'userid' },
            { data: 'policy', name: 'policy' },
            { data: 'prody666yhuct', name: 'prody666yhuct' },
            { data: 'covernoteissuedate', name: 'covernoteissuedate' },
                { data: 'creationdate', name: 'creationdate' },
                { data: 'lastmodifiedby', name: 'lastmodifiedby' },
                { data: 'lastmodifiedtime', name: 'lastmodifiedtime' },
                { data: 'businessstatus', name: 'businessstatus' },
                { data: 'policyholder', name: 'policyholder' },
                { data: 'oacode', name: 'oacode' },
                { data: 'inceptiondate', name: 'inceptiondate' },
                { data: 'expirydate', name: 'expirydate' },
                { data: 'make', name: 'make' },
                { data: 'agent_id', name: 'agent_id' },
                {data: 'action', name: 'action', orderable: false, searchable: false},
                
            ]
    });
      
  });
</script>
</html>
{{-- @endsection --}}


{{-- @endsection --}}