@extends('admin.layout.main')
@section('section')
<style>

    .btns{
        float:right;
        margin-bottom: 8px;
    }
    .btn{
        border-radius: 0px;
    }
</style>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
    <div class="card-body">
        <div class="add" style="display: flex; align-items: center;">
            <h5 class="card-title">Table responsive</h5>
            <div class="btns" style="margin-left: auto;">
              <button type="button" class="btn btn-secondary">Add Result</button>
            </div>
          </div>
          

    <div class="table-responsive">
    <table class="mb-0 table">
    <thead>
    <tr>
    <th>#</th>
    <th>Table heading</th>
    <th>Table heading</th>
    <th>Table heading</th>
    <th>Table heading</th>
    <th>Table heading</th>
    <th>Table heading</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <th scope="row">1</th>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    </tr>
    <tr>
    <th scope="row">2</th>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    </tr>
    <tr>
    <th scope="row">3</th>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    <td>Table cell</td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    @endsection