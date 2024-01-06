@extends('admin.layout.main')
@section('title', 'Policy Listing')
@section('section')



<style>
    td {
        border: 1px solid black;

    }
    th {
        border: 1px solid black;
        border-bottom: 3px solid black;
       
    }
    .rig {
    text-align: center;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    color: green;
    font-weight: bolder;
}

    /* tr{
        border: 2px solid black;
        
    } */
</style>
{{-- @extends('admin.layout.main')
@section('section') --}}

{{-- <!DOCTYPE html>
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
<body> --}}
     
{{-- <div class="container"> --}}
    {{-- <h1>Laravel 10 Yajra Datatables Tutorial - ItSolutionStuff.com</h1> --}}
    {{-- <table class="table table-bordered data-table"> --}}
        {{-- <table> 
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
    </table> --}}

    <div class="col-lg-12">
        <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="add" style="display: flex; align-items: center;">
                {{-- <h5 class="card-title">Royalsundaram</h5> --}}
                <div class="btns" style="margin-left: auto;">
                  {{-- <button type="button" class="btn btn-secondary">Transaction</button> --}}
                </div>
              </div>
              
    
        <div class="table-responsive">
            @if(isset($data) && count($data) > 0)
        <table class="mb-0 table" >
        <thead>
        <tr>
        <th>S No</th>
        {{-- <th>tgr</th> --}}
        {{-- <th>policy_link</th> --}}
        <th>Customer Number</th>
        <th>Policy Number</th>
        <th>Net Amount</th>
        <th>GST</th>
        <th>Policy Premium</th>
        <th>Agent Commission</th>
        <th>Upload Ploicy</th>
        {{-- <th>Policy download</th> --}}
        <th>Agent</th>
        <th>Transaction</th>
       
        <th>Policy Start Date</th>
        <th>Policy End Date</th>
       
      
        </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
            <tr>
                
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $user->policyholder }}</td>
                <td>{{ $user->policy }}</td>
                <td>{{ $user->net_amount }}</td>
                <td>{{ $user->gst }}</td>
                {{-- <td>{{ $user->password }}</td> --}}
                <td>{{ $user->policypremium }}</td>
                <td>{{ $user->agent_commission }}</td>
                {{-- <td>
                    @if (empty($user->policy_link)) --}}
                        {{-- <button>Add Button</button> --}}
                        {{-- <input type="file">
                    @else
                        {{ $user->policy_link }}
                    @endif
                </td> --}}
               
                <td>
                    @if (empty($user->policy_link))
                    <form action="{{ route('updateagentid', ['royalsundaram_id' => $user->id]) }}" method="post" enctype="multipart/form-data" onchange="submitForm(this)">
                        @csrf
                        <input type="file" name="policy_file">
                    </form>
                    @else
                    <a href="{{( $user->policy_link) }}" download="{{$user->policy_link}}" ><i class="fa fa-download"> Download</i></a>
                    @endif
                </td>
                
                
                
                {{-- <td>{{ $user->agent_id }}</td> --}}
                {{-- <td>{{ optional($user->agent)->name }}</td> --}}
                <td>
                    @if (optional($user->agent)->name)
                        {{ $user->agent->name }}
                    @else
                        <select onchange="location = this.value;">
                            <option value="" selected disabled>Select Agent</option>
                            @foreach ($dat as $agent)
                                @if ($agent && $agent->status == 1)
                                    <option value="{{ route('updateagentid', ['agent_id' => $agent->id, 'royalsundaram_id' => $user->id]) }}">
                                        {{ $agent->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    @endif
                </td>
                
                {{-- <td>{{ $user->transaction->is_agent_paid_premium_amount }}</td> --}}
                <td>
                    @if ($user->transaction->is_agent_paid_premium_amount == 0)
                    <a href="{{ route('updatetransaction', ['transaction_id' => $user->transaction->id])}}" class="btn btn-secondary">Update</a>
                    @else
                        @if ($user->transaction->is_agent_paid_premium_amount == 1)
                        <i class="metismenu-icon pe-7s-check rig" ></i>

                            
                        @endif
                    @endif
                </td>
            
                <td>{{ \Carbon\Carbon::parse($user->creationdate)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('d/m/Y', $user->expirydate)->format('d M Y') }}</td>

                {{-- <td>{{ $user->expirydate }}</td> --}}
                {{-- <td>{{ $user->mobile_number}}</td>
                <td>{{ $user->commission }}</td>
                <td>{{ $user->commission_type }}</td> --}}
                {{-- <td><a class="btn btn-success" href="{{route('useredit',$user->id)}}">Update</a></td> --}}
                {{-- <td><a class="btn btn-danger" href="{{route('userdelete',$user->id)}}">Delete</a></td> --}}
                <!-- Add more columns as needed -->
            </tr>
        @endforeach
       
        </tbody>
        </table>
        @else
        <p>No users found.</p>
    @endif
        </div>
        </div>
        </div>
        </div>
{{-- </div> --}}
     
</body>
     
{{-- <script type="text/javascript">
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
</script> --}}
{{-- </html> --}}


<script>
    function submitForm(form) {
        if (form instanceof HTMLFormElement) {
            form.submit();
        }
    }
</script>
@endsection


{{-- @endsection --}}