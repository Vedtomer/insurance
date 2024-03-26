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
    

    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
       <div class="top" style="display: flex;">
        <div  class="col-3 mb-4 mr-5" id="reportrange"
        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; margin-right: 50rem !important;
    }">
        <i class="fa fa-calendar"></i>&nbsp;
        <span></span> <i class="fa fa-caret-down"></i>
    </div>
    <div class="left ml-5">
        <select class="form-select js-example-basic-single  select2" data-control="select2" data-placeholder="Select an option" onchange="filterAgent(this.value)">

            <optgroup>
                <option selected disabled>Select Agent</option>
                @foreach ($agent as $user)
                <option value="{{ $user->id }}" @if(isset($_GET['agent_id']) && $user->id == $_GET['agent_id']) selected @endif> {{ $user->name }}</option>
                
                @endforeach
            </optgroup>
        </select>
    </div>
       </div>
            
          

                <div class="add" style="display: flex; align-items: center;">
                    {{-- <h5 class="card-title">Royalsundaram</h5> --}}
                    <div class="btns" style="margin-left: auto;">
                     
                    </div>
                </div>


                <div class="table-responsive">
                    @if (isset($data) && count($data) > 0)
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    {{-- <th>tgr</th> --}}
                                    {{-- <th>policy_link</th> --}}
                                    <th>Policy No.</th>
                                    <th>Customer Name</th>
                                    <th>Net Amount</th>
                                    <th>GST</th>
                                    <th>Premium</th>
                                    <th>Commission</th>
                                    <th>Upload Policy</th>
                                    <th>Agent</th>
                                    <th>Payment By</th>

                                    <th>Policy Start Date</th>
                                    <th>Policy End Date</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr>

                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->policy_no }}</td>
                                        <td>{{ $user->customername }}</td>

                                        <td>{{ $user->net_amount }}</td>
                                        <td>{{ $user->gst }}</td>
                                        {{-- <td>{{ $user->password }}</td> --}}
                                        <td>{{ $user->premium }}</td>
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
                                                <form
                                                    action="{{ route('updateagentid', ['royalsundaram_id' => $user->id]) }}"
                                                    method="post" enctype="multipart/form-data"
                                                    onchange="submitForm(this)">
                                                    @csrf
                                                    <input type="file" name="policy_file">
                                                </form>
                                            @else
                                                <a href="{{ $user->policy_link }}" download="{{ $user->policy_link }}"><i
                                                        class="fa fa-download"> Download</i></a>
                                            @endif
                                        </td>



                                        {{-- <td>{{ $user->agent_id }}</td> --}}
                                        {{-- <td>{{ optional($user->agent)->name }}</td> --}}
                                        <td>
                                            @if (optional($user->agent)->name)
                                                {{ $user->agent->name }}
                                            @else
                                                <select class="form-select js-example-basic-single  select2" data-control="select2" data-placeholder="Select an option"  onchange="confirmAgentChange(this); location = this.value;">
                                                    <option value="" selected disabled>Select Agent</option>
                                                    @foreach ($agent as $agent)
                                                        @if ( $agent->status == 1)
                                                            <option value="{{ route('updateagentid', ['agent_id' => $agent->id ,'royalsundaram_id' => $user->id ]) }}">
                                                                {{ $agent->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        
                                        <td>{{ $user->payment_by }}</td>




                                        <td>
                                            {{ date('M d, Y', strtotime($user->policy_start_date)) }}
                                        </td>
                                        <td>
                                            {{ date('M d, Y', strtotime($user->policy_end_date)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Policy Found.</p>
                    @endif
                </div>
            
            </div>
        </div>
    </div>




    
    <!-- Include SweetAlert from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script></script>
    <script>
        function confirmAgentChange(selectElement) {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to Select the agent. Do you want to proceed?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Update Agent",
                cancelButtonText: "No, cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                
                    window.location.href = selectElement.value;
                } else {
             
                    selectElement.selectedIndex = 0;
                }
            });
        }
    </script>

@endsection


{{-- @endsection --}}
