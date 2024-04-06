@extends('admin.layout.main')
@section('title', 'Agent Pending Balance')
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

           <div class="mb-5" style="display: flex; align-items: center;">
            <div class="col-3 mr-5" id="reportrange"
            style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
        {{-- <div class="right ml-5" >
            <select class="form-select js-example-basic-single  select2" data-control="select2" data-placeholder="Select an option" onchange="filterAgent(this.value)">
    
                <optgroup>
                    <option selected disabled>Select Agent</option>
                    @foreach ($agentData as $user)
                    <option value="{{ $user->id }}" @if(isset($_GET['agent_id']) && $user->id == $_GET['agent_id']) selected @endif> {{ $user->name }}</option>
                    
                    @endforeach
                </optgroup>
            </select>
        </div> --}}
           </div>
         

            <div class="add" style="display: flex; align-items: center;">
               
                <div class="btns" style="margin-left: auto;">
                    {{-- <a id="openModalBtn" href="{{ route('agent') }}" class="btn btn-secondary mb-2">Add Agent</a> --}}
                </div>
            </div>

            <div class="table-responsive">
                <table class="mb-0 table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                           <th  scope="col">S No</th>
                            
                           
                            <th scope="col">Agent Name</th>
                            <th scope="col">Total Pending Premium</th>
                            <th scope="col">Total Amount Paid</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($policy as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->total_premium }}</td>
                                        <td>{{ $user->total_amount }}</td>
                                        <td>{{ $user->balance }}</td>
                                    </tr>
                                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection