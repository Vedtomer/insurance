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
        <form action="{{ route('user.save') }}" method="post">

            @csrf
            <div class="mb-3">
                {{-- <h3>ADD AGENT</h3> --}}
        
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
            </div>
        
            <div class="mb-3">
                <input type="text" class="form-control" name="state" placeholder="Enter state" >
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="city" placeholder="Enter city" >
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="address" placeholder="Enter address" >
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="mobile_number" placeholder="Enter mobile number" required>
            </div>
            <div class="mb-3">
                {{-- <label for="commission">Commission Type:</label> --}}
                <select class="form-control" id="commission" name="commission_type" required>
                    <option value="" disabled selected>Commission Type</option>
                    <option value="fixed">Fixed</option>
                    <option value="percentage">Percentage</option>
                </select>
            </div>
            
            <div class="mb-3">
                <input type="text" class="form-control" name="commission" placeholder="Enter commission" required>
            </div>
        
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a  href="{{ route('admin.user') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>

    </div>
    </div>
</div>


@endsection