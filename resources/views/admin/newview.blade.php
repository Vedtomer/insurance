@extends('admin.layout.main')
@section('section')
        <style>
       
            .box{
                margin: 10px;
                padding: 10px;
                margin-left: 300px;
            }
                </style>
    <div class="box">
            
        <h1>SHOW USER DATA</h1>

        <br><br>
        @foreach ($data as $id =>$dataa )
        <h2>NAME : {{$dataa->name}}</h2>
        
        <h2>EMAIL : {{$dataa->email}}</h2>
        <br>
        
        {{-- <td><a class="btn btn-info" href="{{route('change-password') }}">change password</a></td> --}}
        {{-- <br> --}}
        @endforeach
        {{-- <br> --}}
        <a class="btn btn-primary" href=" {{route('userdata') }} ">show all data</a>

    </div>

@endsection