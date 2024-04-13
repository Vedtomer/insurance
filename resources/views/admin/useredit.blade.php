@extends('admin.layout.main')
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
      
<div class="col-lg-6">
  <div class="main-card mb-3 card">
  <div class="card-body">
            {{-- <div class="col-6"> --}}
                  
        <form method="post" action="{{route('agent.edit' , $data->id)}}" enctype="multipart/form-data">
            @csrf
            {{-- <h1>form data</h1> --}}

            <div class="mb-3">
                <label >name</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" >
              </div>
              

            <div class="mb-3">
              <label >Email address</label>
              <input type="email" class="form-control" name="email" value="{{$data->email}}" >
            </div>
           
            <div class="mb-3">
              <label >State</label>
              <input type="text" class="form-control" name="state" value="{{$data->state}}" >
            </div>
         
            <div class="mb-3">
              <label >City</label>
              <input type="text" class="form-control" name="city" value="{{$data->city}}" >
            </div>
           
            <div class="mb-3">
              <label >Address</label>
              <input type="text" class="form-control" name="address" value="{{$data->address}}" >
            </div>
           
            <div class="mb-3">
              <label >Mobile - Number</label>
              <input type="text" class="form-control" name="mobile_number" value="{{$data->mobile_number}}" onkeypress="allowOnlyNumbers(event)" >
            </div>

            <div class="mb-3">
              <label class="d-block"> Cut and Pay</label>
              <div class="form-check-inline">
                <label class="form-check-label mr-3">
                  <input type="radio" class="form-check-input" name="cut_and_pay" value="1" {{$data->cut_and_pay ? 'checked' : ''}}> Yes
                </label>
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="cut_and_pay" value="0" {{$data->cut_and_pay ? '' : 'checked'}}> No
                </label>
              </div>
            </div>
            
            
           
          
            
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a  href="{{ route('agent.list') }}" class="btn btn-secondary">Back</a>
        </div>
            {{-- <a class="btn btn-primary" href=" {{route('user') }} ">show all data</a> --}}
          </form>
            </div>
        </div>
      </div>
</div>
   

@endsection