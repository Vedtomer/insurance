@extends('admin.layout.main')
@section('title', 'Upload Multiple Policy PDF Files')
@section('section')

    @if(session('success'))
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
                @endif


<div class="container">
    <div class="col-lg-6 d-flex mx-auto">
        <div class="main-card mb-3 card mx-auto">
            <div class="card-body">
                <div class="add" style="display: flex; align-items: center;">
                    <div class="btns" style="margin-left: auto;"></div>
                </div>
    
                <form method="POST" action="{{ route('policy.pdf.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Upload PDF</label>
                        <input type="file" class="form-control" name="pdfFile" id="excelFile" accept=".pdf" multiple>
                        <small class="text-muted">Accepted file types: PDF</small>
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