@extends('admin.layout.main')
@section('title', 'Upload Policy')
@section('section')

    <div class=" d-flex justify-content-center align-items-center">
        <div class="col-lg-6">
            <div class="main-card mb-3 card shadow-sm h-50" style="background-color: #f9f9f9;">
                <div class="card-body">
                    <div class="mb-4">
                        <h6>Upload Daily Policy</h6>
                        <label>You don't need to add Policy date col in excel</label>
                    </div>
                    <form method="POST" action="{{ route('upload.policy') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Select Date of Policy</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Excel <a href="/sample/sample-policy.xls" download>Download
                                    sample file</a></label>
                            <input type="file" class="form-control" name="excelFile" id="excelFile" accept=".xls,.xlsx">
                            <small class="text-muted">Accepted file types: .xls, .xlsx</small>
                            @error('excelFile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="main-card mb-3 card shadow-sm h-50" style="background-color: #f9f9f9;">
                <div class="card-body">
                    <h6 class="mb-4"></h6>

                    <div class="mb-4">
                        <h6>Upload Monthly Policy</h6>
                        <label>You need to add Policy date col in excel</label>
                    </div>

                    <form method="POST" action="{{ route('upload.policy') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Upload Excel <a href="/sample/bulk-sample-policy .xls" download>Download
                                    sample file</a></label>
                            <input type="file" class="form-control" name="excelFile" id="excelFile" accept=".xls,.xlsx">
                            <small class="text-muted">Accepted file types: .xls, .xlsx</small>
                            @error('excelFile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
