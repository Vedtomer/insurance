@extends('admin.layout.main')
@section('section')

<div class="col-lg-6">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="errors">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
            <form action="{{ route('agent') }}" method="post" autocomplete="off">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Enter password" required>
                </div>
                <div class="mb-3">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" value="{{ old('state') }}" placeholder="Enter state">
                </div>
                <div class="mb-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Enter city">
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter address">
                </div>
                <div class="mb-3">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" onkeypress="allowOnlyNumbers(event)" placeholder="Enter mobile number" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('agent.list') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
