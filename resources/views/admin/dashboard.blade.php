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
                                <div id="report"
                                style="background: #fff; padding: 5px 10px; border: 1px solid #ccc; margin-right: 8rem !important; width: 280px; display: grid;
                               
                                grid-template-columns: 10px 10px 216px;
                                align-items: start;
                                justify-content: space-between;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span>
                                    {{-- Select date --}}
                                </span> <i class="fa fa-caret-down"></i>
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
                                                <div class="widget-numbers text-white">  <a href="{{ route('agentpandding.blance') }}" class="mb-2 mr-2" style="color: white"><i class="fa fa-rupee" style="font-size:24px"></i> {{ $paymentby }}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
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
                                </div> --}}
                            </div>
                        </div>
                    
                               
                            </div>
                        </div>
                        <div class="row ml-1 mr-1">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <h2 style="text-align: center">Insurance Company</h2>
                                    <div class="card-body d-flex flex-wrap">
                                        
                                        <div class="col-md-6 col-xl-4 mb-3">
                                            <div class="card widget-content">
                                                <div class="widget-content-wrapper text-black">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading"> 
                                                            <img src="{{ asset('royal.png') }}" width="130" height="60">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-black">
                                                            {{ $royalCount }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="col-md-6 col-xl-4 mb-3">
                                            <div class="card widget-content">
                                                <div class="widget-content-wrapper text-black">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">
                                                            <img src="{{ asset('future1.jpg') }}" width="130" height="60">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-black"> 
                                                            {{ $futureCount }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="col-md-6 col-xl-4 mb-3">
                                            <div class="card widget-content">
                                                <div class="widget-content-wrapper text-black">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">
                                                            <img src="{{ asset('images.png') }}" width="130" height="60">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="widget-numbers text-black"> 
                                                            {{ $tataCount }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="container"> --}}
                      
                    {{-- </div> --}}
                    
                    
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
                        // var start 
                        // var end 
                        var start = moment().startOf('month');
                        var end = moment();
                        
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
