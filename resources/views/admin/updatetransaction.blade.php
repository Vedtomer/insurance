@extends('admin.layout.main')
@section('section')

{{-- <p>Agent ID: {{ $agent_id }}</p>
<p>Royalsundaram ID: {{ $royalsundaram_id }}</p>

<a href="{{ asset('storage/policy/' . $customFileName) }}" target="_blank">View Policy File</a> --}}
<div class="col-lg-6">
    <div class="main-card mb-3 card">
    <div class="card-body">

        <form action="{{ route('updatetransaction', ['transaction_id' => $data->id])}}" method="POST">
            @csrf
           
           
                <input type="hidden" class="form-control" name="id">

                <div class="mb-3">
                    <label class="form-label">policy_no</label>
                    <input type="text" class="form-control" disabled name="policy_no" value="{{$data->policy_no}}" >
                  </div>

            <div class="mb-3">
              <label class="form-label">net_amount</label>
              <input type="text" class="form-control"  disabled name="net_amount" value="{{$data->net_amount}}">
             
            </div>
            <div class="mb-3">
                <label class="form-label">gst</label>
                <input type="text" class="form-control" disabled name="gst" value="{{$data->gst}}">
              </div>

              <div class="mb-3">
                <label class="form-label">total_amount</label>
                <input type="text" class="form-control" disabled name="total_amount" value="{{$data->total_amount}}" >
              </div>

              <div class="mb-3">
                <label class="form-label">payment_by</label>
                <input type="text" class="form-control" name="payment_by" value="{{$data->payment_by}}" > 
              </div>

              <div class="mb-3">
                <label class="form-label">Payment Done</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_payment_done" value="1" @if($data->is_payment_done == 1) checked @endif>
                    <label class="form-check-label mr-4">Yes</label>
                
                    <input class="form-check-input" type="radio" name="is_payment_done" value="0" @if($data->is_payment_done == 0) checked @endif>
                    <label class="form-check-label">No</label>
                </div>
            </div>
              
              {{-- <div class="mb-3">
                <label class="form-label">is_agent_paid_premium_amount</label>
                <input type="text" class="form-control" value="{{$data->is_agent_paid_premium_amount}}"  >
              </div> --}}
            
              <div class="mb-3">
                <label class="form-label">Agent Clear Payment</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_agent_paid_premium_amount" value="1" @if($data->is_agent_paid_premium_amount == 1) checked @endif>
                    <label class="form-check-label mr-4">Yes</label>
                
                    <input class="form-check-input" type="radio" name="is_agent_paid_premium_amount" value="0" @if($data->is_agent_paid_premium_amount == 0) checked @endif>
                    <label class="form-check-label">No</label>
                </div>
            </div>

            
            
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a  href="{{ route('royalsundaram') }}" class="btn btn-secondary ml-2">Back</a>
            </div>
          </form>

    </div>
    </div>
</div>

@endsection 