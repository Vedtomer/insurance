@extends('admin.layout.main')
@section('title', 'Agent Listing')
@section('section')



<div class="errors">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endforeach
    @endif
</div>

<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-body">

            <div  class="col-3" id="reportrange"
                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
            </div>

            <div class="add" style="display: flex; align-items: center;">
                <div class="btns" style="margin-left: auto;">
                    <a id="openModalBtn" href="{{ route('agent') }}" class="btn btn-secondary mb-2">Add Agent</a>
                </div>
            </div>


            <div class="table-responsive">
                <table class="mb-0 table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 5%" scope="col">Agent ID</th>
                            <th style="width: 20%" scope="col">Name</th>
                            <th style="width: 20%" scope="col">Policy </th>
                            <th style="width: 20%" scope="col">Premium</th>
                            <th style="width: 20%" scope="col">Earn Points</th>
                            <th style="width: 20%" scope="col">Email</th>
                            <th style="width: 20%" scope="col">State</th>
                            <th style="width: 20%" scope="col">City</th>
                            <th style="width: 20%" scope="col">Address</th>
                            <th style="width: 20%" scope="col">Mobile Number</th>




                            <th style="width: 20%" scope="col">Commission</th>
                            <th style="width: 20%" scope="col">Transaction</th>
                            <th style="width: 15%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                        <tr @if ($user->commissions->isEmpty() || $user->commissions->sum('commission') == 0)
                            style="background-color: #cb498533 ;" @endif @if (count($user->Policy) == 0)
                            style="background-color: #ef9292 ;" @endif>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>

                            <td>
                                @php
                                $policyCount = count($user->Policy);
                                @endphp

                                <span class="mb-2 mr-2 btn btn-warning">{{ $policyCount }}</span>
                            </td>

                            <td>
                                @php
                                $totalagentpremium = 0;
                                @endphp
                                @foreach ($user->Policy as $record)


                                @php
                                $totalagentpremium += $record->premium ;
                                @endphp
                                @endforeach

                                <span class="mb-2 mr-2 btn btn-secondary"> {{ $totalagentpremium }}</span>

                            </td>

                            <td>
                                @php
                                $totalagentcommission = 0;
                                @endphp
                                @foreach ($user->Policy as $record)
                                @php
                                $totalagentcommission += $record->agent_commission;
                                @endphp
                                @endforeach
                                <span class="mb-2 ml-2 mr-2 btn btn-primary d-flex "> <i class="fa fa-rupee pr-2"
                                        style="font-size:20px"></i> {{ $totalagentcommission }}</span>

                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->mobile_number }}</td>







                            <td>
                                @foreach ($user->commissions as $record)
                                <span class="badge badge-success">{{ $record->commission }}{!! $record->commission_type
                                    == 'percentage' ? '%' : '&#x20B9' !!}</span>
                                @endforeach

                                <a class="btn  mr-2" href="{{ route('agent.commission', $user->id) }}"><i
                                        class="fa fa-edit" style="font-size:24px"></i>
                                </a>
                            </td>




                            <td>
                                <a class="btn  mr-2" href="{{ route('transaction', $user->id) }}"><i
                                        class="metismenu-icon pe-7s-look" title="Download"
                                        style="font-size:30px;text-align: center;"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn " href="{{ route('agent.edit', $user->id) }}"><i class="fa fa-edit"
                                        style="font-size:24px"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection