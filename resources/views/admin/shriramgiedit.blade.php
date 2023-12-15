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
                  
        <form method="post" action="{{route('shriramgiupdate' , $data->id)}}" enctype="multipart/form-data">
            @csrf
            <h1>form data</h1>

            <div class="mb-3">
                <label >sno</label>
                <input type="text" class="form-control" name="sno" value="{{$data->sno}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >proposal_no</label>
              <input type="text" class="form-control" name="proposal_no" value="{{$data->proposal_no}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >policy_no</label>
                <input type="text" class="form-control" name="policy_no" value="{{$data->policy_no}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >branch_code</label>
              <input type="text" class="form-control" name="branch_code" value="{{$data->branch_code}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >branch_name</label>
                <input type="text" class="form-control" name="branch_name" value="{{$data->branch_name}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >proposal_reg_date</label>
              <input type="text" class="form-control" name="proposal_reg_date" value="{{$data->proposal_reg_date}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >policy_issuance_date</label>
                <input type="text" class="form-control" name="policy_issuance_date" value="{{$data->policy_issuance_date}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >policy_start_date</label>
              <input type="text" class="form-control" name="policy_start_date" value="{{$data->policy_start_date}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >policy_end_date</label>
                <input type="text" class="form-control" name="policy_end_date" value="{{$data->policy_end_date}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >product_name</label>
              <input type="text" class="form-control" name="product_name" value="{{$data->product_name}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >addrproduct_classess</label>
                <input type="text" class="form-control" name="addrproduct_classess" value="{{$data->addrproduct_classess}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >cust_name</label>
              <input type="text" class="form-control" name="cust_name" value="{{$data->cust_name}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >insured_name</label>
                <input type="text" class="form-control" name="insured_name" value="{{$data->insured_name}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >business_source</label>
              <input type="text" class="form-control" name="business_source" value="{{$data->business_source}}" >
            </div>
            <br><br>

            {{-- <div class="mb-3">
                <label >agent_name</label>
                <input type="text" class="form-control" name="agent_name" value="{{$data->agent_name}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >exec_name</label>
              <input type="text" class="form-control" name="exec_name" value="{{$data->exec_name}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >broker_name</label>
                <input type="text" class="form-control" name="broker_name" value="{{$data->broker_name}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >fiancier_type</label>
              <input type="text" class="form-control" name="fiancier_type" value="{{$data->fiancier_type}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >veh_code</label>
                <input type="text" class="form-control" name="veh_code" value="{{$data->veh_code}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >veh_model_make</label>
              <input type="text" class="form-control" name="veh_model_make" value="{{$data->veh_model_make}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >reg_no</label>
                <input type="text" class="form-control" name="reg_no" value="{{$data->reg_no}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >veh_engine_no</label>
              <input type="text" class="form-control" name="veh_engine_no" value="{{$data->veh_engine_no}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >veh_chas_no</label>
                <input type="text" class="form-control" name="veh_chas_no" value="{{$data->veh_chas_no}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >veh_fst_regn_dt</label>
              <input type="text" class="form-control" name="veh_fst_regn_dt" value="{{$data->veh_fst_regn_dt}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >veh_pur_dt</label>
                <input type="text" class="form-control" name="veh_pur_dt" value="{{$data->veh_pur_dt}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >gvw</label>
              <input type="text" class="form-control" name="gvw" value="{{$data->gvw}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >seat_capcty_y</label>
                <input type="text" class="form-control" name="seat_capcty_y" value="{{$data->seat_capcty_y}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >idv_amoun_t</label>
              <input type="text" class="form-control" name="idv_amoun_t" value="{{$data->idv_amoun_t}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >social_others_s</label>
                <input type="text" class="form-control" name="social_others_s" value="{{$data->social_others_s}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >locality</label>
              <input type="text" class="form-control" name="locality" value="{{$data->locality}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >ncb_perct</label>
                <input type="text" class="form-control" name="ncb_perct" value="{{$data->ncb_perct}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >policy_status</label>
              <input type="text" class="form-control" name="policy_status" value="{{$data->policy_status}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >gross_premium</label>
                <input type="text" class="form-control" name="gross_premium" value="{{$data->gross_premium}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >igst_amount</label>
              <input type="text" class="form-control" name="igst_amount" value="{{$data->igst_amount}}" >
            </div>
            <br><br>

            <div class="mb-3">
                <label >sgst_amount</label>
                <input type="text" class="form-control" name="sgst_amount" value="{{$data->sgst_amount}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >cgst_amount</label>
              <input type="text" class="form-control" name="cgst_amount" value="{{$data->cgst_amount}}" >
            </div>
            <br><br>


            <div class="mb-3">
                <label >net_premium</label>
                <input type="text" class="form-control" name="net_premium" value="{{$data->net_premium}}" >
              </div>
              <br><br> --}}

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