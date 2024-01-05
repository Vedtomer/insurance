@extends('admin.layout.main')
@section('section')
<style>

    .btns{
        float:right;
        margin-bottom: 8px;
    }
    .btn{
        border-radius: 0px;
    }
</style>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
    <div class="card-body">
        <div class="add" style="display: flex; align-items: center;">
            <h5 class="card-title">TRANSACTION</h5>
            <div class="btns" style="margin-left: auto;">
              <button type="button" class="btn btn-secondary">Transaction</button>
            </div>
          </div>
          

    <div class="table-responsive">
    <table class="mb-0 table">
    <thead>
    <tr>
    <th>S No</th>
    <th>Policy No</th>
    <th>Net Amount</th>
    <th>Gst</th>
    <th>Total Amount</th>
    <th>Payment By</th>
    <th>Payment Done</th>
    <th>Agent Clear Payment</th>
    <th>Updated Date</th>
    <th>Updated Time</th>
   
    {{-- <th></th> --}}
   
    </tr>
    </thead>
    <tbody>
        @foreach($data as $user)
        <tr>
            
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $user->policy_no }}</td>
            <td>{{ $user->net_amount }}</td>
            <td>{{ $user->gst }}</td>
            <td>{{ $user->total_amount }}</td>
            
            <td>{{ $user->payment_by }}</td>
          

            {{-- <td>
                @if ($user->payment_bypayme == 0 )
                    
                @else
               
                @endif
            </td> --}}
            <td>
                @if ($user->is_payment_done == 0)
                    <span class="badge badge-danger ml-2">No</span>
                @else
                    @if ($user->is_payment_done == 1)
                        <span class="badge badge-success ml-2">Yes</span>
                    @endif
                @endif
            </td>
            

            {{-- <td>{{ $user->is_payment_done }}</td> --}}
    
          
            {{-- <td>{{ $user->is_agent_paid_premium_amount }}</td> --}}
            <td>
                @if ($user->is_agent_paid_premium_amount == 0)
                    <span class="badge badge-danger ml-2">No</span>
                @else
                    @if ($user->is_agent_paid_premium_amount == 1)
                        <span class="badge badge-success ml-2">Yes</span>
                    @endif
                @endif
            </td>
            
            {{-- <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
            <td>{{ $user->updated_at->toDateString() }}</td> --}}
            <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d M Y h' ) }}</td>
            <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('H:i:s' ) }}</td>



        </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    @endsection