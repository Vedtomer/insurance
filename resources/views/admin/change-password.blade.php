@extends('admin.layout.main')
@section('section')


<div class="col-md-6">
  <div class="main-card mb-3 card">
  <div class="card-body">
  <h5 class="card-title">CHANGE-PASSWORD</h5>
  <form class="">
  <div class="position-relative form-group">
  <label for="examplePassword" class="">Current Password:</label>
  <input name="password" id="examplePassword" placeholder="with a placeholder" type="password" class="form-control">
  </div>
  <div class="position-relative form-group">
  <label for="examplePassword" class="">New Password:</label>
  <input name="password" id="examplePassword" placeholder="password placeholder" type="password" class="form-control">
  </div>
  <div class="position-relative form-group">
    <label for="examplePassword" class="">Confirm New Password:</label>
    <input name="password" id="examplePassword" placeholder="password placeholder" type="password" class="form-control">
    </div>
  {{-- <div class="position-relative form-group">
  <label for="exampleSelect" class="">Select</label>
  <select name="select" id="exampleSelect" class="form-control">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  </select>
  </div> --}}
  {{-- <div class="position-relative form-group">
  <label for="exampleSelectMulti" class="">Select Multiple</label>
  <select multiple="" name="selectMulti" id="exampleSelectMulti" class="form-control">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  </select>
  </div> --}}
  {{-- <div class="position-relative form-group">
  <label for="exampleText" class="">Confirm New Password:</label>
  <textarea name="text" id="exampleText" class="form-control"></textarea>
  </div> --}}
  {{-- <div class="position-relative form-group">
  <label for="exampleFile" class="">File</label>
  <input name="file" id="exampleFile" type="file" class="form-control-file">
  <small class="form-text text-muted">This is some placeholder block-level help
  text for the above input. It's a bit lighter and easily wraps to a new
  line.
  </small>
  </div> --}}
  <button class="mt-1 btn btn-primary">Submit</button>
  </form>
  </div>
  </div>
  </div>
        @endsection
