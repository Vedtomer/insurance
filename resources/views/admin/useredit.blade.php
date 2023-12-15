@extends('admin.layout.main')
@section('section')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
      <div class="container">
        <div class="row">
            <div class="col-6">
                  
        <form method="post" action="{{route('userupdate' , $data->id)}}" enctype="multipart/form-data">
            @csrf
            <h1>form data</h1>

            <div class="mb-3">
                <label >name</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >Email address</label>
              <input type="email" class="form-control" name="email" value="{{$data->email}}" >
            </div>
            <br><br>
            <div class="mb-3">
              <label >State</label>
              <input type="text" class="form-control" name="state" value="{{$data->state}}" >
            </div>
            <br><br>
            <div class="mb-3">
              <label >City</label>
              <input type="text" class="form-control" name="city" value="{{$data->city}}" >
            </div>
            <br><br>
            <div class="mb-3">
              <label >Address</label>
              <input type="text" class="form-control" name="address" value="{{$data->address}}" >
            </div>
            <br><br>
            <div class="mb-3">
              <label >Mobile - Number</label>
              <input type="text" class="form-control" name="mobile_number" value="{{$data->mobile_number}}" >
            </div>
            <br><br>
            <div class="mb-3">
              <label >Commision</label>
              <input type="text" class="form-control" name="commission" value="{{$data->commission}}" >
            </div>
            <br><br>
            <div class="mb-3">
              <label>Commision-Type</label>
              <select class="form-control" name="commission_type">
                  <option value="fixed" {{ $data->commission_type === 'fixed' ? 'selected' : '' }}>Fixed</option>
                  <option value="percentage" {{ $data->commission_type === 'percentage' ? 'selected' : '' }}>Percentage</option>
              </select>
          </div>
          
            <br><br>

       

            
            <button type="submit" class="btn btn-primary">update</button>
            {{-- <a class="btn btn-primary" href=" {{route('user') }} ">show all data</a> --}}
          </form>
            </div>
        </div>
      </div>
   

@endsection