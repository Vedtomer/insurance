@extends('admin.layout.main')
@section('title', 'Upload Policy')
@section('section')

<div class="container">
    <div class="col-lg-6 d-flex mx-auto">
        <div class="main-card mb-3 card mx-auto">
            <div class="card-body">
                <div class="add" style="display: flex; align-items: center;">
                    <div class="btns" style="margin-left: auto;"></div>
                </div>
    
                <form method="POST" action="{{ route('upload.policy') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Upload Excel <a href="/sample/sample-policy.xls" download>Download sample file</a></label>
                        <input type="file" class="form-control" name="excelFile" id="excelFile" accept=".xls,.xlsx">
                        <small class="text-muted">Accepted file types: .xls, .xlsx</small>
                        @error('excelFile')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
                
                {{-- @if(session('success'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger mt-3" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
</div>

@endsection
