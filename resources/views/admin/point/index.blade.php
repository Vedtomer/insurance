@extends('admin.layout.main')
@section('title', 'Policy Listing')
@section('section')



    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="top" style="display: flex;">
                    <div class="col-3 mb-4 mr-5" id="reportrange"
                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; margin-right: 50rem !important;
    }">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <div class="left ml-5">
                        <select class="form-select js-example-basic-single  select2" data-control="select2"
                            data-placeholder="Select an option" onchange="filterAgent(this.value)">
                                <option selected disabled>Select Agent</option>
                                @foreach ($agents as $user)
                                    <option value="{{ $user->id }}" @if (isset($_GET['agent_id']) && $user->id == $_GET['agent_id']) selected @endif>
                                        {{ $user->name }}</option>
                                @endforeach
                            
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
                                    <th>TDS</th>
                                    <th>Amount Paid</th>
                                    <th>Date</th>
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
                                        <td>
                                            {{ date('M d, Y', strtotime($point->created_at)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Record Found.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>





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
