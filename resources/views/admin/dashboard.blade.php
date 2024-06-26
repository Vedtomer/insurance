@extends('admin.layout.main')
@section('title', 'Admin Dashboard')
@section('section')

<style>
    @media only screen and (max-width: 768px) {
        .widget-numbers {
            font-size: 16px !important;
        }
    }

    @media only screen and (max-width: 768px) {
        .datefil {
            width: 250px !important;
            
        }
    }

    @media only screen and (max-width: 768px) {
        .Insurance {
            font-size: 22px !important;
            
        }
    }

    @media only screen and (max-width: 768px) {
        .faicon {
            font-size: 16px !important;
            
        }
    }
    
</style>

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
                                {{-- <div class="container"> --}}
                                    <div class="row justify-content-left mt-2">
                                        <div class="col-lg-4 mb-2">
                                            <div id="report" class="datefil mb-4" style="background: #fff; padding: 5px 10px; border: 1px solid #ccc;">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <span>
                                                    {{-- Select date --}}
                                                </span> <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-2">
                                            <div class="datefil">
                                                <select class=" datefil form-select js-example-basic-single select2" data-control="select2" data-placeholder="Select an option" onchange="filterAgent(this.value)">
                                                    <optgroup>
                                                        <option selected disabled>Select Agent</option>
                                                        @foreach ($data['agent'] as $user)
                                                        <option value="{{ $user->id }}" @if(isset($_GET['agent_id']) && $user->id == $_GET['agent_id']) selected @endif>{{ $user->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                                
                             
                               <div class="row">

                                <div class="col-md-6 col-xl-4">
                                    <div class="card mb-3 widget-content bg-midnight-bloom">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Premium</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white">
                                                    @php
                                                    $totalagentpremium = $user->Policy->sum('premium');
                                                    @endphp
                                                    <span class="mb-2 mr-2 "><i class="faicon fa fa-rupee" style="font-size:22px"></i>
                                                        <span class="text-sm">{{ $data['premiums'] }}</span>
                                                    </span>
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
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white">
                                                    <span class="mb-2 mr-2"><i class='faicon fas fa-box' style='font-size:22px'></i>
                                                        <span class="text-lg">{{ $data['policyCount'] }}</span>
                                                    </span>
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
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white">
                                                    <a href="{{ route('agentpandding.blance') }}" class="mb-2 mr-2" style="color: white">
                                                        <i class="faicon fa fa-rupee" style="font-size:22px"></i>
                                                        <span class="text-lg">{{ $data['paymentby'] }}</span>
                                                    </a>
                                                </div>
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
                                    <h2 style="text-align: center" class="Insurance">Insurance Company</h2>
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
                                                            {{ $data['royalCount'] }}
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
                                                            {{ $data['futureCount'] }}
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
                                                            {{ $data['tataCount'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}

                    
                    @if (isset($data['datausers']) && count($data['datausers']) > 0)
<div class="col-lg-8">
    <div class="main-card mb-3 card">
        <div class="card-body">
            
            <div class="table-responsive">
               
                <table class="mb-0 table table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="width: 8%" scope="col">Sr. No.</th>
                            <th style="width: 20%" scope="col">Name</th>
                            <th style="width: 20%" scope="col">Policy</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['datausers'] as $key => $user)
                        @if (count($user->Policy) <= 10)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <span >{{ $user->policy_count }}</span>
                                </td>
                                
                            </tr>
                        @endif
                    @endforeach
                    
                    </tbody>
                </table>
              
            </div>
        </div>
    </div>
</div>
@else
{{-- <p>No Policy Data</p> --}}
@endif             
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
