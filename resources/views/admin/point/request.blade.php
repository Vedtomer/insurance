@extends('admin.layout.main')
@section('title', 'Policy Listing')
@section('section')

    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="top" style="display: flex;">
                    <div class="col-3 mb-4 mr-5" id="reportrange"
                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; margin-right: 50rem !important;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <div class="left ml-5">
                        <select class="form-select js-example-basic-single select2" data-control="select2"
                            data-placeholder="Select an option" onchange="filterAgent(this.value)">
                            <optgroup>
                                <option selected disabled>Select Agent</option>
                                @foreach ($agents as $user)
                                    <option value="{{ $user->id }}" @if (isset($_GET['agent_id']) && $user->id == $_GET['agent_id']) selected @endif>
                                        {{ $user->name }}</option>
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
                    @if (isset($points) && count($points) > 0)
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Agent</th>
                                    <th>Point</th>
                                    <th>TDS(5%)</th>
                                    <th>Amount Pay</th>
                                    <th>Date</th>
                                    <th>Status</th> 
                                    <th>Action</th> <!-- Add Action column -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($points as $point)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $point->agent->name }}</td>
                                        <td>{{ $point->points }}</td>
                                        <td>{{ $point->tds }}</td>
                                        <td>{{ $point->amount_to_be_paid }}</td>
                                        <td>{{ date('M d, Y', strtotime($point->created_at)) }}</td>
                                        
                                        <td>
                                            <button class="btn btn-warning"
                                                onclick="redeemSuccess({{ $point->id }}, '{{ $point->points }}', '{{ $point->tds }}', '{{ $point->amount_to_be_paid }}','{{ $point->agent->name }}')">Approve
                                                Redeem</button>
                                            <button class="btn btn-danger"
                                                onclick="cancelRedeem({{ $point->id }})">Cancel Redeem</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Redeem Request</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- Include SweetAlert from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function redeemSuccess(pointId, points, tds, amountToBePaid, agent) {
            Swal.fire({
                title: "Redeem Process Success",
                html: "Agent: <b>" + agent + "</b><br>" +
                    "Points: " + points + "<br>" +
                    "TDS: " + tds + "<br>" +
                    "Amount To Be Paid: " + amountToBePaid + "<br><br>" +
                    "Do you want to proceed?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Proceed",
                cancelButtonText: "Cancel",

            }).then((result) => {
                if (result.isConfirmed) {
                    var token = '{{ csrf_token() }}';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    });

                    $.post('/admin/redeem/success/' + pointId)
                        .done(function(response) {
                            location.reload();
                        })
                        .fail(function(error) {
                            console.error(error);
                            Swal.fire({
                                title: "Error",
                                text: "An error occurred while processing your request.",
                                icon: "error",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        });
                }
            });
        }

        function cancelRedeem(pointId) {
            Swal.fire({
                title: "Cancel Redeem",
                text: "Are you sure you want to cancel this redemption request?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Cancel",
                cancelButtonText: "No, Keep it",
                // customClass: {
                //     title: 'text-right'
                // }
            }).then((result) => {
                if (result.isConfirmed) {
                    var token = '{{ csrf_token() }}';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    });

                    $.post('/admin/redeem/cancel/' + pointId)
                        .done(function(response) {
                            location.reload();
                        })
                        .fail(function(error) {
                            console.error(error);
                            Swal.fire({
                                title: "Error",
                                text: "An error occurred while canceling the request.",
                                icon: "error",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        });
                }
            });
        }
    </script>

@endsection
