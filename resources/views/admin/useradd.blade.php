@extends('admin.layout.main')
@section('section')


<div class="col-lg-6">
    <div class="main-card mb-3 card">
    <div class="card-body">
        <div class="errors">
            @if ($errors->any())
            @foreach ($errors->all() as $error )
            <div class="alert alert-danger">
                {{$error}}
            </div>
            @endforeach
            @endif
        </div>
        <form action="{{ route('user.save') }}" method="post" autocomplete="off">

            @csrf
            <div class="mb-3">
                {{-- <h3>ADD AGENT</h3> --}}
        
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" autocomplete="OFF" name="email" placeholder="Enter email" required>
            </div>
            
            <div class="mb-3">
                <label for="">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter password" required>
            </div>
        
            <div class="mb-3">
                <label for="">State</label>
                <input type="text" class="form-control" name="state" placeholder="Enter state" >
            </div>
            <div class="mb-3">
                <label for="">City</label>
                <input type="text" class="form-control" name="city" placeholder="Enter city" >
            </div>
            <div class="mb-3">
                <label for="">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address" >
            </div>
            <div class="mb-3">
                <label for="">Mobile Number</label>
                <input type="text" class="form-control" name="mobile_number" placeholder="Enter mobile number" required>
            </div>
            {{-- <div class="mb-3">
                <label for="">Commission Type</label> --}}
                {{-- <label for="commission">Commission Type:</label> --}}
                {{-- <select class="form-control" id="commission" name="commission_type" required>
                    <option value="" disabled selected>Commission Type</option>
                    <option value="fixed">Fixed</option>
                    <option value="percentage">Percentage</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="">Commission</label>
                <input type="text" class="form-control" name="commission" placeholder="Enter commission" required>
            </div> --}}
        
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a  href="{{ route('admin.user') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>

    </div>
    </div>
</div>


@endsection