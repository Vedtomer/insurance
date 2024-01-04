@extends('admin.layout.main')
@section('section')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
      
<div class="col-lg-6">
  <div class="main-card mb-3 card">
  <div class="card-body">
            {{-- <div class="col-6"> --}}
                  
        <form method="post" action="{{route('userupdate' , $data->id)}}" enctype="multipart/form-data">
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
              <input type="text" class="form-control" name="mobile_number" value="{{$data->mobile_number}}" >
            </div>
           
            <div class="mb-3">
              <label >Commision</label>
              <input type="text" class="form-control" name="commission" value="{{$data->commission}}" >
            </div>
          
            <div class="mb-3">
              <label>Commision-Type</label>
              <select class="form-control" name="commission_type">
                  <option value="fixed" {{ $data->commission_type === 'fixed' ? 'selected' : '' }}>Fixed</option>
                  <option value="percentage" {{ $data->commission_type === 'percentage' ? 'selected' : '' }}>Percentage</option>
              </select>
          </div>
          
            

       

            
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a  href="{{ route('admin.user') }}" class="btn btn-secondary">Back</a>
        </div>
            {{-- <a class="btn btn-primary" href=" {{route('user') }} ">show all data</a> --}}
          </form>
            </div>
        </div>
      </div>
</div>
   

@endsection