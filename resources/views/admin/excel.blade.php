@extends('admin.layout.main')
@section('section')

{{-- <style>
      .container {
        min-width: 450px;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
</style> --}}
<div class="container">



    <div class="col-lg-6 d-flex mx-auto">
        <div class="main-card mb-3 card mx-auto">
            <div class="card-body">
                <div class="add" style="display: flex; align-items: center;">
                  
                    <div class="btns" style="margin-left: auto;">
                      
                    </div>
                </div>
    
              
                <form action="{{ route('upload.excel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Upload Excel</label>
                        <input type="file" class="form-control" name="excelFile" id="excelFile">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Choose Excel Import Type</label>
                        <select class="form-control" name="importType">
                            <option value="ExcelImport1">Royalsundaram</option>
                            <option value="ExcelImport2">Shriramgi</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
            </div>
        </div>
    </div>
    
    </div>

@endsection
