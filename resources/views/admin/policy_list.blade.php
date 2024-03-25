@extends('admin.layout.main')
@section('title', 'Policy Listing')
@section('section')


   
    

    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
       <div class="top" style="display: flex;">
        <div  class="col-3 mb-4 mr-5" id="reportrange"
        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; margin-right: 50rem !important;
    }">
        <i class="fa fa-calendar"></i>&nbsp;
        <span></span> <i class="fa fa-caret-down"></i>
    </div>
   
       </div>
            
          

                <div class="add" style="display: flex; align-items: center;">
                    {{-- <h5 class="card-title">Royalsundaram</h5> --}}
                    <div class="btns" style="margin-left: auto;">
                     
                    </div>
                </div>


                <div class="table-responsive">
                   
                        <table class="mb-0 table">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                
                                    <th>Policy No.</th>
                                    <th>Customer Name</th>
                                    <th>Net Amount</th>
                                    <th>GST</th>
                                    <th>Premium</th>
                                    <th>Commission</th>
                                    <th>Upload Policy</th>
                                    <th>Agent</th>
                                    <th>Payment By</th>

                                    <th>Policy Start Date</th>
                                    <th>Policy End Date</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($points as $point)
                                    <tr>

                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $point->points }}</td>
                                        <td>{{ $point->customername }}</td>

                                        <td>{{ $point->net_amount }}</td>
                                        

                                      

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Policy Found.</p>
                    @endif
                </div>
            
            </div>
        </div>
    </div>




    
    <!-- Include SweetAlert from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script></script>
    <script>
        function confirmAgentChange(selectElement) {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to Select the agent. Do you want to proceed?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Update Agent",
                cancelButtonText: "No, cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                
                    window.location.href = selectElement.value;
                } else {
             
                    selectElement.selectedIndex = 0;
                }
            });
        }
    </script>

@endsection


{{-- @endsection --}}
