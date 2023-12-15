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
                <th>sno</th>
                <th>proposal_no</th>
                <th>policy_no</th>
                <th>branch_code</th>
                <th>branch_name</th>
                <th>proposal_reg_date</th>
                <th>policy_issuance_date</th>
                <th>policy_start_date</th>

                <th>policy_end_date</th>
                <th>product_name</th>
                <th>addrproduct_classess</th>
                <th>cust_name</th>
                <th>insured_name</th>
                <th>business_source</th>
                {{-- <th>agent_id</th> --}}
                <th width="100px">Action</th>
                {{-- <th width="100px">Edit</th> --}}
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
        ajax: "{{ route('shriramgi') }}",
        columns: [
            { data: 'sno', name: 'sno' },
            { data: 'proposal_no', name: 'proposal_no' },
            { data: 'policy_no', name: 'policy_no' },
            { data: 'branch_code', name: 'branch_code' },
            { data: 'branch_name', name: 'branch_name' },
                { data: 'proposal_reg_date', name: 'proposal_reg_date' },
                { data: 'policy_issuance_date', name: 'policy_issuance_date' },
                { data: 'policy_start_date', name: 'policy_start_date' },
                { data: 'policy_end_date', name: 'policy_end_date' },
                { data: 'product_name', name: 'product_name' },
                { data: 'addrproduct_classess', name: 'product_class' },
                { data: 'cust_name', name: 'cust_name' },
                { data: 'insured_name', name: 'insured_name' },
                { data: 'business_source', name: 'business_source' },
                // { data: 'agent_id', name: 'agent-id' },
                {data: 'action', name: 'action', orderable: false, searchable: false},

            //     {
            //     data: 'action', 
            //     name: 'action', 
            //     orderable: false, 
            //     searchable: false
            // },


               
                
            ]

            
    });
      
  });


</script>


</html>
{{-- @endsection --}}


    {{-- @foreach ($dataa as $id => $user) --}}
            {{-- <tr> --}}
                {{-- <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td> --}}
                {{-- <td><a class="btn btn-primary" href="{{route('newview',$user->id)}}">View</a></td> --}}
                {{-- <td><a class="btn btn-success" href="{{route('shriramjiedit',$user->id)}}">Update</a></td> --}}
                {{-- <td><a class="btn btn-danger" href="{{route('delete',$user->id)}}">Delete</a></td> --}}
            {{-- </tr> --}}
       {{-- @endforeach  --}}