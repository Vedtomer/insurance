@extends('admin.layout.main')

@section('title', 'Agent: '. $agent->name ?? 'Default Title')

@section('section')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
      
<div class="col-lg-6">
    <div class="main-card mb-3 card">
    <div class="card-body">
        <form action="{{ route('updateagentid', ['agent_id' => $agent->id, 'royalsundaram_id' => $royal->id]) }}" method="POST" id="fix">
            @csrf
            <input type="hidden" class="form-control" disabled name="policy_id" value="{{$royal->id}}" >
            <input type="hidden" class="form-control" disabled name="agent_id" value="{{$agent->id}}" >
            <div class="mb-3">
                <label class="form-label">policy_no</label>
                <input type="text" class="form-control" disabled name="policy_no" value="{{$royal->policy}}" >
              </div>

        <div class="mb-3">
          <label class="form-label">net_amount</label>
          <input type="text" class="form-control"  disabled name="net_amount" value="{{$royal->net_amount}}">
         
        </div>
        <div class="mb-3">
            <label class="form-label">gst</label>
            <input type="text" class="form-control" disabled name="gst" value="{{$royal->gst}}">
          </div>

          <div class="mb-3">
            <label class="form-label">total_amount</label>
            <input type="text" class="form-control" disabled name="total_amount" value="{{$royal->net_amount}}" >
          </div>


                <div id="commissionContainer" class="mb-3 row">
                    <div class="col-md-12">
                        <label>Select Commision</label>
                        <select class="form-control" name="commission_id" required>
                            @foreach ($commission as $record)
                            <option  value="{{ $record->id }}">{{ $record->commission_type  }} - {{ $record->commission }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 

                <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" >submit</button>
            <a  href="{{ route('admin.user') }}" class="btn btn-secondary ml-2">Back</a>
        </div>
          </form>
    </div>
    </div>
</div>



@endsection