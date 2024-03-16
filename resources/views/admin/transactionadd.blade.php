@extends('admin.layout.main')
@section('title', 'Add Transaction')
@section('section')
<div class="col-lg-6">
    <div class="main-card mb-3 card">
    <div class="card-body">
             
                    
          <form method="post" action="{{route('add.transaction')}}" enctype="multipart/form-data">
              @csrf
             
  
              <div class="mb-3">
                  <label >Agent</label>
                  <select class="form-select form-control js-example-basic-single  select2" data-control="select2" data-placeholder="Select an option" name="agent_id" >
                    <option>
                      <option selected disabled>Select Agent</option>
                        @foreach ($data as $user)
                        <option value="{{ $user->id }}" @if(isset($_GET['agent_id']) && $user->id == $_GET['agent_id']) selected @endif> {{ $user->name }}</option>
                        @endforeach
                    </option>
                </select>
                </div>
                
  
              <div class="mb-3">
                  <label for="payment_mode">Payment Mode</label>
                  <select class="form-control" id="payment_mode" name="payment_mode" required>
                    <option selected>Select Payment Mode</option>
                      <option value="cash">Cash</option>
                      <optgroup label="Online">
                          <option value="google_pe">Google Pay</option>
                          <option value="phone_pe">PhonePe</option>
                          <option value="credit_card">Credit Card</option>
                          <option value="debit_card">Debit Card</option>
                          <option value="netbanking">Netbanking</option>
                          <option value="paytm">Paytm</option>
                      </optgroup>
                  </select>
            </div>             
             
              <div class="mb-3">
                <label >Transaction id</label>
                <input type="text" class="form-control" name="transaction_id"  required>
              </div>
           
              <div class="mb-3">
                <label >Amount</label>
                <input type="text" class="form-control" name="amount"  required>
              </div>

              <div class="mb-3">
                <label >Payment Date</label>
                <input type="date" class="form-control" onload="getDate()"  name="payment_date" id="date" required>
              </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">submit</button>
              <a  href="{{ route('transaction') }}" class="btn btn-secondary">Back</a>
          </div>
            
            </form>
              </div>
          </div>
        </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    function getDate(){
    var today = new Date();

document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);


}
  </script>
  <script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
    </script>
    
@endsection