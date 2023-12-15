@extends('admin.layout.main')
@section('section')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
      <div class="container">
        <div class="row">
            <div class="col-6">
                  
        <form method="post" action="{{route('newupdate' , $data->id)}}" enctype="multipart/form-data">
            @csrf
            <h1>form data</h1>

            <div class="mb-3">
                <label >branch</label>
                <input type="text" class="form-control" name="branch" value="{{$data->branch}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >userid</label>
              <input type="text" class="form-control" name="userid" value="{{$data->userid}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >policy</label>
                <input type="text" class="form-control" name="policy" value="{{$data->policy}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >prody666yhuct</label>
              <input type="text" class="form-control" name="prody666yhuct" value="{{$data->prody666yhuct}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >covernotenumber</label>
                <input type="text" class="form-control" name="covernotenumber" value="{{$data->covernotenumber}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >covernoteissuedate</label>
              <input type="text" class="form-control" name="covernoteissuedate" value="{{$data->covernoteissuedate}}" >
            </div>
            <br><br>
            <div class="mb-3">
                <label class="form-label">creationdate</label>
                <input type="text" class="form-control" name="creationdate"  value="{{$data->creationdate}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">lastmodifiedby</label>
                <input type="text" class="form-control" name="lastmodifiedby" value="{{$data->lastmodifiedby}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">lastmodifiedtime</label>
                <input type="text" class="form-control" name="lastmodifiedtime" value="{{$data->lastmodifiedtime}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">businessstatus</label>
                <input type="text" class="form-control" name="businessstatus" value="{{$data->businessstatus}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">policyholder</label>
                <input type="text" class="form-control" name="policyholder"  value="{{$data->policyholder}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">oacode</label>
                <input type="text" class="form-control" name="oacode" value="{{$data->oacode}}" required>
              </div>
              <br><br>  <div class="mb-3">
                <label class="form-label">inceptiondate</label>
                <input type="text" class="form-control" name="inceptiondate" value="{{$data->inceptiondate}}" required>
              </div>
              <br><br>

              <div class="mb-3">
                <label class="form-label">expirydate</label>
                <input type="text" class="form-control" name="expirydate" value="{{$data->expirydate}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">make</label>
                <input type="text" class="form-control" name="make"  value="{{$data->make}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">model</label>
                <input type="text" class="form-control" name="model"  value="{{$data->model}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">chassisno</label>
                <input type="text" class="form-control" name="chassisno" value="{{$data->chassisno}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">engineno</label>
                <input type="text" class="form-control" name="engineno" value="{{$data->engineno}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">registrationnumber</label>
                <input type="text" class="form-control" name="registrationnumber"  value="{{$data->registrationnumber}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">contractnumber</label>
                <input type="text" class="form-control" name="contractnumber" value="{{$data->contractnumber}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">policypremium</label>
                <input type="text" class="form-control" name="policypremium" value="{{$data->policypremium}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">idv</label>
                <input type="text" class="form-control" name="idv" value="{{$data->idv}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">loading</label>
                <input type="text" class="form-control" name="loading" value="{{$data->loading}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">oddiscount</label>
                <input type="text" class="form-control" name="oddiscount" value="{{$data->oddiscount}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">covpremium</label>
                <input type="text" class="form-control" name="covpremium" value="{{$data->covpremium}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">ncd</label>
                <input type="text" class="form-control" name="ncd" value="{{$data->ncd}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">assettype</label>
                <input type="text" class="form-control" name="assettype" value="{{$data->assettype}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">vehicle_inspection_report</label>
                <input type="text" class="form-control" name="vehicle_inspection_report" value="{{$data->vehicle_inspection_report}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">inspection_date</label>
                <input type="text" class="form-control" name="inspection_date" value="{{$data->inspection_date}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">service_providername</label>
                <input type="text" class="form-control" name="service_providername" value="{{$data->service_providername}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">vir_number</label>
                <input type="text" class="form-control" name="vir_number" value="{{$data->vir_number}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">fraud_indicator</label>
                <input type="text" class="form-control" name="fraud_indicator" value="{{$data->fraud_indicator}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">fraud_reason</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
              </div>
              <br><br>
              <div class="mb-3">
                <label class="form-label">receipt_number</label>
                <input type="text" class="form-control" name="fraud_reason" value="{{$data->fraud_reason}}" required>
              </div>
              <br><br>


            <div class="mb-3">
              <label >policy_type</label>
              <input type="text" class="form-control" name="policy_type" value="{{$data->policy_type}}" >
            </div>
            <br><br>
            <div class="mb-3">
                <label >enginecapacity</label>
                <input type="text" class="form-control" name="enginecapacity" value="{{$data->enginecapacity}}" >
              </div>
              <br><br>
              <div class="mb-3">
                <label >engine_capacity_slab</label>
                <input type="text" class="form-control" name="engine_capacity_slab" value="{{$data->engine_capacity_slab}}" >
              </div>
              <br><br>
              <div class="mb-3">
                <label >vehicle_fuel_type</label>
                <input type="text" class="form-control" name="vehicle_fuel_type" value="{{$data->vehicle_fuel_type}}" >
              </div>
              <br><br>
              <div class="mb-3">
                <label >vehicleage</label>
                <input type="text" class="form-control" name="vehicleage" value="{{$data->vehicleage}}" >
              </div>
              <br><br>
              <div class="mb-3">
                <label >vehicle_slab</label>
                <input type="text" class="form-control" name="vehicle_slab" value="{{$data->vehicle_slab}}" >
              </div>
              <br><br>
              <div class="mb-3">
                <label >business_type</label>
                <input type="text" class="form-control" name="business_type" value="{{$data->business_type}}" >
              </div>
              <br><br>
              <div class="mb-3">
                <label >channel</label>
                <input type="text" class="form-control" name="channel" value="{{$data->channel}}" >
              </div>
              <br><br>
             
              <div class="mb-3">
                <label >agent_id</label>
                <input type="text" class="form-control" name="agent_id" value="{{$data->agent_id}}" >
              </div>
              <br><br>


            
            <button type="submit" class="btn btn-primary">update</button>
            <a class="btn btn-primary" href=" {{route('userdata') }} ">show all data</a>
          </form>
            </div>
        </div>
      </div>
   
      @endsection