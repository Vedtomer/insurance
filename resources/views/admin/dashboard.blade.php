@extends('admin.layout.main')
@section('title', 'Admin Dashboard')
@section('section')



                    <div class="errors">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                    
                               <div class="mb-5" style="display: flex; align-items: center;">
                                <div class="col-3 mr-5" id="report"
                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; margin-right: 50rem !important; width: 100%">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span>Select date</span> <i class="fa fa-caret-down"></i>
                            </div>
                          
                            <div class="add" style="display: flex; align-items: center;">
                                   
                                <div class="btns" style="margin-left: auto;">
                                    {{-- <a id="openModalBtn" href="{{ route('agent') }}" class="btn btn-secondary mb-2">Add Agent</a> --}}
                                    <select class="form-select js-example-basic-single  select2" data-control="select2" data-placeholder="Select an option" onchange="filterAgent(this.value)">
                    
                                        <optgroup>
                                            <option selected disabled>Select Agent</option>
                                            @foreach ($agent as $user)
                                            <option value="{{ $user->id }}" @if(isset($_GET['agent_id']) && $user->id == $_GET['agent_id']) selected @endif> {{ $user->name }}</option>
                                            
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                               
                            </div>
                               </div>
                             
                               <div class="row">

                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-midnight-bloom">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Premium</div>
                                                {{-- <div class="widget-subheading">Last year expenses</div> --}}
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white">
                                                
                                                    @php
                                                    $totalagentpremium = $user->Policy->sum('premium');
                                                @endphp
                                                <span class="mb-2 mr-2 "><i class="fa fa-rupee" style="font-size:24px"></i> {{ $premiums }}</span>
                
                                                </div>
                                            </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                              
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-arielle-smile">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Policy</div>
                                                {{-- <div class="widget-subheading">Total Clients Profit</div> --}}
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"> 
                                                    {{-- @php
                                                    $policyCount = count($user->Policy);
                                                @endphp --}}
                                                <span class="mb-2 mr-2"><i class='fas fa-box' style='font-size:24px'></i> {{ $policyCount }}</span>

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-grow-early">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Pending Premium</div>
                                                {{-- <div class="widget-subheading">People Interested</div> --}}
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white">  <span class="mb-2 mr-2"><i class="fa fa-rupee" style="font-size:24px"></i> {{ $paymentby }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-premium-dark">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Products Sold</div>
                                                <div class="widget-subheading">Revenue streams</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"><span>$14M</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                               
                            </div>
                        </div>
                    </div>
                    
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    
                    <script type="text/javascript">
                        $(function() {
                        
                            const urlParams = new URLSearchParams(window.location.search);
                        // Retrieve start_date and end_date from the URL parameters
                        const startDateParam = urlParams.get('start_date');
                        const endDateParam = urlParams.get('end_date');
                        const agent_id = urlParams.get('agent_id');
                        const payment_mode = urlParams.get('payment_mode');
                       
                        
                        // Set default start and end dates
                        var start 
                        var end 
                        
                        // If start_date and end_date parameters are present in the URL, use them
                        if (startDateParam && endDateParam && startDateParam !="null") {
                            start = moment(startDateParam);
                            end = moment(endDateParam);
                        }
                        
                            function cb(start, end) {
                                $('#report span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                            }
                        
                            $('#report').daterangepicker({
                                startDate: start,
                                endDate: end,
                                ranges: {
                                   'Today': [moment(), moment()],
                                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                }
                            }, function(start, end, label) {
                                var currentUrl = "{{ URL::current() }}"; 
                            var dynamicRoute =  currentUrl + '?start_date=' + start.format('YYYY-MM-DD') + '&end_date=' + end.format('YYYY-MM-DD')+'&agent_id='+agent_id +'&payment_mode='+payment_mode;
                            window.location.href = dynamicRoute;
                        });
                        
                            cb(start, end);
                        
                        });
                        </script>
                    
                    

@endsection
