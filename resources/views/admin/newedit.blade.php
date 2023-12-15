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
                <label >name</label>
                <input type="text" class="form-control" name="name" value="{{$data->name}}" >
              </div>
              <br><br>

            <div class="mb-3">
              <label >Email address</label>
              <input type="email" class="form-control" name="email" value="{{$data->email}}" >
            </div>
            <br><br>

       

            
            <button type="submit" class="btn btn-primary">update</button>
            <a class="btn btn-primary" href=" {{route('userdata') }} ">show all data</a>
          </form>
            </div>
        </div>
      </div>
   
      @endsection